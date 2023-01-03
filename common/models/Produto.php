<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%produtos}}".
 *
 * @property int $id
 * @property string $nome
 * @property string|null $descricao
 * @property string|null $imagem
 * @property float $preco
 * @property int $estado
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Produto extends \yii\db\ActiveRecord
{

    /**
     * @var \yii\web\UploadedFile
     */
     public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%produtos}}';
    }

    public function behaviors()
    {
        return[
        TimestampBehavior::class,
        BlameableBehavior::class
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'preco', 'estado'], 'required'],
            [['descricao'], 'string'],
            [['preco'], 'number'],
            [['imageFile'], 'image', 'extensions' =>'png, jpg, jpeg, webp', 'maxSize' => 10 * 1024 * 1024],
            [['estado', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['imagem'], 'string', 'max' => 2000],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
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
            'descricao' => 'Descrição',
            'imageFile' => 'Imagem do Produto',
            'preco' => 'Preço',
            'estado' => 'Publicado',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[ItemCarrinho]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ItemCarrinhoQuery
     */
    public function getItensCarrinho()
    {
        return $this->hasMany(ItemCarrinho::className(), ['id_produto' => 'id']);
    }

    /**
     * Gets query for [[ItemVenda]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ItemVendaQuery
     */
    public function getItensVenda()
    {
        return $this->hasMany(ItemVenda::className(), ['id_produto' => 'id']);
    }
    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ProdutoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProdutoQuery(get_called_class());
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        if ($this->imageFile) {
            $this->imagem = '/produtos/' . Yii::$app->security->generateRandomString() . '/' . $this->imageFile->name;
        }

        $transaction = Yii::$app->db->beginTransaction();
        $ok = parent::save($runValidation, $attributeNames);

        if ($ok && $this->imageFile) {
            $fullPath = Yii::getAlias('@frontend/web/storage' . $this->imagem);
            $dir = dirname($fullPath);
            if (!FileHelper::createDirectory($dir) | !$this->imageFile->saveAs($fullPath)) {
                $transaction->rollBack();

                return false;
            }
        }

        $transaction->commit();
        return $ok;
    }

    public function getImageUrl()
    {
        return self::formatImageUrl($this->imagem);
    }

    public static function formatImageUrl($imagePath)
    {
        if ($imagePath) {
            return Yii::$app->params['frontendUrl'] . '/storage' . $imagePath;
        }

        return Yii::$app->params['frontendUrl'] . '/img/imagem_nao_disponivel.jpg';
    }


    public function getShortDescription()
    {
        return \yii\helpers\StringHelper::truncateWords(strip_tags($this->descricao), 30);
    }

    public function afterDelete()
    {
        parent::afterDelete();
        if ($this->imagem) {
            $dir = Yii::getAlias('@frontend/web/storage'). dirname($this->imagem);
            FileHelper::removeDirectory($dir);
        }
    }
}
