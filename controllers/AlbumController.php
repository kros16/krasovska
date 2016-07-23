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

        $related = Album::find()->where(['category_id' => $album->category->id])->andWhere(['not in', 'id', $album->id])->all();

        $this->setMeta($album->title, ['keywords' => $album->keywords, 'description' => $album->description]);

        if( $album->type == Album::TYPE_SERIES )
            return $this->render('view-series', compact('album', 'related'));
        else
            return $this->render('view', compact('album', 'related'));
    }
}