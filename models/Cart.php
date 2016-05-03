<?php
/**
 * Created by PhpStorm.
 * User: lasko
 * Date: 02.05.2016
 * Time: 21:35
 */
namespace app\models;

use Yii;

class Cart
{
    private $products = array();
    private static $cart; // свойство корзина

    /**
     * @return Cart
     */
    public static function instance() // создает объект корзина если его еще нет и вернет его
    {
        if (Cart::$cart == null) {
            Cart::$cart = new Cart; // обращение к статическому свойстку карт
        }
        return Cart::$cart;
    }

    private function __construct()
    {
        $session = Yii::$app->session;
        $session->open();
        if ($session->has('cart.products')) {
            $this->products = unserialize($session->get('cart.products')); // берем из сессии десериализованный объект по ключу

        }
    }

    public function add($id)
    {
        $product = Product::findOne($id); // запрос вернет один продукт по id
        $this->products[] = $product; //добавим в массив продуктов продукт
        $this->save();
    }

    public function remove($index)
    {
        unset($this->products[$index]);
        $this->save();
    }

    public function detail()
    {
        return $this->products;
    }

    public function clear()
    {
        $this->products = array();
        $this->save();

    }

    public function count()
    {
        return count($this->products);
    }

    private function save()
    {
        $session = Yii::$app->session;
        $session->set('cart.products', serialize($this->products));

    }

}