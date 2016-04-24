<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.min.css',
        'css/bootstrap-slider.css',
        'css/jquery.bxslider.css',
        'css/flexslider.css',
        'css/owl.carousel.css',
        'css/widget.css',
        'css/shortcodes.css',
        'css/typography.css',
        'css/font-awesome.min.css',
        'css/style.css',
        'css/color.css',
        'css/prettyPhoto.css',
        'css/responsive.css',
        'js/dl-menu/component.css',
        'svg-icon/svg-icon.css',
    ];
    public $js = [
        'js/jquery.js',
        'js/bootstrap.min.js',
        'js/jquery.bxslider.min.js',
        'js/bootstrap-slider.js',
        'js/jquery.flexslider.js',
        'js/owl.carousel.js',
        'js/jquery.singlePageNav.js',
        'js/jquery.prettyPhoto.js',
        'js/dl-menu/modernizr.custom.js',
        'js/dl-menu/jquery.dlmenu.js',
        'js/waypoints-min.js',
        'http://maps.google.com/maps/api/js?sensor=false',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
