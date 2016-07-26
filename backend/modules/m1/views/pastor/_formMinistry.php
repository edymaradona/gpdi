<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use backend\models\Parameter;
use kartik\builder\FormGrid;
use kartik\builder\Form;
use backend\models\Organization;


/* @var $this yii\web\View */
/* @var $model backend\modules\m1\models\Family */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ministry-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_VERTICAL,
        //'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL],
        'options' => ['id' => 'form-ministry-update-id', 'data-pjax' => true,]
    ]); ?>

    <?= FormGrid::widget([
        'model' => $model,
        'form' => $form,
        //'autoGenerateColumns'=>true,
        'rows' => [
            [
                'attributes' => [       // 2 column layout
                    'start_date' => [
                        'type' => 'widget',
                        'widgetClass' => '\kartik\widgets\DatePicker',
                        'options' => [
                            'pluginOptions' => ['autoclose' => true, 'format' => 'dd-mm-yyyy',]
                        ],
                    ],
                    'end_date' => [
                        'type' => 'widget',
                        'widgetClass' => '\kartik\widgets\DatePicker',
                        'options' => [
                            'pluginOptions' => ['autoclose' => true, 'format' => 'dd-mm-yyyy',]
                        ],
                    ],
                    'status_id' => [
                        'type' => Form::INPUT_DROPDOWN_LIST,
                        'items' => ArrayHelper::map(Parameter::find()->where('group_name = "status"')->all(), 'id',
                            'description')
                    ],
                ]
            ],
            [
                'attributes' => [
                    'church_name' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your church name...']
                    ],
                    'organization_parent_id' => [
                        'type' => Form::INPUT_DROPDOWN_LIST,
                        'items' => Organization::getDropDown()
                    ],
                ]
            ],
            [
                'attributes' => [
                    'ministry_address' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your address...']
                    ],
                ]
            ],
            [
                'attributes' => [
                    'ministry_address1' => [
                        'type' => 'widget',
                        'widgetClass' => '\kartik\widgets\Typeahead',
                        'options' => [
                            'options' => ['placeholder' => 'Input your Desa/Kelurahan...'],
                            'dataset' => [
                                [
                                    'remote' => [
                                        'url' => Url::to(['pastor/acdesakelkecamatan']) . '?key=%QUERY',
                                        'wildcard' => '%QUERY'
                                    ]
                                ]
                            ]
                        ]
                    ],
                    'ministry_address2' => [
                        'type' => 'widget',
                        'widgetClass' => '\kartik\widgets\Typeahead',
                        'options' => [
                            'options' => ['placeholder' => 'Input your Desa/Kelurahan...'],
                            'dataset' => [
                                [
                                    'remote' => [
                                        'url' => Url::to(['pastor/ackabupatenkota']) . '?key=%QUERY',
                                        'wildcard' => '%QUERY'
                                    ]
                                ]
                            ]
                        ]
                    ],
                    'ministry_address3' => [
                        'type' => 'widget',
                        'widgetClass' => '\kartik\widgets\Typeahead',
                        'options' => [
                            'options' => ['placeholder' => 'Input your Desa/Kelurahan...'],
                            'dataset' => [
                                [
                                    'remote' => [
                                        'url' => Url::to(['pastor/acprovince']) . '?key=%QUERY',
                                        'wildcard' => '%QUERY'
                                    ]
                                ]
                            ]
                        ]
                    ],
                ]
            ],
            [
                'attributes' => [
                    'remark' => ['type' => Form::INPUT_TEXTAREA, 'options' => ['placeholder' => 'Input Remark...']],
                ]
            ],


        ]
    ]);

    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
