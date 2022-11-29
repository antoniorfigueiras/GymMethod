<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%produtos}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m221115_124502_create_produtos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%produtos}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(255)->notNull(),
            'descricao' => 'LONGTEXT',
            'imagem' => $this->string(2000),
            'preco' => $this->decimal(10, 2)->notNull(),
            'estado' => $this->tinyInteger(2)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-produtos-created_by}}',
            '{{%produtos}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-produtos-created_by}}',
            '{{%produtos}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-produtos-updated_by}}',
            '{{%produtos}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-produtos-updated_by}}',
            '{{%produtos}}',
            'updated_by',
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
            '{{%fk-produtos-created_by}}',
            '{{%produtos}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-produtos-created_by}}',
            '{{%produtos}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-produtos-updated_by}}',
            '{{%produtos}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-produtos-updated_by}}',
            '{{%produtos}}'
        );

        $this->dropTable('{{%produtos}}');
    }
}
