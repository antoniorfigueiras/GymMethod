<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAssetLoja extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'loja/css/styles.css',
    ];
    public $js = [
        'loja/js/script.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        '\rmrevin\yii\fontawesome\AssetBundle',
        'lo\icofont\IcoFontAsset',
    ];

}