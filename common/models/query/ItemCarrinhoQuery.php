<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\ItemCarrinho]].
 *
 * @see \common\models\ItemCarrinho
 */
class ItemCarrinhoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\ItemCarrinho[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\ItemCarrinho|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @param $userId
     * @return ItemCarrinhoQuery
     */
    public function userId($userId)
    {
        return $this->andWhere(['created_by' => $userId]);
    }

    /**
     * @param $userId
     * @return void
     */
    public function produtoId($produtoId){
        return $this->andWhere(['id_produto'=>$produtoId]);
    }



}
