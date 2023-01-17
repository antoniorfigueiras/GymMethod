<?php

namespace backend\modules\api\controllers;

use backend\modules\api\components\CustomAuth;
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

class InscricoesController extends ActiveController
{
    public $modelClass = 'common\models\Inscricoes'; // Para ir buscar o modelo a ser usado no controlador

    public function behaviors()
    {
        Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
        ];
        return $behaviors;
    }


    // Inscrever numa aula
    public function actionInscrever($idAula)
    {
        $model = new $this->modelClass;
        $modelAula = Aulas::findOne($idAula);
        $modelHorario = $modelAula->aulasHorario;
        $inscricoes = Inscricoes::find()->all();
        foreach ($inscricoes as $i)
        {
            if ($i->id_cliente == Yii::$app->params['id'] && $i->id_aula == $idAula)
            {
                return ['success' => false, 'msg' => 'Já se encontra inscrito!'];
            }
        }

        if ($modelAula->ocupacao < $modelHorario->capacidade)
        {
            $model->id_aula = $idAula;
            $model->id_cliente = Yii::$app->params['id'];
            $modelAula->ocupacao = $modelAula->ocupacao + 1;
            if ($modelAula->ocupacao == $modelHorario->capacidade)
            {
                $modelAula->status = 'Cheio';
            }
            $modelAula->save();
            $model->save();
            return ['success' => true];
        }
        else{
            return ['success' => false];
        }
    }

    // Remover inscricao de uma aula
    public function actionRemoverInscricao($idInscricao)
    {
        $model = Inscricoes::findOne($idInscricao);

        if ($model)
        {
            $modelAula = Aulas::findOne($model->id_aula);
            $modelAula->ocupacao = $modelAula->ocupacao - 1;
            $modelAula->status = 'Aberto';
            $modelAula->save();
            $model->delete();
            return ['success' => true];
        }
        return ['success' => false];
    }

}
