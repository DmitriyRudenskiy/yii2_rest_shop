<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\web\Response;
use Yii;

class Controller extends ActiveController
{
    public function beforeAction($action): bool
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        Yii::$app->response->format = Response::FORMAT_JSON;
        return true;
    }
}
