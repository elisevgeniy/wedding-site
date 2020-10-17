<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%event}}`.
 */
class m200525_191520_create_event_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%event}}', [
            'id' => $this->primaryKey(),
            'sortOrder' => $this->integer()->unsigned()->defaultValue(0),
            'title' => $this->string()->notNull(),
            'text' => $this->string(512)->notNull(),
            'preStart' => $this->string()->notNull(),
            'startTime' => $this->string()->notNull(),
            'preEnd' => $this->string()->notNull(),
            'endTime' => $this->string()->notNull(),
            'map' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%event}}');
    }
}
