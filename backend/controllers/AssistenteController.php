<?php

namespace backend\controllers;

use Yii;
use common\models\Perfil;
use backend\models\search\AssistenteSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TreinadorController implements the CRUD actions for Perfil model.
 */
class AssistenteController extends Controller
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
                        'actions' => ['index'],
                        'roles' => ['adicionarAssistente'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['consultarAssistente'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['adicionarAssistente'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['editarAssistente'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['desativar', 'ativar'],
                        'roles' => ['desativarAssistente'],
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
     * Lists all Perfil models.
     * @return mixed
     */
    public function actionIndex()
    {
        $value = 0;
        $searchModel = new AssistenteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $value);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDesativar($user_id)
    {
        $model = $this->findModel($user_id);
        $modelUser = $model->user;
        $modelUser->updateAttributes(['status' => 0]);
        return $this->redirect(['view', 'id' => $modelUser->id]);
    }

    public function actionAtivar($user_id)
    {
        $model = $this->findModel($user_id);
        $modelUser = $model->user;
        $modelUser->updateAttributes(['status' => 1]);
        return $this->redirect(['view', 'id' => $modelUser->id]);
    }

    /**
     * Displays a single Perfil model.
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
     * Creates a new Perfil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idUser)
    {
        $model = new Perfil();
        $model->user_id = $idUser;// Definir o id do user para a criação do perfil
        $modelUser = $model->user;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view','id' => $model->user_id]);
        }

        return $this->render('create', [
            'model' => $model,
            'modelUser' => $modelUser,
        ]);
    }

    /**
     * Updates an existing Perfil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelUser = $model->user;
        if(($model->load(Yii::$app->request->post()) && $model->save()) && ($modelUser->load(Yii::$app->request->post()) && $modelUser->save())){
            return $this->redirect(['view', 'id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelUser' => $modelUser,
        ]);
    }

    /**
     * Finds the Perfil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Perfil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Perfil::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
