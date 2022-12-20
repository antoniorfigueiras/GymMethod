<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipo_exercicio".
 *
 * @property int $id
 * @property string $nome
 *
 * @property Exercicio[] $exercicios
 */
class TipoExercicio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_exercicio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 20],
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
        ];
    }

    /**
     * Gets query for [[Exercicios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercicios()
    {
        return $this->hasMany(Exercicio::class, ['tipo_exercicio_id' => 'id']);
    }
}
