<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notification".
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property string $start
 * @property string $end
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'content', 'start', 'end'], 'required'],
            [['content'], 'string'],
            [['start', 'end'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'content' => 'Содержание',
            'start' => 'Время начала',
            'end' => 'Время окончания',
        ];
    }

    public function getStartTimestamp() {
        return strtotime($this->start);
    }

    public function getEndTimestamp() {
        return strtotime($this->end);
    }

    public function itIsTime() {
        return ($this->getStartTimestamp() <= time() && time() <= $this->getEndTimestamp());
    }
}
