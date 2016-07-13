<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\PastorSearch;
use kartik\tabs\TabsX;

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
                'handphone',
                'email:email',
            ],
        ]) ?>
    </div>
</div>

    <br/>

<?=
/*$items = [
    [
        'label'=>'<i class="glyphicon glyphicon-user"></i> Profile',
        'content'=>$this->render('_profile',['model'=>$model]),
        'active'=>true
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-user"></i> Profile',
        'content'=>$content2,
        'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/site/tabs-data'])]
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-list-alt"></i> Dropdown',
        'items'=>[
            [
                'label'=>'Option 1',
                'encode'=>false,
                'content'=>$content3,
            ],
            [
                'label'=>'Option 2',
                'encode'=>false,
                'content'=>$content4,
            ],
        ],
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-king"></i> Disabled',
        'headerOptions' => ['class'=>'disabled']
    ],
];*/

TabsX::widget([
    'items' => [
        [
            'label' => '<i class="glyphicon glyphicon-user"></i> Profile',
            'content' => $this->render('_profile', ['model' => $model]),
            'active' => true
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> Ministry',
            'content' => $this->render('_ministry', ['model' => $model]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-tree-conifer"></i> Organization',
            'content' => $this->render('_organization', ['model' => $model]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-cutlery"></i> Family',
            'content' => $this->render('_family', ['model' => $model]),
        ],
    ],
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false
]);


