<?php

use conquer\codemirror\CodemirrorWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Service */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(
        CodemirrorWidget::className(),
        [
            'preset'=>'html',
            'options'=>['rows' => 20],
        ]
    ); ?>

    <?= $form->field($model, 'contact')->widget(
        CodemirrorWidget::className(),
        [
            'preset'=>'html',
            'options'=>['rows' => 20],
        ]
    ); ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
