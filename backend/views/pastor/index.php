<?php

use kartik\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PastorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Pastors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pastor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pastor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            echo Html::panel([
                'heading' => 'Panel Heading',

                'body' => '<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, ' .
                    'sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>',
                'postBody' => Html::listGroup([
                    [
                        'content' => 'Cras justo odio',
                        'url' => '#',
                        'badge' => '14'
                    ],
                    [
                        'content' => 'Dapibus ac facilisis in',
                        'url' => '#',
                        'badge' => '2'
                    ],
                    [
                        'content' => 'Morbi leo risus',
                        'url' => '#',
                        'badge' => '1'
                    ],
                ], [], 'ul', 'li'),
                'footer'=> 'Panel Footer',
                'headingTitle' => true,
                'footerTitle' => true,
            ], Html::TYPE_DEFAULT);
        },
    ]) ?>

</div>
