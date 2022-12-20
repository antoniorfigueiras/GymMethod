<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plano_treino".
 *
 * @property int $id
 * @property string $nome
 * @property int $cliente_id
 * @property int $instrutor_id
 *
 * @property Perfil $cliente
 * @property ExercicioPlano[] $exercicioPlanos
 * @property Perfil $instrutor
 */
class PlanoTreino extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plano_treino';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cliente_id', 'instrutor_id'], 'required'],
            [['cliente_id', 'instrutor_id'], 'integer'],
            [['nome'], 'string', 'max' => 20],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::class, 'targetAttribute' => ['cliente_id' => 'user_id']],
            [['instrutor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::class, 'targetAttribute' => ['instrutor_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'cliente_id' => 'Cliente',
            'instrutor_id' => 'Instrutor',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Perfil::class, ['user_id' => 'cliente_id']);
    }

    /**
     * Gets query for [[ExercicioPlanos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercicioPlanos()
    {
        return $this->hasMany(ExercicioPlano::class, ['plano_id' => 'id']);
    }

    /**
     * Gets query for [[Instrutor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstrutor()
    {
        return $this->hasOne(Perfil::class, ['user_id' => 'instrutor_id']);
    }
}
