<?php

use yii\widgets\DetailView;

?>

<br/>

<?= DetailView::widget([
    'model' => $model,
    'options' => ['class' => 'table table-striped table-bordered table-condensed detail-view'],
    'attributes' => [
        'birth_place',
        'birth_date',
        'gender.description',
        'address',
        'address1',
        'address2',
        'handphone',
        'email:email',
        'remark:ntext',
    ],
]) ?>


