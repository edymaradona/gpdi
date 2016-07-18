<?php

use yii\helpers\Html;
use backend\models\PastorSearch;

/* @var $this yii\web\View */
/* @var $model backend\models\Pastor */

$this->title = 'Create Pastor';
$this->params['breadcrumbs'][] = ['label' => 'Pastors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['menuOperation'] = [
    'title' => 'Operation',
    //'icon' => 'wrench',
    //'class' => 'primary',
    'list' => [
        ['label' => 'Home', 'icon' => 'home', 'url' => ['/pastor']],
        //['label' => 'Update', 'icon' => 'edit', 'url' => ['/pastor/update', 'id' => $model->id]],
        ['label' => 'Report', 'icon' => 'print', 'url' => ['/pastor/report']],
    ],
];

$this->params['menuRecentlyAdded'] = PastorSearch::getRecentlyCreated();
$this->params['menuRecentlyUpdated'] = PastorSearch::getRecentlyUpdated();
$this->params['createButton'] = [
    'title' => 'Create New Pastor',
    'url' => ['/pastor/create']
];

?>
<div class="pastor-create">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
