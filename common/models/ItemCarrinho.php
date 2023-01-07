<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%itens_carrinho}}".
 *
 * @property int $id
 * @property int $id_produto
 * @property int $quantidade
 * @property int|null $created_by
 * @property User $createdBy
 * @property Produto $produto
 */
class ItemCarrinho extends \yii\db\ActiveRecord
{
    const SESSION_KEY = 'ITENS_CARRINHO';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%itens_carrinho}}';
    }

    public static function getTotalQuantityForUser($currUserId)
    {
        if (Yii::$app->user->isGuest) {
            $itensCarrinho = \Yii::$app->session->get(ItemCarrinho::SESSION_KEY, []);
            $sum = 0;
            foreach ($itensCarrinho as $itemCarrinho) {
                $sum += $itemCarrinho['quantidade'];
            }
        } else {
            $sum =
                ItemCarrinho::findBySql(
                    "SELECT SUM(quantidade) FROM itens_carrinho WHERE created_by = :userId", ['userId' => $currUserId]
                )->scalar();
        }
        return $sum;
    }

    public static function getTotalPriceForUser($currUserId)
    {
        if (Yii::$app->user->isGuest) {
            $itensCarrinho = \Yii::$app->session->get(ItemCarrinho::SESSION_KEY, []);
            $sum = 0;
            foreach ($itensCarrinho as $itemCarrinho) {
                $sum += $itemCarrinho['quantidade'] * $itemCarrinho['preco'];
            }
        } else {
            $sum =
                ItemCarrinho::findBySql(
                    "SELECT SUM(c.quantidade * p.preco) 
                    FROM itens_carrinho c 
                    LEFT JOIN produtos p on p.id = c.id_produto 
                WHERE c.created_by = :userId", ['userId' => $currUserId]
                )->scalar();
        }
        return $sum;
    }

    public static function getItemsForUser($currUserId)
    {
        if (\Yii::$app->user->isGuest) {
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
                         WHERE c.created_by = :userId",
                ['userId' => $currUserId])
                ->asArray()
                ->all();
        }
        return $itensCarrinho;
    }

    public static function clearItensCarrinho($currUserId)
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->session->remove(ItemCarrinho::SESSION_KEY);
        }else {
            ItemCarrinho::deleteAll( ['created_by' => $currUserId]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_produto', 'quantidade'], 'required'],
            [['id_produto', 'quantidade', 'created_by'], 'integer'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['id_produto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_produto' => 'Id Produto',
            'quantidade' => 'Quantidade',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Produto]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ProdutoQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::className(), ['id' => 'id_produto']);
    }


    /**
     * {@inheritdoc}
     * @return \common\models\query\ItemCarrinhoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ItemCarrinhoQuery(get_called_class());
    }
}
