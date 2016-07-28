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
/* @var $model backend\modules\m1\models\Education */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="education-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_VERTICAL,
        //'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL],
        'options' => ['id' => 'form-education-update-id', 'data-pjax' => true,]
    ]); ?>

    <?= FormGrid::widget([
        'model' => $model,
        'form' => $form,
        //'autoGenerateColumns'=>true,
        'rows' => [
            [
                'attributes' => [       // 2 column layout
                    'level_id' => [
                        'type' => Form::INPUT_DROPDOWN_LIST,
                        'items' => ArrayHelper::map(Parameter::find()->where('group_name = "education"')->all(), 'id',
                            'description')
                    ],
                ]
            ],
            [
                'attributes' => [
                    'school_name' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your school name...']
                    ],
                    'city' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your city...']
                    ],
                    'country' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your country...']
                    ],
                ]
            ],
            [
                'attributes' => [
                    'interest' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your faculty/interest...']
                    ],
                    'graduate_year' => [
                        'type' => Form::INPUT_TEXT,
                        'options' => ['placeholder' => 'Input your graduate year...']
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
