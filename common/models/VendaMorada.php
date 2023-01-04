<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%vendas_moradas}}".
 *
 * @property int $venda_id
 * @property string $morada
 * @property string $cidade
 * @property string $pais
 * @property string|null $codpostal
 */
class VendaMorada extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%vendas_moradas}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['venda_id', 'morada', 'cidade', 'pais'], 'required'],
            [['venda_id'], 'integer'],
            [['morada', 'cidade', 'pais', 'codpostal'], 'string', 'max' => 255],
            [['venda_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'venda_id' => 'Pedido ID',
            'morada' => 'Morada',
            'cidade' => 'Cidade',
            'pais' => 'Pais',
            'codpostal' => 'Cod Postal',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\VendaMoradaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\VendaMoradaQuery(get_called_class());
    }
}
