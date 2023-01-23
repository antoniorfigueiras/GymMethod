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

class ConsultaController extends ActiveController
{
    public $modelClass = 'common\models\Consulta'; // Para ir buscar o modelo a ser usado no controlador

    public function behaviors()
    {
        Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
        ];
        return $behaviors;
    }

    // Obter consultas marcadas do cliente com o login feito na app mobile
    public function actionGetConsultasMarcadas()
    {
        $model = new $this->modelClass;

        $consultas = $model::find()
            ->select(['id', 'nome', 'descricao', 'data', 'nomeproprio nutricionista'])
            ->where(['cliente_id'=>Yii::$app->params['id']])
            ->andWhere(['estado'=> 0])
            ->joinWith('nutricionista', [])
            ->asArray()
            ->all();

        return $consultas;
    }

    public function actionGetConsultasConcluidas()
    {
        $model = new $this->modelClass;

        $consultas = $model::find()
            ->select(['id', 'nome', 'descricao', 'data', 'nomeproprio nutricionista'])
            ->where(['cliente_id'=>Yii::$app->params['id']])
            ->andWhere(['estado'=> 1])
            ->joinWith('nutricionista', [])
            ->asArray()
            ->all();

        return $consultas;
    }

}
