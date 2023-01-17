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

class AguaController extends ActiveController
{
    public $modelClass = 'common\models\Agua'; // Para ir buscar o modelo a ser usado no controlador

    public function behaviors()
    {
        Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
        ];
        return $behaviors;
    }

    // Adicionar registo de agua
    public function actionAdicionarRegisto()
    {
        $model = new $this->modelClass;
        $descricao = Yii::$app->request->post('descricao');
        $valor = Yii::$app->request->post('valor');
        $model->descricao = $descricao;
        $model->valor = $valor;
        $model->id_cliente =  Yii::$app->params['id'];
        $model->save();
        return ['success' => true];
    }

    // Editar registo de agua
    public function actionEditarRegisto($idAgua)
    {
        $request=Yii::$app->request->post();
        $model = Agua::findOne($idAgua);

        if($model) {
            $model->descricao = Yii::$app->request->post('descricao');
            $model->valor = Yii::$app->request->post('valor');
            $model->save();
            return ["success" => true];
        }
        else {

            return ["success" => false];
        }

    }

    // Remover registo de agua
    public function actionRemoverRegisto($idAgua)
    {
        $model = Agua::findOne($idAgua);
        if ($model) // se existir
        {
            $model->delete();
            return ['success' => true];
        }
            return ['success' => false];
    }

    // Obter todos os registos de agua associados ao cliente com o login feito na app mobile
    public function actionGetRegistos()
    {
        $model = new $this->modelClass;
        $registos = $model::find()
            ->select(['*'])
            ->where(['id_cliente'=>Yii::$app->params['id']])
            ->all();

        return $registos;
    }


}
