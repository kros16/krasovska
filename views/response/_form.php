<?php

/* @var $this yii\web\View */
/* @var $model app\models\Response */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;

?>

<div class="category-form">

    <?php if (Yii::$app->session->hasFlash('responseFormSubmitted')): ?>

    <div class="alert alert-success">
        <i class="glyphicon glyphicon-ok" aria-hidden="true"></i>
        Спасибо! Отзыв отправлен.<br>Ваше мнение для меня очень важно.
    </div>

    <?php else : ?>

        <?php $form = ActiveForm::begin(); ?>

        <?php echo $form->field($model, 'name')->textInput(['class' => 'form-item']) ?>

        <?php echo $form->field($model, 'email')->textInput(['class' => 'form-item']) ?>

        <?php echo $form->field($model, 'text')->textarea(['class' => 'form-item', 'rows' => 4]) ?>

        <?= $form->field($model, 'reCaptcha')->widget(ReCaptcha::className()) ?>

        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-block btn-lg btn-pink']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    <?php endif; ?>

</div>
