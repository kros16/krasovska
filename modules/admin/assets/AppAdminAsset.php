<?php
/**
 * Created by PhpStorm.
 * User: kros
 * Date: 23.07.16
 * Time: 19:13
 */

namespace app\modules\admin\assets;
use yii\web\AssetBundle;

class AppAdminAsset extends AssetBundle
{
    public $sourcePath = '@admin/media';
//    public $basePath = '@admin/media';
//    public $baseUrl = '@admin/media';
    public $css = [
        'css/style.css',
    ];
    public $js = [
        'js/jquery.cookies.js',
        'js/main.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\jui\JuiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        '\rmrevin\yii\fontawesome\AssetBundle'
    ];
}