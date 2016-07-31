<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use app\models\Category;
use yii\helpers\Url;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\JqueryAsset;

?>

<div class="container-fluid">
    <div class="row">
        <h2 class="text-center content-title"><span><?= $album->title ?></span></h2>
        <div class="cards clearfix">
            <?php $images = $album->getImages(); ?>
            <?php foreach($images as $img): if($img['isMain'] OR $img['urlAlias'] == 'placeHolder') continue; ?>
            <div class="card-box col-md-12 text-center">
                <img src="<?= $img->getUrl('924x') ?>" alt="">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php if( !empty($related) ): ?>
    <?= $this->render('_related', compact('related')) ?>
<?php endif; ?>

<?php
$this->registerCssFile("https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css", [
    'depends' => [BootstrapPluginAsset::className()],
]);
?>
