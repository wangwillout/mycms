<?php
use yii\db\Schema;
use console\migrations\Migration;

class m160130_035301_delivery_address extends Migration
{
    public function up()
    {
        $this->createTable('{{%delivery_address}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT "收货人id"',
            0 => 'PRIMARY KEY (`id`)',
            'member_id' => 'INT(11) NOT NULL COMMENT "用户"',
            'consignee' => 'VARCHAR(64) NOT NULL COMMENT "联系人"',
            'country_id' => 'INT(11) NOT NULL COMMENT "国家id"',
            'province_id' => 'INT(11) NOT NULL COMMENT "省份id"',
            'city_id' => 'INT(11) NOT NULL COMMENT "市id"',
            'district_id' => 'INT(11) NULL DEFAULT "0" COMMENT "区id"',
            'zipcode' => 'CHAR(6) NULL DEFAULT "" COMMENT "邮政编码"',
            'mobile' => 'VARCHAR(11) NOT NULL COMMENT "联系电话"',
            'is_default' => 'TINYINT(4) NOT NULL DEFAULT "0" COMMENT "是否默认地址（0、否 1、是）"',
            'email' => 'VARCHAR(32) NULL DEFAULT "" COMMENT "邮箱"',
            'country' => 'VARCHAR(20) NOT NULL COMMENT "国家"',
            'province' => 'VARCHAR(80) NOT NULL COMMENT "省份"',
            'city' => 'VARCHAR(80) NOT NULL COMMENT "市"',
            'district' =>'VARCHAR(80) NOT NULL COMMENT "区"',
            'address' => 'VARCHAR(255) NOT NULL COMMENT "详细地址"',
            'is_del' => 'TINYINT(4) NOT NULL DEFAULT "0" COMMENT "是否删除（0、否 1、是）"',
            'create_time' => 'INT(11) UNSIGNED NULL DEFAULT "0" COMMENT "创建时间"',
            'update_time' => 'INT(11) UNSIGNED NULL DEFAULT "0" COMMENT "修改时间"',
        ], $this->tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%delivery_address}}');
    }
}
