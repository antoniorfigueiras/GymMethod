<?php

namespace backend\modules\api\controllers;

use common\models\PlanoTreino;
use common\models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;

class PlanoController extends ActiveController
{
    public $modelClass = 'common\models\PlanoTreino'; // Para ir buscar o modelo a ser usado no controlador

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] =
            ['class' => HttpBasicAuth::className(),
                'auth' => [$this, 'auth']
            ];
        return $behaviors;
    }

    public function auth($username, $password)
    {
        $user = User::findByUsername($username);
        if ($user && $user->validatePassword($password)) {
            return $user;
        }
        throw new \yii\web\ForbiddenHttpException('No authentication');//403
    }

    // Colocar permissões de autorização
    public function checkAccess($action, $model = null, $params = [])
    {
        /*if ($action === 'index') {
            throw new \yii\web\ForbiddenHttpException('Indisponível!');
        }*/
    }

    // GET dos planos do cliente
    public function actionPlanos($idClient)
    {
       $model = new $this->modelClass;

       $planos = $model::find()
           ->select(['id', 'nome Plano', 'nomeproprio treinador'])
           ->where(['cliente_id'=>$idClient])
           ->joinWith('instrutor', [])
           ->asArray()
           ->all();

       return $planos;
    }

}
