<?php
/**
 * Created by PhpStorm.
 * User: peterjkambey
 * Date: 7/17/16
 * Time: 12:31 AM
 */

namespace backend\models;

use kartik\tree\models\Tree;
use Yii;

class Product extends Tree
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organization2';
    }

    /**
     * Override isDisabled method if you need as shown in the
     * example below. You can override similarly other methods
     * like isActive, isMovable etc.
     */
    public function isDisabled()
    {
        if (Yii::$app->user->username !== 'admin') {
            return true;
        }
        return parent::isDisabled();
    }

}