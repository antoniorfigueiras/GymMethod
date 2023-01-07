<?php

namespace backend\controllers;

use common\models\Aulas;
use common\models\AulasHorario;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AulasController implements the CRUD actions for Aulas model.
 */
class AulasController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Aulas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $aulasHorario = AulasHorario::find()->all();
        $aulas = Aulas::find()->all();

        if(empty($aulas)){
            $this->createAulas();
            $aulas = Aulas::find()->all();
        }
            foreach ($aulas as $aula) {
                $event = new \yii2fullcalendar\models\Event();
                $event->id = $aula->id;
                $event->title = $aula->aulasHorario->modalidade->nome;
                $event->start = $aula->data . ' ' . $aula->aulasHorario->inicio;
                $event->end = $aula->data . ' ' . $aula->aulasHorario->fim;
                $events[] = $event;
            }

            return $this->render('index', [
                'events' => $events,
            ]);

    }

    /**
     * Displays a single Aulas model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Aulas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->createAulas();

        $dataProvider = new ActiveDataProvider([
            'query' => Aulas::find(),
        ]);

        return $this->redirect('index');
    }

    /**
     * Updates an existing Aulas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Aulas model.
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
     * Finds the Aulas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Aulas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Aulas::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function createAulas(){
        $horario = AulasHorario::find()->all();



        foreach ($horario as $horario){

            $model = new Aulas();
            if($horario->status != 'Inativo') {
                switch ($horario->diaSemana) {
                    case 'segunda':
                        $data = date('Y-m-d', strtotime('next monday'));
                        $model->data = $data;
                        break;
                    case 'terça':
                        $data = date('Y-m-d', strtotime('next Tuesday'));
                        $model->data = $data;
                        break;
                    case 'quarta':
                        $data = date('Y-m-d', strtotime('next Wednesday'));
                        $model->data = $data;
                        break;
                    case 'quinta':
                        $data = date('Y-m-d', strtotime('next Thursday'));
                        $model->data = $data;
                        break;
                    case 'sexta':
                        $data = date('Y-m-d', strtotime('next Friday'));
                        $model->data = $data;
                        break;
                    case 'sábado':
                        $data = date('Y-m-d', strtotime('next Saturday'));
                        $model->data = $data;
                        break;
                }


                $model->id_aulas_horario = $horario->id;

                $aulas = Aulas::find()
                    ->where(['data' => $model->data, 'id_aulas_horario' => $model->id_aulas_horario])
                    ->exists();
                if ($aulas == false) {
                    $model->save();
                }
            }
        }
    }
}


