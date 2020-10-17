<?php

use yii\db\Migration;

/**
 * Handles adding common to table `{{%album}}`.
 */
class m190909_191132_add_common_column_to_album_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%album}}', 'common', $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%album}}', 'common');
    }
}
