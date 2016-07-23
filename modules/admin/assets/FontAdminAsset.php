<?php
/**
 * Created by PhpStorm.
 * User: kros
 * Date: 23.07.16
 * Time: 20:44
 */

namespace app\modules\admin\assets;

use yii\web\AssetBundle;

class FontAdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//fonts.googleapis.com/css?family=Open+Sans:300,600,400&subset=latin,cyrillic',
    ];
    public $cssOptions = [
        'type' => 'text/css',
    ];
}