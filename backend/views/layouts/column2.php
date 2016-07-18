<?php

use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
?>

<?php $this->beginContent('@app/views/layouts/baseLayout.php'); ?>


<?php //$this->renderPartial('//layouts/_notification'); ?>

<div class="container">
    <?= $this->renderFile('@app/views/layouts/_breadcrumb.php'); ?>

    <?= $this->renderFile('@app/views/layouts/_alert.php'); ?>
    <?= $this->renderFile('@app/views/layouts/_growl.php'); ?>

    <div class="row">
        <div class="col-md-9">
            <?= $content; ?>
        </div>
        <div class="col-md-3">
            <?= $this->renderFile('@app/views/layouts/_sbRightOperationBox.php'); ?>
        </div>
    </div>
</div>


<?php $this->endContent(); ?>
