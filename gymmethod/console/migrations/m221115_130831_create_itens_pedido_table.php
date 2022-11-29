<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%itens_pedido}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%pedidos}}`
 */
class m221115_130831_create_itens_pedido_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%itens_pedido}}', [
            'id' => $this->primaryKey(),
            'nome_produto' => $this->string(255)->notNull(),
            'id_produto' => $this->integer(11)->notNull(),
            'preco_unidade' => $this->decimal(10, 2)->notNull(),
            'id_pedido' => $this->integer(11)->notNull(),
            'quantidade' => $this->integer(2)->notNull(),
        ]);

        // creates index for column `id_pedido`
        $this->createIndex(
            '{{%idx-itens_pedido-id_pedido}}',
            '{{%itens_pedido}}',
            'id_pedido'
        );

        // add foreign key for table `{{%pedidos}}`
        $this->addForeignKey(
            '{{%fk-itens_pedido-id_pedido}}',
            '{{%itens_pedido}}',
            'id_pedido',
            '{{%pedidos}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%pedidos}}`
        $this->dropForeignKey(
            '{{%fk-itens_pedido-id_pedido}}',
            '{{%itens_pedido}}'
        );

        // drops index for column `id_pedido`
        $this->dropIndex(
            '{{%idx-itens_pedido-id_pedido}}',
            '{{%itens_pedido}}'
        );

        $this->dropTable('{{%itens_pedido}}');
    }
}
