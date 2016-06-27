<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "{{%shipment}}".
 *
 * @property string $id
 * @property string $name
 * @property string $tag
 * @property string $remark
 * @property integer $status
 * @property string $create_time
 * @property string $update_time
 */
class Shipment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shipment}}';
    }

    /**
     **时间
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
            [['name', 'tag', 'remark', 'status'], 'required'],
            [['remark'], 'string'],
            [['status', 'create_time', 'update_time'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['tag'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '邮寄id'),
            'name' => Yii::t('app', '名称'),
            'tag' => Yii::t('app', '标签'),
            'remark' => Yii::t('app', '备注'),
            'status' => Yii::t('app', '状态'),
            'create_time' => Yii::t('app', '创建时间'),
            'update_time' => Yii::t('app', '修改时间'),
        ];
    }
}
