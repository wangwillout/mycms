<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;

/**
 * This is the model class for table "{{%brand}}".
 *
 * @property string $id
 * @property string $name
 * @property string $logo
 * @property string $description
 * @property integer $status
 * @property integer $sort
 * @property string $create_time
 * @property string $update_time
 */
class Brand extends \yii\db\ActiveRecord
{
    public $logo_file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%brand}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','status', 'sort'], 'required'],
            [['description'], 'string'],
            [['status', 'sort', 'create_time', 'update_time'], 'integer'],
            [['sort'],'unique','message'=>'{attribute}已经被占用了'],
            [['name'], 'string', 'max' => 25],
            [['logo'], 'string', 'max' => 255],
            [['logo_file'],'safe'],
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
                'attribute' => 'logo_file',
                'pathAttribute' => 'logo',
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
            'id' => Yii::t('app', '品牌id'),
            'name' => Yii::t('app', '品牌名称'),
            'logo' => Yii::t('app', '品牌logo'),
            'logo_file' => Yii::t('app', '品牌logo'),
            'description' => Yii::t('app', '描述'),
            'status' => Yii::t('app', '状态'),
            'sort' => Yii::t('app', '排序'),
            'create_time' => Yii::t('app', '创建时间'),
            'update_time' => Yii::t('app', '修改时间'),
        ];
    }

    /**获取品牌信息
     * @inheritdoc
     */
    public static function getBrandList(){
        $query = static::find();
        $brand_list = $query->select(['id','name'])->where(['=','status',1])->orderBy('sort asc')->all();
        if(count($brand_list) > 0) {
            return $brand_list;
        }else{
            return null;
        }
    }
}
