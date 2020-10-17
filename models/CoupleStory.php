<?php

namespace app\models;

use himiklab\sortablegrid\SortableGridBehavior;
use Yii;

/**
 * This is the model class for table "couple_story".
 *
 * @property int $id
 * @property int $sortOrder
 * @property string $title
 * @property string $date
 * @property string $text
 * @property string $photo
 */
class CoupleStory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'couple_story';
    }

    public function behaviors()
    {
        return [
            'sort' => [
                'class' => SortableGridBehavior::className(),
                'sortableAttribute' => 'sortOrder'
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'date', 'text', 'photo'], 'required'],
            [['sortOrder'], 'integer'],
            [['title', 'date', 'text', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sortOrder' => 'Порядок отображения',
            'title' => 'Title',
            'date' => 'Date',
            'text' => 'Text',
            'photo' => 'Photo',
        ];
    }
}
