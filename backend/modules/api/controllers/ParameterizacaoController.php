<?php

namespace backend\modules\api\controllers;

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

class ParameterizacaoController extends ActiveController
{
    public $modelClass = 'common\models\Parameterizacao'; // Para ir buscar o modelo a ser usado no controlador

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

    //PUT parameterizacao cliente
    public function actionAtualizarParameterizacaoCliente($idParameterizacao)
    {
        $request=\Yii::$app->request->post();
        $climodel = new $this->modelClass;
        $ret = $climodel::findOne(['id' => $idParameterizacao]);

        if($ret) {
            $ret->seriesCliente = $request['seriesCliente'];
            $ret->repeticoesCliente = $request['repeticoesCliente'];
            $ret->pesoCliente = $request['pesoCliente'];
            $ret->tempoCliente = $request['tempoCliente'];
            $ret->save();
            return ["success" => true];
        }
        else {
            throw new \yii\web\NotFoundHttpException("Parameterizacao não existe");
        }

    }


}
