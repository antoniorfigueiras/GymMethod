<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "notificacoes".
 *
 * @property int $id
 * @property int $texto
 */
class Notificacoes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notificacoes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['texto'], 'required'],
            [['texto'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'texto' => 'Texto',
        ];
    }
}
