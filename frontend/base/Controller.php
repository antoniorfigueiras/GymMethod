<?php
namespace frontend\base;

use common\models\ItemCarrinho;

class Controller extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        $this->view->params['carrinhoItemCount'] = ItemCarrinho::findBySql(
            "SELECT SUM(quantidade) FROM itens_carrinho WHERE created_by = :userId", ['userId' => \Yii::$app->user->id]
        )->scalar();
        return parent::beforeAction($action);
    }
}