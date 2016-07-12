<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\PastorSearch;

/* @var $this yii\web\View */
/* @var $model backend\models\Pastor */

$this->title = $model->pastor_name;
$this->params['breadcrumbs'][] = ['label' => 'Pastors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['menuOperation'] = [
    'title' => 'Operation',
    //'icon' => 'wrench',
    //'class' => 'primary',
    'list' => [
        ['label' => 'Home', 'icon' => 'home', 'url' => ['/pastor']],
        ['label' => 'Update', 'icon' => 'edit', 'url' => ['/pastor/update', 'id' => $model->id]],
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
<div class="pastor-view">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'front_title',
            'pastor_name',
            'back_title',
            'birth_place',
            'birth_date',
            'gender.description',
            'address',
            'address1',
            'address2',
            'handphone',
            'email:email',
            'remark:ntext',
        ],
    ]) ?>

</div>
