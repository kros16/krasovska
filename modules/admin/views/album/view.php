<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Album */

$this->title = $model->title;
?>
<h2>
    <?= Html::a('Альбомы', ['index']) ?> &raquo;
    <small><?= Html::encode($this->title) ?></small>
</h2>
<div class="clearfix"></div>

<div class="content">

    <div class="album-view container-fluid">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Подтвердите удаление альбома!',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?php $img = $model->getImage(); $images = $model->getImages(); ?>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                [
                    'attribute' => 'category_id',
                    'value' => $model->category->title,
                ],
                'alias',
                //'title',
                'shooting_date',
                'position',
                [
                    'attribute' => 'visible',
                    'value' => $model->visible == $model::VISIBLE_ON ? 'Активен' : 'Не активен',
                ],
                'keywords',
                'description',
                [
                    'attribute' => 'image',
                    'value' => "<img class='img img-mb-0' src='{$img->getUrl('300x215')}'>",
                    'format' => 'html'
                ],
                [
                    'attribute' => 'gallery',
                    'value'  => call_user_func(function ($images) {
                        $str = '';
                        foreach($images as $img){
                            if($img['isMain'] OR $img['urlAlias'] == 'placeHolder') continue;
                            $str .= "<img class='img' src='{$img->getUrl('150x150')}'>";
                        }
                        return $str;
                    }, $images),
                    'format' => 'html'
                ],
            ],
        ]) ?>

    </div>
</div>
