<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\UserMorada]].
 *
 * @see \common\models\UserMorada
 */
class UserMoradaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\UserMorada[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\UserMorada|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
