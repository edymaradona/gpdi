<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Parameter;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Pastor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pastor-form">

    <?php
    $form = ActiveForm::begin([
        'id' => 'pastor-form-vertical',
        'type' => ActiveForm::TYPE_HORIZONTAL
    ]);
    ?>

    <?= $form->field($model, 'front_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pastor_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'back_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth_date')->widget(DatePicker::classname(), [
            'name' => 'birth_date',
            'type' => DatePicker::TYPE_INPUT,
            //'value' => '23-Feb-1982',
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
            ], ]
    );
    ?>

    <?= $form->field($model, 'gender_id')->dropDownList(
        ArrayHelper::map(Parameter::find()->where('group_name = "gender"')->all(), 'id', 'description')); ?>


    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'handphone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
