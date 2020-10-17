<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Album */

$this->title = 'Поиск по ключу';
(Yii::$app->user->isGuest) ? $this->params['breadcrumbs'][] = ['label' => 'Альбомы'] : $this->params['breadcrumbs'][] = ['label' => 'Альбомы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::beginForm('','get', ['class' => "form-horizontal", 'role' => "form"]) ?>

    <div class="form-group">
        <label for="key" class="col-sm-2 control-label">Ключ доступа</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="key" name="key" placeholder="ключ">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Отправить</button>
        </div>
    </div>

    <?= Html::endForm() ?>

</div>
