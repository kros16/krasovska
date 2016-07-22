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
    <?php
    NavBar::begin([
        'brandLabel' => '',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default menu',
            'id' => 'mainMenu'
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'Портфолио', 'url' => ['/portfolio']],
            ['label' => 'Серии', 'url' => ['/series'], 'items' => [
                ['label' => 'Свадебные', 'url' => ['/series/wedding']],
                ['label' => 'Семейные', 'url' => ['/series/family']],
                ['label' => 'Разные', 'url' => ['/series/others']],
            ]],
            ['label' => 'Услуги', 'url' => ['/services']],
            ['label' => 'Отзывы', 'url' => ['/responses']],
            ['label' => 'Контакты', 'url' => ['/site/contact']],
        ],
    ]);
    NavBar::end();
    ?>
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
