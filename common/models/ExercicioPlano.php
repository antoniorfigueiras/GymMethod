<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "exercicio_plano".
 *
 * @property int $id
 * @property int $parameterizacao_id
 * @property int $exercicio_id
 * @property int $plano_id
 *
 * @property Exercicio $exercicio
 * @property Parameterizacao $parameterizacao
 * @property PlanoTreino $plano

 */
class ExercicioPlano extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exercicio_plano';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parameterizacao_id', 'exercicio_id', 'plano_id'], 'required'],
            [['parameterizacao_id', 'exercicio_id', 'plano_id'], 'integer'],
            [['parameterizacao_id'], 'exist', 'skipOnError' => true, 'targetClass' => Parameterizacao::class, 'targetAttribute' => ['parameterizacao_id' => 'id']],
            [['exercicio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Exercicio::class, 'targetAttribute' => ['exercicio_id' => 'id']],
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
            'parameterizacao_id' => 'Parameterizacao',
            'exercicio_id' => 'Exercicio',
            'plano_id' => 'Plano ID',
        ];
    }

    /**
     * Gets query for [[Exercicio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercicio()
    {
        return $this->hasOne(Exercicio::class, ['id' => 'exercicio_id']);
    }

    /**
     * Gets query for [[Parameterizacao]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParameterizacao()
    {
        return $this->hasOne(Parameterizacao::class, ['id' => 'parameterizacao_id']);
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

}
