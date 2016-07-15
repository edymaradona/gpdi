<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use backend\models\Parameter;

/* @var $this yii\web\View */
/* @var $model backend\models\Family */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organization-form">

    <? //php $form = ActiveForm::begin(); ?>
    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL],
        'options' => ['id' => 'form-organization-update-id', 'data-pjax' => true,]
    ]); ?>

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
        ArrayHelper::map(Parameter::find()->where('group_name = "role"')->all(), 'id', 'description')); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'report_to_id')->textInput() ?>

    <?= $form->field($model, 'status_id')->dropDownList(
        ArrayHelper::map(Parameter::find()->where('group_name = "status"')->all(), 'id', 'description')); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
