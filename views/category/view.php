<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use app\models\Category;
use yii\helpers\Url;
?>
<div class="container-fluid">
    <div class="row">
        <?php if( !empty($albums) ): ?>
        <div class="cards clearfix">
            <?php $i=0; foreach ($albums as $album): ?>
                <?php if($category->type == Category::TYPE_PORTFOLIO): ?>
                    <div class="card-box col-xs-6">
                        <a href="<?= Url::to(['album/view', 'alias' => $album->alias]) ?>" class="card">
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
                <?php else: ?>
                    <div class="card-box col-xs-6 col-sm-4">
                        <a href="<?= Url::to(['album/view', 'alias' => $album->alias]) ?>" class="card">
                            <div class="details">
                                <h4><?= $album->title ?></h4>
                                <p><?= Yii::$app->formatter->asDate($album->shooting_date, 'MMMM, Y') ?></p>
                            </div>
                            <?= Html::img("@web/images/albums/{$album->img}", ['alt' => $album->title]) ?>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <?php
        echo \yii\widgets\LinkPager::widget([
            'pagination' => $pages,
        ]);
        ?>
        <?php else: ?>
            <div class="alert alert-info" role="alert"><strong>Добро пожаловать!</strong> Совсем скоро тут будут новые фотографии.
            </div>
        <?php endif; ?>
    </div>
</div>
