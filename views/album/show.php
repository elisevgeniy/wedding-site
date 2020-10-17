<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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
            'options' => [
                'loop' => true,
                'hash' => true,
//                'ratio' => 800/600,
                'width' => '100%',
                'height' => '100%',
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
        echo Html::img($image->getUrl('original'));
    }

    \metalguardian\fotorama\Fotorama::end(); ?>
</div>
