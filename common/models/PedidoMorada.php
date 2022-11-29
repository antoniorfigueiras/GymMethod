<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%pedido_moradas}}".
 *
 * @property int $pedido_id
 * @property string $morada
 * @property string $cidade
 * @property string $pais
 * @property string|null $CodPostal
 */
class PedidoMorada extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pedido_moradas}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pedido_id', 'morada', 'cidade', 'pais'], 'required'],
            [['pedido_id'], 'integer'],
            [['morada', 'cidade', 'pais', 'CodPostal'], 'string', 'max' => 255],
            [['pedido_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pedido_id' => 'Pedido ID',
            'morada' => 'Morada',
            'cidade' => 'Cidade',
            'pais' => 'Pais',
            'CodPostal' => 'Cod Postal',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\PedidoMoradaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PedidoMoradaQuery(get_called_class());
    }
}
