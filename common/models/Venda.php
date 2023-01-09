<?php

namespace common\models;

use Yii;
use yii\db\Exception;

/**
 * This is the model class for table "{{%vendas}}".
 *
 * @property int $id
 * @property float $preco_total
 * @property int $estado
 * @property string $nomeproprio
 * @property string $apelido
 * @property string $email
 * @property string|null $transacao_id
 * @property int|null $created_at
 * @property int|null $created_by
 * @property string|null $paypal_order_id

 *
 * @property VendaMorada[] $vendaMorada
 * @property ItemVenda[] $itensVenda
 */
class Venda extends \yii\db\ActiveRecord
{
    const STATUS_DRAFT = 0;
    const STATUS_PAID = 1;
    const STATUS_FAILED = 2;
    const STATUS_COMPLETED = 10;



    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%vendas}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['preco_total', 'estado', 'nomeproprio', 'apelido', 'email'], 'required'],
            [['preco_total'], 'number'],
            [['estado', 'created_at', 'created_by'], 'integer'],
            [['nomeproprio', 'apelido'], 'string', 'max' => 45],
            [['paypal_order_id'], 'string', 'max' => 255],
            [['email', 'transacao_id'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'preco_total' => 'Preco Total',
            'estado' => 'Estado',
            'nomeproprio' => 'Nomeproprio',
            'apelido' => 'Apelido',
            'email' => 'Email',
            'transacao_id' => 'Transacao ID',
            'paypal_order_id' => 'Paypal ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'fullname' => 'Nome',
        ];
    }

    /**
     * Gets query for [[VendaMorada]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\VendaMoradaQuery
     */
    public function getVendaMorada()
    {
        return $this->hasOne(VendaMorada::className(), ['venda_id' => 'id']);
    }

    /**
     * Gets query for [[ItemVenda]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ItemVendaQuery
     */
    public function getItensVenda()
    {
        return $this->hasMany(ItemVenda::className(), ['id_venda' => 'id']);
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
     * {@inheritdoc}
     * @return \common\models\query\VendaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\VendaQuery(get_called_class());
    }

    public function saveMorada($postData)
    {
        $vendaMorada = new VendaMorada();
        $vendaMorada->venda_id = $this->id;
        if($vendaMorada->load($postData) && $vendaMorada->save()){
            return true;
        }
        throw new Exception("Não foi possivel guardar a morada da venda" . implode("<br>"), $vendaMorada->getFirstErrors());
    }

    public function saveItensVenda()
    {
        $itensCarrinho = ItemCarrinho::getItemsForUser(Yii::$app->user->id);
        foreach ($itensCarrinho as $itemCarrinho) {
            $vendaItem = new ItemVenda();
            $vendaItem->nome_produto = $itemCarrinho['nome'];
            $vendaItem->id_produto = $itemCarrinho['id'];
            $vendaItem->preco_unidade = $itemCarrinho['preco'];
            $vendaItem->id_venda = $this->id;
            $vendaItem->quantidade = $itemCarrinho['quantidade'];
            if (!$vendaItem->save()) {
                throw new Exception("Venda Item não foi guardado: " . implode('<br>', $vendaItem->getFirstErrors()));
            }
        }
        return true;
    }

    public static function getStatusLabels()
    {
        return [
            self::STATUS_PAID => 'Paid',
            self::STATUS_COMPLETED => 'Completed',
            self::STATUS_FAILED => 'Failed',
            self::STATUS_DRAFT => 'Draft'
        ];
    }

    public function getItensQuantidade()
    {
        return $sum = ItemCarrinho::findBySql(
            "SELECT SUM(quantidade) FROM itens_venda WHERE id_venda = :vendaId", ['vendaId' => $this->id]
        )->scalar();
    }
}
