<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

$settings = \app\models\Settings::get();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/images/favicon.png" type="image/png">

    <meta property="og:title" content="<?= $settings->head_title ?>"/>
    <meta name="description" content="Состоится <?= $settings->getDateFormat("d F Y") ?> года"/>
    <meta property="og:image" content="/images/share_photo.png"/>

    <meta property="og:type" content="article" />
    <meta property="og:description" content="Состоится <?= $settings->getDateFormat("d F Y") ?> года" />

    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="<?= $settings->head_title ?>"/>
    <meta name="twitter:description" content="Состоится <?= $settings->getDateFormat("d F Y") ?> года"/>
    <meta name="twitter:image" content="/images/share_photo.png"/>

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => $settings->head_title,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' =>
            Yii::$app->user->isGuest ? (
                [['label' => 'Войти', 'url' => ['/site/login']]]
            ) : (
                [
                    ['label' => 'Альбомы', 'url' => ['album/index']],
                    ['label' => 'Оповещения', 'url' => ['notification/index']],
                    ['label' => 'Настройки', 'url' => ['settings/index']],
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Выйти (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                ]
            )
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; elisevgeniy <?= date('Y') ?></p>

        <p class="pull-right"></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
