<?php
/**
 * Created by PhpStorm.
 * User: peterjkambey
 * Date: 7/25/16
 * Time: 5:08 PM
 */

namespace console\controllers;

use yii\console\Controller;
use backend\models\Organization;


class HaloController extends Controller
{

    public $message;

    /*public function options()
    {
        return ['message'];
    }

    public function optionAliases()
    {
        return ['m' => 'message'];
    }*/

    public function actionIndex()
    {
        $jabar = Organization::findOne(['name' => 'MD Jabar']);
        $w8 = new Organization(['name' => 'Wilayah 8']);
        $w8->appendTo($jabar);
    }

}