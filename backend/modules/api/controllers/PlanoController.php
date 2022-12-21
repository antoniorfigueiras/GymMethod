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

    public function actionPlano($id)
    {
       $model = new $this->modelClass;
       /*$plano=$model::find()
        //->select('plano_treino.id, nome, perfil.nomeproprio')
        ->where(['cliente_id'=>$id])
        ->one();*/
       $planos = $model::find()
           ->select(['*'])
           ->where(['cliente_id'=>$id])
           ->joinWith('instrutor')
           ->asArray()
           //->andWhere(['perfil.user_id' => $plano->instrutor_id])
           ->all();

       return $planos;
    }

}
