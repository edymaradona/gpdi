<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use backend\models\MinistrySearch;
use backend\models\Parameter;
use kartik\widgets\DatePicker;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MinistrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<br/>

<?php Pjax::begin(); ?>
<?= GridView::widget([
    'dataProvider' => MinistrySearch::getPastorGrid($model->id),
    //'filterModel' => $searchModel,
    'condensed' => true,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'church_name',
        'ministryParent.organization_name',
        'ministryParent.organizationParent.organization_name',
        //'start_date',
        //'end_date',
        'status.description',
        'sk_number',
        'ministry_address',
        //'phone_number',
        /*[
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'church_name',
            'editableOptions' => ['formOptions' => ['action' => ['/pastor/editMinistry']]],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'start_date',
            'editableOptions' => [
                'inputType' => 'widget',
                'widgetClass' => '\kartik\widgets\DatePicker',
                'formOptions' => ['action' => ['/pastor/editMinistry']],
                'options' => [
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy'
                    ]
                ]

            ],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'end_date',
            'editableOptions' => [
                'inputType' => 'widget',
                'widgetClass' => '\kartik\widgets\DatePicker',
                'formOptions' => ['action' => ['/pastor/editMinistry']],
                'options' => [
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy'
                    ]
                ]

            ],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'status_id',
            'editableOptions' => [
                'inputType' => 'dropDownList',
                'displayValueConfig' => Parameter::getDropDown(),
                'data' => Parameter::getDropdown(),
                'formOptions' => ['action' => ['/pastor/editMinistry']]
            ],
        ],
        /*[
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'sk_number',
            'editableOptions' => ['formOptions' => ['action' => ['/pastor/editMinistry']]],
        ],*/

        /*[
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'ministry_address',
            'editableOptions' => ['formOptions' => ['action' => ['/pastor/editMinistry']]],
        ],
        //'ministry_address1',
        //'ministry_address2',
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'phone_number',
            'editableOptions' => [
                'formOptions' => ['action' => ['/pastor/editMinistry']],
                'placement' => 'left',
            ],
        ],*/

        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete} {custom_update}',
            'buttons' => [
                'custom_update' => function ($url, $data) {
                    // Html::a args: title, href, tag properties.
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>',
                        ['/pastor/updateministry', 'id' => $data['id']],
                        ['class' => 'btn btn-xs btn-default modalMinistryButton', 'title' => 'view/edit',]
                    );
                },
                'delete' => function ($url, $data, $key) {
                    return Html::a('<i class="glyphicon glyphicon-trash"></i>',
                        ['/pastor/deleteministry', 'id' => $data['id']],
                        ['class' => 'btn btn-xs btn-default', 'title' => 'delete',]
                    );
                },
            ]

        ],
    ],
    'id' => 'ministry-container-id',
]); ?>
<?php Pjax::end(); ?>


<?php Modal::begin([
    'header' => 'Ministry Update',
    'id' => 'editModalMinistryId',
    'class' => 'modal',
    'size' => 'modal-lg',
]);
echo "<div class='modalMinistryContent'></div>";
Modal::end();
?>

<script>
    $(function () {
        $('.modalMinistryButton').click(function (e) {
            e.preventDefault(); //for prevent default behavior of <a> tag.
            var tagname = $(this)[0].tagName;
            $('#editModalMinistryId').modal('show').find('.modalMinistryContent').load($(this).attr('href'));
        });
    });

    $(function () {
        $("body").on("beforeSubmit", "form#form-ministry-update-id", function () {
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
                    $("#editModalMinistryId").modal("toggle");
                    $.pjax.reload({container: "#ministry-container-id"}); //for pjax update
                },
                error: function () {
                    //console.log("internal server error");
                }
            });
            return false;
        });
    });
</script>