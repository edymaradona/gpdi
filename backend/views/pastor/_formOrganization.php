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
/* @var $model backend\models\Family */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organization-form">

    <? //php $form = ActiveForm::begin(); ?>
    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_VERTICAL,
        //'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL],
        'options' => ['id' => 'form-organization-update-id', 'data-pjax' => true,]
    ]); ?>

    <?= FormGrid::widget([
        'model' => $model,
        'form' => $form,
        //'autoGenerateColumns'=>true,
        'rows' => [
            [
                'attributes' => [
                    'organization_id' => [
                        'type' => Form::INPUT_DROPDOWN_LIST,
                        'items' => Organization::getDropDownAll()
                    ],
                ]
            ],
            [
                'attributes' => [       // 2 column layout
                    'start_date' => [
                        'type' => 'widget',
                        'widgetClass' => '\kartik\widgets\DatePicker',
                        'pluginOptions' => ['autoclose' => true, 'format' => 'dd-mm-yyyy',]
                    ],
                    'end_date' => [
                        'type' => 'widget',
                        'widgetClass' => '\kartik\widgets\DatePicker',
                        'pluginOptions' => ['autoclose' => true, 'format' => 'dd-mm-yyyy',]
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
                    'role_id' => [
                        'type' => Form::INPUT_DROPDOWN_LIST,
                        'items' => ArrayHelper::map(Parameter::find()->where('group_name = "jabatanorg"')->all(), 'id',
                            'description')
                    ],
                    'title' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Input your title...']],
                ]
            ],
            //[
            //    'attributes'=>[
            //'report_to_id' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Input your structure...']],
            /*'report_to_id'=>[
                'type'=>'widget',
                'widgetClass'=>'\kartik\widgets\Select2',
                //'options'=>[
                    'pluginOptions'=>[
                        'dataset' => [
                            'local' => ['1'=>'abcd','2'=>'efgh','3'=>'ijkl'],
                            'limit' => 10
                        ],
                        'options'=>[
                            'placeholder'=>'Input your Superior...'
                        ],
                    ],
                    //'options'=>[
                    //    'placeholder'=>'Input your Superior...'
                    // ],
                //],
            ]*/
            // ],
            //],

        ]
    ]);

    ?>
    <?php /*
    <?= $form->errorSummary($model) ?>

    <?= $form->field($model, 'organization_id')->textInput() ?>

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

    <?= $form->field($model, 'role_id')->dropDownList(
        ArrayHelper::map(Parameter::find()->where('group_name = "jabatanorg"')->all(), 'id', 'description')); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'report_to_id')->textInput() ?>

    <?= $form->field($model, 'status_id')->dropDownList(
        ArrayHelper::map(Parameter::find()->where('group_name = "status"')->all(), 'id', 'description')); ?>

    */ ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
