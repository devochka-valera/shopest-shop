<?php
/**
 * Created by PhpStorm.
 * User: lasko
 * Date: 04.05.2016
 * Time: 22:23
 */

namespace app\models;


use yii\db\ActiveRecord;

class ProductImage extends ActiveRecord
{
    public static function tableName()
    {
        return 'ProductImage';
    }

    public function getProduct()
    {

        return $this->hasOne(Product::className(), ['productId' => 'id']);
    }


}