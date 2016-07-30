<?php if($category['parent_id'] != $parent_id): ?>
    <option
        value="<?= $category['id'] ?>"
        <?php if($category['id'] == $this->model->parent_id) echo ' selected'; ?>
        <?php if($category['id'] == $this->model->id) echo ' disabled'; ?>
        ><?= $tab . $category['title'] ?></option>
<?php endif; ?>

<?php if( isset($category['children']) ): ?>

    <?php
        if ($category['id'] == $this->model->id)
            $parent_id = $category['id'];
        elseif ($category['parent_id'] == $this->model->id)
            $parent_id = $category['id'];
    ?>

    <?= $this->getMenuHtml($category['children'], $tab . '-', $parent_id); ?>

<?php endif; ?>
