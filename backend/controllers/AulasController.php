<?php

namespace backend\controllers;


use common\models\Aulas;
use common\models\AulasHorario;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
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
     * Lists all Aulas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $aulasHorario = AulasHorario::find()->all();
        $aulas = Aulas::find()->all();

        $model = new Aulas();
        $sundays = $this->getSundays();

        if(empty($aulasHorario)){
            $_SESSION['horarioError'] = 'É necessário criar aulas antes de aceder ao horário!';
            return $this->redirect(['./aulas-horario']);
        }

        if(empty($aulas)){
            $this->createAulas($sundays[0]);
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
                'model' => $model,
                'events' => $events,
                'sundays' => $sundays,
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
        $model = new Aulas();

        $sundays = $this->getSundays();
        //var_dump($sundays); die();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $semana = $sundays[$model->data];
                $this->createAulas($semana);
            }
        }

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

    public function createAulas($semana){
        $horario = AulasHorario::find()->all();

        foreach ($horario as $horario){

            $model = new Aulas();
            if($horario->status != 'Inativo') {
                switch ($horario->diaSemana) {
                    case 'segunda':
                        $data = date('Y-m-d', strtotime('next monday', strtotime($semana)));
                        $model->data = $data;
                        break;
                    case 'terça':
                        $data = date('Y-m-d', strtotime('next Tuesday', strtotime($semana)));
                        $model->data = $data;
                        break;
                    case 'quarta':
                        $data = date('Y-m-d', strtotime('next Wednesday', strtotime($semana)));
                        $model->data = $data;
                        break;
                    case 'quinta':
                        $data = date('Y-m-d', strtotime('next Thursday', strtotime($semana)));
                        $model->data = $data;
                        break;
                    case 'sexta':
                        $data = date('Y-m-d', strtotime('next Friday', strtotime($semana)));
                        $model->data = $data;
                        break;
                    case 'sábado':
                        $data = date('Y-m-d', strtotime('next Saturday', strtotime($semana)));
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


    function getSundays(){
        $date = date('Y-m-d', strtotime("now"));
        // Modify the date it contains
        for($i =0; $i < 5; $i++){
            $date = date('Y-m-d', strtotime('next sunday', strtotime($date)));

            $days[] = $date;
        }

        return $days;
    }
}


