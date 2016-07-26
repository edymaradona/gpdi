<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use backend\models\Parameter;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\searchs\ParameterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parameters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parameter-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Parameter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        //'showPageSummary'=>true,
        'pjax' => true,
        'hover' => true,
        'toolbar' => false,
        'panel' => ['type' => 'primary', 'heading' => 'Parameter Grouping'],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'group_name',
            [
                'attribute' => 'group_name',
                'width' => '310px',
                'value' => function ($model, $key, $index, $widget) {
                    return $model->group_name;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(Parameter::find()->orderBy('group_name')->distinct(true)->asArray()->all(),
                    'group_name', 'group_name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Any group name'],
                'group' => true,  // enable grouping
            ],
            'id',
            'description',
            'status_id',
            // 'created_at',
            // 'updated_at',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
