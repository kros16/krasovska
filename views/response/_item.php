<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>

<div class="media response-item" id="response_<?= $model->id ?>">
    <div class="media-left"><a href="#response_<?= $model->id ?>"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></a></div>
    <div class="media-body">
        <h4 class="media-heading"><b><?= Html::encode($model->name) ?></b>
            <small class="text-muted"><i class="glyphicon glyphicon-calendar" aria-hidden="true"></i>&nbsp;<?= Yii::$app->formatter->asDate($model->time, 'MMMM, Y') ?></small>
        </h4>
        <p><?= Html::encode($model->text) ?></p>
        <?php if($model->answer): ?>
            <div class="media">
                <div class="media-left"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></div>
                <div class="media-body"><h4 class="media-heading"><b>Ответ Администратора</b></h4>
                    <small><?= $model->answer ?></small>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>