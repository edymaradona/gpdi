<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use backend\models\OrganizationRoleSearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrganizationRoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<br/>

<?= GridView::widget([
    'dataProvider' => OrganizationRoleSearch::getPastorGrid($model->id),
    'condensed' => true,
    //'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'organization.organization_name',
        'start_date',
        'end_date',
        'role.description',
        'reportTo.pastor_name',
        'status.description',

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete}'
        ],
    ],
]); ?>
