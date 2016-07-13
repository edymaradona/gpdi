<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\FamilySearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FamilySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<br/>

<?= GridView::widget([
    'dataProvider' => FamilySearch::getPastorGrid($model->id),
    //'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'familyRelation.description',
        'family_name',
        'birth_place',
        'birth_date',
        'gender.description',
        'handphone',
        'email:email',
        //'remark:ntext',
        //'photo_path',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>
