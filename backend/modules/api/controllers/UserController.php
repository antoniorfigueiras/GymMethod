<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
use common\models\Perfil;
use common\models\User;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;


class UserController extends ActiveController
{
    public $modelClass = 'common\models\Perfil'; // Para ir buscar o modelo a ser usado no controlador

    public function behaviors()
    {
        Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
        ];
        return $behaviors;
    }


    // Obter perfil do cliente com o login feito na app mobile
    public function actionGetPerfil()
    {
        $model = new $this->modelClass;

        $perfil = $model::findOne(Yii::$app->params['id']);

        return $perfil;
    }


}
