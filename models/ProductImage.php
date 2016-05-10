<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "ProductImage".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property integer $productId
 *
 * @property Product $product
 */
class ProductImage extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ProductImage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'productId'], 'required'],
            [['productId'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['url'], 'string', 'max' => 255],
            [['productId'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['productId' => 'Id']],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => ['jpg','png'],'checkExtensionByMimeType'=>false],
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
            'url' => 'Url',
            'productId' => 'Product ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'productId']);
    }

    public function upload()
    {
        if ($this->validate()||true) {
            $this->imageFile->saveAs('c:\vagrant\basic\web\uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->url = '/uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            return true;
        } else {
            return false;
        }
    }
}
