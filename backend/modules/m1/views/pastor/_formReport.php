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
/* @var $model backend\modules\m1\models\Report */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_VERTICAL,
        //'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL],
        'options' => ['id' => 'form-report-update-id', 'data-pjax' => true,]
    ]); ?>

    <?= FormGrid::widget([
        'model' => $model,
        'form' => $form,
        //'autoGenerateColumns'=>true,
        'rows' => [
            [
                'attributes' => [
                    'period' => [
                        'type' => 'widget',
                        'widgetClass' => '\kartik\widgets\DatePicker',
                        'options' => [
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyymm',
                                'startView' => 1,
                                'minViewMode' => 1
                            ]
                        ],
                    ],
                ]
            ],
            [
                'attributes' => [
                    'congregation' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input jumlah jemaat...']
                    ],
                    'sector' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input jumlah sektor...']
                    ],
                    'kom' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your sk number...']
                    ],
                    'pos_pi' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input jumlah pos PI...']
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
