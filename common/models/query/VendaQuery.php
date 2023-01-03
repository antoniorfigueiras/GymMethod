<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Pedido]].
 *
 * @see \common\models\Venda
 */
class VendaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Venda[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Venda|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
