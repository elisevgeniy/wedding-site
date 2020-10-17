<?php

use yii\helpers\Html;
use himiklab\sortablegrid\SortableGridView as GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerCsrfMetaTags();

\app\assets\SiteAsset::register($this);

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
$settings = \app\models\Settings::get();
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'sortOrder',
            'title',
            'text',
            'preStart',
            'startTime',
            'preEnd',
            'endTime',
            'address',
            'map',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <div id="fh5co-event" class="fh5co-bg" style="background-image:url(<?= $settings->event_background ?>);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    <?= \app\widgets\EventWidget::widget() ?>

                    <?php

                    if ($settings->isSetEventPostscript()){
                        echo "
                        <div class=\"col-md-12 col-sm-12 text-center\">
                            <div class=\"event-wrap animate-box\" style=\"padding: 10px 0 0 0; margin-top: 10px\">
                                <p style=\"font-size: x-large\">{$settings->event_postscript}</p>
                            </div>
                        </div>";
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>


</div>
