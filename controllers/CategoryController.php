<?php
/**
 * Created by PhpStorm.
 * User: kros
 * Date: 22.07.16
 * Time: 18:41
 */

namespace app\controllers;
use app\models\Category;
use app\models\Album;
use Yii;
use yii\data\Pagination;
use yii\web\HttpException;

class CategoryController extends AppController
{
    public function actionIndex()
    {
        $album = new Album();
        $lastAlbums = $album->findLast();
        $this->setMeta();
        return $this->render('index', compact('lastAlbums'));
    }

    public function actionView($alias)
    {
        $category = Category::findOne(['alias' => $alias]);
        if(empty($category) OR $category->visible == Category::VISIBLE_OFF)
            throw new HttpException(404, 'такой категории нет.');

//        $albums = Album::find()->where(['category_id' => $category->id])->all();
        $query = Album::find()->where(['category_id' => $category->id])
            ->andWhere(['visible' => Album::VISIBLE_ON]);
        $pages = new Pagination(['totalCount' => $query->count(), 'forcePageParam' => false, 'pageSizeParam' => false]);
        $albums = $query->offset($pages->offset)->limit($pages->limit)->all();
        $this->setMeta($category->title, ['keywords' => $category->keywords, 'description' => $category->description]);
        return $this->render('view', compact('albums', 'pages', 'category'));
    }
}