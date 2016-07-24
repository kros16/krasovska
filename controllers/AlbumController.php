<?php
/**
 * Created by PhpStorm.
 * User: kros
 * Date: 23.07.16
 * Time: 12:42
 */

namespace app\controllers;
use app\models\Category;
use app\models\Album;
use yii\web\HttpException;
use yii;

class AlbumController extends AppController
{
    public function actionView($alias)
    {
        $album = Album::findOne(['alias' => $alias]);
        if(empty($album))
            throw new HttpException(404, 'такого альбома нет.');

        $related = Album::findRelated($album->id, $album->category_id);

        $this->setMeta($album->title, ['keywords' => $album->keywords, 'description' => $album->description]);

        $view = $album->type == Album::TYPE_SERIES ? 'view-series' : 'view';
        return $this->render($view, compact('album', 'related'));
    }
}