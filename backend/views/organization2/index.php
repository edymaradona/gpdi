<?php
/**
 * Created by PhpStorm.
 * User: peterjkambey
 * Date: 7/17/16
 * Time: 12:37 AM
 */

use kartik\tree\TreeView;
use backend\models\Product;
use kartik\tree\Module;
use yii\helpers\Url;

echo TreeView::widget([
    // single query fetch to render the tree
    // use the Product model you have in the previous step
    'query' => Product::find()->addOrderBy('root, lft'),
    'headingOptions' => ['label' => 'Categories'],
    'fontAwesome' => false,     // optional
    'isAdmin' => false,         // optional (toggle to enable admin mode)
    'displayValue' => 1,        // initial display value
    'softDelete' => true,       // defaults to true
    'cacheSettings' => [
        'enableCache' => true   // defaults to true
    ],
]);
