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

    public function actionAtualizarPerfil()
    {
        $request=\Yii::$app->request->post();
        $climodel = new $this->modelClass;

        $ret = $climodel::findOne(Yii::$app->params['id']);

        if($ret) {
            $ret->nomeproprio = $request['nomeproprio'];
            $ret->apelido = $request['apelido'];
            $ret->telemovel = $request['telemovel'];
            $ret->peso = $request['peso'];
            $ret->altura = $request['altura'];
            $ret->nif = $request['nif'];
            $ret->codpostal = $request['codpostal'];
            $ret->pais = $request['pais'];
            $ret->cidade = $request['cidade'];
            $ret->morada = $request['morada'];
            $ret->save();
            return ["success" => true];
        }
        else {

            return ["success" => false];
        }
    }

}
