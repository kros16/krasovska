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

<?php echo $this->render('_header') ?>

<?php echo $this->render('_leftbar') ?>

<main <?php if(isset($_COOKIE['expanded']) AND $_COOKIE['expanded']) echo 'class="expand"'; ?> >

    <?php echo $this->render('_notification') ?>

    <?= $content ?>

    <p class=ver>Версия 1.0</p>
</main>
<div id=preloader><i class="fa fa-spinner fa-spin fa-4x"></i></div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>