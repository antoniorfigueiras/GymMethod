<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Perfil;
use common\models\PlanoTreino;
use common\models\User;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;

class PlanoController extends ActiveController
{
    public $modelClass = 'common\models\PlanoTreino'; // Para ir buscar o modelo a ser usado no controlador

    public function behaviors()
    {
        Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
        ];
        return $behaviors;
    }


    // Obter planos do cliente com o login feito na app mobile
    public function actionGetPlanos()
    {
        $model = new $this->modelClass;

        $planos = $model::find()
            ->select(['id', 'nome', 'nomeproprio treinador'])
            ->where(['cliente_id'=>Yii::$app->params['id']])
            ->joinWith('instrutor', [])
            ->asArray()
            ->all();

        return $planos;
    }

}
