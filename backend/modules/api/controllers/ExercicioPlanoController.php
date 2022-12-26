<?php

namespace backend\modules\api\controllers;

use common\models\Exercicio;
use common\models\ExercicioPlano;
use common\models\PlanoTreino;
use common\models\User;
use Psy\Util\Json;
use Symfony\Component\Mime\Encoder\Base64Encoder;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;

class ExercicioplanoController extends ActiveController
{
    public $modelClass = 'common\models\ExercicioPlano'; // Para ir buscar o modelo a ser usado no controlador

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

    // GET dos exercicios do plano
    public function actionExercicios_plano($idPlano)
    {
        $model = new $this->modelClass;
        $exercicios = $model::find()
            ->select(['plano_id', 'nome', 'descricao', 'dificuldade', 'exemplo', 'series', 'repeticoes', 'peso', 'tempo'])//
            ->where(['plano_id'=>$idPlano])
            ->joinWith('exercicio', [])
            ->joinWith('parameterizacao', [])
            ->asArray()
            ->all();

        return $exercicios;
    }

    //GET parameterizacao cliente
    public function actionParameterizacao_cliente($idPlano)
    {
        $model = new $this->modelClass;
        $exercicios = $model::find()
            ->select(['plano_id','seriesCliente', 'repeticoesCliente', 'pesoCliente', 'tempoCliente'])
            ->where(['plano_id'=>$idPlano])
            ->JoinWith('parameterizacao', [])
            ->asArray()
            ->all();

        return $exercicios;
    }

    //GET parameterizacao cliente
    public function actionAtualizar_parameterizacao_cliente($idPlano)
    {
        $model = new $this->modelClass;
        $exercicios = $model::find()
            ->select(['plano_id','seriesCliente', 'repeticoesCliente', 'pesoCliente', 'tempoCliente'])
            ->where(['plano_id'=>$idPlano])
            ->JoinWith('parameterizacao', [])
            ->asArray()
            ->all();

        return $exercicios;
    }


}
