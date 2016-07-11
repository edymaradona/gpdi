<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PastorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pastors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pastor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pastor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pastor_name',
            //'front_title',
            //'back_title',
            'birth_place',
             'birth_date',
             'gender.description',
            // 'address',
            // 'address1',
            // 'address2',
             'handphone',
             'email:email',
            // 'remark:ntext',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
