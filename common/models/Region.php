<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%region}}".
 *
 * @property string $id
 * @property integer $parent_id
 * @property string $name
 * @property integer $type
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%region}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'name', 'type'], 'required'],
            [['parent_id', 'type'], 'integer'],
            [['name'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '地址表id'),
            'parent_id' => Yii::t('app', '父类id'),
            'name' => Yii::t('app', '地区名称'),
            'type' => Yii::t('app', '级数'),
        ];
    }
}
