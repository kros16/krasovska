<?php
/**
 * Created by PhpStorm.
 * User: kros
 * Date: 23.07.16
 * Time: 20:44
 */

namespace app\assets;

use yii\web\AssetBundle;

class FontAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '//fonts.googleapis.com/css?family=Lobster|Cuprum&subset=latin,cyrillic',
    ];
    public $cssOptions = [
        'type' => 'text/css',
    ];
}