<?php

namespace backend\modules\api\controllers;

use common\models\Perfil;
use common\models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;


class UserController extends ActiveController
{
    public $modelClass = 'common\models\Perfil'; // Para ir buscar o modelo a ser usado no controlador

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),
                //'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }

    /*public function auth($username, $password)
    {
        $user = User::findByUsername($username);
        if ($user && $user->validatePassword($password)) {
            return $user;
        }
        throw new \yii\web\ForbiddenHttpException('No authentication');//403
    }*/

    // Colocar permissões de autorização
   /* public function checkAccess($action, $model = null, $params = [])
    {
        if ($action === 'index') {
            throw new \yii\web\ForbiddenHttpException('Indisponível!');
        }
    }*/

    public function actionGetPerfil($idClient)
    {
        $model = new $this->modelClass;

        $perfil = $model::find()->where(['user_id'=>$idClient])->one();

        return $perfil;
    }


}
