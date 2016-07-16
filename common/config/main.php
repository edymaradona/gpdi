<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',
            'mainLayout' => '@app/views/layouts/main.php',
            /*'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'common\models\User',
                    'idField' => 'id',
                    'fullnameField' => 'pastorLink.pastor_name',
                    'extraColumns' => [
                        [
                            'attribute' => 'full_name',
                            'label' => 'Full Name',
                            'value' => function($model, $key, $index, $column) {
                                return $model->pastorLink->pastor_name;
                            },
                        ],
                        [
                            'attribute' => 'ministry',
                            'label' => 'Ministry',
                            'value' => function($model, $key, $index, $column) {
                                return $model->pastorLink->ministry->pastor_name;
                            },
                        ],
                    //],
                    //'searchClass' => 'app\models\UserSearch'],
                //]
            ]*/
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ]

    ],

];
