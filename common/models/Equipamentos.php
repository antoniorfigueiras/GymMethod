<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "equipamentos".
 *
 * @property int $id
 * @property string $nome
 * @property int $estado
 *
 * @property Exercicio[] $exercicios
 */
class Equipamentos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipamentos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'estado'], 'required'],
            [['estado'], 'integer'],
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
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Exercicios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercicio()
    {
        return $this->hasMany(Exercicio::class, ['equipamento_id' => 'id']);
    }
}
