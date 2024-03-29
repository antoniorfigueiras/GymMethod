<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inscricoes".
 *
 * @property int $id
 * @property int|null $id_aula
 * @property int|null $id_cliente
 *
 */
class Inscricoes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inscricoes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_aula', 'id_cliente'], 'integer'],
            [['id_aula'], 'exist', 'skipOnError' => true, 'targetClass' => Aulas::class, 'targetAttribute' => ['id_aula' => 'id']],
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
            'id_aula' => 'Id Aula',
            'id_cliente' => 'Id Cliente',
        ];
    }

    /**
     * Gets query for [[Aula]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAula()
    {
        return $this->hasOne(Aulas::class, ['id' => 'id_aula']);
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
