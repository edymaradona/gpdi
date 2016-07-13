<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use backend\models\FamilySearch;
use backend\models\Parameter;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FamilySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<br/>

<?= GridView::widget([
    'dataProvider' => FamilySearch::getPastorGrid($model->id),
    //'filterModel' => $searchModel,
    'condensed' => true,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'relation_id',
            'editableOptions' => [
                'inputType' => 'dropDownList',
                'displayValueConfig' => Parameter::getDropDown('family'),
                'data' => Parameter::getDropdown('family'),
                'formOptions' => ['action' => ['/pastor/editFamily']]
            ],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'family_name',
            'editableOptions' => ['formOptions' => ['action' => ['/pastor/editFamily']]],
            /*'editableOptions'=> function ($model, $key, $index) {
                return [
                    'header'=>'Family Name',
                    'size'=>'md',
                    'beforeInput' => function ($form, $widget) use ($model, $index) {
                        echo $form->field($model, "family_name")->widget(\kartik\widgets\DatePicker::classname(), [
                            'options' => ['id' => "family_name{$index}"]
                        ]);
                    },
                    'afterInput' => function ($form, $widget) use ($model, $index) {
                    echo $form->field($model, "[{$index}]color")->widget(\kartik\widgets\ColorInput::classname(), [
                        'options' => ['id' => "family_name_{$index}"]
                    ]);
                }
                ];
            }*/
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'birth_place',
            'editableOptions' => ['formOptions' => ['action' => ['/pastor/editFamily']]],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'birth_date',
            'editableOptions' => [
                'inputType' => 'widget',
                'widgetClass' => '\kartik\widgets\DatePicker',
                'formOptions' => ['action' => ['/pastor/editFamily']],
                'options' => [
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy'
                    ]
                ]

            ],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'gender_id',
            'editableOptions' => [
                'inputType' => 'dropDownList',
                'displayValueConfig' => Parameter::getDropDown('gender'),
                'data' => Parameter::getDropdown('gender'),
                'formOptions' => ['action' => ['/pastor/editFamily']]
            ],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'handphone',
            'editableOptions' => ['formOptions' => ['action' => ['/pastor/editFamily']]],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'email',
            'editableOptions' => [
                'formOptions' => ['action' => ['/pastor/editFamily']],
                'placement' => 'left',
            ],
        ],

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete}'
        ],
    ],
]); ?>
