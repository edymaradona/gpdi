<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Pastor */

$this->title = 'Create Pastor';
$this->params['breadcrumbs'][] = ['label' => 'Pastors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pastor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
