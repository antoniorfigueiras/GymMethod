<?php

namespace backend\controllers;

use backend\models\CreateUserForm;
use mysql_xdevapi\SqlStatementResult;
use Yii;
use common\models\User;
use backend\models\search\FuncionarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FuncionarioController implements the CRUD actions for User model.
 */
class FuncionarioController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("SELECT * FROM user JOIN auth_assignment 
                                                    ON user.id = auth_assignment.user_id 
                                                    AND auth_assignment.item_name = 'funcionario'");
        $funcionarios = $command->queryAll();

       /* $query = new Query();
        $query->select('*')
            ->from('user');

        $query->join = [
            ['JOIN', 'auth_assignment ', 'user.id = auth_assignment.user_id']];
        $query->where('auth_assignment.item_name = funcionario');*/




        /*var_dump($funcionarios);
        die();*/


        $searchModel = new FuncionarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //Yii::$app->request->queryParams
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
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
    public function actionUser()
    {
        $model = new CreateUserForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {

            $connection = Yii::$app->getDb();
            $command = $connection->createCommand("SELECT id FROM user ORDER BY id DESC LIMIT 1");
            $userID = $command->queryAll();
            $user= User::findOne($userID);

            return $this->redirect(['perfil/create','idUser' => $user->getId()]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
}
