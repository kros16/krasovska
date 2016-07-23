<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<div class="container-fluid">
    <div class="row">
        <h2 class="text-center content-title"><span>Авторизация</span></h2>

        <p class="text-center">Войдите, чтобы открыть больше возможностей:</p>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-sm-4\">{input}</div>\n<div class=\"col-sm-4\">{error}</div>",
                'labelOptions' => ['class' => 'col-sm-4 control-label'],
            ],
        ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"col-sm-offset-4 col-sm-4\">{input} {label}</div>\n<div class=\"col-sm-8\">{error}</div>",
            ]) ?>

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <?= Html::submitButton('Войти', ['class' => 'btn btn-default', 'name' => 'login-button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
