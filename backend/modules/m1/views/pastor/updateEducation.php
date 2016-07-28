<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="education-update">

    <?php /*
    <?php $form = ActiveForm::begin([
            'type' => ActiveForm::TYPE_HORIZONTAL,
            'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL],
            'options'=>['id'=>'lesson-learned-form-id', 'data-pjax'=>true, ]
            ]); ?>

    <?= $form->field($model, 'lot_allow_in')->checkbox() ?>
    
    <?= $form->field($model, 'lot_allow_out')->checkbox() ?>
    
    <div class="form-group">
    <div class="col-sm-offset-2 col-sm-9">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('afo', 'Create') : Yii::t('afo', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    </div>

    <?php ActiveForm::end(); ?>
*/ ?>
    <?= $this->render('_formEducation', [
        'model' => $model,
    ]) ?>

</div>
