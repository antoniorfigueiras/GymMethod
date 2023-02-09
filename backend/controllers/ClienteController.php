<?php

namespace backend\controllers;

use backend\models\search\PlanoTreinoSearch;
use common\models\User;
use Yii;
use common\models\Perfil;
use backend\models\search\ClienteSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ClienteController implements the CRUD actions for Perfil model.
 */
class ClienteController extends Controller
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
                        'roles' => ['consultarCliente'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['adicionarCliente'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['consultarCliente'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['editarCliente'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['desativar', 'ativar'],
                        'roles' => ['desativarCliente'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['clientes'],
                        'roles' => ['consultarCliente'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['planos'],
                        'roles' => ['consultarCliente'],
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

    public function actionClientes()
    {
        $value = 1;
        $searchModel = new ClienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $value);

        return $this->render('clientes', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Lists all Perfil models.
     * @return mixed
     */
    public function actionIndex()
    {
        $value = 0;
        $searchModel = new ClienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $value);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionPlanos($id)
    {
        $searchModel = new PlanoTreinoSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $model = Perfil::findOne($id);

            // Data provider para ir buscar todos os exercicios da tabela exercicio_plano associados ao plano atraves da relação do model
            $dataProvider = new ActiveDataProvider([
                'query' => $model->getPlanosCliente(),
            ]);


        return $this->render('planos', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Perfil model.
     * @param int $user_id User ID
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
     * @param int $user_id User ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelUser = $model->user;
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
     * Deletes an existing Perfil model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $user_id User ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
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
     * Finds the Perfil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $user_id User ID
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
