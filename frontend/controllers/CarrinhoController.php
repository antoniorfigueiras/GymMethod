<?php

namespace frontend\controllers;

use common\models\ItemCarrinho;
use common\models\Perfil;
use common\models\Venda;
use common\models\VendaMorada;
use common\models\Produto;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;
use PayPalCheckoutSdk\Payments\AuthorizationsGetRequest;
use Sample\PayPalClient;
use yii\filters\ContentNegotiator;
use yii\rbac\Item;
use yii\web\Controller;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class CarrinhoController extends \frontend\base\Controller
{
    public function behaviors()
    {
        return [
            [
                'class' => ContentNegotiator::class,
                'only' => ['add', 'create-venda','submeter-pagamento'],
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST', 'DELETE'],
                    'create-venda' => ['POST'],
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $itensCarrinho = ItemCarrinho::getItemsForUser(currUserId());

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
            foreach ($itensCarrinho as &$item) {
                if ($item['id'] == $id) {
                    $item['quantidade']++;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $itemCarrinho = [
                    'id' => $id,
                    'nome' => $produto->nome,
                    'imagem' => $produto->imagem,
                    'preco' => $produto->preco,
                    'quantidade' => 1,
                    'preco_total' => $produto->preco
                ];
                $itensCarrinho[] = $itemCarrinho;
            }
            \Yii::$app->session->set(ItemCarrinho::SESSION_KEY, $itensCarrinho);

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


    public function actionMudarQuantidade()
    {
        $id = \Yii::$app->request->post('id');
        $produto = Produto::find()->id($id)->publicado()->one();
        if (!$produto) {
            throw new NotFoundHttpException("O Produto não existe");
        }
        $quantidade = \Yii::$app->request->post('quantidade');
        if (isGuest()) {
            $itensCarrinho = \Yii::$app->session->get(ItemCarrinho::SESSION_KEY, []);
            foreach ($itensCarrinho as &$itemCarrinho) {
                if ($itemCarrinho['id'] === $id) {
                    $itemCarrinho['quantidade'] = $quantidade;
                    break;
                }
            }
            \Yii::$app->session->set(ItemCarrinho::SESSION_KEY, $itensCarrinho);
        } else {
            $itemCarrinho = ItemCarrinho::find()->userId(currUserId())->produtoId($id)->one();
            if ($itemCarrinho) {
                $itemCarrinho->quantidade = $quantidade;
                $itemCarrinho->save();
            }
        }
        return ItemCarrinho::getTotalQuantityForUser(currUserId());
    }


    public function actionCheckout()
    {
        $itensCarrinho = ItemCarrinho::getItemsForUser(currUserId());
        $produtoQuantidade= ItemCarrinho::getTotalQuantityForUser(currUserId());
        $precoTotal = ItemCarrinho::getTotalPriceForUser(currUserId());

        if (empty($itensCarrinho)) {
            return $this->redirect('/site/loja');
        }
        $venda = new Venda();

        $venda->preco_total = $precoTotal;
        $venda->estado = Venda::STATUS_DRAFT;
        $venda->created_at = time();
        $venda->created_by = currUserId();
        $transacao = Yii::$app->db->beginTransaction();
        if ($venda->load(Yii::$app->request->post())
            && $venda->save()
            && $venda->saveMorada(Yii::$app->request->post())
            && $venda->saveItensVenda()) {
            $transacao->commit();

            //ItemCarrinho::clearItensCarrinho(currUserId());

            return $this->render('pay-now', [
                'venda' => $venda,
            ]);
        }

        $vendaMorada = new VendaMorada();
        if (!isGuest()) {
            $perfil = Perfil::findOne(Yii::$app->user->getId());
            $user = Yii::$app->user->identity;

            $venda->nomeproprio = $perfil->nomeproprio;
            $venda->apelido = $perfil->apelido;
            $venda->email = $user->email;
            $venda->estado = Venda::STATUS_DRAFT;

            $vendaMorada->morada = $perfil->morada;
            $vendaMorada->cidade = $perfil->cidade;
            $vendaMorada->pais = $perfil->pais;
            $vendaMorada->codpostal = $perfil->codpostal;
        }

        return $this->render('checkout', [
            'venda' => $venda,
            'vendaMorada' => $vendaMorada,
            'itensCarrinho' => $itensCarrinho,
            'produtoQuantidade' => $produtoQuantidade,
            'precoTotal' => $precoTotal
        ]);
    }

    public function actionSubmeterPagamento($vendaId)
    {
        $where = ['id' => $vendaId, 'estado' => Venda::STATUS_DRAFT];
        if (!isGuest())
        {
            $where['created_by'] = currUserId();
        }
        $venda = Venda::findOne($where);
        if (!$venda)
        {
            throw new NotFoundHttpException();
        }

        /*$req = Yii::$app->request;
        $paypalVendaId = $req->post('vendaId');
        $exists = Venda::find()->andWhere(['paypal_order_id' => $paypalVendaId])->exists();
        if ($exists)
        {
            throw new BadRequestHttpException();
        }


        $environment = new SandboxEnvironment(Yii::$app->params['paypalClientId'], Yii::$app->params['paypalSecret']);
        $cliente = new PayPalHttpClient($environment);

        $response = $cliente->execute(new OrdersGetRequest($paypalVendaId));*/

        }



}