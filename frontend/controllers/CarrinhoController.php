<?php

namespace frontend\controllers;

use common\models\ItemCarrinho;
use common\models\Produto;
use yii\filters\ContentNegotiator;
use yii\web\Controller;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\BadRequestHttpException;

class CarrinhoController extends Controller
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
            $itensCarrinho = \Yii::$app->session->get(ItemCarrinho::SESSION_KEY, []);
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
            $itensCarrinho = \Yii::$app->session->get(ItemCarrinho::SESSION_KEY, []);
            $found = false;
            foreach ($itensCarrinho as &$itemCarrinho) {
                if ($itemCarrinho['id'] == $id)
                {
                    $itemCarrinho['quantidade']++;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $itemCarrinho = [
                    'id' => $id,
                    'nome' => $produto,
                    'imagem' =>$produto->imagem,
                    'preco' => $produto->preco,
                    'quantidade' => 1,
                    'total_price' => $produto->preco
                ];
                $itensCarrinho[] = $itemCarrinho;
            }
            \Yii::$app->session->set(ItemCarrinho::SESSION_KEY, $itensCarrinho);

        } else {
            $userId = \Yii::$app->user->id;
            $ItemCarrinho = ItemCarrinho::find()->userId($userId)->idproduto($id)->one();
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

    public function actionDelete($id)
    {
        if (isGuest()) {
            $itensCarrinho = \Yii::$app->session->get(ItemCarrinho::SESSION_KEY, []);
            foreach ($itensCarrinho as $i => $itemCarrinho) {
                if ($itemCarrinho['id'] == $id) {
                    array_splice($itensCarrinho, $i, 1);
                    break;
                }
            }
            \Yii::$app->session->set(ItemCarrinho::SESSION_KEY, $itensCarrinho);
        } else {
            ItemCarrinho::deleteAll(['id_produto' => $id, 'created_by' => currUserId()]);
        }

        return $this->redirect(['index']);
    }


}