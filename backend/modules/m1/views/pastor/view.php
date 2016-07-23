<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use backend\modules\m1\models\searchs\PastorSearch;
use kartik\tabs\TabsX;
use kartik\widgets\FileInput;
use yii\helpers\Url;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\m1\models\Pastor */

$this->title = $model->pastor_name;
$this->params['breadcrumbs'][] = ['label' => 'Pastors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['menuOperation'] = [
    'title' => 'Operation',
    //'icon' => 'wrench',
    //'class' => 'primary',
    'list' => [
        ['label' => 'Home', 'icon' => 'home', 'url' => ['/m1/pastor']],
        ['label' => 'Update', 'icon' => 'edit', 'url' => ['/m1/pastor/update', 'id' => $model->id]],
        [
            'label' => 'Delete',
            'icon' => 'edit',
            'url' => ['/m1/pastor/delete', 'id' => $model->id],
            'options' => [
                'data-confirm' => 'Are you sure you want to delete this item?',
                'data-method' => 'post',
            ],
            'template' => '<a data-confirm="Are you sure you want to delete this item?" data-method="post"
                href="{url}"><span class="glyphicon glyphicon-trash"></span> &nbsp;{label}</a>'
        ],
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
    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-3">
            <?= $model->getPhotoPath() ?>
            <?php $form = ActiveForm::begin([
                'type' => ActiveForm::TYPE_INLINE,
                'options' => ['enctype' => 'multipart/form-data'],
                'action' => Url::to(['upload', 'id' => $model->id])
            ]) ?>

            <?= $form->field($model, 'imageFile')->fileInput() ?>
            <?= Html::submitButton('Upload', ['class' => 'btn btn-primary btn-xs']) ?>

            <?php ActiveForm::end() ?>


        </div>
        <div class="col-md-9">
            <?= DetailView::widget([
                'model' => $model,
                //'condensed'=>true,
                'hover' => true,
                'mode' => DetailView::MODE_VIEW,
                'enableEditMode' => false,
                'attributes' => [
                    [
                        'name' => 'pastor_name',
                        'label' => 'Nama Gembala',
                        'value' => $model->front_title . ' ' . $model->pastor_name . ', ' . $model->back_title,
                    ],
                    [
                        'label' => 'Nama Gereja',
                        'value' => isset($model->ministry) ? $model->ministry->church_name : '',
                    ],
                    [
                        'label' => 'Wilayah',
                        'value' => isset($model->ministry) ? $model->ministry->ministryParent->name : '',
                    ],
                    [
                        'label' => 'Daerah',
                        'value' => isset($model->ministry) ? $model->ministry->ministryParent->parents(1)->one()->name : '',
                    ],
                    [
                        'name' => 'birth_date',
                        'label' => 'Tanggal Lahir',
                        'value' => $model->birth_place . ', ' . $model->birth_date,
                    ],
                    [
                        'name' => 'gender_id',
                        'label' => 'J. Kelamin',
                        'value' => $model->gender->description,
                    ],
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
            'label' => '<i class="glyphicon glyphicon-user"></i> Profil',
            'content' => $this->render('_profile', ['model' => $model]),
            'active' => true
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> Pelayanan',
            'content' => $this->render('_ministry', ['model' => $model]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> Kependetaan',
            'content' => $this->render('_pendeta', ['model' => $model]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-tree-conifer"></i> Organisasi',
            'content' => $this->render('_organization', ['model' => $model]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-cutlery"></i> Keluarga',
            'content' => $this->render('_family', ['model' => $model]),
        ],
    ],
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false
]);


