<?php
/**
 * Created by PhpStorm.
 * User: lasko
 * Date: 02.05.2016
 * Time: 21:30
 */

namespace app\controllers;


use app\models\Cart;
use Yii;
use yii\web\Controller;

class CartController extends Controller
{
    public function actionAdd($id)
    {
        Cart::instance()->add($id); // добавить в корзину
        return $this->redirect(\Yii::$app->request->referrer);

    }

    public function actionRemove($id)
    {
        Cart::instance()->remove($id); // удалить из корзины
        return $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionDetail()
    {
        $products = Cart::instance()->detail();
        return $this->render('detail', ['products' => $products]);
    }

    public function actionClear()
    {
        Cart::instance()->clear(); //очистить корзину
        return $this->actionDetail();
    }

    public function actionCheckout()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
        Cart::instance()->order(); // instance возвращает объект класса корзина. у корзины вызываем метод

        return $this->render('checkout');
    }


}