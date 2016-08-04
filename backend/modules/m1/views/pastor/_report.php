<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use backend\modules\m1\models\searchs\ReportSearch;
use backend\modules\m1\models\Parameter;
use kartik\widgets\DatePicker;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\m1\models\searchs\ReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<p>
    <?= Html::a('Laporan Baru', ['/m1/pastor/createreport', 'id' => $model->id],
        ['class' => 'btn btn-success modalReportButton']) ?>
</p>

<?php Pjax::begin(); ?>
<?= GridView::widget([
    'dataProvider' => ReportSearch::getPastorGrid($model->id),
    //'filterModel' => $searchModel,
    'condensed' => true,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'period',
        'congregation',
        'sector',
        'kom',
        'pos_pi',
        //'phone_number',
        'remark:ntext',


        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete} {custom_update}',
            'buttons' => [
                'custom_update' => function ($url, $data) {
                    // Html::a args: title, href, tag properties.
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>',
                        ['/m1/pastor/updatereport', 'id' => $data['id']],
                        ['class' => 'btn btn-xs btn-default modalReportButton', 'title' => 'view/edit',]
                    );
                },
                'delete' => function ($url, $data, $key) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-trash"></span>',
                        ['/m1/pastor/deletereport', 'id' => $data['id']],
                        ['class' => 'reportDelete', 'title' => 'delete']
                    );
                },
            ]

        ],
    ],
    'id' => 'report-container-id',
]); ?>
<?php Pjax::end(); ?>


<?php Modal::begin([
    'header' => 'Report Update',
    'id' => 'editModalReportId',
    'class' => 'modal',
    'size' => 'modal-lg',
]);
echo "<div class='modalReportContent'></div>";
Modal::end();
?>

<script>
    $(function () {
        $('.modalReportButton').click(function (e) {
            e.preventDefault(); //for prevent default behavior of <a> tag.
            var tagname = $(this)[0].tagName;
            $('#editModalReportId').modal('show').find('.modalReportContent').load($(this).attr('href'));
        });
    });

    $(function () {
        $("body").on("beforeSubmit", "form#form-report-update-id", function () {
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
                    $("#editModalReportId").modal("toggle");
                    $.pjax.reload({container: "#report-container-id"}); //for pjax update
                },
                error: function () {
                    //console.log("internal server error");
                }
            });
            return false;
        });
        $('.reportDelete').on('click', function (e) {
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
                $.pjax.reload({container: "#report-container-id"}); //for pjax update
            });
        });

    });
</script>