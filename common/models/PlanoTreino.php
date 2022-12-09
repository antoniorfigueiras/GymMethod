<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plano_treino".
 *
 * @property int $id
 * @property int $cliente_id
 * @property int $instrutor_id
 * @property int $exercicio_plano_id
 *
 * @property Perfil $cliente
 * @property ExercicioPlano $exercicioPlano
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
            [['cliente_id', 'instrutor_id', 'exercicio_plano_id'], 'required'],
            [['cliente_id', 'instrutor_id', 'exercicio_plano_id'], 'integer'],
            [['exercicio_plano_id'], 'exist', 'skipOnError' => true, 'targetClass' => ExercicioPlano::class, 'targetAttribute' => ['exercicio_plano_id' => 'id']],
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
            'cliente_id' => 'Cliente ID',
            'instrutor_id' => 'Instrutor ID',
            'exercicio_plano_id' => 'Exercicio Plano ID',
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
     * Gets query for [[ExercicioPlano]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercicioPlano()
    {
        return $this->hasOne(ExercicioPlano::class, ['id' => 'exercicio_plano_id']);
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
