<?php
namespace frontend\base;

use common\models\ItemCarrinho;

class Controller extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        $this->view->params['carrinhoItemCount'] = ItemCarrinho::getTotalQuantityForUser(currUserId());
        return parent::beforeAction($action);
    }
}