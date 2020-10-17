<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use zxbodya\yii2\galleryManager\GalleryImage;

/* @var $this yii\web\View */
/* @var $model app\models\Album */

$this->title = $model->title;
\yii\web\YiiAsset::register($this);
?>
<div class="album-show" style="background-color: black">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <?php
    $fotorama = \metalguardian\fotorama\Fotorama::begin(
        [
            'id' => 'fotorama_' . $model->id,
            'options' => [
                'loop' => true,
                'hash' => false,
//                'ratio' => 800/600,
                'width' => '100%',
//                'height' => '100%',
                'nav' => 'thumbs',
                'allowfullscreen' => 'native'
            ],
            'spinner' => [
                'lines' => 20,
            ],
            'tagName' => 'span',
            'useHtmlData' => false,
        ]
    );

    foreach($model->getBehavior('galleryBehavior')->getImages() as $image) {
        /* @var $image GalleryImage */

        $caption = "";
        if (!empty($image->name)) $caption .= $image->name . "<br>";
        if (!empty($image->description)) $caption .= $image->description;

        if ($image->isVideo()){
            echo Html::a(Html::img($image->getUrl('original')), [$image->getUrl('video')], [
                    'data-video'=>"true",
                    'data-caption' => $caption
            ]);
        } else
            echo Html::img($image->getUrl('medium'), [
                    'data-full' => $image->getUrl('original'),
                    'data-caption' => $caption
            ]);
    }

    \metalguardian\fotorama\Fotorama::end(); ?>
</div>
