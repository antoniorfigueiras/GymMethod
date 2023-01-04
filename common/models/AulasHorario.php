<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "aulas_horario".
 *
 * @property int $id
 * @property int|null $id_modalidade
 * @property int|null $id_instrutor
 * @property string $diaSemana
 * @property string|null $inicio
 * @property string|null $fim
 * @property int $capacidade
 * @property string $status
 *
 * @property Aulas[] $aulas
 * @property Perfil $instrutor
 * @property Modalidades $modalidade
 */
class AulasHorario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aulas_horario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_modalidade', 'id_instrutor', 'capacidade'], 'integer'],
            [['diaSemana'], 'required'],
            [['diaSemana', 'status'], 'string'],
            [['inicio', 'fim'], 'safe'],
            [['id_modalidade'], 'exist', 'skipOnError' => true, 'targetClass' => Modalidades::class, 'targetAttribute' => ['id_modalidade' => 'id']],
            [['id_instrutor'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::class, 'targetAttribute' => ['id_instrutor' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_modalidade' => 'Id Modalidade',
            'id_instrutor' => 'Id Instrutor',
            'diaSemana' => 'Dia Semana',
            'inicio' => 'Inicio',
            'fim' => 'Fim',
            'capacidade' => 'Capacidade',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Aulas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAulas()
    {
        return $this->hasMany(Aulas::class, ['id_aulas_horario' => 'id']);
    }

    /**
     * Gets query for [[Instrutor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstrutor()
    {
        return $this->hasOne(Perfil::class, ['user_id' => 'id_instrutor']);
    }

    /**
     * Gets query for [[Modalidade]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModalidade()
    {
        return $this->hasOne(Modalidades::class, ['id' => 'id_modalidade']);
    }
}
