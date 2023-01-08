<?php

namespace backend\controllers;

use backend\models\search\ClienteSearch;
use backend\models\search\ExercicioPlanoSearch;
use backend\models\search\ExercicioSearch;
use common\models\Perfil;
use common\models\User;
use Yii;
use common\models\PlanoTreino;
use backend\models\search\PlanoTreinoSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlanoController implements the CRUD actions for PlanoTreino model.
 */
class PlanoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['treinador'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PlanoTreino models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PlanoTreinoSearch();
        $model = Perfil::findOne(Yii::$app->user->getId());

        if ($model->user->getRole() == 'admin')
        {
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        }
        else
        {
            // Data provider para ir buscar todos os exercicios da tabela exercicio_plano associados ao plano atraves da relação do model
            $dataProvider = new ActiveDataProvider([
                'query' => $model->getPlanos(),
            ]);
        }


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PlanoTreino model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $model = $this->findModel($id);

        // Data provider para ir buscar todos os exercicios da tabela exercicio_plano associados ao plano atraves da relação do model
       /* $dataProvider = new ActiveDataProvider([
            'query' => $model->getExercicioPlanos(),
        ]);*/

        $dataProvider = new ActiveDataProvider([
            'query' => $model->getExercicioPlanos(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new PlanoTreino model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idCliente)
    {

        $model = new PlanoTreino();
        $model->cliente_id = (int)$idCliente;
        $model->instrutor_id = Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            //TODO: Publish
            $server   = '127.0.0.1';
            $port     = 1883;
            $idClient = 'client';

            $mqtt = new \PhpMqtt\Client\MqttClient($server, $port, $idClient);

            $mqtt->connect();
            $mqtt->publish('teste', 'Plano Criado', 1);
            $mqtt->disconnect();



            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PlanoTreino model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,

        ]);
    }

    /**
     * Deletes an existing PlanoTreino model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PlanoTreino model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return PlanoTreino the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PlanoTreino::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionSelect_client()
    {
        $value = 1;
        $searchModel = new ClienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $value);

        return $this->render('selectClient', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
