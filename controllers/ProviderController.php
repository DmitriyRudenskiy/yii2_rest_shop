<?php

namespace app\controllers;

class ProviderController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\Provider';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
