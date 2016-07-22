<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="container-fluid">
    <div class="row">
        <?php if( !empty($albums) ): ?>
        <div class="cards clearfix">
            <?php $i=0; foreach ($albums as $album): ?>
            <div class="col-xs-6">
                <a href="portfolio-album.html" class="card">
                    <div class="details">
                        <h4><?= $album->title ?></h4>
                    </div>
                    <?= Html::img("@web/images/albums/{$album->img}", ['alt' => $album->title]) ?>
                </a>
            </div>
            <?php $i++ ?>
            <?php if($i % 2 == 0): ?>
                <div class="clearfix"></div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
            <div class="alert alert-info" role="alert"><strong>Добро пожаловать!</strong> Совсем скоро тут будут новые фотографии.
            </div>
        <?php endif; ?>
    </div>
</div>
