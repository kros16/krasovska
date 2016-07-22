<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\ltAppAsset;

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
    <?php $this->head() ?>
    <link href='https://fonts.googleapis.com/css?family=Cuprum&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
</head>
<body>
<?php $this->beginBody() ?>

<header>
    <!-- BEGIN .head -->
    <div class="head">
        <a href="#"><img src="/images/logo.png" alt="Логотип"></a>
    </div>
    <!-- END .head -->

    <!-- BEGIN .navbar -->
    <nav class="navbar navbar-default menu">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand" href="#">Brand</a> -->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active-link"><a href="index.html">Главная</a></li>
                    <li><a href="portfolio.html">Портфолио</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Серии<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Свадебные</a></li>
                            <li><a href="#">Семейные</a></li>
                            <li><a href="#">Разные</a></li>
                        </ul>
                    </li>
                    <li><a href="services.html">Услуги</a></li>
                    <li><a href="#">Отзывы</a></li>
                    <li><a href="#">Контакты</a></li>
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
