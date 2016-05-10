<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Product".
 *
 * @property integer $id
 * @property string $name
 * @property double $price
 * @property string $description
 * @property string $date
 * @property string $brand
 * @property integer $qty
 * @property integer $categoryId
 *
 * @property OrderToProduct[] $orderToProducts
 * @property Category $category
 * @property ProductImage[] $productImages
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price', 'date', 'brand', 'qty', 'categoryId'], 'required'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['date'], 'safe'],
            [['qty', 'categoryId'], 'integer'],
            [['name', 'brand'], 'string', 'max' => 50],
            [['categoryId'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['categoryId' => 'Id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'description' => 'Description',
            'date' => 'Date',
            'brand' => 'Brand',
            'qty' => 'Количество',
            'categoryId' => 'Category ID',
            'category.name' => 'Имя категории'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderToProducts()
    {
        return $this->hasMany(OrderToProduct::className(), ['productId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'categoryId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::className(), ['productId' => 'id']);
    }
}
