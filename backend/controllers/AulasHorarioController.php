<?php

namespace backend\controllers;

use backend\models\search\TreinadorSearch;
use common\models\AulasHorario;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * AulasHorarioController implements the CRUD actions for AulasHorario model.
 */
class AulasHorarioController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [

                    [
                        'allow' => true,
                        'actions' =>  ['index'],
                        'roles' => ['funcionario'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['consultarAula'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['adicionarAula'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['editarAula'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['removerAula'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['select'],
                        'roles' => ['adicionarAula'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['instrutor'],
                        'roles' => ['adicionarAula'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update-id-funcionario'],
                        'roles' => ['adicionarAula'],
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
     * Lists all AulasHorario models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AulasHorario::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AulasHorario model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AulasHorario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {
        $model = new AulasHorario();
        $model->id_instrutor = $id;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->renderAjax('create', [
            'model' => $model,
            'idTreinador' => $id,
        ]);
    }

    /**
     * Updates an existing AulasHorario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->renderAjax('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AulasHorario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AulasHorario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AulasHorario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AulasHorario::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSelect()
    {
        $value = 1;
        $searchModel = new TreinadorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $value);
        return $this->render('selectTreinador', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'action' => 'select',
        ]);
    }

    public function actionInstrutor($id){
        $value = 1;
        $searchModel = new TreinadorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $value);
        return $this->render('selectUpdateTreinador', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'action' => 'instrutor',
            'id' => $id,
        ]);
    }

    public function actionUpdateIdFuncionario($id, $idTreinador){
        $model = $this->findModel($id);

        $model->id_instrutor = $idTreinador;
        $model->save();

        return $this->redirect(['index']);
    }
}
