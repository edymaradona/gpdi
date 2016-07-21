<?php


?>


<div class="row">
    <div class="col-lg-12">
        <h2>Birthday</h2>
        <?php
        $events = array();
        //Testing
        $Event['id'] = 1;
        $Event['title'] = 'Someone bithday';
        $Event['start'] = date('Y-m-d\Th:m:s\Z');
        $events[] = $Event;


        ?>

        <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
            'events' => $events,
        ));
        ?>
    </div>
</div>

