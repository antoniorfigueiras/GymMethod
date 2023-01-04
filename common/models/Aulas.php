<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "aulas".
 *
 * @property int $id
 * @property int|null $id_aulas_horario
 * @property string|null $data
 * @property int $ocupacao
 * @property string $status
 *
 * @property AulasHorario $aulasHorario
 * @property Inscricoes[] $inscricoes
 */
class Aulas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aulas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_aulas_horario', 'ocupacao'], 'integer'],
            [['data'], 'safe'],
            [['status'], 'string'],
            [['id_aulas_horario'], 'exist', 'skipOnError' => true, 'targetClass' => AulasHorario::class, 'targetAttribute' => ['id_aulas_horario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_aulas_horario' => 'Id Aulas Horario',
            'data' => 'Data',
            'ocupacao' => 'Ocupacao',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[AulasHorario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAulasHorario()
    {
        return $this->hasOne(AulasHorario::class, ['id' => 'id_aulas_horario']);
    }

    /**
     * Gets query for [[Inscricoes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInscricoes()
    {
        return $this->hasMany(Inscricoes::class, ['id_aula' => 'id']);
    }
}
