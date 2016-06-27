<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%delivery_address}}".
 *
 * @property string $id
 * @property integer $member_id
 * @property string $consignee
 * @property integer $country_id
 * @property integer $province_id
 * @property integer $city_id
 * @property integer $district_id
 * @property string $zipcode
 * @property string $mobile
 * @property integer $is_default
 * @property string $email
 * @property string $country
 * @property string $province
 * @property string $city
 * @property string $district
 * @property string $address
 * @property integer $is_del
 * @property string $create_time
 * @property string $update_time
 */
class DeliveryAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%delivery_address}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['member_id', 'consignee', 'country_id', 'province_id', 'city_id', 'mobile', 'country', 'province', 'city', 'district', 'address'], 'required'],
            [['member_id', 'country_id', 'province_id', 'city_id', 'district_id', 'is_default', 'is_del', 'create_time', 'update_time'], 'integer'],
            [['consignee'], 'string', 'max' => 64],
            [['zipcode'], 'string', 'max' => 6],
            [['mobile'], 'string', 'max' => 11],
            [['email'], 'string', 'max' => 32],
            [['country'], 'string', 'max' => 20],
            [['province', 'city', 'district'], 'string', 'max' => 80],
            [['address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '收货人id'),
            'member_id' => Yii::t('app', '用户'),
            'consignee' => Yii::t('app', '联系人'),
            'country_id' => Yii::t('app', '国家id'),
            'province_id' => Yii::t('app', '省份id'),
            'city_id' => Yii::t('app', '市id'),
            'district_id' => Yii::t('app', '区id'),
            'zipcode' => Yii::t('app', '邮政编码'),
            'mobile' => Yii::t('app', '联系电话'),
            'is_default' => Yii::t('app', '是否默认地址'),
            'email' => Yii::t('app', '邮箱'),
            'country' => Yii::t('app', '国家'),
            'province' => Yii::t('app', '省份'),
            'city' => Yii::t('app', '市'),
            'district' => Yii::t('app', '区'),
            'address' => Yii::t('app', '详细地址'),
            'is_del' => Yii::t('app', '是否删除'),
            'create_time' => Yii::t('app', '创建时间'),
            'update_time' => Yii::t('app', '修改时间'),
        ];
    }
}
