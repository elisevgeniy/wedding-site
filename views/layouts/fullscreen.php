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

    <meta property="og:title" content="Свадьба <?= $settings->title ?>"/>
    <meta name="description" content="Состоится <?= $settings->getDateFormat("d F Y") ?> года"/>
    <meta property="og:image" content="/images/share_photo.png"/>

    <meta property="og:type" content="article" />
    <meta property="og:description" content="Состоится <?= $settings->getDateFormat("d F Y") ?> года" />

    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="Свадьба <?= $settings->title ?>"/>
    <meta name="twitter:description" content="Состоится <?= $settings->getDateFormat("d F Y") ?> года"/>
    <meta name="twitter:image" content="/images/share_photo.png"/>

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="">
    <div class="">
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
