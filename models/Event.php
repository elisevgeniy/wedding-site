<?php

namespace app\models;

use himiklab\sortablegrid\SortableGridBehavior;
use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "event".
 *
 * @property int $id
 * @property int|null $sortOrder
 * @property string $title
 * @property string $text
 * @property string $preStart
 * @property string $startTime
 * @property string $preEnd
 * @property string $endTime
 * @property string $map
 * @property string $address
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event';
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
            [['title', 'text', 'preStart', 'startTime', 'preEnd', 'endTime', 'map'], 'required'],
            [['title', 'preStart', 'startTime', 'preEnd', 'endTime', 'map'], 'string', 'max' => 255],
            [['text', 'address'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'text' => 'Текст',
            'preStart' => 'Текст перед временем начала',
            'startTime' => 'Начало',
            'preEnd' => 'Текст перед временем окончания',
            'endTime' => 'Окончание',
            'address' => 'Адрес',
            'map' => 'Код карты',
        ];
    }

    public function attributeHints()
    {
        return [
            'address' => 'Введите адрес строкой так, как он будет отображаться в виджете',
            'map' => 'Код карты можно получить, выбрав в ' . Html::a('Яндекс.Картах', 'https://yandex.ru/maps', ['target' => '_blank']) . ' место, нажать кнопку <svg width="16" height="16" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M11 4.5a.5.5 0 0 0-.5-.5H8a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4v-2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V16a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h2.5a.5.5 0 0 0 .5-.5v-1z" fill="#198cff"></path><path d="M14.5 6h2.086l-5.293 5.293a1 1 0 0 0 1.414 1.414L18 7.414V9.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V5a1 1 0 0 0-1-1h-4.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5z" fill="#198cff"></path></svg> (поделиться). Из сгенерированной ссылки скопировать код после слеша: https://yandex.ru/maps/-/<code>CCQCrNbN~B</code>',
        ];
    }
}
