<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "parameterizacoes".
 *
 * @property int $id
 * @property string $data
 * @property int|null $series
 * @property int|null $seriesCliente
 * @property int|null $repeticoes
 * @property int|null $repeticoesCliente
 * @property int|null $peso
 * @property int|null $pesoCliente
 * @property string|null $tempo
 *
 * @property ExercicioPlano[] $exercicioPlanos
 */
class Parameterizacao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parameterizacoes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data'], 'required'],
            [['data', 'tempo'], 'safe'],
            [['series', 'seriesCliente', 'repeticoes', 'repeticoesCliente', 'peso', 'pesoCliente'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data' => 'Data',
            'series' => 'Series',
            'seriesCliente' => 'Series Cliente',
            'repeticoes' => 'Repeticoes',
            'repeticoesCliente' => 'Repeticoes Cliente',
            'peso' => 'Peso',
            'pesoCliente' => 'Peso Cliente',
            'tempo' => 'Tempo',
        ];
    }

    /**
     * Gets query for [[ExercicioPlanos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercicioPlanos()
    {
        return $this->hasMany(ExercicioPlano::class, ['parameterizacao_id' => 'id']);
    }
}
