<?php

use kartik\widgets\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Notification */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="notification-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'start')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Выберете время начала...'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd.mm.yyyy hh:ii'
        ]
    ]); ?>
    <?= $form->field($model, 'end')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Выберете время окончания...'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd.mm.yyyy hh:ii'
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
