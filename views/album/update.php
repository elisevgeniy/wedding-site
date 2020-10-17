<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Album */

$this->title = 'Изменение альбома: ' . $model->title;
(Yii::$app->user->isGuest) ? $this->params['breadcrumbs'][] = ['label' => 'Альбомы'] : $this->params['breadcrumbs'][] = ['label' => 'Альбомы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'key' => $model->key]];
$this->params['breadcrumbs'][] = 'Изменение';
?>
<div class="album-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_update', [
        'model' => $model,
    ]) ?>

    <?php

        if (Yii::$app->request->get('showKey', false)){
            Modal::begin([
                'id' => 'modal_1',
                'header' => '<h3>Ключ доступа к альбому</h3>',
            ]);
            echo '<p>Для редактирования альбома потребуется запомнить или записать ключ доступа.</p>';
            echo '<div style="text-align: center;"><h3>Ваш ключ:</h3>';

            echo '
            <div class="row">
                <div class="input-group col-md-6 col-md-offset-3">
    <!--               <span class="input-group-addon" id="basic-addon3">https://example.com/users/</span>
                        <input type="text" id="key" class="form-control" aria-describedby="basic-addon3" value="'.$model->key.'"> -->
                        <input type="text" id="key" class="form-control" value="'.$model->key.'" style="font-size: 26px; text-align: center">
                        <span class="input-group-btn">
                            <button id="copyButton" class="btn btn-default" type="button">Копировать</button>
                        </span>
                </div>
            </div>
            ';
            Modal::end();

            $JS = <<< JS
$('#modal_1').modal('show');

$('#copyButton')[0].onclick =  function() {
    let copyText = document.querySelector("#key");
    copyText.select();
    document.execCommand("copy");
};
JS;
            $this->registerJs($JS);
        }

    ?>

</div>
