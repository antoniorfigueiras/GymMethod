<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "planos_favoritos".
 *
 * @property int $id
 * @property int|null $plano_id
 * @property int|null $user_id
 *
 * @property PlanoTreino $plano
 * @property Perfil $user
 */
class PlanosFavoritos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'planos_favoritos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plano_id', 'user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::class, 'targetAttribute' => ['user_id' => 'user_id']],
            [['plano_id'], 'exist', 'skipOnError' => true, 'targetClass' => PlanoTreino::class, 'targetAttribute' => ['plano_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plano_id' => 'Plano ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Plano]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlano()
    {
        return $this->hasOne(PlanoTreino::class, ['id' => 'plano_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Perfil::class, ['user_id' => 'user_id']);
    }
}
