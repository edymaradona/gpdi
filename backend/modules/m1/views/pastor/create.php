<?php

use yii\helpers\Html;
use backend\modules\m1\models\searchs\PastorSearch;

/* @var $this yii\web\View */
/* @var $model backend\modules\m1\models\Pastor */

$this->title = 'Create Pastor';
$this->params['breadcrumbs'][] = ['label' => 'Pastors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['menuOperation'] = [
    'title' => 'Operation',
    //'icon' => 'wrench',
    //'class' => 'primary',
    'list' => [
        ['label' => 'Home', 'icon' => 'home', 'url' => ['/m1/pastor']],
        //['label' => 'Update', 'icon' => 'edit', 'url' => ['/m1/pastor/update', 'id' => $model->id]],
        ['label' => 'Report', 'icon' => 'print', 'url' => ['/m1/pastor/report']],
    ],
];

$this->params['menuRecentlyAdded'] = PastorSearch::getRecentlyCreated();
$this->params['menuRecentlyUpdated'] = PastorSearch::getRecentlyUpdated();
$this->params['createButton'] = [
    'title' => 'Create New Pastor',
    'url' => ['/m1/pastor/create']
];

?>
<div class="pastor-create">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
