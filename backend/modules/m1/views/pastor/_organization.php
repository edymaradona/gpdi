<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use backend\modules\m1\models\searchs\OrganizationRoleSearch;
use backend\modules\m1\models\Parameter;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\m1\models\searchs\OrganizationRoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<p>
    <?= Html::a('Jabatan Baru', ['/m1/pastor/createorganization', 'id' => $model->id],
        ['class' => 'btn btn-success modalOrganizationButton']) ?>
</p>

<?php Pjax::begin(); ?>
<?= GridView::widget([
    'dataProvider' => OrganizationRoleSearch::getPastorGrid($model->id),
    'condensed' => true,
    //'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'organization.name',
        'start_date',
        'end_date',
        'role.description',
        //'reportTo.pastor_name',
        'status.description',
        /*[
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'start_date',
            'editableOptions' => [
                'inputType' => 'widget',
                'widgetClass' => '\kartik\widgets\DatePicker',
                'formOptions' => ['action' => ['/m1/pastor/editOrganization']],
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
                'formOptions' => ['action' => ['/m1/pastor/editOrganization']],
                'options' => [
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy'
                    ]
                ]

            ],
        ],
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'role_id',
            'editableOptions' => [
                'inputType' => 'dropDownList',
                'displayValueConfig' => Parameter::getDropDown('pelayanan'),
                'data' => Parameter::getDropdown('pelayanan'),
                'formOptions' => ['action' => ['/m1/pastor/editOrganization']]
            ],
        ],
        'reportTo.pastor_name',
        [
            'class' => 'kartik\grid\EditableColumn',
            'attribute' => 'status_id',
            'editableOptions' => [
                'inputType' => 'dropDownList',
                'displayValueConfig' => Parameter::getDropDown(),
                'data' => Parameter::getDropdown(),
                'formOptions' => ['action' => ['/m1/pastor/editOrganization']],
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
                        ['/m1/pastor/updateorganization', 'id' => $data['id']],
                        ['class' => 'btn btn-xs btn-default modalOrganizationButton', 'title' => 'view/edit',]
                    );
                },
                'delete' => function ($url, $data, $key) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-trash"></span>',
                        ['/m1/pastor/deleteorganization', 'id' => $data['id']],
                        ['class' => 'organizationDelete', 'title' => 'delete']
                    );
                },
            ]

        ],
    ],
    'id' => 'organization-container-id',
]); ?>
<?php Pjax::end(); ?>


<?php Modal::begin([
    'header' => 'Organization',
    'id' => 'editModalOrganizationId',
    'class' => 'modal',
    'size' => 'modal-lg',
]);
echo "<div class='modalOrganizationContent'></div>";
Modal::end();
?>

<script>
    $(function () {
        $('.modalOrganizationButton').click(function (e) {
            e.preventDefault(); //for prevent default behavior of <a> tag.
            var tagname = $(this)[0].tagName;
            $('#editModalOrganizationId').modal('show').find('.modalOrganizationContent').load($(this).attr('href'));
        });
    });

    $(function () {
        $("body").on("beforeSubmit", "form#form-organization-update-id", function () {
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
                    $("#editModalOrganizationId").modal("toggle");
                    $.pjax.reload({container: "#organization-container-id"}); //for pjax update
                },
                error: function () {
                    //console.log("internal server error");
                }
            });
            return false;
        });
        $('.organizationDelete').on('click', function (e) {
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
                $.pjax.reload({container: "#organization-container-id"}); //for pjax update
            });
        });
    });
</script>