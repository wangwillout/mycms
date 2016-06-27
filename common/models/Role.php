<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "{{%role}}".
 *
 * @property string $id
 * @property string $name
 * @property string $remark
 * @property integer $status
 * @property string $permission
 * @property string $create_time
 * @property string $update_time
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['status', 'create_time', 'update_time'], 'integer'],
            [['permission'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['remark'], 'string', 'max' => 100],
        ];
    }

     /**
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
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '角色id'),
            'name' => Yii::t('app', '角色名'),
            'remark' => Yii::t('app', '备注'),
            'status' => Yii::t('app', '状态'),
            'permission' => Yii::t('app', '权限值'),
            'create_time' => Yii::t('app', '创建时间'),
            'update_time' => Yii::t('app', '修改时间'),
        ];
    }
}
