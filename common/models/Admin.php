<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use trntv\filekit\behaviors\UploadBehavior;
use common\models\Role;
use Yii;

/**
 * This is the model class for table "{{%admin}}".
 *
 * @property string $id
 * @property string $account
 * @property string $password
 * @property string $avatar
 * @property string $description
 * @property integer $is_sys
 * @property integer $status
 * @property integer $role_id
 * @property string $create_time
 * @property string $update_time
 */
class Admin extends \yii\db\ActiveRecord
{
    public $avatar_file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account', 'password','is_sys', 'status', 'role_id'], 'required'],
            [['description'], 'string'],
            [['is_sys', 'status', 'role_id', 'update_time'], 'integer'],
            [['account', 'password'], 'string', 'max' => 50],
            [['avatar'], 'string', 'max' => 255],
            [['avatar_file'],'safe']
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
                'attribute' => 'avatar_file',
                'pathAttribute' => 'avatar',
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
            'id' => Yii::t('app', '管理员id'),
            'account' => Yii::t('app', '账号'),
            'password' => Yii::t('app', '密码'),
            'avatar' => Yii::t('app', '用户头像'),
            'avatar_file' => Yii::t('app', '用户头像'),
            'description' => Yii::t('app', '个人简介'),
            'is_sys' => Yii::t('app', '是否管理员'),
            'status' => Yii::t('app', '状态'),
            'role_id' => Yii::t('app', '角色'),
            'create_time' => Yii::t('app', '创建时间'),
            'update_time' => Yii::t('app', '修改时间'),
        ];
    }

    /**查询角色
     * @inheritdoc
     */
    public static function getRoleList(){
        $roleList = Role::find()->where(['=','status',1])->all();
        if(count($roleList) > 0){
            return $roleList;
        }
    }
}
