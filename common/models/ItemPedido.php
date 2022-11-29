<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%itens_pedido}}".
 *
 * @property int $id
 * @property string $nome_produto
 * @property int $id_produto
 * @property float $preco_unidade
 * @property int $id_pedido
 * @property int $quantidade
 */
class ItemPedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%itens_pedido}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome_produto', 'id_produto', 'preco_unidade', 'id_pedido', 'quantidade'], 'required'],
            [['id_produto', 'id_pedido', 'quantidade'], 'integer'],
            [['preco_unidade'], 'number'],
            [['nome_produto'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome_produto' => 'Nome Produto',
            'id_produto' => 'Id Produto',
            'preco_unidade' => 'Preco Unidade',
            'id_pedido' => 'Id Pedido',
            'quantidade' => 'Quantidade',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ItemPedidoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ItemPedidoQuery(get_called_class());
    }
}
