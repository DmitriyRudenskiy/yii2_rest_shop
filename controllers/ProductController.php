<?php

namespace app\controllers;

class ProductController extends Controller
{
    public $modelClass = 'app\models\Product';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
