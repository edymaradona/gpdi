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
/* @var $model backend\modules\m1\models\Legal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="legal-form">

    <? //php $form = ActiveForm::begin(); ?>
    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_VERTICAL,
        //'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL],
        'options' => ['id' => 'form-legal-update-id', 'data-pjax' => true,]
    ]); ?>

    <?= FormGrid::widget([
        'model' => $model,
        'form' => $form,
        //'autoGenerateColumns'=>true,
        'rows' => [
            [
                'attributes' => [       // 2 column layout
                    'type_id' => [
                        'type' => Form::INPUT_DROPDOWN_LIST,
                        'items' => ArrayHelper::map(Parameter::find()->where('group_name = "legal"')->all(), 'id',
                            'description')
                    ],
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
                ]
            ],
            [
                'attributes' => [
                    'sk_number' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your sk number...']
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
                    'description' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your description...']
                    ],
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
