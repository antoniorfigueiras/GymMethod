<?php
namespace frontend\base;

use common\models\ItemCarrinho;
use Yii;

class Controller extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        $this->view->params['carrinhoItemCount'] = ItemCarrinho::getTotalQuantityForUser(Yii::$app->user->id);
        return parent::beforeAction($action);
    }
}