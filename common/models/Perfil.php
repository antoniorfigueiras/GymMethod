<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "perfil".
 *
 * @property int $id
 * @property int $iduser
 * @property int|null $telemovel
 * @property float|null $peso
 * @property int|null $altura
 * @property string|null $nomeproprio
 * @property string|null $apelido
 * @property string|null $codpostal
 * @property string|null $pais
 * @property string|null $cidade
 * @property string|null $morada
 *
 * @property User $iduser0
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iduser'], 'required'],
            [['iduser', 'telemovel', 'altura'], 'integer'],
            [['peso'], 'number'],
            [['nomeproprio', 'apelido', 'pais', 'cidade'], 'string', 'max' => 55],
            [['codpostal'], 'string', 'max' => 8],
            [['morada'], 'string', 'max' => 125],
            [['iduser'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['iduser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iduser' => 'Iduser',
            'telemovel' => 'Telemovel',
            'peso' => 'Peso',
            'altura' => 'Altura',
            'nomeproprio' => 'Nomeproprio',
            'apelido' => 'Apelido',
            'codpostal' => 'Codpostal',
            'pais' => 'Pais',
            'cidade' => 'Cidade',
            'morada' => 'Morada',
        ];
    }

    /**
     * Gets query for [[Iduser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::class, ['id' => 'iduser']);
    }
}
