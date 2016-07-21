<?php
/**
 * Created by PhpStorm.
 * User: peterjkambey
 * Date: 7/21/16
 * Time: 2:31 PM
 */

use kartik\tree\TreeView;
use backend\models\Organization;

?>

<div class="row">
    <div class="col-md-12"
    <?php
    echo TreeView::widget([
        // single query fetch to render the tree
        // use the Product model you have in the previous step
        'query' => Organization::find()->addOrderBy('root, lft'),
        'headingOptions' => ['label' => 'Organization'],
        'fontAwesome' => false,     // optional
        'isAdmin' => true,         // optional (toggle to enable admin mode)
        'displayValue' => 1,        // initial display value
        'softDelete' => true,       // defaults to true
        'cacheSettings' => [
            'enableCache' => true   // defaults to true
        ],
        'mainTemplate' => '
                <div class="row">
                    <div class="col-sm-4">
                        {wrapper}
                    </div>
                    <div class="col-sm-8">
                        {detail}
                    </div>
                </div>            
            '
    ]);
    ?>
</div>
</div>