<?php

use kartik\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\DetailView;
use backend\modules\m1\models\searchs\PastorSearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\m1\models\searchs\PastorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Pastors';
$this->params['breadcrumbs'][] = $this->title;
/*$this->params['growl'] =
    \kartik\widgets\Growl::widget([
        'type' => \kartik\widgets\Growl::TYPE_SUCCESS,
        'title' => 'Well done!',
        'icon' => 'glyphicon glyphicon-ok-sign',
        'body' => 'You successfully read this important alert message.',
        'showSeparator' => true,
        'delay' => 0,
        'pluginOptions' => [
            'showProgressbar' => true,
            'placement' => [
                'from' => 'top',
                'align' => 'right',
            ]
        ]
    ]);*/

$this->params['menuOperation'] = [
    'title' => 'Operation',
    'list' => [
        ['label' => 'Home', 'icon' => 'home', 'url' => ['/m1/pastor']],
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
<div class="pastor-index">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            echo Html::panel([
                'heading' => Html::a($model->pastor_name, ['/m1/pastor/view', 'id' => $model->id]),
                'body' =>
                    Html::media(
                        '',
                        DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'ministry.church_name',
                                'ministry.ministryParent.name',
                                [
                                    'label' => 'Daerah',
                                    'name' => 'id',
                                    'value' => isset($model->ministry->id) ? $model->ministry->ministryParent->parents(1)->one()->name : '',
                                ],
                                'address',
                                //'birth_place',
                                'birth_date',
                                'gender.description',
                                //'address1',
                                //'address2',
                                'handphone',
                                'email:email',
                            ],
                        ]),
                        ['/m1/pastor/view', 'id' => $model->id],
                        $model->getPhotoPathReal(), [], ['style' => 'width:150px'], [], [], ['class' => 'panel-body']
                    )
                ,
                'postBody' => Html::listGroup([
                    /*[
                        'content' => 'Cras justo odio',
                        'url' => '#',
                        'badge' => '14'
                    ],
                    [
                        'content' => 'Morbi leo risus',
                        'url' => '#',
                        'badge' => '1'
                    ],*/
                ], [], 'ul', 'li'),
                //'footer'=> 'Panel Footer',
                //'footerTitle' => true,
            ], Html::TYPE_DEFAULT);
        },
    ]) ?>

</div>
