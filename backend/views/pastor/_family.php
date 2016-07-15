<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use backend\models\FamilySearch;
use backend\models\Parameter;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FamilySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<br/>

<?php Pjax::begin(); ?>

<?= GridView::widget([
    'dataProvider' => FamilySearch::getPastorGrid($model->id),
    //'filterModel' => $searchModel,
    'condensed' => true,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        /*[
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'relation_id',
            'editableOptions' => [
                'inputType' => 'dropDownList',
                'displayValueConfig' => Parameter::getDropDown('family'),
                'data' => Parameter::getDropdown('family'),
                'formOptions' => ['action' => ['/pastor/editFamily']]
            ],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'family_name',
            'editableOptions' => ['formOptions' => ['action' => ['/pastor/editFamily']]],
            /*'editableOptions'=> function ($model, $key, $index) {
                return [
                    'header'=>'Family Name',
                    'size'=>'md',
                    'beforeInput' => function ($form, $widget) use ($model, $index) {
                        echo $form->field($model, "family_name")->widget(\kartik\widgets\DatePicker::classname(), [
                            'options' => ['id' => "family_name{$index}"]
                        ]);
                    },
                    'afterInput' => function ($form, $widget) use ($model, $index) {
                    echo $form->field($model, "[{$index}]color")->widget(\kartik\widgets\ColorInput::classname(), [
                        'options' => ['id' => "family_name_{$index}"]
                    ]);
                }
                ];
            }*/
        /*],

        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'birth_place',
            'editableOptions' => ['formOptions' => ['action' => ['/pastor/editFamily']]],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'birth_date',
            'editableOptions' => [
                'inputType' => 'widget',
                'widgetClass' => '\kartik\widgets\DatePicker',
                'formOptions' => ['action' => ['/pastor/editFamily']],
                'options' => [
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy'
                    ]
                ]

            ],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'gender_id',
            'editableOptions' => [
                'inputType' => 'dropDownList',
                'displayValueConfig' => Parameter::getDropDown('gender'),
                'data' => Parameter::getDropdown('gender'),
                'formOptions' => ['action' => ['/pastor/editFamily']]
            ],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'handphone',
            'editableOptions' => ['formOptions' => ['action' => ['/pastor/editFamily']]],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'email',
            'editableOptions' => [
                'formOptions' => ['action' => ['/pastor/editFamily']],
                'placement' => 'left',
            ],
        ],*/
        'familyRelation.description',
        'family_name',
        'birth_place',
        'birth_date',
        'gender.description',
        'handphone',
        'email',

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete} {custom_update}',
            'buttons' => [
                'custom_update' => function ($url, $data) {
                    // Html::a args: title, href, tag properties.
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>',
                        ['/pastor/updatefamily', 'id' => $data['id']],
                        ['class' => 'btn btn-xs btn-default modalFamilyButton', 'title' => 'view/edit',]
                    );
                },
                'delete' => function ($url, $data, $key) {
                    return Html::a('<i class="glyphicon glyphicon-trash"></i>',
                        ['/pastor/deletefamily', 'id' => $data['id']],
                        ['class' => 'btn btn-xs btn-default', 'title' => 'delete',]
                    );
                },
            ]

        ],
    ],
    'id' => 'family-container-id',
]); ?>
<?php Pjax::end(); ?>


<?php Modal::begin([
    'header' => 'Family Update',
    'id' => 'editModalFamilyId',
    'class' => 'modal',
    'size' => 'modal-md',
]);
echo "<div class='modalFamilyContent'></div>";
Modal::end();
?>

<script>
    $(function () {
        $('.modalFamilyButton').click(function (e) {
            e.preventDefault(); //for prevent default behavior of <a> tag.
            var tagname = $(this)[0].tagName;
            $('#editModalFamilyId').modal('show').find('.modalFamilyContent').load($(this).attr('href'));
        });
    });

    $(function () {
        $("body").on("beforeSubmit", "form#form-family-update-id", function () {
            var form = $(this);
            // return false if form still have some validation errors
            if (form.find(".has-error").length) {
                return false;
            }
            // submit form
            $.ajax({
                url: form.attr("action"),
                type: "post",
                data: form.serialize(),
                success: function (response) {
                    $("#editModalFamilyId").modal("toggle");
                    $.pjax.reload({container: "#family-container-id"}); //for pjax update
                },
                error: function () {
                    //console.log("internal server error");
                }
            });
            return false;
        });
    });
</script>
