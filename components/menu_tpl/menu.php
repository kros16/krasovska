<?php
use app\models\Category;
?>
<?php if( $category['visible'] == Category::VISIBLE_ON ): ?>

    <?php if( isset($category['children']) ): ?>
        <li class="dropdown <?php if($category['parent_id']) echo ' dropdown-submenu' ?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $category['title'] ?><?php if(!$category['parent_id']) echo '<span class="caret"></span>' ?></a>
            <ul class="dropdown-menu">
                <?= $this->getMenuHtml($category['children']); ?>
            </ul>
        </li>
    <?php else: ?>
        <li><a href="<?= \yii\helpers\Url::to(['category/view', 'alias' => $category['alias']]) ?>"><?= $category['title'] ?></a></li>
    <?php endif; ?>

<?php endif; ?>