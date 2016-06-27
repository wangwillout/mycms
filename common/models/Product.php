<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property string $id
 * @property integer $category_id
 * @property string $name
 * @property integer $sku_id
 * @property integer $stock
 * @property string $weight
 * @property string $market_price
 * @property string $price
 * @property string $brief
 * @property string $content
 * @property string $description
 * @property string $thumb
 * @property string $keywords
 * @property integer $type
 * @property integer $brand_id
 * @property string $star
 * @property integer $status
 * @property string $create_time
 * @property string $update_time
 */
class Product extends \yii\db\ActiveRecord
{
    public $thumb_file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'sku_id', 'stock', 'weight', 'market_price', 'price', 'type', 'brand_id', 'status'], 'required'],
            [['category_id', 'sku_id', 'stock', 'type', 'brand_id', 'status', 'create_time', 'update_time'], 'integer'],
            [['weight', 'market_price', 'price', 'star'], 'number'],
            [['content', 'description'], 'string'],
            [['name', 'keywords'], 'string', 'max' => 100],
            [['brief'], 'string', 'max' => 150],
            [['thumb'], 'string', 'max' => 255],
            [['thumb_file'],'safe'],
        ];
    }

     /**
     **图片上传
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_time',
                'updatedAtAttribute' => 'update_time',
            ],
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'thumb_file',
                'pathAttribute' => 'thumb',
                'baseUrlAttribute' => false,
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '商品                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              '),
            'category_id' => Yii::t('app', '分类'),
            'name' => Yii::t('app', '商品名称'),
            'sku_id' => Yii::t('app', 'sku'),
            'stock' => Yii::t('app', '库存'),
            'weight' => Yii::t('app', '重量'),
            'market_price' => Yii::t('app', '市场价'),
            'price' => Yii::t('app', '商城价'),
            'brief' => Yii::t('app', '简述'),
            'content' => Yii::t('app', '内容'),
            'description' => Yii::t('app', '描述'),
            'thumb' => Yii::t('app', '商品图片'),
            'thumb_file' => Yii::t('app', '商品图片'),
            'keywords' => Yii::t('app', '关键词'),
            'type' => Yii::t('app', '类型'),
            'brand_id' => Yii::t('app', '品牌'),
            'star' => Yii::t('app', '评分星级'),
            'status' => Yii::t('app', '状态'),
            'create_time' => Yii::t('app', '创建时间'),
            'update_time' => Yii::t('app', '修改时间'),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function getTypeList($type = null){
         $data= [
            '1'=>'新品',
            '2'=>'热销',
            '3'=>'赠品',
            '4'=>'促销',
            '5'=>'团购',
        ];
        return empty($type)?$data:$data[$type];
    }

}
