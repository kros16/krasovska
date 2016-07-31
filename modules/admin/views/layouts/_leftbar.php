<?php
use yii\helpers\Url;
?>

<aside class="container-fluid <?php if(isset($_COOKIE['expanded']) AND $_COOKIE['expanded']) echo "expanded"; ?>">
    <div class=row>
        <ul id=menu>
            <li><a href="<?= Url::to(['category/index']) ?>">
                    <i class="fa fa-list fa-fw"></i><span>&nbsp;&nbsp;Категории</span></a>
                <ul>
                    <li><a href="<?= Url::to(['category/index']) ?>">Все категории</a></li>
                    <li><a href="<?= Url::to(['category/create']) ?>">Добавить</a></li>
                </ul>
            </li>
            <li><a href="<?= Url::to(['album/index']) ?>">
                    <i class="fa fa-photo fa-fw"></i><span>&nbsp;&nbsp;Альбомы</span></a>
                <ul>
                    <li><a href="<?= Url::to(['album/index']) ?>">Все альбомы</a></li>
                    <li><a href="<?= Url::to(['album/create']) ?>">Добавить</a></li>
                </ul>
            </li>

            <li><a href="#"><i class="fa fa-cogs fa-fw"></i><span>  Система</span></a>
                <ul>
                    <li><a href="<?= Url::to(['system/flush-cache']) ?>"><i class="fa fa-bolt fa-fw"></i>  Очистить кеш</a></li>
                    <li><a href="<?= Url::to(['system/clear-assets']) ?>"><i class="fa fa-trash-o fa-fw"></i>  Очистить ресурсы</a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="collaps_menu open" title="Показать/Скрыть">
                    <i class="fa fa-chevron-circle-right fa-fw"></i><span>&nbsp;&nbsp;Скрыть</span></a>
            </li>
        </ul>
    </div>
</aside>