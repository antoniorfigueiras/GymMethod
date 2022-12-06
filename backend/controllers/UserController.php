<?php

namespace backend\controllers;

use backend\models\CreateNutricionistaForm;
use backend\models\CreateTreinadorForm;
use backend\models\CreateFuncionarioForm;
use Yii;
use common\models\User;
use backend\models\search\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($userType)
    {
        if ($userType == 'funcionario')
        {
            $model = new CreateFuncionarioForm();
            if ($model->load(Yii::$app->request->post()) && $model->signup()) {
                $user = $this->getId();
                return $this->redirect(['funcionario/create','idUser' => $user->getId()]);
            }
        }
        if ($userType == 'treinador')
        {
            $model = new CreateTreinadorForm();
            if ($model->load(Yii::$app->request->post()) && $model->signup()) {
                $user = $this->getId();
                return $this->redirect(['treinador/create','idUser' => $user->getId()]);
            }
        }
        if ($userType == 'nutricionista')
        {
            $model = new CreateNutricionistaForm();
            if ($model->load(Yii::$app->request->post()) && $model->signup()) {
                $user = $this->getId();
                return $this->redirect(['nutricionista/create','idUser' => $user->getId()]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function getId()
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT id FROM user ORDER BY id DESC LIMIT 1");
        $userID = $command->queryAll();
        return User::findOne($userID);
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id
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
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
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
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}