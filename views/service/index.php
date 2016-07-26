<?php
use app\models\Service;
?>
<div class="container-fluid">
    <div class="row">
        <h2 class="text-center content-title"><span>Услуги</span></h2>
    <?php if( !empty($services) ): ?>
        <ul class="service-list row">
        <?php $i=0; foreach($services as $service): ?>
            <?php if($service->type != Service::TYPE_SINGLE) continue; ?>
            <li class="col-sm-6">
                <h3><?= $service->title ?>&nbsp;<span>-&nbsp;<?= $service->price ?>&nbsp;грн./час</span></h3>
                <?= $service->description ?>
            </li>
            <?php if( $i % 2 ): ?>
            <li class="clearfix"></li>
            <?php endif; ?>
        <?php $i++; endforeach; ?>
        </ul>

        <h3 class="text-center">Свадебная фотосъемка:</h3>

        <div class="wedding-items row">
            <?php $i=0; foreach ($services as $package ): ?>
            <?php if($package->type != Service::TYPE_PACKAGE) continue; ?>
            <div class="service-item-wrap col-sm-4 col-md-4">
                <div class="service-item">
                    <h3 class="text-center"><span>Пакет</span><br>&laquo;<?= $package->title ?>&raquo;</h3>
                    <div><?= $package->description ?></div>
                    <h3 class="text-center"><?= number_format($package->price, 0, ',', ' ') ?>&nbsp;<span>грн.</span></h3>
                </div> <!-- /.service-item -->
            </div> <!-- /.service-item-wrap -->
                <?php $i++; if( $i % 3 == 0 ): ?>
                    <div class="clearfix"></div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div> <!-- /.wedding-items -->
        <div class="clearfix"></div>
    <?php endif; ?>
    <?php if( !empty($services_info) ): ?>
        <?php foreach ($services_info as $info): ?>
        <div class="info-block">
            <hr>
            <h3><?= $info->title ?></h3>
            <?= $info->text ?>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
    </div> <!-- /.row -->
</div> <!-- /.container-fluid -->
