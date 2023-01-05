<?php

namespace backend\controllers;

use common\models\Equipamentos;
use common\models\TipoExercicio;
use Yii;
use common\models\Exercicio;
use backend\models\search\ExercicioSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * ExercicioController implements the CRUD actions for Exercicio model.
 */
class ExercicioController extends Controller
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
     * Lists all Exercicio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExercicioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Exercicio model.
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
     * Creates a new Exercicio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Exercicio();
        $lista_equipamentos = ArrayHelper::map(Equipamentos::find()
            ->orderBy(['nome' => SORT_ASC])
            ->where('estado = 1')
            ->all(), 'id', 'nome');
        $lista_tipo_exercicios = ArrayHelper::map(TipoExercicio::find()
            ->orderBy(['nome' => SORT_ASC])
            ->all(), 'id', 'nome');


        if($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'exemplo');

            if (isset($file)){
            // File info
            $fileName = $file->name;
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($fileType, $allowTypes)) {
                $image = $file->tempName;
                $imgContent = base64_encode(file_get_contents($image));
                /*var_dump($imgContent);
                die();*/
                $model->exemplo = $imgContent;
                $model->save();

                return $this->redirect(['view', 'id' => $model->id]);

            }
        }else
            {
                $model->exemplo = '';
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'lista_equipamentos' => $lista_equipamentos,
            'lista_tipo_exercicios' => $lista_tipo_exercicios
        ]);
    }

    /**
     * Updates an existing Exercicio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $img = $model->exemplo;
        $lista_equipamentos = ArrayHelper::map(Equipamentos::find()
            ->orderBy(['nome' => SORT_ASC])
            ->where('estado = 1')
            ->all(), 'id', 'nome');
        $lista_tipo_exercicios = ArrayHelper::map(TipoExercicio::find()
            ->orderBy(['nome' => SORT_ASC])
            ->all(), 'id', 'nome');

        if($model->load(Yii::$app->request->post())) {
            // Get file info
            $file = UploadedFile::getInstance($model, 'exemplo');

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
                    $model->exemplo = $imgContent;
                    $model->save();

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }else
            {

                $model->exemplo = $img;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }


        }

        return $this->render('update', [
            'model' => $model,
            'lista_equipamentos' => $lista_equipamentos,
            'lista_tipo_exercicios' => $lista_tipo_exercicios
        ]);
    }

    /**
     * Deletes an existing Exercicio model.
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
     * Finds the Exercicio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Exercicio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Exercicio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
