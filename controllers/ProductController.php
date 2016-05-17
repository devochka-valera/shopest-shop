<?php
/**
 * Created by PhpStorm.
 * User: lasko
 * Date: 30.04.2016
 * Time: 21:47
 */

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use  yii\web\Controller;
use yii\web\NotFoundHttpException;

class ProductController extends Controller
{


    public function actionIndex()
    {
        $products = Product::find()->all();
        $categories = Category::find()->all();
        return $this->render('index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function actionDetail($id)
    {
        $product = Product::findOne($id); // запрос вернет один продукт по id
        if ($product == null) {
            throw new NotFoundHttpException;
        }
        return $this->render('detail', [
            'product' => $product
        ]);


    }

    public function actionCategory($id)
    {
        $category = Category::findOne($id);
        return $this->render('category', [
            'category' => $category
        ]);
    }

}
