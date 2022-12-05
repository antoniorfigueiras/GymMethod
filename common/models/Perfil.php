<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "perfil".
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $telemovel
 * @property float|null $peso
 * @property int|null $altura
 * @property string|null $nomeproprio
 * @property string|null $apelido
 * @property string|null $codpostal
 * @property string|null $pais
 * @property string|null $cidade
 * @property string|null $morada
 *
 * @property User $iduser
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'telemovel', 'altura'], 'integer'],
            [['peso'], 'number'],
            [['nomeproprio', 'apelido', 'pais', 'cidade'], 'string', 'max' => 55],
            [['codpostal'], 'string', 'max' => 8],
            [['morada'], 'string', 'max' => 125],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User_id',
            'telemovel' => 'Telemovel',
            'peso' => 'Peso',
            'altura' => 'Altura',
            'nomeproprio' => 'Nomeproprio',
            'apelido' => 'Apelido',
            'codpostal' => 'Codpostal',
            'pais' => 'Pais',
            'cidade' => 'Cidade',
            'morada' => 'Morada',
        ];
    }

    /**
     * Gets query for [[user_id]].
     *
     * @return \yii\db\ActiveQuery\common\models\query\UserQuery
     */
    public function getUser_Id()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
