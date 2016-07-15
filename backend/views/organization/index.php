<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrganizationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Organizations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Organization', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id' => 'gridview-container-id',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'parent_id',
            'start_date',
            'end_date',
            'organization_name',
            // 'description',
            // 'sk_number',
            // 'ministry_address',
            // 'ministry_address1',
            // 'ministry_address2',
            // 'phone_number',
            // 'status_id',
            // 'remark:ntext',
            // 'photo_path',
            // 'created_at',
            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete} {custom_update}',
                'buttons' => [

                    'custom_update' => function ($url, $model) {
                        // Html::a args: title, href, tag properties.
                        return Html::a('<i class="glyphicon glyphicon-pencil"></i>',
                            ['/organization/custom', 'id' => $model['id']],
                            ['class' => 'btn btn-xs btn-default modalButton', 'title' => 'view/edit',]
                        );
                    },
                ]
            ]
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>

<?php yii\bootstrap\Modal::begin([
    'header' => 'organization Update',
    'id' => 'editModalId',
    'class' => 'modal',
    'size' => 'modal-md',
]);
echo "<div class='modalContent'></div>";
yii\bootstrap\Modal::end();
?>