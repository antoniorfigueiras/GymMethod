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

class ParameterizacaoController extends ActiveController
{
    public $modelClass = 'common\models\Parameterizacao'; // Para ir buscar o modelo a ser usado no controlador

    public function behaviors()
    {
        Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
        ];
        return $behaviors;
    }


    //Atualizar parameterizacao do exercicio
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

            return ["success" => false];
        }

    }


}
