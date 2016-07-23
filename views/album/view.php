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
            <div class="card-box col-xs-6 col-sm-4 col-md-3">
                <a href="javascript:sliderPopup('http://s.fotorama.io/1.jpg', 0);" class="card">
                    <img src="/images/photo/1.jpg" alt="">
                </a>
            </div>
            <div class="card-box col-xs-6 col-sm-4 col-md-3">
                <a href="javascript:sliderPopup('http://s.fotorama.io/1.jpg', 1);" class="card">
                    <img src="/images/photo/2.jpg" alt="">
                </a>
            </div>
            <div class="card-box col-xs-6 col-sm-4 col-md-3">
                <a href="javascript:sliderPopup('http://s.fotorama.io/1.jpg', 2);" class="card">
                    <img src="/images/photo/1.jpg" alt="">
                </a>
            </div>
            <div class="card-box col-xs-6 col-sm-4 col-md-3">
                <a href="javascript:sliderPopup('http://s.fotorama.io/1.jpg', 0);" class="card">
                    <img src="/images/photo/1.jpg" alt="">
                </a>
            </div>
            <div class="card-box col-xs-6 col-sm-4 col-md-3">
                <a href="javascript:sliderPopup('http://s.fotorama.io/1.jpg', 0);" class="card">
                    <img src="/images/photo/1.jpg" alt="">
                </a>
            </div>
            <div class="card-box col-xs-6 col-sm-4 col-md-3">
                <a href="javascript:sliderPopup('http://s.fotorama.io/1.jpg', 0);" class="card">
                    <img src="/images/photo/2.jpg" alt="">
                </a>
            </div>
            <div class="card-box col-xs-6 col-sm-4 col-md-3">
                <a href="javascript:sliderPopup('http://s.fotorama.io/1.jpg', 0);" class="card">
                    <img src="/images/photo/3.jpg" alt="">
                </a>
            </div>
            <div class="card-box col-xs-6 col-sm-4 col-md-3">
                <a href="javascript:sliderPopup('http://s.fotorama.io/1.jpg', 0);" class="card">
                    <img src="/images/photo/1.jpg" alt="">
                </a>
            </div>
            <div class="card-box col-xs-6 col-sm-4 col-md-3">
                <a href="javascript:sliderPopup('http://s.fotorama.io/1.jpg', 0);" class="card">
                    <img src="/images/photo/1.jpg" alt="">
                </a>
            </div>
            <div class="card-box col-xs-6 col-sm-4 col-md-3">
                <a href="javascript:sliderPopup('http://s.fotorama.io/1.jpg', 0);" class="card">
                    <img src="/images/photo/2.jpg" alt="">
                </a>
            </div>
            <div class="card-box col-xs-6 col-sm-4 col-md-3">
                <a href="javascript:sliderPopup('http://s.fotorama.io/1.jpg', 0);" class="card">
                    <img src="/images/photo/3.jpg" alt="">
                </a>
            </div>
            <div class="card-box col-xs-6 col-sm-4 col-md-3">
                <a href="javascript:sliderPopup('http://s.fotorama.io/1.jpg', 0);" class="card">
                    <img src="/images/photo/1.jpg" alt="">
                </a>
            </div>
        </div>
    </div>
</div>

<?php if( !empty($related) ): ?>
    <?= $this->render('_related', compact('related')) ?>
<?php endif; ?>

<!-- Begin .fotorama -->
<div class="fotorama fotorama--hidden" id="fotorama"
     data-nav="false" data-allowfullscreen="true" data-fit="scaledown" data-hash="true" >
    <a href="/images/photo/1.jpg" id="test1"
       data-thumb="/images/photo/1.jpg"></a>
    <a href="/images/photo/2.jpg"
       data-thumb="/images/photo/2.jpg"></a>
    <a href="/images/photo/v.jpg"
       data-thumb="/images/photo/v.jpg"></a>
    <a href="http://s.fotorama.io/4.jpg"
       data-thumb="http://s.fotorama.io/4.jpg"></a>
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