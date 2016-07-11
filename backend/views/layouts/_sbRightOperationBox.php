<?php
/**
 * Created by PhpStorm.
 * User: peterjkambey
 * Date: 7/11/16
 * Time: 5:20 PM
 */

use kartik\widgets\SideNav;

echo SideNav::widget([
    'type' => SideNav::TYPE_PRIMARY,
    'heading' => 'Options',
    'items' => [
        [
            'url' => '#',
            'label' => 'Home',
            'icon' => 'home'
        ],
        [
            'label' => 'Help',
            'icon' => 'question-sign',
            'items' => [
    ['label' => 'About', 'icon'=>'info-sign', 'url'=>'#'],
    ['label' => 'Contact', 'icon'=>'phone', 'url'=>'#'],
],
        ],
    ],
]);
