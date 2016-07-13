<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use backend\models\MinistrySearch;
use backend\models\Parameter;
use kartik\widgets\DatePicker;

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
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'start_date',
            'editableOptions' => [
                'inputType' => 'widget',
                'widgetClass' => '\kartik\widgets\DatePicker',
                'formOptions' => ['action' => ['/pastor/editMinistry']],
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
                'formOptions' => ['action' => ['/pastor/editMinistry']],
                'options' => [
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy'
                    ]
                ]

            ],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'status_id',
            'editableOptions' => [
                'inputType' => 'dropDownList',
                'displayValueConfig' => Parameter::getDropDown(),
                'data' => Parameter::getDropdown(),
                'formOptions' => ['action' => ['/pastor/editMinistry']]
            ],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'sk_number',
            'editableOptions' => ['formOptions' => ['action' => ['/pastor/editMinistry']]],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'ministry_address',
            'editableOptions' => ['formOptions' => ['action' => ['/pastor/editMinistry']]],
        ],
        //'ministry_address1',
        //'ministry_address2',
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'phone_number',
            'editableOptions' => [
                'formOptions' => ['action' => ['/pastor/editMinistry']],
                'placement' => 'left',
            ],
        ],

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete}'
        ],
    ],

]); ?>
