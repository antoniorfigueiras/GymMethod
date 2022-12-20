<?php

namespace frontend\controllers;

use common\models\ItemCarrinho;
use yii\filters\ContentNegotiator;
use yii\web\Controller;
use Yii;
use yii\web\NotFoundHttpException;
use common\models\Produto;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\BadRequestHttpException;

class CarrinhoController extends \frontend\base\Controller
{
    public function behaviors()
    {
        return [
            [
                'class' => ContentNegotiator::class,
                'only' => ['add'],
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ]
        ];
    }

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {

        } else {
            $itensCarrinho = ItemCarrinho::findBySql("SELECT
                               c.id_produto as id,
                               p.imagem,
                               p.nome,
                               p.preco,
                               c.quantidade,
                               p.preco * c.quantidade as preco_total
                        FROM itens_carrinho c
                                 LEFT JOIN produtos p on p.id = c.id_produto
                         WHERE c.created_by = :userId", ['userId' => Yii::$app->user->id])
                ->asArray()
                ->all();
        }

        return $this->render('index', [
            'items' => $itensCarrinho
        ]);
    }

    public function actionAdd()
    {
        $id = \Yii::$app->request->post('id');
        $produto = Produto::find()->id($id)->publicado()->one();
        if (!$produto) {
            throw new NotFoundHttpException("O produto não existe");
        }

        if (Yii::$app->user->isGuest) {

        } else {
            $userId = \Yii::$app->user->id;
            $ItemCarrinho = ItemCarrinho::find()->userId($userId)->produtoId($id)->one();
            if ($ItemCarrinho) {
                $ItemCarrinho->quantidade++;
            } else {
                $ItemCarrinho = new ItemCarrinho();
                $ItemCarrinho->id_produto = $id;
                $ItemCarrinho->created_by = $userId;
                $ItemCarrinho->quantidade = 1;
            }
            if ($ItemCarrinho->save()) {
                return [
                    'success' => true
                ];
            } else {
                return [
                    'success' => false,
                    'errors' => $ItemCarrinho->errors
                ];
            }
        }
    }

    

}