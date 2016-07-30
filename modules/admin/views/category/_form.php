<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Category;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

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
            <div class="form-group field-category-parent_id has-success">
                <label class="control-label" for="category-parent_id">Родительская категория</label>
                <select id="category-parent_id" class="form-control" name="Category[parent_id]">
                    <option value="0">Самостоятельная категория</option>
                    <?= \app\components\MenuWidget::widget(['tpl' => 'select', 'model' => $model]) ?>
                </select>
            </div>
            <div class="hint">Категории могут иметь иерархию. Например, вы можете завести категорию «Джаз», внутри которой будут дочерние категории «Бибоп» и «Биг-бэнды». Полностью произвольно.</div>
        </div>
        <div class="col-sm-6 col-md-5 col-lg-4">
            <?= $form->field($model, 'type')->dropDownList(Category::getTypes()) ?>
            <div class="hint">Тип категории определят, то, в каком виде будет выводиться содержание категории.</div>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-6 col-md-5 col-lg-4">
            <?= $form->field($model, 'position')->textInput(['type' => 'number', 'min' => 0, 'placeholder' => 0]) ?>
        </div>
        <div class="col-sm-6 col-md-5 col-lg-4">
            <?= $form->field($model, 'visible')->dropDownList([ Category::VISIBLE_ON => 'Активная', Category::VISIBLE_OFF => 'Не активная' ]) ?>
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
    <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-plus-square-o"></i>&nbsp;Создать' : '<i class="fa fa-save"></i>&nbsp;Обновить', ['class' => $model->isNewRecord ? 'button-large button-green' : 'button-large button-blue']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
<div class="form-group">
