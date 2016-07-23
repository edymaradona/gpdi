<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\DatePicker;
use backend\models\Parameter;
use yii\helpers\ArrayHelper;
use kartik\builder\FormGrid;
use kartik\builder\Form;

/* @var $this yii\web\View */
/* @var $model backend\modules\m1\models\Family */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="family-form">

    <? //php $form = ActiveForm::begin(); ?>
    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_VERTICAL,
        //'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL],
        'options' => ['id' => 'form-family-update-id', 'data-pjax' => true,]
    ]); ?>

    <?= FormGrid::widget([
        'model' => $model,
        'form' => $form,
        //'autoGenerateColumns'=>true,
        'rows' => [
            [
                'attributes' => [
                    'relation_id' => [
                        'type' => Form::INPUT_DROPDOWN_LIST,
                        'items' => ArrayHelper::map(Parameter::find()->where('group_name = "family"')->all(), 'id',
                            'description')
                    ],
                ]
            ],
            [
                'attributes' => [
                    'family_name' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your church name...']
                    ],
                    'gender_id' => [
                        'type' => Form::INPUT_DROPDOWN_LIST,
                        'items' => ArrayHelper::map(Parameter::find()->where('group_name = "gender"')->all(), 'id',
                            'description')
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
                        'pluginOptions' => ['autoclose' => true, 'format' => 'dd-mm-yyyy',]
                    ],
                ]
            ],
            [
                'attributes' => [
                    'handphone' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your handphone number...']
                    ],
                    'email' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Input your email...']],
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

    <?php /*
    <?= $form->errorSummary($model) ?>

    <?= $form->field($model, 'relation_id')->dropDownList(
        ArrayHelper::map(Parameter::find()->where('group_name = "family"')->all(), 'id', 'description')); ?>

    <?= $form->field($model, 'family_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_date')->widget(DatePicker::classname(), [
            'name' => 'birth_date',
            'type' => DatePicker::TYPE_INPUT,
            //'value' => '23-Feb-1982',
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy',
            ],
        ]
    );
    ?>

    <?= $form->field($model, 'gender_id')->dropDownList(
        ArrayHelper::map(Parameter::find()->where('group_name = "gender"')->all(), 'id', 'description')); ?>

    <?= $form->field($model, 'handphone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>
    */ ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
