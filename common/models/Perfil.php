<?php

namespace common\models;

use Yii;
/**
 * This is the model class for table "perfil".
 *
 * @property int $user_id
 * @property int $telemovel
 * @property int $nif
 * @property float|null $peso
 * @property int|null $altura
 * @property string $nomeproprio
 * @property string $apelido
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
            [['user_id', 'telemovel', 'nomeproprio', 'apelido', 'nif'], 'required','message' => 'Campo obrigatório'],
            [['user_id', 'telemovel', 'altura', 'nif'], 'integer'],
            [['peso', 'nif', 'telemovel'], 'number'],
            [['nomeproprio', 'apelido', 'pais', 'cidade'], 'string', 'max' => 25],
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
            'nif' => 'Nif',
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


    /*public function getFuncionarioByRole($role)
    {
        $query = Perfil::find();
        $query->select('perfil.user_id, nomeproprio, apelido, telemovel')
            ->from('user');
        $query->join = [
            ['JOIN', 'perfil', 'perfil.user_id = user.id'],
            ['JOIN', 'auth_assignment', 'user.id = auth_assignment.user_id']];
        $query->where('auth_assignment.item_name = "funcionario"');

        return $query;
    }*/
    /**
     * Gets query for [[Plano Treinos Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanosCliente()
    {
        return $this->hasMany(PlanoTreino::class, ['cliente_id' => 'user_id']);
    }
    /**
     * Gets query for [[Plano Treinos Instrutor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanos()
    {
        return $this->hasMany(PlanoTreino::class, ['instrutor_id' => 'user_id']);
    }

}
