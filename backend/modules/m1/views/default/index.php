<?php

use miloschuman\highcharts\Highcharts;

/* @var $this yii\web\View */

$this->title = 'Menu';
$this->params['breadcrumbs'][] = $this->title;
$this->params['alert'] =
    \kartik\widgets\Alert::widget([
        'type' => \kartik\widgets\Alert::TYPE_SUCCESS,
        'title' => 'Well done!',
        'icon' => 'glyphicon glyphicon-ok-sign',
        'body' => 'You successfully read this important alert message.',
        'showSeparator' => true,
        'delay' => 2000
    ]);


?>

<div class="site-index">

    <div class="body-content">

        <?= $this->render('_graph'); ?>
        <br/>
        <?= $this->render('_recent'); ?>
        <br/>
        <?= $this->render('_calendar'); ?>

    </div>
</div>
