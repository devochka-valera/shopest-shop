<?php
/**
 * Created by PhpStorm.
 * User: lasko
 * Date: 01.05.2016
 * Time: 23:42
 */

namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'Category';
    }

    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['categoryId' => 'id']);
    }
}