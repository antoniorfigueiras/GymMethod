<?php

namespace backend\controllers;

use Yii;
use common\models\Venda;
use backend\models\search\VendaSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VendaController implements the CRUD actions for Venda model.
 */
class VendaController extends Controller
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
                        'roles' => ['funcionario'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['funcionario'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['funcionario'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['funcionario'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['funcionario'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['pago'],
                        'roles' => ['funcionario'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['cancelar'],
                        'roles' => ['funcionario'],
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
     * Lists all Venda models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VendaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Venda model.
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
     * Creates a new Venda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Venda();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Venda model.
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
     * Deletes an existing Venda model.
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

    public function actionCancelar($id)
    {
        $model = $this->findModel($id);
        $model->updateAttributes(['estado' => 2]);
        return $this->redirect(['view', 'id' => $model->id]);
    }

    public function actionPago($id)
    {
        $model = $this->findModel($id);
        $model->updateAttributes(['estado' => 1]);
        return $this->redirect(['view', 'id' => $model->id]);
    }

    /**
     * Finds the Venda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Venda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Venda::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
