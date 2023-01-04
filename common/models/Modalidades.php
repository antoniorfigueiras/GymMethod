<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "modalidades".
 *
 * @property int $id
 * @property string $nome
 *
 * @property AulasHorario[] $aulasHorarios
 */
class Modalidades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'modalidades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 56],
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
     * Gets query for [[AulasHorarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAulasHorarios()
    {
        return $this->hasMany(AulasHorario::class, ['id_modalidade' => 'id']);
    }
}
