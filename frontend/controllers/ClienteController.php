<?php

namespace frontend\controllers;

use Yii;
use common\models\Perfil;
use frontend\models\search\ClienteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * ClienteController implements the CRUD actions for Perfil model.
 */


class ClienteController extends \frontend\base\Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'update', 'view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ]]],
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
        $searchModel = new ClienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Perfil model.
     * @param int $user_id User ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($user_id),
        ]);
    }

    /**
     * Creates a new Perfil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Perfil();

        if ($model->load(Yii::$app->request->post()) ) {
            $file = UploadedFile::getInstance($model, 'imagem');

            if (isset($file)){
                // File info
                $fileName = $file->name;
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                if (in_array($fileType, $allowTypes)) {
                    $image = $file->tempName;
                    $imgContent = base64_encode(file_get_contents($image));

                    $model->imagem = $imgContent;
                    $model->save();

                    var_dump($model);
                    die();
                    return $this->redirect(['/site/login']);

                }
            }else
            {
                $model->imagem = '';
                $model->save();
                return $this->redirect(['/site/login']);
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Perfil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $user_id User ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($user_id)
    {
        $model = $this->findModel($user_id);
        $img = $model->imagem;
        if ($model->load(Yii::$app->request->post())){
            // Get file info
            $file = UploadedFile::getInstance($model, 'imagem');

            // Se uma imagem for introduzida, introduz esta no campo exemplo
            if (isset($file)){
                $fileName = $file->name;
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
                // Allow certain file formats
                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                if (in_array($fileType, $allowTypes)) {
                    $image = $file->tempName;
                    $imgContent = base64_encode(file_get_contents($image));

                    // Insert image content into database
                    $model->imagem = $imgContent;
                    $model->save();

                    return $this->redirect(['view', 'user_id' => $model->user_id]);
                }
            }else
            {

                $model->imagem = $img;
                $model->save();
                return $this->redirect(['view', 'user_id' => $model->user_id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the Perfil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $user_id User ID
     * @return Perfil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($user_id)
    {
        if (($model = Perfil::findOne($user_id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
