<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Parameter */

$this->title = 'Update Parameter: ' . $model->idd;
$this->params['breadcrumbs'][] = ['label' => 'Parameters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idd, 'url' => ['view', 'id' => $model->idd]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="parameter-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
