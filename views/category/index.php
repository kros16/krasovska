<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="container-fluid">
    <div class="row">
        <?php if( !empty($lastAlbums) ): ?>
            <div class="cards clearfix">
                <?php foreach ($lastAlbums as $album): ?>
                <div class="card-box col-xs-6 col-sm-4">
                    <a href="<?= Url::to(['album/view', 'alias' => $album->alias]) ?>" class="card">
                        <div class="details">
                            <h4><?= $album->title ?></h4>
                            <p><?= Yii::$app->formatter->asDate($album->shooting_date, 'MMMM, Y') ?></p>
                        </div>
                        <?= Html::img($album->getImage()->getUrl('460x330'), ['alt' => $album->title]) ?>
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
