<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%itens_carrinho}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%pedidos}}`
 */
class m221115_160831_create_itens_carrinho_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%itens_carrinho}}', [
            'id' => $this->primaryKey(),
            'id_produto' => $this->integer(11)->notNull(),
            'quantidade' => $this->integer(2)->notNull(),
            'created_by' => $this->integer(11)
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-itens_carrinho-id_produto}}',
            '{{%itens_carrinho}}',
            'id_produto'
        );

        // add foreign key for table `{{%pedidos}}`
        $this->addForeignKey(
            '{{%fk-itens_carrinho-id_produto}}',
            '{{%itens_carrinho}}',
            'id_produto',
            '{{%produtos}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-itens_carrinho-created_by}}',
            '{{%itens_carrinho}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-itens_carrinho-created_by}}',
            '{{%itens_carrinho}}',
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
        // drops foreign key for table `{{%pedidos}}`
        $this->dropForeignKey(
            '{{%fk-itens_carrinho-id_pedido}}',
            '{{%itens_carrinho}}'
        );

        // drops index for column `id_pedido`
        $this->dropIndex(
            '{{%idx-itens_carrinho-id_pedido}}',
            '{{%itens_carrinho}}'
        );

        $this->dropTable('{{%itens_carrinho}}');
    }
}
