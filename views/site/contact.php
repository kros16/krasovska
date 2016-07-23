<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use himiklab\yii2\recaptcha\ReCaptcha;

?>
<div class="container-fluid">
    <div class="row">
        <h2 class="text-center content-title"><span>Контактная информация</span></h2>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            <i class="glyphicon glyphicon-ok" aria-hidden="true"></i>
            Спасибо! Ваше сообщение отправлено. Я ответчу Вам как можно скорее.
        </div>

    <?php else: ?>

        <div class="contact-info col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-0">
            <div class="row">
                <div class="contacts-box row">
                    <p class="col-sm-5">Подзвонить:</p>
                    <p class="col-sm-7">
                        <span>☎</span>&nbsp;
                        <a href="tel:+380638214986">+38(063) 821-49-86</a>,
                        <br><a href="tel:+380994989826">+38(099) 498-98-26</a></p>
                    <div class="clearfix"></div>
                    <p class="col-sm-5">Связаться по почте:</p>
                    <p class="col-sm-7">
                        <span>@</span>&nbsp;
                        <a href="mailto:y.o.krasovska@gmail.com">y.o.krasovska@gmail.com</a>
                    </p>
                    <div class="clearfix"></div>
                    <p class="col-sm-5">Написать в Skype:</p>
                    <p class="col-sm-7">
                        <span>Ⓢ</span>&nbsp;
                        <a href="skype:y.krasovska?chat">y.krasovska</a>
                    </p>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-0">

            <div class="row">
                <h3 class="contacts-title text-center">Отправить сообщение</h3>
                <p class="text-center">
                    Если у вас есть деловое предложение или другие вопросы, пожалуйста, заполните следующую форму, чтобы связаться со мной. Спасибо.
                </p>
                <div class="2col-lg-5">

                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['class' => 'form-item']) ?>

                    <?= $form->field($model, 'email')->textInput(['class' => 'form-item']) ?>

                    <?= $form->field($model, 'phone')->textInput(['class' => 'form-item']) ?>

                    <?= $form->field($model, 'text')->textArea(['class' => 'form-item', 'rows' => 6]) ?>

                    <?= $form->field($model, 'reCaptcha')->widget(ReCaptcha::className()) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-block btn-lg btn-pink', 'name' => 'contact-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>


    <?php endif; ?>

    </div>
</div>