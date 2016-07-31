<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Album */

$this->title = 'Редактирование альбома: ' . $model->title;
?>

<h2>
    <?= Html::a('Альбомы', ['index']) ?> &raquo;
    <small><?= Html::encode($this->title) ?></small>
</h2>
<div class="clearfix"></div>

<div class="content">

    <div class="album-update container-fluid">

        <h2><?= Html::encode($model->title) ?></h2>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div> <!-- /.content -->
