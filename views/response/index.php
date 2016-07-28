<?php

use yii\widgets\ListView;
use yii\widgets\Pjax;

?>

<div class="container-fluid">
    <div class="row">

        <h2 class="text-center content-title"><span>Отзывы</span></h2>

        <div class="col-md-6">

            <div class="row">
                <?php Pjax::begin(); echo ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_item',
                    'summary' => false,
                ]); Pjax::end(); ?>
            </div>

        </div>

        <div class="col-md-5 col-md-offset-1">
            <div class="row">
                <h3 class="contacts-title text-center">Оставить отзыв</h3>
                <?= $this->render('_form', compact('model')); ?>
            </div>

        </div>

    </div>
</div>