<?php

use backend\modules\m1\models\searchs\PastorSearch;

?>


<div class="row">
    <div class="col-lg-12">
        <h2>Birthday</h2>
        <?= \yii2fullcalendar\yii2fullcalendar::widget([
            //'events' => $events,
            'events' => PastorSearch::getBirthdayToday(),
            'header' => [
                'left' => 'prev,next',
                //'left' => '',
                'center' => 'title',
                'right' => 'today',
            ],
        ]);
        ?>
    </div>
</div>

