<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notification}}`.
 */
class m190911_104944_create_notification_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%notification}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notnull(),
            'content' => $this->text()->notnull(),
            'start' => $this->datetime()->notnull(),
            'end' => $this->datetime()->notnull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%notification}}');
    }
}
