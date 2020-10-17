<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CoupleStory */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'История отношений', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

\app\assets\SiteAsset::register($this);
?>
<div class="couple-story-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Точно удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'date',
            'text',
            'photo',
        ],
    ]) ?>

    <ul class="timeline animate-box">
        <li class="animate-box">
            <div class="timeline-badge" style="background-image:url(<?= $model->photo ?>);"></div>
            <div class="timeline-panel">
                <div class="timeline-heading">
                    <h3 class="timeline-title"><?= $model->title ?></h3>
                    <span class="date"><?= $model->date ?></span>
                </div>
                <div class="timeline-body">
                    <p><?= $model->text ?></p>
                </div>
            </div>
        </li>
    </ul>

</div>
