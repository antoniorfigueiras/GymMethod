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
        'index/css/bootstrap.min.css',
        'index/css/owl.carousel.min.css',
        'index/css/slicknav.css',
        'index/css/flaticon.css',
        'index/css/gijgo.css',
        'index/css/animate.min.css',
        'index/css/animated-headline.css',
        'index/css/magnific-popup.css',
        'index/css/fontawesome-all.min.css',
        'index/css/themify-icons.css',
        'index/css/slick.css',
        'index/css/nice-select.css',
        'index/css/style.css',
    ];
    public $js = [
        'index/js/vendor/modernizr-3.5.0.min.js',
        'index/js/vendor/jquery-1.12.4.min.js',
        'index/js/popper.min.js',
        'index/js/bootstrap.min.js',
        'index/js/jquery.slicknav.min.js',
        'index/js/owl.carousel.min.js ',
        'index/js/slick.min.js',
        'index/js/wow.min.js',
        'index/js/animated.headline.js',
        'index/js/jquery.magnific-popup.js',
        'index/js/gijgo.min.js',
        'index/js/jquery.nice-select.min.js',
        'index/js/jquery.sticky.js',
        'index/js/jquery.counterup.min.js',
        'index/js/waypoints.min.js',
        'index/js/jquery.countdown.min.js',
        'index/js/hover-direction-snake.min.js',
        'index/js/contact.js ',
        'index/js/jquery.form.js',
        'index/js/jquery.validate.min.js',
        'index/js/mail-script.js',
        'index/js/jquery.ajaxchimp.min.js',
        'index/js/plugins.js',
        'index/js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        '\rmrevin\yii\fontawesome\AssetBundle',
        'lo\icofont\IcoFontAsset',
    ];
}
