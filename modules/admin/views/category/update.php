<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */

$this->title = 'Редактирование категории: ' . $model->title;
?>

<h2>
    <?= Html::a('Категории', ['index']) ?> &raquo;
    <small><?= Html::encode($this->title) ?></small>
</h2>
<div class="clearfix"></div>

<div class="content">

    <div class="category-update container-fluid">

        <h2><?= Html::encode($model->title) ?></h2>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div> <!-- /.content -->
