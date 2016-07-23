<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang=ru>
<head>
    <meta charset=UTF-8>
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <title>Панель управления сайтом | Юлия Красовская - фотограф в г. Умань, Украина</title>
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name=description content="Панель управления сайтом">
    <meta name=keywords content="Панель управления сайтом">
    <link rel="Shortcut Icon" href="http://krasovska.com/admin/templates/images/favicon.ico" type="image/x-icon"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,400&amp;subset=latin,cyrillic' rel=stylesheet type='text/css'>
    <link rel=stylesheet href="http://krasovska.com/admin/templates/css/A.bootstrap.min.css+bootstrap-theme.min.css+font-awesome.min.css+style.css,,qv==1,Mcc.lgrHherEhn.css.pagespeed.cf.wOJwT_IN1m.css">
</head>
<body>
<footer id=footer class=container-fluid>
    <div class=row>
        <p class=left><a class=nav-active href="http://krasovska.com/admin" title="Панель управления"><i class="fa fa-home fa-fw"></i><span>Панель управления</span></a></p>
        <p class=user>
            <a href="http://krasovska.com/" title="Перейти на сайт" target=_blank><i class="fa fa-mail-forward">&nbsp;&nbsp;</i>На сайт</a>&nbsp;|&nbsp;
            <?php if(!Yii::$app->user->isGuest): ?>
            <a href="<?= Url::to(['/site/logout']) ?>" title="Выход из панели управления"><?= Yii::$app->user->identity['username'] ?> (Выход)</a>
            <?php endif; ?>
        </p>
    </div>
</footer>
<aside class="container-fluid expanded">
    <div class=row>
        <ul id=menu>
            <li><a href="http://krasovska.com/admin?view=main_slider" title="Слайдер"><i class="fa fa-play fa-fw"></i><span>&nbsp;&nbsp;Слайдер</span></a></li>
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
<main class=expand>
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
<script src="http://krasovska.com/admin/templates/js/jquery.min.js.pagespeed.jm.YSzgc-BSX9.js"></script>
<script src="http://krasovska.com/admin/templates/js/jquery-ui.min.js+jquery.cookie.js+workscripts.js.pagespeed.jc.OQVcTIdyGh.js"></script>

</body>
</html>