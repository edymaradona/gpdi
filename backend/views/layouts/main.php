<?php

use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
?>

<?php $this->beginContent('@app/views/layouts/baseLayout.php'); ?>


<?php //$this->renderPartial('//layouts/_notification'); ?>

<div class="container">
    <?= $this->renderFile('@app/views/layouts/_breadcrumb.php'); ?>

    <?= $this->renderFile('@app/views/layouts/_alert.php'); ?>

    <?= $content ?>
</div>


<?php $this->endContent(); ?>
