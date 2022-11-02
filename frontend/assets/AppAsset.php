<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assets/css/site.css',
        'assets/css/aos.css',
    ];
    public $js = [
        'assets/js/aos.js',
        'assets/js/bootstrap.min.js',
        'assets/js/custom.js',
        'assets/js/jquery.min.js',
        'assets/js/smoothscroll.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        '\rmrevin\yii\fontawesome\AssetBundle',
    ];
}
