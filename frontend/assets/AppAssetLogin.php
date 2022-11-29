<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAssetLogin extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'login/fonts/icomoon/style.css',
        'login/css/owl.carousel.min.css',
        'login/css/bootstrap.min.css',
        'login/css/style.css'
    ];
    public $js = [
        'login/js/jquery-3.3.1.min.js',
        'login/js/popper.min.js',
        'login/js/bootstrap.min.js',
        'login/js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        '\rmrevin\yii\fontawesome\AssetBundle',
        'lo\icofont\IcoFontAsset',
    ];
}
