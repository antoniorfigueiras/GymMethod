<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Exercicio;
use common\models\ExercicioPlano;
use common\models\PlanoTreino;
use common\models\User;
use Psy\Util\Json;
use Symfony\Component\Mime\Encoder\Base64Encoder;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;

class AulasController extends ActiveController
{
    public $modelClass = 'common\models\Aulas'; // Para ir buscar o modelo a ser usado no controlador

    public function behaviors()
    {
        Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
        ];
        return $behaviors;
    }

    // Obter aulas disponiveis
    public function actionGetAulas()
    {
        $model = new $this->modelClass;
        $aulas = $model::find()
            ->select(['aulas.id', 'nome', 'data', 'inicio', 'fim', 'aulas.status'])
            ->where(['aulas_Horario.status'=>'Ativo'])
            ->joinWith('aulasHorario', [])
            ->joinWith('aulasHorario.modalidade', [])
            ->asArray()
            ->all();

        return $aulas;
    }

    // Obter aulas onde o cliente está inscrito
    public function actionGetAulasInscritas()
    {
        $model = new $this->modelClass;
        $aulas = $model::find()
            ->select(['aulas.id','inscricoes.id as inscricao_id' ,'nome', 'data', 'inicio', 'fim', 'aulas.status'])
            ->where(['inscricoes.id_cliente'=>Yii::$app->params['id']])
            ->andWhere(['aulas_Horario.status'=>'Ativo'])
            ->joinWith('inscricoes', [])
            ->joinWith('aulasHorario', [])
            ->joinWith('aulasHorario.modalidade', [])
            ->asArray()
            ->all();

        return $aulas;
    }


}
