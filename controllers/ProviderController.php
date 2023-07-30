<?php

namespace app\controllers;

class ProviderController extends Controller
{
    public $modelClass = 'app\models\Provider';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
