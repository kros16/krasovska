<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\models\Category;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title = $model->title;
?>
<h2>
    <?= Html::a('Категории', ['index']) ?> &raquo;
    <small><?= Html::encode($this->title) ?></small>
</h2>
<div class="clearfix"></div>

<div class="content">

    <div class="category-view container-fluid">

        <h2><?= Html::encode($this->title) ?></h2>

        <p>
            <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Подтвердите удаление категории!',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                [
                    'attribute' => 'parent_id',
                    'value' => isset($model->category->title) ? $model->category->title : 'Самостоятельная категория',
                ],
                'alias',
                'title',
//                'type',
                [
                    'attribute' => 'type',
                    'value' => $model->types[$model->type],
                ],
                'position',
//                'visible',
                [
                    'attribute' => 'visible',
                    'value' => $model->visible == $model::VISIBLE_ON ? 'Активная' : 'Не активная',
                ],
                'keywords',
                'description',
            ],
        ]) ?>

    </div>
</div> <!-- /.content -->
