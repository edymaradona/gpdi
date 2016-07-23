<?php

use kartik\detail\DetailView;

?>

<br/>

<?=
DetailView::widget([
    'model' => $model,
    'condensed' => true,
    'hover' => true,
    'mode' => DetailView::MODE_VIEW,
    'enableEditMode' => false,
    'panel' => [
        'heading' => 'Profile',
        'type' => DetailView::TYPE_INFO,
    ],
    'attributes' => [
        'birth_place',
        'birth_date',
        //'gender.description',
        [
            'attribute' => 'gender_id',
            'value' => $model->gender->description,
            //'type'=>DetailView::INPUT_DATE
        ],
        'address',
        'address1',
        'address2',
        'handphone',
        'email:email',
        'remark:ntext',
//['attribute'=>'publish_date', 'type'=>DetailView::INPUT_DATE],
    ]
]);
?>


