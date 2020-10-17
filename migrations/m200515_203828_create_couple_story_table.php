<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%couple_story}}`.
 */
class m200515_203828_create_couple_story_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%couple_story}}', [
            'id' => $this->primaryKey(),
            'sortOrder' => $this->integer()->unsigned()->defaultValue(0),
            'title' => $this->string()->notNull(),
            'date' => $this->string()->notNull(),
            'text' => $this->string()->notNull(),
            'photo' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%couple_story}}');
    }
}
