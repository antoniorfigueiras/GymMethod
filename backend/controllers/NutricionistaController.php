<?php

namespace backend\controllers;

use backend\models\search\UserSearch;
use common\models\User;
use Yii;
use common\models\Perfil;
use backend\models\search\NutricionistaSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * NutricionistaController implements the CRUD actions for Perfil model.
 */
class NutricionistaController extends Controller
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
                        'roles' => ['adicionarNutricionista'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['consultarFuncionario'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['adicionarNutricionista'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['editarNutricionista'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['desativar', 'ativar'],
                        'roles' => ['desativarCliente'],
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
        $searchModel = new NutricionistaSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

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
        $model->user_id = $idUser;
        $modelUser = $model->user;
        if ($model->load(Yii::$app->request->post())) {
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

                    return $this->redirect(['view', 'id' => $model->user_id]);

                }
            }else
            {
                $model->imagem = '';
                $model->save();
                return $this->redirect(['view', 'id' => $model->user_id]);
            }

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
        $img = $model->imagem;
        if (($model->load(Yii::$app->request->post()) && ($modelUser->load(Yii::$app->request->post()) && $modelUser->save()))){
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

                    return $this->redirect(['view', 'id' => $model->user_id]);
                }
            }else
            {

                $model->imagem = $img;
                $model->save();
                return $this->redirect(['view', 'id' => $model->user_id]);
            }
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
