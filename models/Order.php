<?php

namespace app\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "Order".
 *
 * @property integer $id
 * @property integer $userId
 * @property integer $statusId
 * @property string $creationDate
 * @property string $modifiedDate
 *
 * @property OrderStatus $status
 * @property User $user
 * @property OrderToProduct[] $orderToProducts
 */
class Order extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'statusId', 'creationDate', 'modifiedDate'], 'required'],
            [['userId', 'statusId'], 'integer'],
            [['creationDate', 'modifiedDate'], 'safe'],
            [['statusId'], 'exist', 'skipOnError' => true, 'targetClass' => OrderStatus::className(), 'targetAttribute' => ['statusId' => 'id']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'statusId' => 'Status ID',
            'creationDate' => 'Creation Date',
            'modifiedDate' => 'Modified Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(OrderStatus::className(), ['id' => 'statusId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderToProducts()
    {
        return $this->hasMany(OrderToProduct::className(), ['orderId' => 'id']);
    }

}
