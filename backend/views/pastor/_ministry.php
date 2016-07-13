<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use backend\models\MinistrySearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MinistrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<br/>

<?= GridView::widget([
    'dataProvider' => MinistrySearch::getPastorGrid($model->id),
    //'filterModel' => $searchModel,
    'condensed' => true,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'organizationParent.organization_name',
        'start_date',
        'end_date',
        'status.description',
        'sk_number',
        'ministry_address',
        //'ministry_address1',
        //'ministry_address2',
        'phone_number',

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete}'
        ],
    ],

]); ?>
