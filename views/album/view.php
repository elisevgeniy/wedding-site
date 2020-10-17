<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use zxbodya\yii2\galleryManager\GalleryImage;

/* @var $this yii\web\View */
/* @var $model app\models\Album */

$this->title = $model->title;
(Yii::$app->user->isGuest) ? $this->params['breadcrumbs'][] = ['label' => 'Альбомы'] : $this->params['breadcrumbs'][] = ['label' => 'Альбомы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="album-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'key' => $model->key], ['class' => 'btn btn-primary']) ?>
        <?= (!Yii::$app->user->isGuest) ? Html::a(($model->common) ? 'Сделать частным' : 'Сделать общим', ['set-common', 'id' => $model->id], ['class' => ($model->common) ? 'btn btn-warning' : 'btn btn-primary']) : ''?>
        <?= (!Yii::$app->user->isGuest) ? Html::a('Генерировать новый ключ', ['reset-key', 'id' => $model->id], ['class' =>  'btn btn-primary']) : ''?>
        <?= (!Yii::$app->user->isGuest) ? Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить альбом?',
                'method' => 'post',
            ],
        ]) : '' ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => (Yii::$app->user->isGuest) ? [
            'title',
            'key'
        ] : [
            'title',
            'key',
            'common:boolean'
        ]
    ]) ?>

    <?php
    $fotorama = \metalguardian\fotorama\Fotorama::begin(
        [
            'options' => [
                'loop' => true,
                'hash' => true,
                'ratio' => 800/600,
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
        if ($image->isVideo()){
            echo Html::a(Html::img($image->getUrl('original')), [$image->getUrl('video')], ['data-video'=>"true"]);
        } else
            echo Html::img($image->getUrl('medium'), ['data-full' => $image->getUrl('original')]);
    }

    \metalguardian\fotorama\Fotorama::end(); ?>
</div>
