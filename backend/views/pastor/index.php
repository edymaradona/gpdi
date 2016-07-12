<?php

use kartik\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\DetailView;
use backend\models\PastorSearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PastorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Pastors';
$this->params['breadcrumbs'][] = $this->title;

$this->params['menuOperation'] = [
    'title' => 'Operation',
    'list' => [
        ['label' => 'Home', 'icon' => 'home', 'url' => ['/pastor']],
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
<div class="pastor-index">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php /*
    <p>
        <?= Html::a('Create Pastor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    */ ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            echo Html::panel([
                'heading' => Html::a($model->pastor_name, ['/pastor/view', 'id' => $model->id]),
                'body' => '<div class="panel-body">' .
                    Html::media(
                        '',
                        DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'birth_place',
                                'birth_date',
                                'gender.description',
                                //'address',
                                //'address1',
                                //'address2',
                                'handphone',
                                'email:email',
                            ],
                        ]),
                        ['/pastor/view', 'id' => $model->id],
                        '@web/images/' . $model->photo_path
                    ) . '</div>'
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
