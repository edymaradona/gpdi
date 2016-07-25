<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Organization;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'fullname')->textInput() ?>

    <?php if ($model->getScenario() === 'password') : ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'password_repeat')->passwordInput() ?>
    <?php endif; ?>

    <?= $form->field($model, 'default_group_id')->dropDownList(Organization::getDropDown()); ?>
    <?= $form->field($model, 'email')->textInput() ?>
    <? //= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
