<?php
/**
 * Created by PhpStorm.
 * User: kros
 * Date: 22.07.16
 * Time: 18:41
 */

namespace app\controllers;
use yii\web\Controller;
use yii;

class AppController extends Controller
{
    protected function setMeta($title = null, $metaTags = [])
    {
        $this->view->title = $title ? $title . ' | ' . Yii::$app->name : Yii::$app->name;

        if( !empty($metaTags) ) {
            foreach ($metaTags as $tagName => $tagContent) {
                $this->view->registerMetaTag([
                    'name' => $tagName,
                    'content' => "$tagContent"
                ]);
            }
        }
    }
}