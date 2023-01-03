<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\ItemVenda]].
 *
 * @see \common\models\ItemVenda
 */
class ItemVendaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\ItemVenda[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\ItemVenda|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
