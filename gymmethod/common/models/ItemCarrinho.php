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
 */
class ItemCarrinho extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%itens_carrinho}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_produto', 'quantidade'], 'required'],
            [['id_produto', 'quantidade', 'created_by'], 'integer'],
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
     * {@inheritdoc}
     * @return \common\models\query\ItemCarrinhoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ItemCarrinhoQuery(get_called_class());
    }
}
