<?php

namespace app\controllers;

class ProductController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\Product';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
