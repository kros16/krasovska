<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Album */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="album-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-sm-6 col-md-5 col-lg-4">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            <div class="hint">Название определяет, как элемент будет отображаться на вашем сайте.</div>
        </div>

        <div class="col-sm-6 col-md-5 col-lg-4">
            <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
            <div class="hint">«Алиас» — это вариант названия, подходящий для URL. Обычно содержит только латинские буквы в нижнем регистре, цифры и дефисы.</div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-md-5 col-lg-4">
            <div class="form-group field-album-category_id has-success">
                <label class="control-label" for="album-category_id">Родительская категория</label>
                <select id="album-category_id" class="form-control" name="Album[category_id]">
                    <?= \app\components\MenuWidget::widget(['tpl' => 'select_album', 'model' => $model]) ?>
                </select>
            </div>
            <div class="hint">Альбомы вложены в категори. Например, вы можете завести категорию «Джаз», внутри которой будут дочерние альбомы «Бибоп» и «Биг-бэнды». Полностью произвольно.</div>
        </div>

        <div class="col-sm-6 col-md-5 col-lg-4">
            <?= $form->field($model, 'shooting_date')->textInput(['type' => 'date', 'placeholder' => 'yyyy-mm-dd']) ?>
            <div class="hint">Дата проведения съемки нужна, для альбомов с фотографиями одной серии.</div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-md-5 col-lg-4">
            <?= $form->field($model, 'image')->fileInput(['accept' => 'image/*']) ?>
            <div class="form-group">
                <img src="<?= $model->getImage()->getUrl() ?>">
            </div>
        </div>

        <div class="col-sm-6 col-md-5 col-lg-4">
            <?= $form->field($model, 'gallery[]')->fileInput(['multiple' => true,'accept' => 'image/*']) ?>
            <div class="form-group">
                <?php
                $images = $model->getImages();
                foreach($images as $img){
                    echo "<img style='margin: 0 5px 5px 0;' src='{$img->getUrl('75x75')}'>";
                }
                ?>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-6 col-md-5 col-lg-4">
            <?= $form->field($model, 'position')->textInput(['type' => 'number', 'min' => 0, 'placeholder' => 0]) ?>
        </div>
        <div class="col-sm-6 col-md-5 col-lg-4">
            <?= $form->field($model, 'visible')->dropDownList([ $model::VISIBLE_ON => 'Активен', $model::VISIBLE_OFF => 'Не активен' ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5 col-lg-4">
            <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
            <div class="hint">Ключевики по умолчанию не отображаются, используются для поисковых систем</div>
        </div>
        <div class="col-md-5 col-lg-4">
            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
            <div class="hint">Описание по умолчанию не отображается, используется для поисковых систем.</div>
        </div>
    </div>

    <br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-plus-square-o"></i>&nbsp;Создать' : '<i class="fa fa-save"></i>&nbsp;Обновить', ['class' => $model->isNewRecord ? 'button-large button-green' : 'button-large button-blue']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
