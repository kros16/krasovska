<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<div class="container-fluid">
    <div class="row">
        <?php if( !empty($lastAlbums) ): ?>
            <div class="cards clearfix">
                <?php foreach ($lastAlbums as $album): ?>
                <div class="col-xs-6 col-sm-4">
                    <a href="#" class="card">
                        <div class="details">
                            <h4><?= $album->title ?></h4>
                            <p><?= Yii::$app->formatter->asDate($album->shooting_date, 'MMMM, Y') ?></p>
                        </div>
                        <?= Html::img("@web/images/albums/{$album->img}", ['alt' => $album->title]) ?>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="alert alert-info" role="alert"><strong>Добро пожаловать!</strong> Совсем скоро тут будут новые фотографии.
            </div>
        <?php endif; ?>
    </div>
</div>
