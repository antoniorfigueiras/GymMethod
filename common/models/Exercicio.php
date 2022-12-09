<?php

namespace common\models;

use Yii;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "exercicio".
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 * @property string $dificuldade
 * @property resource $exemplo
 * @property int $equipamento_id
 * @property int $tipo_exercicio_id
 *
 * @property Equipamentos $equipamento
 * @property ExercicioPlano[] $exercicioPlanos
 * @property TipoExercicio $tipoExercicio
 */
class Exercicio extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exercicio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'descricao', 'dificuldade', 'exemplo', 'equipamento_id', 'tipo_exercicio_id'], 'required'],
            [['exemplo'], 'string'],
            [['equipamento_id', 'tipo_exercicio_id'], 'integer'],
            [['nome'], 'string', 'max' => 50],
            [['descricao'], 'string', 'max' => 100],
            [['dificuldade'], 'string', 'max' => 20],
            [['equipamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Equipamentos::class, 'targetAttribute' => ['equipamento_id' => 'id']],
            [['tipo_exercicio_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoExercicio::class, 'targetAttribute' => ['tipo_exercicio_id' => 'id']],
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
            'dificuldade' => 'Dificuldade',
            'exemplo' => 'Exemplo',
            'equipamento_id' => 'Equipamento',
            'tipo_exercicio_id' => 'Tipo de Exercicio',
        ];
    }
    /**
     * Gets query for [[Equipamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipamento()
    {
        return $this->hasOne(Equipamentos::class, ['id' => 'equipamento_id']);
    }

    /**
     * Gets query for [[ExercicioPlanos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExercicioPlanos()
    {
        return $this->hasMany(ExercicioPlano::class, ['exercicio_id' => 'id']);
    }

    /**
     * Gets query for [[TipoExercicio]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoExercicio()
    {
        return $this->hasOne(TipoExercicio::class, ['id' => 'tipo_exercicio_id']);
    }


}
