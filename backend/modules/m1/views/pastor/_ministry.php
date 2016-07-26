<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use backend\modules\m1\models\searchs\MinistrySearch;
use backend\modules\m1\models\Parameter;
use kartik\widgets\DatePicker;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\m1\models\searchs\MinistrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<p>
    <?= Html::a('Pelayanan Baru', ['/m1/pastor/createministry', 'id' => $model->id],
        ['class' => 'btn btn-success modalMinistryButton']) ?>
</p>

<?php Pjax::begin(); ?>
<?= GridView::widget([
    'dataProvider' => MinistrySearch::getPastorGrid($model->id),
    //'filterModel' => $searchModel,
    'condensed' => true,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'start_date',
        'church_name',
        'ministryParent.name',
        [
            'label' => 'Daerah',
            'value' => function ($data, $key, $index, $column) {
                return $data->ministryParent->parents(1)->one()->name;
            }
        ],
        //'start_date',
        //'end_date',
        'status.description',
        'ministry_address',
        //'phone_number',
        /*[
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'church_name',
            'editableOptions' => ['formOptions' => ['action' => ['/m1/pastor/editMinistry']]],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'start_date',
            'editableOptions' => [
                'inputType' => 'widget',
                'widgetClass' => '\kartik\widgets\DatePicker',
                'formOptions' => ['action' => ['/m1/pastor/editMinistry']],
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
                'formOptions' => ['action' => ['/m1/pastor/editMinistry']],
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
                'formOptions' => ['action' => ['/m1/pastor/editMinistry']]
            ],
        ],

        /*[
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'ministry_address',
            'editableOptions' => ['formOptions' => ['action' => ['/m1/pastor/editMinistry']]],
        ],
        //'ministry_address1',
        //'ministry_address2',
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'phone_number',
            'editableOptions' => [
                'formOptions' => ['action' => ['/m1/pastor/editMinistry']],
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
                        ['/m1/pastor/updateministry', 'id' => $data['id']],
                        ['class' => 'btn btn-xs btn-default modalMinistryButton', 'title' => 'view/edit',]
                    );
                },
                'delete' => function ($url, $data, $key) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-trash"></span>',
                        ['/m1/pastor/deleteministry', 'id' => $data['id']],
                        ['class' => 'ministryDelete', 'title' => 'delete']
                    );
                },
            ]

        ],
    ],
    'id' => 'ministry-container-id',
]); ?>
<?php Pjax::end(); ?>


<?php Modal::begin([
    'header' => 'Ministry',
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
        $('.ministryDelete').on('click', function (e) {
            e.preventDefault();
            var deleteUrl = $(this).attr('href');
            if (!confirm('Are you sure you want to delete this item?')) return false;
            $.ajax({
                url: deleteUrl,
                type: 'post',
                error: function (xhr, status, error) {
                    alert('There was an error with your request.'
                        + xhr.responseText);
                }
            }).done(function (data) {
                $.pjax.reload({container: "#ministry-container-id"}); //for pjax update
            });
        });
    });
</script>