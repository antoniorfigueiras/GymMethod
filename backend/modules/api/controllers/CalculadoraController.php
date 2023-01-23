<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Agua;
use common\models\Aulas;
use common\models\Exercicio;
use common\models\ExercicioPlano;
use common\models\Inscricoes;
use common\models\PlanoTreino;
use common\models\User;
use Psy\Util\Json;
use Symfony\Component\Mime\Encoder\Base64Encoder;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;

class CalculadoraController extends ActiveController
{
    public $modelClass = 'common\models\Agua';

    public function behaviors()
    {
        Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
        ];
        return $behaviors;
    }

    // Devolver o PI
    public function actionPi()
    {
        return "['pi' => 3.14]";
    }





}
