<?php
/**
 * Created by PhpStorm.
 * User: peterjkambey
 * Date: 7/11/16
 * Time: 5:50 PM
 */

use yii\widgets\Breadcrumbs;

?>

<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>

