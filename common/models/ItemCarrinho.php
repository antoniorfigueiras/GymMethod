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
 * @property User     $createdBy
 * @property Produto  $produto
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
