<?php

use yii\helpers\Html;
use himiklab\sortablegrid\SortableGridView as GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'История отношений';
$this->params['breadcrumbs'][] = $this->title;
\app\assets\SiteAsset::register($this);
?>
<div class="couple-story-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'sortOrder',
            'id',
            'title',
            'date',
            'text',
            'photo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


    <div class="container">
        <?= \app\widgets\CoupleStoryWidget::widget() ?>
    </div>

</div>
