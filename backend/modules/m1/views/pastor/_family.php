<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use backend\modules\m1\models\searchs\FamilySearch;
use backend\modules\m1\models\Parameter;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\m1\models\searchs\FamilySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<p>
    <?= Html::a('Anggota Keluarga Baru', ['/m1/pastor/createfamily', 'id' => $model->id],
        ['class' => 'btn btn-success modalFamilyButton']) ?>
</p>

<?php Pjax::begin(); ?>

<?= GridView::widget([
    'dataProvider' => FamilySearch::getPastorGrid($model->id),
    //'filterModel' => $searchModel,
    'condensed' => true,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

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
                        ['/m1/pastor/updatefamily', 'id' => $data['id']],
                        ['class' => 'btn btn-xs btn-default modalFamilyButton', 'title' => 'view/edit',]
                    );
                },
                'delete' => function ($url, $data, $key) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-trash"></span>',
                        ['/m1/pastor/deletefamily', 'id' => $data['id']],
                        ['class' => 'familyDelete', 'title' => 'delete']
                    );
                },
            ]

        ],
    ],
    'id' => 'family-container-id',
]); ?>
<?php Pjax::end(); ?>


<?php Modal::begin([
    'header' => 'Family',
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

        $('.familyDelete').on('click', function (e) {
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
                $.pjax.reload({container: "#family-container-id"}); //for pjax update
            });
        });
    });
</script>