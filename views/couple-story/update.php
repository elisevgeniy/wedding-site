<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CoupleStory */

$this->title = 'Изменение: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'История отношений', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="couple-story-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
