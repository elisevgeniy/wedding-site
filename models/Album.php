<?php

namespace app\models;

use himiklab\sortablegrid\SortableGridBehavior;
use Yii;
use zxbodya\yii2\galleryManager\GalleryBehavior;

/**
 * This is the model class for table "album".
 *
 * @property int $id
 * @property int $sortOrder
 * @property string $title
 * @property string $key
 * @property int $user_id
 * @property boolean $common
 */
class Album extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'album';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sortOrder','user_id'], 'integer'],
            [['common'], 'boolean'],
            [['title', 'key'], 'required'],
            [['title'], 'string', 'max' => 511],
            [['key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sortOrder' => 'Order ID',
            'title' => 'Название',
            'key' => 'Ключ доступа',
            'user_id' => 'User ID',
            'common' => 'Общий доступ',
        ];
    }

    public function behaviors()
    {
        $settings = Settings::get();

        return [
            'galleryBehavior' => [
                'class' => GalleryBehavior::className(),
                'type' => 'album',
                'videoSupport' => $settings->album_video_enable,
                'extension' => 'jpg',
                'directory' => Yii::getAlias('@webroot') . '/images/albums',
                'url' => Yii::getAlias('@web') . '/images/albums',
                'versions' => [
                    'original' => function ($img) {
                        return $img;
                    },
                    'small' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
//                        return $img
//                            ->copy()
//                            ->resize($dstSize);

                        return $img
                            ->copy()
                            ->thumbnail(new \Imagine\Image\Box(200, 200));
                    },
                    'medium' => function ($img) {
                        /** @var \Imagine\Image\ImageInterface $img */
                        $dstSize = $img->getSize();
                        $maxWidth = 500;
                        $maxHeight = 500;
                        if ($dstSize->getWidth() > $maxWidth) {
                            $dstSize = $dstSize->widen($maxWidth);
                        }
                        if ($dstSize->getHeight() > $maxHeight) {
                            $dstSize = $dstSize->heighten($maxHeight);
                        }
                        return $img
                            ->copy()
                            ->resize($dstSize);
                    },
                ]
            ],
            'sort' => [
                'class' => SortableGridBehavior::className(),
                'sortableAttribute' => 'sortOrder'
            ],
        ];
    }
}
