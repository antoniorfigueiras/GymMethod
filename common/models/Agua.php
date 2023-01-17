<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "agua".
 *
 * @property int $id
 * @property string $descricao
 * @property float $valor
 * @property int $id_cliente
 *
 * @property Perfil $cliente
 */
class Agua extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'agua';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao', 'valor', 'id_cliente'], 'required'],
            [['valor'], 'number'],
            [['id_cliente'], 'integer'],
            [['descricao'], 'string', 'max' => 20],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::class, 'targetAttribute' => ['id_cliente' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao' => 'Descricao',
            'valor' => 'Valor',
            'id_cliente' => 'Id Cliente',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Perfil::class, ['user_id' => 'id_cliente']);
    }
}
