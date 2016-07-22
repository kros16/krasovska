<?php if( isset($category['children']) ): ?>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $category['title'] ?><span class="caret"></span></a>
        <ul class="dropdown-menu">
            <?= $this->getMenuHtml($category['children']); ?>
        </ul>
    </li>
<?php else: ?>
    <li><a href="<?= \yii\helpers\Url::to(['category/view', 'alias' => $category['alias']]) ?>"><?= $category['title'] ?></a></li>
<?php endif; ?>