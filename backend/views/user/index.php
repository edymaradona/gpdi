<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'username',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a(Html::encode($data->username), ['user/view', 'id' => $data->id]);
                },
            ],
            'defaultGroup.name',
            'email:email',
            'status',
            [
                'attribute' => 'created_at',
                'value' => function ($data) {
                    return Yii::$app->formatter->asRelativeTime($data->created_at);
                }
                ,
            ],
            [
                'attribute' => 'updated_at',
                'value' => function ($data) {
                    return Yii::$app->formatter->asRelativeTime($data->updated_at);
                }
                ,
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}{password}',
                'buttons' => [
                    'password' => function ($url, $data) {
                        // Html::a args: title, href, tag properties.
                        return Html::a('<i class="glyphicon glyphicon-user"></i>',
                            ['/user/updatepassword', 'id' => $data['id']]);
                    },
                ]
            ],
        ],
    ]); ?>
</div>
