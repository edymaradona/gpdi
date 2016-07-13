<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use backend\models\OrganizationRoleSearch;
use backend\models\Parameter;

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
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'start_date',
            'editableOptions' => [
                'inputType' => 'widget',
                'widgetClass' => '\kartik\widgets\DatePicker',
                'formOptions' => ['action' => ['/pastor/editOrganization']],
                'options' => [
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy'
                    ]
                ]

            ],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'end_date',
            'editableOptions' => [
                'inputType' => 'widget',
                'widgetClass' => '\kartik\widgets\DatePicker',
                'formOptions' => ['action' => ['/pastor/editOrganization']],
                'options' => [
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy'
                    ]
                ]

            ],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'role_id',
            'editableOptions' => [
                'inputType' => 'dropDownList',
                'displayValueConfig' => Parameter::getDropDown('pelayanan'),
                'data' => Parameter::getDropdown('pelayanan'),
                'formOptions' => ['action' => ['/pastor/editOrganization']]
            ],
        ],
        'reportTo.pastor_name',
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'status_id',
            'editableOptions' => [
                'inputType' => 'dropDownList',
                'displayValueConfig' => Parameter::getDropDown(),
                'data' => Parameter::getDropdown(),
                'formOptions' => ['action' => ['/pastor/editOrganization']],
                'placement' => 'left',
            ],
        ],

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete}'
        ],
    ],
]); ?>
