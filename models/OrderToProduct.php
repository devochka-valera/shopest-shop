<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "OrderToProduct".
 *
 * @property integer $id
 * @property integer $qty
 * @property integer $productId
 * @property integer $orderId
 *
 * @property Order $order
 * @property Product $product
 */
class OrderToProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'OrderToProduct';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['qty', 'productId', 'orderId'], 'required'],
            [['qty', 'productId', 'orderId'], 'integer'],
            [['orderId'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['orderId' => 'id']],
            [['productId'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['productId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'qty' => 'Qty',
            'productId' => 'Product ID',
            'orderId' => 'Order ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'orderId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'productId']);
    }
}
