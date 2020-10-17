<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%service}}`.
 */
class m200521_175105_create_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%service}}', [
            'id' => $this->primaryKey(),
            'sortOrder' => $this->integer()->unsigned()->defaultValue(0),
            'title' => $this->string()->notNull(),
            'text' => $this->string()->notNull(),
            'contact' => $this->string()->notNull(),
            'icon' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%service}}');
    }
}
