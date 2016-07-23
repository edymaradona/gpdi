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
/* @var $model backend\models\Pendeta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ministry-form">

    <? //php $form = ActiveForm::begin(); ?>
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
                    'pendeta_id' => [
                        'type' => Form::INPUT_DROPDOWN_LIST,
                        'items' => ArrayHelper::map(Parameter::find()->where('group_name = "pendeta"')->all(), 'id',
                            'description')
                    ],
                    'start_date' => [
                        'type' => 'widget',
                        'widgetClass' => '\kartik\widgets\DatePicker',
                        'options' => [
                            'pluginOptions' => ['autoclose' => true, 'format' => 'dd-mm-yyyy',]
                        ],
                    ],
                ]
            ],
            [
                'attributes' => [
                    'sk_number' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your sk number...']
                    ],
                    'event_name' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your event name...']
                    ],
                    'place' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your place...']
                    ],
                ]
            ],
            [
                'attributes' => [
                    'status_id' => [
                        'type' => Form::INPUT_DROPDOWN_LIST,
                        'items' => ArrayHelper::map(Parameter::find()->where('group_name = "status"')->all(), 'id',
                            'description')
                    ],
                    'remark' => ['type' => Form::INPUT_TEXTAREA, 'options' => ['placeholder' => 'Input Remark...']],
                ]
            ],


        ]
    ]);

    ?>

    <?php /*
    <?= $form->field($model, 'start_date')->widget(DatePicker::classname(), [
            'name' => 'start_date',
            'type' => DatePicker::TYPE_INPUT,
            //'value' => '23-Feb-1982',
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy',
            ],
        ]
    );
    ?>

    <?= $form->field($model, 'end_date')->widget(DatePicker::classname(), [
            'name' => 'end_date',
            'type' => DatePicker::TYPE_INPUT,
            //'value' => '23-Feb-1982',
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy',
            ],
        ]
    );
    ?>

    <?= $form->field($model, 'church_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sk_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ministry_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ministry_address1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ministry_address2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status_id')->dropDownList(
        ArrayHelper::map(Parameter::find()->where('group_name = "status"')->all(), 'id', 'description')); ?>

    */ ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
