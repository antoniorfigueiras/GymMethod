<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAssetCliente extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'cliente/css/styles.css',
    ];
    public $js = [
        'cliente/js/script.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        '\rmrevin\yii\fontawesome\AssetBundle',
        'lo\icofont\IcoFontAsset',
    ];
}