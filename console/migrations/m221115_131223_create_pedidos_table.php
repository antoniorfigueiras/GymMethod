<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pedidos}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m221115_131223_create_pedidos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pedidos}}', [
            'id' => $this->primaryKey(),
            'preco_total' => $this->decimal(10, 2)->notNull(),
            'estado' => $this->integer(1)->notNull(),
            'nomeproprio' => $this->string(45)->notNull(),
            'apelido' => $this->string(45)->notNull(),
            'email' => $this->string(255)->notNull(),
            'transacao_id' => $this->string(255),
            'created_at' => $this->integer(11),
            'created_by' => $this->integer(11),
        ]);

        // creates index for column `created_at`
        $this->createIndex(
            '{{%idx-pedidos-created_at}}',
            '{{%pedidos}}',
            'created_at'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-pedidos-created_at}}',
            '{{%pedidos}}',
            'created_at',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-pedidos-created_by}}',
            '{{%pedidos}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-pedidos-created_by}}',
            '{{%pedidos}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-pedidos-created_at}}',
            '{{%pedidos}}'
        );

        // drops index for column `created_at`
        $this->dropIndex(
            '{{%idx-pedidos-created_at}}',
            '{{%pedidos}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-pedidos-created_by}}',
            '{{%pedidos}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-pedidos-created_by}}',
            '{{%pedidos}}'
        );

        $this->dropTable('{{%pedidos}}');
    }
}
