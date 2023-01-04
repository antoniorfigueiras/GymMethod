<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "consultas".
 *
 * @property int $id
 * @property string|null $nome
 * @property string|null $descricao
 * @property string $data
 * @property int $estado
 * @property int|null $cliente_id
 * @property int|null $nutricionista_id
 */
class Consulta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consultas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao'], 'string'],
            [['data', 'cliente_id', 'nutricionista_id', 'nome'], 'required'],
            [['data'], 'safe'],
            [['estado', 'cliente_id', 'nutricionista_id'], 'integer'],
            [['nome'], 'string', 'max' => 125],
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
            'descricao' => 'Descricao',
            'data' => 'Data',
            'estado' => 'Estado',
            'cliente_id' => 'Cliente',
            'nutricionista_id' => 'Nutricionista',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ConsultaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ConsultaQuery(get_called_class());
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

    public function getNutricionista()
    {
        return $this->hasOne(Perfil::class, ['user_id' => 'nutricionista_id']);
    }

}
