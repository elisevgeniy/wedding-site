<?php

namespace app\assets;

use yii\web\AssetBundle;

class SiteAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $css = [
        'css/animate.css',
        'css/icomoon.css',
        'css/magnific-popup.css',
        'css/owl.carousel.min.css',
        'css/owl.theme.default.min.css',
        'css/style.css',
    ];
    public $js = [
        '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js',//'js/jquery.min.js',
        'js/jquery.easing.1.3.js',
        'js/jquery.countTo.js',
        'js/jquery.stellar.min.js',
        'js/jquery.magnific-popup.min.js',
        'js/jquery.waypoints.min.js',
        'js/modernizr-2.6.2.min.js',
        'js/respond.min.js',
        'js/owl.carousel.min.js',
        'js/magnific-popup-options.js',
        'js/main.js',
        'js/simplyCountdown.js',
        'js/simplyCountup.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
