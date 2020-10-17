<?php

namespace app\models;

use himiklab\sortablegrid\SortableGridBehavior;
use Yii;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property int|null $sortOrder
 * @property string $title
 * @property string $text
 * @property string $contact
 * @property string $icon
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
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
            [['sortOrder'], 'integer'],
            [['title', 'text', 'contact', 'icon'], 'required'],
            [['title', 'icon'], 'string', 'max' => 255],
            [['text', 'contact'], 'string', 'max' => 1024],
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
            'title' => 'Заголовок',
            'text' => 'Текст',
            'contact' => 'Контакты',
            'icon' => 'Иконка',
        ];
    }

    public function attributeHints()
    {
        return [
            'text' => 'Допускается использовать html',
            'contact' => 'Допускается использовать html',
            'icon' => 'Иконку можно выбрать на странице <a href="/fonts/icomoon/Reference.html" target="_blank">иконок</a>',
        ];
    }
}
