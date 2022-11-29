<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_moradas}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m221115_125058_create_user_moradas_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_moradas}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'morada' => $this->string(255)->notNull(),
            'cidade' => $this->string(255)->notNull(),
            'pais' => $this->string(255)->notNull(),
            'CodPostal' => $this->string(255),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_moradas-user_id}}',
            '{{%user_moradas}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_moradas-user_id}}',
            '{{%user_moradas}}',
            'user_id',
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
            '{{%fk-user_moradas-user_id}}',
            '{{%user_moradas}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_moradas-user_id}}',
            '{{%user_moradas}}'
        );

        $this->dropTable('{{%user_moradas}}');
    }
}
