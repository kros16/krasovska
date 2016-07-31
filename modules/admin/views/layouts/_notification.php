<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert notification notification-success alert-dismissable" role="alert">
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="glyphicon glyphicon-ok" aria-hidden="true"></i>&nbsp;
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?>