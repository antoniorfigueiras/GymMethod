<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%itens_venda}}".
 *
 * @property int $id
 * @property string $nome_produto
 * @property int $id_produto
 * @property float $preco_unidade
 * @property int $id_venda
 * @property int $quantidade
 *
 * @property Venda $venda
 * @property Produto $produto
 */
class ItemVenda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%itens_venda}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome_produto', 'id_produto', 'preco_unidade', 'id_venda', 'quantidade'], 'required'],
            [['id_produto', 'id_venda', 'quantidade'], 'integer'],
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
            'id_venda' => 'Id Venda',
            'quantidade' => 'Quantidade',
        ];
    }


    /**
     * Gets query for [[Venda]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\VendaQuery
     */
    public function getVenda()
    {
        return $this->hasOne(Venda::className(), ['id' => 'id_venda']);
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
     * @return \common\models\query\ItemVendaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ItemVendaQuery(get_called_class());
    }
}
