<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pedido_moradas}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%pedido}}`
 */
class m221115_155058_create_pedido_moradas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pedido_moradas}}', [
            'pedido_id' => $this->integer()->notNull(),
            'morada' => $this->string(255)->notNull(),
            'cidade' => $this->string(255)->notNull(),
            'pais' => $this->string(255)->notNull(),
            'CodPostal' => $this->string(255),
        ]);

        $this->addPrimaryKey('PK_pedido_moradas','{{%pedido_moradas}}', 'pedido_id');

        // creates index for column `pedido_id`
        $this->createIndex(
            '{{%idx-pedido_moradas-pedido_id}}',
            '{{%pedido_moradas}}',
            'pedido_id'
        );

        // add foreign key for table `{{%pedido}}`
        $this->addForeignKey(
            '{{%fk-pedido_moradas-pedido_id}}',
            '{{%pedido_moradas}}',
            'pedido_id',
            '{{%pedido}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%pedido}}`
        $this->dropForeignKey(
            '{{%fk-pedido_moradas-pedido_id}}',
            '{{%pedido_moradas}}'
        );

        // drops index for column `pedido_id`
        $this->dropIndex(
            '{{%idx-pedido_moradas-pedido_id}}',
            '{{%pedido_moradas}}'
        );

        $this->dropTable('{{%pedido_moradas}}');
    }
}
