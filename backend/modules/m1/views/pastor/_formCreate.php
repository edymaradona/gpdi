<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Parameter;
use kartik\widgets\DatePicker;
use kartik\widgets\Typeahead;
use yii\helpers\Url;
use kartik\builder\FormGrid;
use kartik\builder\Form;
use backend\models\Organization;

/* @var $this yii\web\View */
/* @var $model backend\modules\m1\models\Pastor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pastor-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_VERTICAL,
        //'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL],
        'options' => ['id' => 'form-update-id', 'data-pjax' => true,]
    ]); ?>

    <?= FormGrid::widget([
        'model' => $model,
        'form' => $form,
        //'autoGenerateColumns'=>true,
        'rows' => [
            [
                'attributes' => [
                    'front_title' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your sk number...']
                    ],
                    'pastor_name' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your event name...']
                    ],
                    'back_title' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your place...']
                    ],
                ]
            ],
            [
                'attributes' => [       // 2 column layout
                    'birth_place' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your birth place...']
                    ],
                    'birth_date' => [
                        'type' => 'widget',
                        'widgetClass' => '\kartik\widgets\DatePicker',
                        'options' => [
                            'pluginOptions' => ['autoclose' => true, 'format' => 'dd-mm-yyyy',]
                        ]
                    ],
                    'gender_id' => [
                        'type' => Form::INPUT_DROPDOWN_LIST,
                        'items' => ArrayHelper::map(Parameter::find()->where('group_name = "gender"')->all(), 'id',
                            'description')
                    ],
                ]
            ],
            [
                'attributes' => [
                    'address' => [
                        'type' => Form::INPUT_TEXTAREA,
                        'options' => ['placeholder' => 'Input your address...']
                    ],
                ]
            ],
            [
                'attributes' => [
                    'address1' => [
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
                    'address2' => [
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
                    'address3' => [
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
                    'pos_code' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your pos code...']
                    ],
                    'handphone' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => [
                            'placeholder' => 'Input your event name...',
                            'feedbackIcon' => [
                                'default' => 'phone',
                                'success' => 'check-circle',
                                'error' => 'exclamation-sign',
                            ]
                        ]
                    ],
                    'home_phone' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your home phone...']
                    ],
                    'email' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your email...']
                    ],
                ]
            ],
            [
                'attributes' => [
                    'remark' => ['type' => Form::INPUT_TEXTAREA, 'options' => ['placeholder' => 'Input Remark...']],
                ]
            ],
            // NEW MINISTRY
            [
                'attributes' => [       // 2 column layout
                    'start_date' => [
                        'type' => 'widget',
                        'widgetClass' => '\kartik\widgets\DatePicker',
                        'options' => [
                            'pluginOptions' => ['autoclose' => true, 'format' => 'dd-mm-yyyy',]
                        ],
                    ],
                    'organization_parent_id' => [
                        'type' => Form::INPUT_DROPDOWN_LIST,
                        'items' => Organization::getDropDown()
                    ],
                    'church_name' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your church name...']
                    ],
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
