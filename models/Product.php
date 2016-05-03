<?php
namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'Product';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['categoryId' => 'id']);
    }
}