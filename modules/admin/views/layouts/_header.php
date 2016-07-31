<?php
use yii\helpers\Url;
?>

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