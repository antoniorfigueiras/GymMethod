<?php

namespace backend\controllers;

use backend\models\search\ClienteSearch;
use backend\models\search\NutricionistaSearch;
use common\models\Perfil;
use common\models\User;
use Yii;
use common\models\Consulta;
use backend\models\search\ConsultaSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ConsultaController implements the CRUD actions for Consulta model.
 */
class ConsultaController extends Controller
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
                        'actions' => ['index', 'view', 'create', 'update', 'concluir', 'cancelar', 'delete', 'select_client', 'select_nutricionista'],
                        'roles' => ['funcionario', 'nutricionista'],
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
     * Lists all Consulta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConsultaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Consulta model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Consulta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
        public function actionCreate($idCliente, $idNutricionista)
    {
        $model = new Consulta();
        $model->cliente_id = (int)$idCliente;
        $model->nutricionista_id = (int)$idNutricionista;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Consulta model.
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

    public function actionCancelar($id)
    {
        $model = $this->findModel($id);
        $model->updateAttributes(['estado' => 2]);
        return $this->redirect(['view', 'id' => $model->id]);
    }

    public function actionConcluir($id)
    {
        $model = $this->findModel($id);
        $model->updateAttributes(['estado' => 1]);
        return $this->redirect(['view', 'id' => $model->id]);
    }

    /**
     * Deletes an existing Consulta model.
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
     * Finds the Consulta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Consulta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Consulta::findOne($id)) !== null) {
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

    public function actionSelect_nutricionista($idCliente)
    {
        $value = 1;
        $searchModel = new NutricionistaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $value);

        return $this->render('selectNutricionista', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'idCliente' => $idCliente
        ]);
    }
}
