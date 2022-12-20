<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'common\models\User'; // Para ir buscar o modelo a ser usado no controlador


}
