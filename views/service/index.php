<?php

use yii\helpers\Html;
use himiklab\sortablegrid\SortableGridView as GridView;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

\app\assets\SiteAsset::register($this);

$this->title = 'Свадебные специалисты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'sortOrder',
            'title',
            'text:html',
            'contact:html',
            //'icon',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?= \app\widgets\ServiceWidget::widget() ?>

</div>
