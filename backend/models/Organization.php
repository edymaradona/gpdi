<?php

namespace backend\models;

use Yii;

class Organization extends \kartik\tree\models\Tree
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organization';
    }

    public static function getDropDown()
    {
        $list = [];
        $md = Organization::findOne(['name' => 'MP']);
        $children = $md->children(1)->all();
        foreach ($children as $child) {
            foreach ($child->children(1)->all() as $c) {
                $list[$child->name][$c->id] = $c->name;
            }
        }

        return $list;

    }

    public static function getDropDownAll()
    {
        $list = [];
        $md = Organization::findOne(['name' => 'MP']);
        $children = $md->children(1)->all();

        foreach ($children as $child) {
            $list['MP'][$child->id] = $child->name;
        }

        foreach ($children as $child) {
            foreach ($child->children(1)->all() as $c) {
                $list[$child->name][$c->id] = $c->name;
            }
        }

        return $list;

    }

    /**
     * Override isDisabled method if you need as shown in the
     * example below. You can override similarly other methods
     * like isActive, isMovable etc.
     */
    public function isDisabled()
    {
        if (Yii::$app->user->id !== 1) {
            return true;
        }
        return parent::isDisabled();
    }

}



