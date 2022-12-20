<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;

class PlanoController extends ActiveController
{
    public $modelClass = 'common\models\PlanoTreino'; // Para ir buscar o modelo a ser usado no controlador

}
