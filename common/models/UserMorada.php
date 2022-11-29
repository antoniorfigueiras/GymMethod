<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_moradas}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $morada
 * @property string $cidade
 * @property string $pais
 * @property string|null $CodPostal
 */
class UserMorada extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_moradas}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'morada', 'cidade', 'pais'], 'required'],
            [['user_id'], 'integer'],
            [['morada', 'cidade', 'pais', 'CodPostal'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'morada' => 'Morada',
            'cidade' => 'Cidade',
            'pais' => 'Pais',
            'CodPostal' => 'Cod Postal',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\UserMoradaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UserMoradaQuery(get_called_class());
    }
}
