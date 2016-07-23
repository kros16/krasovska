<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\JqueryAsset;

?>
<div class="related">
    <h3 class="text-center">Похожие альбомы:</h3>
    <div class="container-fluid">
        <div class="row">
            <div class="swiper-container">
                <div class="cards clearfix swiper-wrapper">
                    <?php foreach ($related as $item): ?>
                    <div class="col-xs-6 col-sm-4 swiper-slide">
                        <a href="<?= Url::to(['album/view', 'alias' => $item->alias]) ?>" class="card">
                            <div class="details">
                                <h4><?= $item->title ?></h4>
                            </div>
                            <?= Html::img("@web/images/albums/{$item->img}", ['alt' => $item->title]) ?>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <!-- Add Pagination -->
            <!-- <div class="swiper-pagination"></div> -->
            <!-- Add Arrows -->
            <div class="fa fa-5x fa-angle-right swiper-button-next visible-lg"></div>
            <div class="fa fa-5x fa-angle-left swiper-button-prev visible-lg"></div>
        </div>
    </div>
</div>

<?php
$this->registerCssFile("https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css", [
    'depends' => [BootstrapPluginAsset::className()],
]);

$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js', ['depends' => [JqueryAsset::className()]]);

$this->registerJs('
    /*<![CDATA[*/
    $(function(){
      var mySwiper = new Swiper (".swiper-container", {
        // Optional parameters
        // direction: "vertical",
        // pagination: ".swiper-pagination",
        nextButton: ".swiper-button-next",
        prevButton: ".swiper-button-prev",
        slidesPerView: 3,
        centeredSlides: true,
        paginationClickable: true,
        spaceBetween: 15,
        autoplay: 3000,
        loop: true
      });
    });
    /*]]>*/
', $this::POS_END);
?>