<?php

use kartik\helpers\Html;
use yii\helpers\Url;
use backend\modules\m1\models\searchs\PastorSearch;

?>


<div class="row">
    <div class="col-lg-4">
        <?=
        Html::panel([
            'heading' => PastorSearch::getRecentlyCreated()['title'],
            'body' => '<div class="panel-body">' .
                Html::mediaList(
                    PastorSearch::getRecentlyCreated()['list']
                )
                . '</div>',
        ], PastorSearch::getRecentlyCreated()['type']);

        ?>
    </div>
    <div class="col-lg-4">
        <?=
        Html::panel([
            'heading' => PastorSearch::getRecentlyUpdated()['title'],
            'body' => '<div class="panel-body">' .
                Html::mediaList(
                    PastorSearch::getRecentlyUpdated()['list']
                )
                . '</div>',
        ], PastorSearch::getRecentlyUpdated()['type']);

        ?>
    </div>
    <div class="col-lg-4">
        <?=
        Html::panel([
            'heading' => 'Activity',
            'body' => '<div class="panel-body">' . '</div>',
        ], 'info');

        ?>
    </div>
</div>

