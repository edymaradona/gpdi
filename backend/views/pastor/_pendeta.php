<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use backend\models\searchs\PendetaSearch;
use backend\models\Parameter;
use kartik\widgets\DatePicker;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\searchs\PendetaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<p>
    <?= Html::a('Kependetaan Baru', ['/pastor/creatependeta', 'id' => $model->id],
        ['class' => 'btn btn-success modalPendetaButton']) ?>
</p>

<?php Pjax::begin(); ?>
<?= GridView::widget([
    'dataProvider' => PendetaSearch::getPastorGrid($model->id),
    //'filterModel' => $searchModel,
    'condensed' => true,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'pendeta.description',
        'start_date',
        'sk_number',
        'event_name',
        'place',
        'status.description',
        'remark',


        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{delete} {custom_update}',
            'buttons' => [
                'custom_update' => function ($url, $data) {
                    // Html::a args: title, href, tag properties.
                    return Html::a('<i class="glyphicon glyphicon-pencil"></i>',
                        ['/pastor/updatependeta', 'id' => $data['id']],
                        ['class' => 'btn btn-xs btn-default modalPendetaButton', 'title' => 'view/edit',]
                    );
                },
                'delete' => function ($url, $data, $key) {
                    return Html::a('<i class="glyphicon glyphicon-trash"></i>',
                        ['/pastor/deletependeta', 'id' => $data['id']],
                        ['class' => 'btn btn-xs btn-default', 'title' => 'delete',]
                    );
                },
            ]

        ],
    ],
    'id' => 'pendeta-container-id',
]); ?>
<?php Pjax::end(); ?>


<?php Modal::begin([
    'header' => 'Pendeta Update',
    'id' => 'editModalPendetaId',
    'class' => 'modal',
    'size' => 'modal-lg',
]);
echo "<div class='modalPendetaContent'></div>";
Modal::end();
?>

<script>
    $(function () {
        $('.modalPendetaButton').click(function (e) {
            e.preventDefault(); //for prevent default behavior of <a> tag.
            var tagname = $(this)[0].tagName;
            $('#editModalPendetaId').modal('show').find('.modalPendetaContent').load($(this).attr('href'));
        });
    });

    $(function () {
        $("body").on("beforeSubmit", "form#form-pendeta-update-id", function () {
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
                    $("#editModalPendetaId").modal("toggle");
                    $.pjax.reload({container: "#pendeta-container-id"}); //for pjax update
                },
                error: function () {
                    //console.log("internal server error");
                }
            });
            return false;
        });
    });
</script>