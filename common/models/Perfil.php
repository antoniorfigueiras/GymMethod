<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "perfil".
 *
 * @property int $user_id
 * @property int|null $telemovel
 * @property float|null $peso
 * @property int|null $nif
 * @property int|null $altura
 * @property string|null $nomeproprio
 * @property string|null $apelido
 * @property string|null $codpostal
 * @property string|null $pais
 * @property string|null $cidade
 * @property string|null $morada
 *
 * @property User $user
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
            [['user_id', 'altura','telemovel', 'peso', 'codpostal', 'nif'], 'integer'],
            [['telemovel'], 'string', 'max'=> 9],
            [['peso'], 'string', 'max' => 3],
            [['peso'], 'number', 'max' => 300],
            [['nomeproprio', 'apelido', 'pais', 'cidade'], 'string', 'max' => 55],
            [['codpostal'], 'string', 'max' => 7],
            [['morada'], 'string', 'max' => 125],
            [['user_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'telemovel' => 'Telemovel',
            'peso' => 'Peso',
            'altura' => 'Altura',
            'nomeproprio' => 'Nome',
            'apelido' => 'Apelido',
            'codpostal' => 'Codpostal',
            'pais' => 'Pais',
            'cidade' => 'Cidade',
            'morada' => 'Morada',
            'nif' => 'NIF'
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }


    public function getFuncionarioByRole($role)
    {
        $query = Perfil::find();
        $query->select('perfil.user_id, nomeproprio, apelido, telemovel')
            ->from('user');
        $query->join = [
            ['JOIN', 'perfil', 'perfil.user_id = user.id'],
            ['JOIN', 'auth_assignment', 'user.id = auth_assignment.user_id']];
        $query->where('auth_assignment.item_name = "funcionario"');

        return $query;
    }

}
