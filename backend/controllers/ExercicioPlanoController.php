<?php

namespace backend\controllers;

use backend\models\search\ClienteSearch;
use backend\models\search\ExercicioSearch;
use common\models\Exercicio;
use common\models\Parameterizacao;
use common\models\PlanoTreino;
use common\models\TipoExercicio;
use Yii;
use common\models\ExercicioPlano;
use backend\models\search\ExercicioPlanoSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExercicioPlanoController implements the CRUD actions for ExercicioPlano model.
 */
class ExercicioplanoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ExercicioPlano models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExercicioPlanoSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ExercicioPlano model.
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
     * Creates a new ExercicioPlano model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   public function actionCreate($idPlano, $idExercicio)
    {
       /* $listaExercicios = ArrayHelper::map(Exercicio::find()
            ->orderBy(['nome' => SORT_ASC])
            ->all(), 'id', 'nome');*/

        $model = new ExercicioPlano();
        $modelParameterizacao = new Parameterizacao();

        $model->plano_id = (int)$idPlano; //Associar o id do plano recebido ao plano_id da tabela exercicio_plano
        $model->exercicio_id = (int)$idExercicio;
        $modelParameterizacao->data = date("Y/m/d");
        $modelPlano = $model->plano; // Ir buscar o model do plano atraves da relacao do modelo

        if ($modelParameterizacao->load(Yii::$app->request->post()) && $modelParameterizacao->save()) {
            $model->parameterizacao_id = $modelParameterizacao->id;
           if($model->save())
           {
               return $this->redirect(['plano/view', 'id' => $idPlano]);
           }
        }


        return $this->render('create', [
            'model' => $model,
            'modelPlano' => $modelPlano,
            'modelParameterizacao' => $modelParameterizacao,
            //'listaExercicios' => $listaExercicios
        ]);
    }
    public function actionSelect_exercicio($idPlano)
    {
        $searchModel = new ExercicioSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $modelPlano = PlanoTreino::findOne($idPlano); // Ir buscar o model do plano atraves da relacao do modelo


        return $this->render('selectExercicio', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelPlano' => $modelPlano
        ]);
    }

    /**
     * Updates an existing ExercicioPlano model.
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
     * Deletes an existing ExercicioPlano model.
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
     * Finds the ExercicioPlano model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ExercicioPlano the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ExercicioPlano::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
