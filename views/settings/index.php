<?php
/* @var $this yii\web\View */

use kartik\widgets\DateTimePicker;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Настройки';
$this->params['breadcrumbs'][] = ['label' => 'Настройки', 'url' => ['index']];
?>

<div>

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="settings-form">

        <br>
        <h3> Основные настройки</h3>
        <br>

        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'head_title')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'date')->widget(DateTimePicker::classname(), [
                    'options' => ['placeholder' => 'Выберете дату и время свадебной церемонии...'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd.mm.yyyy hh:ii'
                    ]
                ]); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'date_before_text')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'date_after_text')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'head_background')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <hr>
        <h3> Блок приглашения</h3>
        <br>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'husband_photo')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'wife_photo')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'husband_name')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'wife_name')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <?= $form->field($model, 'invitation_title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'invitation_text')->textInput(['maxlength' => true]) ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'husband_invitation')->textarea(['maxlength' => true]) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'wife_invitation')->textarea(['maxlength' => true]) ?>
            </div>
        </div>


        <hr>
        <h3> Блок событий</h3>
        <br>

        <?= $form->field($model, 'event_title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'event_text')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'event_background')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'event_postscript')->textInput(['maxlength' => true]) ?>


        <?= Html::a('Управление событиями', ['event/index'], ['class' => 'btn btn-primary'])?>

        <hr>
        <h3> Блок плана рассадки</h3>
        <br>

        <?= $form->field($model, 'seating_plan_image')->textInput(['maxlength' => true]) ?>


        <hr>
        <h3> Блок истории отношений</h3>
        <br>

        <?= $form->field($model, 'couple_story_pretitle')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'couple_story_title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'couple_story_text')->textInput(['maxlength' => true]) ?>

        <?= Html::a('Управление историей отношений', ['couple-story/index'], ['class' => 'btn btn-primary'])?>


        <br>
        <br>
        <hr>
        <h3> Блок свадебных специалистов</h3>
        <br>

        <?= $form->field($model, 'services_title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'services_text')->textInput(['maxlength' => true]) ?>

        <?= Html::a('Управление свадебными специалистами', ['service/index'], ['class' => 'btn btn-primary'])?>




        <br>
        <br>
        <hr>
        <h3> Блок галереи</h3>
        <br>

        <?= $form->field($model, 'album_title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'album_text')->textInput(['maxlength' => true]) ?>
        <div class="container">
            <div class="col-md-6">
                <?= $form->field($model, 'album_video_enable')->checkbox() ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'album_video_ffmpeg_path')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <?= Html::a('Управление галереей', ['album/index'], ['class' => 'btn btn-primary'])?>

        <br>
        <hr>
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
