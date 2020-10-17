<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CoupleStory */

$this->title = 'Добавление';
$this->params['breadcrumbs'][] = ['label' => 'История отношений', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="couple-story-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
