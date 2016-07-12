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
        ['label' => 'Delete', 'icon' => 'edit', 'url' => ['/pastor/delete', 'id' => $model->id],
            'options' => [
                'data-confirm' => 'Are you sure you want to delete this item?',
                'data-method' => 'post',
            ],
            'template' => '<a data-confirm="Are you sure you want to delete this item?" data-method="post"
                href="{url}"><span class="glyphicon glyphicon-trash"></span> &nbsp;{label}</a>'
        ],
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
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

<div class="row">
    <div class="col-md-3">
        <?= $model->getPhotoPath() ?>
    </div>
    <div class="col-md-9">
        <?= DetailView::widget([
            'model' => $model,
            'options' => ['class' => 'table table-striped table-bordered table-condensed detail-view'],
            'attributes' => [
                [
                    'name' => 'pastor_name',
                    'label' => 'Pastor Name',
                    'value' => $model->front_title . ' ' . $model->pastor_name . ', ' . $model->back_title,
                ],
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
</div>
