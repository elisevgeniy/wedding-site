<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use zxbodya\yii2\galleryManager\GalleryManager;

/* @var $this yii\web\View */
/* @var $model app\models\Album */
/* @var $form yii\widgets\ActiveForm */

$js = <<< JS
    setTimeout(() => {
        $('div.btn-toolbar div.btn-group:eq(1)').addClass('hidden');
        $('div.photo span.deletePhoto').addClass('hidden');
    }, 1000);
    
JS;

if (Yii::$app->user->isGuest && $model->common)
    $this->registerJs($js);

?>

<div class="album-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= (Yii::$app->user->isGuest && $model->common) ? '' : $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= GalleryManager::widget(
        [
            'model' => $model,
            'behaviorName' => 'galleryBehavior',
            'apiRoute' => 'album/galleryApi'
        ]
    );
    ?>

    <div class="form-group">
        <?= (Yii::$app->user->isGuest && $model->common) ? '' : Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
