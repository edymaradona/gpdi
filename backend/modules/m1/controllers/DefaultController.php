<?php

namespace backend\modules\m1\controllers;

use yii\web\Controller;

/**
 * Default controller for the `m1` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}