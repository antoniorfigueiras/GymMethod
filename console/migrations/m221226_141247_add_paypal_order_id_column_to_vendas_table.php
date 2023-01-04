<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%vendas}}`.
 */
class m221226_141247_add_paypal_order_id_column_to_vendas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%vendas}}','paypal_order_id', $this->string(255)->after('transacao_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%vendas}}', 'paypal_order_id');
    }
}
