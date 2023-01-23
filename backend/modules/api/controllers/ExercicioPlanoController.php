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

class ExercicioPlanoController extends ActiveController
{
    public $modelClass = 'common\models\ExercicioPlano'; // Para ir buscar o modelo a ser usado no controlador

    public function behaviors()
    {
        Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
        ];
        return $behaviors;
    }

    // Obter exercicios do plano
    public function actionGetExerciciosPlano($idPlano)
     {
         $model = new $this->modelClass;
         $exercicios = $model::find()
             ->select(['exercicio_plano.id', 'plano_id','exercicio.nome', 'equipamentos.nome as equipamento', 'tipo_exercicio.nome as tipo_exercicio'])
             ->where(['plano_id'=>$idPlano])
             ->joinWith('exercicio', [])
             ->joinWith('exercicio.equipamento', [])
             ->joinWith('exercicio.tipoExercicio', [])
             ->joinWith('parameterizacao', [])
             ->asArray()
             ->all();

         return $exercicios;
     }

    // Obter detalhes do exercicio
    public function actionGetExercicioDetalhes($idExercicioPlano)
    {
        $model = new $this->modelClass;
        $exercicios = $model::find()
            ->select(['exercicio_plano.id as exercicio_plano_id','exercicio.nome', 'equipamentos.nome as equipamento',
                'descricao', 'dificuldade',  'series', 'repeticoes', 'peso', 'tempo', 'exemplo'])
            ->where(['exercicio_plano.id'=>$idExercicioPlano])
            ->joinWith('exercicio', [])
            ->joinWith('exercicio.equipamento', [])
            ->joinWith('parameterizacao', [])
            ->asArray()
            ->all();

        return $exercicios;
    }

    // Obter parameterizacao do cliente
    public function actionParameterizacaoCliente($idExercicioPlano)
    {
        $model = new $this->modelClass;
        $parameterizacao = $model::find()
            ->select([ 'parameterizacao_id as id','exercicio_plano.id as exercicio_plano_id','seriesCliente',
                'repeticoesCliente', 'pesoCliente', 'tempoCliente'])
            ->where(['exercicio_plano.id'=>$idExercicioPlano])
            ->JoinWith('parameterizacao', [])
            ->asArray()
            ->all();

        return $parameterizacao;
    }
}
