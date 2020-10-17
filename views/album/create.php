<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Album */

$this->title = 'Создание нового альбома';
(Yii::$app->user->isGuest) ? $this->params['breadcrumbs'][] = ['label' => 'Альбомы'] : $this->params['breadcrumbs'][] = ['label' => 'Альбомы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
