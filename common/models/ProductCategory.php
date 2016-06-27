<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "{{%product_category}}".
 *
 * @property integer $id
 * @property integer $pid
 * @property string $name
 * @property integer $display
 * @property integer $sort
 * @property integer $create_time
 * @property integer $update_time
 */
class ProductCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_category}}';
    }

      /**
     **
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
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'display', 'sort', 'create_time', 'update_time'], 'integer'],
            [['name','pid','display','sort'], 'required'],
            [['sort'],'unique','message'=>'{attribute}已经被占用了'],
            [['name'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '分类id'),
            'pid' => Yii::t('app', '父类id'),
            'name' => Yii::t('app', '分类名称'),
            'display' => Yii::t('app', '是否显示'),
            'sort' => Yii::t('app', '排序'),
            'create_time' => Yii::t('app', '创建时间'),
            'update_time' => Yii::t('app', '修改时间'),
        ];
    }

    /**
     * 查询顶级分类
     */
    public static function getCategoryList($pid = 0){
        $query = static::find();
        $list = $query->where(['=','pid',$pid])
                ->andWhere(['=','display',1])
                ->all();
        if(!empty($list)){
            return $list;
        }
    }

    /**
     * 查询全部分类
     */
    public static function getAllCategoryList($pid = 0, $array = [], $deep = 0, $add = 2, $repeat = '－'){
        $strRepeat = '';
        if($deep > 1 ){
            for ($i=0; $i < $deep; $i++) { 
                $strRepeat .= $repeat;
            }
        }

        $newArray = array();
        foreach((array)$array as $v) {
            if ($v['pid'] == $pid) {
                $item = (array)$v;
                $item['label'] = '|－'.$strRepeat . $v['name'];
                $newArray[] = $item;

                $tempArray = self::getAllCategoryList($v['id'], $array,($deep + $add), $add, $repeat);
                if ($tempArray) {
                    $newArray = array_merge($newArray,$tempArray);
                }
            }
        }
        return $newArray;
    }

}
