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
            <?php $flag = null; $i=0; foreach($images as $img): if($img['isMain'] OR $img['urlAlias'] == 'placeHolder') continue; $flag = true; ?>
                <div class="card-box col-xs-6 col-sm-4 col-md-3">
                    <a href="javascript:sliderPopup('http://s.fotorama.io/1.jpg', <?= $i ?>);" class="card">
                        <img src="<?= $img->getUrl('300x215') ?>" alt="">
                    </a>
                </div>
            <?php $i++; endforeach; ?>
            <?php if(!$flag): ?>
                <div class="alert alert-info" role="alert"><strong>Добро пожаловать!</strong> Совсем скоро тут будут новые фотографии.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php if( !empty($related) ): ?>
    <?= $this->render('_related', compact('related')) ?>
<?php endif; ?>

<!-- Begin .fotorama -->
<div class="fotorama fotorama--hidden" id="fotorama"
     data-nav="thumbs" data-allowfullscreen="true" data-fit="scaledown" data-hash="true" >
    <?php foreach($images as $img): if($img['isMain']) continue; ?>
        <a href="<?= $img->getUrl('1920x') ?>" id="p_<?= $img['id'] ?>"
           data-thumb="<?= $img->getUrl('64x64') ?>"></a>
    <?php endforeach; ?>
</div>
<!-- END .fotorama -->

<?php
$this->registerCssFile("https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css", [
    'depends' => [BootstrapPluginAsset::className()],
]);
$this->registerCssFile("http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css", [
    'depends' => [BootstrapPluginAsset::className()],
]);
$this->registerJsFile('http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js', ['depends' => [JqueryAsset::className()]]);

$this->registerJs('
    /*<![CDATA[*/

      $(function(){
        var re = /#(\d+)/;
        var str = location.hash;
        var index = str.replace(re, "$1");
        if (index) sliderPopup(\'\', index-1);
      });

      function sliderPopup(url, index)
      {
        $("#fotorama")
          .data("fotorama")
          .show(index)
          .requestFullScreen();
      }

    /*]]>*/
', $this::POS_END);
?>