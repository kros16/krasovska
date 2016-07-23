<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\modules\admin\assets\AppAdminAsset;
use app\modules\admin\assets\FontAdminAsset;
use yii\helpers\Url;

$asset = AppAdminAsset::register($this);
FontAdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?= $asset->baseUrl ?>/favicon.ico" type="image/x-icon">
    <?= Html::csrfMetaTags() ?>
    <title>Панель управления | <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<?php $this->beginBody() ?>
<footer id=footer class=container-fluid>
    <div class=row>
        <p class=left><a class=nav-active href="<?= Url::to(['/admin']) ?>" title="Панель управления"><i class="fa fa-5x fa-home fa-fw"></i><span>Панель управления</span></a></p>
        <p class=user>
            <a href="<?= Url::home() ?>" title="Перейти на сайт" target=_blank><i class="fa fa-mail-forward">&nbsp;&nbsp;</i>На сайт</a>&nbsp;|&nbsp;
            <?php if(!Yii::$app->user->isGuest): ?>
            <a href="<?= Url::to(['/site/logout']) ?>" title="Выход из панели управления"><?= Yii::$app->user->identity['username'] ?> (Выход)</a>
            <?php endif; ?>
        </p>
    </div>
</footer>
<aside class="container-fluid <?php if(isset($_COOKIE['expanded']) AND $_COOKIE['expanded']) echo "expanded"; ?>">
    <div class=row>
        <ul id=menu>
            <li><a href="http://krasovska.com/admin?view=galleries"><i class="fa fa-photo fa-fw"></i><span>&nbsp;&nbsp;Галереи</span></a>
                <ul>
                    <li><a href="http://krasovska.com/admin?view=galleries">Все галереи</a></li>
                    <li><a href="http://krasovska.com/admin?view=add_gallery">Добавить</a></li>
                </ul>
            </li>
            <li><a href="http://krasovska.com/admin?view=services"><i class="fa fa-credit-card fa-fw"></i><span>&nbsp;&nbsp;Услуги</span></a>
                <ul>
                    <li><a href="http://krasovska.com/admin?view=services">Все услуги</a></li>
                    <li><a href="http://krasovska.com/admin?view=add_service">Добавить услугу</a></li>
                    <li><a href="http://krasovska.com/admin?view=add_service&amp;service=1">Добавить пакет</a></li>
                    <li><a href="http://krasovska.com/admin?view=add_services_info">Добавить текстовый блок</a></li>
                </ul>
            </li>
            <li><a href="http://krasovska.com/admin?view=pages"><i class="fa fa-leanpub fa-fw"></i><span>&nbsp;&nbsp;Страницы</span></a>
                <ul>
                    <li><a href="http://krasovska.com/admin?view=pages">Все страницы</a></li>
                    <li><a href="http://krasovska.com/admin?view=add_page">Добавить</a></li>
                </ul>
            </li>
            <li><a href="http://krasovska.com/admin?view=contacts"><i class="fa fa-phone-square fa-fw"></i><span>&nbsp;&nbsp;Контакты</span></a>
                <ul>
                    <li><a href="http://krasovska.com/admin?view=contacts">Все контакты</a></li>
                    <li><a href="http://krasovska.com/admin?view=add_contact">Добавить контакт</a></li>
                    <li><a href="http://krasovska.com/admin?view=add_contact&amp;contact=1">Добавить страницу в социальной сети</a></li>
                </ul>
            </li>
            <li><a href="http://krasovska.com/admin?view=users"><i class="fa fa-user fa-fw"></i><span>&nbsp;&nbsp;Пользователи</span></a>
                <ul>
                    <li><a href="http://krasovska.com/admin?view=users">Все пользователи</a></li>
                    <li><a href="http://krasovska.com/admin?view=add_user">Добавить пользователя</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="collaps_menu open" title="Показать/Скрыть">
                    <i class="fa fa-chevron-circle-right fa-fw"></i><span>&nbsp;&nbsp;Скрыть</span></a></li>
        </ul>
    </div>
</aside>

<main <?php if(isset($_COOKIE['expanded']) AND $_COOKIE['expanded']) echo 'class="expand"'; ?> >
    <h2></h2>
    <div class=clearfix></div>
    <div class=content>
        <div class=content-header>
            <h2>Добро пожаловать в панель управления сайтом!</h2>
            <h3>Вы можете сразу воспользоваться ссылками ниже:</h3>
        </div>
        <div class=container-fluid>
            <div class=row>
                <div class="col-sm-4 hotlinks">
                    <p>Добавить новую</p>
                    <ul>
                        <li><i class="fa fa-photo fa-fw"></i>&nbsp;&nbsp;<a href="http://krasovska.com/admin?view=add_gallery">Галерею</a></li>
                        <li><i class="fa fa-credit-card fa-fw"></i>&nbsp;&nbsp;<a href="#">Услугу</a></li>
                        <li><i class="fa fa-leanpub fa-fw"></i>&nbsp;&nbsp;<a href="#">Страницу</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 hotlinks">
                    <p>Другие</p>
                    <ul>
                        <li><i class="fa fa-play fa-fw"></i>&nbsp;&nbsp;<a href="http://krasovska.com/admin?view=main_slider">Слайдер на главной</a></li>
                        <li><i class="fa fa-eye fa-fw"></i>&nbsp;&nbsp;<a href="http://krasovska.com/" target=_blank>Перейти на сайт</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 hotlinks">
                    <p>Страницы</p>
                    <ul>
                        <li><i class="fa fa-leanpub fa-fw"></i>&nbsp;&nbsp;<a href="http://krasovska.com/admin?view=pages">Все страницы</a></li>
                        <li><i class="fa fa-file-text-o fa-fw"></i>&nbsp;&nbsp;<a href="http://krasovska.com/admin?view=add_page">Добавить</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <p class=ver>Версия 1.0</p>
</main>
<div id=preloader><i class="fa fa-spinner fa-spin fa-4x"></i></div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>