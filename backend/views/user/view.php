<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Update Password', ['updatepassword', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(($model->status == 10) ? 'Set Non Active' : 'Set Active', ['toggleactive', 'id' => $model->id], [
            'class' => 'btn btn-default',
            //'id' => 'toggleuser'
        ]) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?= DetailView::widget([
        'model' => $model,
        'id' => 'user-detail',
        'attributes' => [
            'id',
            'username',
            'fullname',
            'default_group_id',
            'email:email',
            'status',
        ],
    ]) ?>
    <?php Pjax::end(); ?>

</div>
