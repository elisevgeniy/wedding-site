<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%album}}`.
 */
class m190713_174451_create_album_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%album}}', [
            'id' => $this->primaryKey(),
            'sortOrder' => $this->integer()->unsigned()->defaultValue(0),
            'title' => $this->string(511)->notNull(),
            'key' => $this->string(255),
            'user_id' => $this->integer(11)->null()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%album}}');
    }
}
