<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%pedidos}}".
 *
 * @property int $id
 * @property float $preco_total
 * @property int $estado
 * @property string $nomeproprio
 * @property string $apelido
 * @property string $email
 * @property string|null $transacao_id
 * @property int|null $created_at
 * @property int|null $created_by
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pedidos}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['preco_total', 'estado', 'nomeproprio', 'apelido', 'email'], 'required'],
            [['preco_total'], 'number'],
            [['estado', 'created_at', 'created_by'], 'integer'],
            [['nomeproprio', 'apelido'], 'string', 'max' => 45],
            [['email', 'transacao_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'preco_total' => 'Preco Total',
            'estado' => 'Estado',
            'nomeproprio' => 'Nomeproprio',
            'apelido' => 'Apelido',
            'email' => 'Email',
            'transacao_id' => 'Transacao ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\PedidoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PedidoQuery(get_called_class());
    }
}
