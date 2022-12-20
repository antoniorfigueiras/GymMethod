<?php
namespace frontend\base;

use common\models\ItemCarrinho;

class Controller extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        if(\Yii::$app->user->isGuest){
            $itensCarrinho = \Yii::$app->session->get(ItemCarrinho::SESSION_KEY, []);
            $sum = 0;
            foreach ($itensCarrinho as $itemCarrinho) {
                $sum += $itemCarrinho['quantidade'];
            }
        }else {
            $sum =
                ItemCarrinho::findBySql(
                "SELECT SUM(quantidade) FROM itens_carrinho WHERE created_by = :userId", ['userId' => \Yii::$app->user->id]
            )->scalar();
        }
        $this->view->params['carrinhoItemCount'] = $sum;
        return parent::beforeAction($action);
    }
}