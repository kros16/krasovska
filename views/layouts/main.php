<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\ltAppAsset;
use yii\helpers\Url;

AppAsset::register($this);
ltAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href='https://fonts.googleapis.com/css?family=Cuprum&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header>
    <!-- BEGIN .head -->
    <div class="head">
        <a href="/"><img src="/images/logo.png" alt="Логотип"></a>
    </div>
    <!-- END .head -->

    <!-- BEGIN .navbar -->
    <nav class="navbar navbar-default menu" id="mainMenu">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainMenu-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand" href="#">Brand</a> -->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="mainMenu-collapse">
                <ul class="nav navbar-nav">
                    <li <?= Yii::$app->controller->route == Yii::$app->defaultRoute ? 'class="active"' : '' ?>><a href="/">Главная</a></li>

                    <?= \app\components\MenuWidget::widget(['tpl' => 'menu']) ?>

                    <li><a href="<?= Url::to('/site/services') ?>">Услуги</a></li>
                    <li><a href="<?= Url::to('/site/responses') ?>">Отзывы</a></li>
                    <li><a href="<?= Url::to('/site/contact') ?>">Контакты</a></li>
                </ul>
            </div> <!-- /.navbar-collapse -->
        </div> <!-- /.container-fluid -->
    </nav>
    <!-- END .navbar -->
</header>

<!-- BEGIN .content -->
<div class="content">

    <?= $content; ?>

    <hr>
    <footer>
        <ul class="social-icons">
            <li><a href="#"><img src="/images/social-icons/facebook.png" alt=""></a></li>
            <li><a href="#"><img src="/images/social-icons/twitter.png" alt=""></a></li>
            <li><a href="#"><img src="/images/social-icons/google_plus.png" alt=""></a></li>
        </ul>
        <p class="copy text-right">Krasovska.com &copy; 2016</p>
    </footer>

</div>
<!-- END .content -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
