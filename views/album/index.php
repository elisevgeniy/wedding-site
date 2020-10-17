<?php

use himiklab\sortablegrid\SortableGridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Альбомы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать альбом', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
            'key',
            'common:boolean',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'update' => function ($url,$model) {
                        $url = \yii\helpers\Url::to(['album/update', 'key' => $model->key]);
                        return Html::a(
                            '<span class="glyphicon glyphicon-pencil"></span>',
                            $url);
                    },
                    'view' => function ($url,$model) {
                        $url = \yii\helpers\Url::to(['album/view', 'key' => $model->key]);
                        return Html::a(
                            '<span class="glyphicon glyphicon-eye-open"></span>',
                            $url);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
