<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use backend\modules\m1\models\searchs\LegalSearch;
use backend\modules\m1\models\Parameter;
use kartik\widgets\DatePicker;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\m1\models\searchs\LegalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<p>
    <?= Html::a('Legalitas Pelayan Baru', ['/m1/pastor/createlegal', 'id' => $model->id],
        ['class' => 'btn btn-success modalLegalButton']) ?>
</p>

<?php Pjax::begin(); ?>
<?= GridView::widget([
    'dataProvider' => LegalSearch::getPastorGrid($model->id),
    //'filterModel' => $searchModel,
    'condensed' => true,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'type.description',
        'start_date',
        'end_date',
        'sk_number',
        'description',
        'status.description',
        'remark',


        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete} {custom_update}',
            'buttons' => [
                'custom_update' => function ($url, $data) {
                    // Html::a args: title, href, tag properties.
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>',
                        ['/m1/pastor/updatelegal', 'id' => $data['id']],
                        ['class' => 'btn btn-xs btn-default modalLegalButton', 'title' => 'view/edit',]
                    );
                },
                'delete' => function ($url, $data, $key) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-trash"></span>',
                        ['/m1/pastor/deletelegal', 'id' => $data['id']],
                        ['class' => 'legalDelete', 'title' => 'delete']
                    );
                },
            ]

        ],
    ],
    'id' => 'legal-container-id',
]); ?>
<?php Pjax::end(); ?>


<?php Modal::begin([
    'header' => 'Legal Update',
    'id' => 'editModalLegalId',
    'class' => 'modal',
    'size' => 'modal-lg',
]);
echo "<div class='modalLegalContent'></div>";
Modal::end();
?>

<script>
    $(function () {
        $('.modalLegalButton').click(function (e) {
            e.preventDefault(); //for prevent default behavior of <a> tag.
            var tagname = $(this)[0].tagName;
            $('#editModalLegalId').modal('show').find('.modalLegalContent').load($(this).attr('href'));
        });
    });

    $(function () {
        $("body").on("beforeSubmit", "form#form-legal-update-id", function () {
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
                    $("#editModalLegalId").modal("toggle");
                    $.pjax.reload({container: "#legal-container-id"}); //for pjax update
                },
                error: function () {
                    //console.log("internal server error");
                }
            });
            return false;
        });
        $('.legalDelete').on('click', function (e) {
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
                $.pjax.reload({container: "#legal-container-id"}); //for pjax update
            });
        });

    });
</script>