<?php
use yii\db\Schema;
use console\migrations\Migration;

class m160129_090007_order extends Migration
{
    public function up()
    {
        $this->createTable('{{%order}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT "订单id"',
            0 => 'PRIMARY KEY (`id`)',
            'member_id' => 'INT(11) NOT NULL COMMENT "用户"',
            'sn' => 'VARCHAR(32) NOT NULL COMMENT "订单号"',
            'price' => 'DECIMAL(15,2) NOT NULL COMMENT "总价格"',
            'delivery_id' => 'INT(11) NOT NULL COMMENT "收货人id"',
            'pay_method' => 'INT(11) NOT NULL COMMENT "支付方式"',
            'pay_fee' => 'DECIMAL(10,2) NOT NULL COMMENT "支付金额"',
            'status' => 'INT(11) NOT NULL COMMENT "订单状态"',
            'ship_id' => 'INT(11) NOT NULL COMMENT "邮寄id"',
            'ship_no' => 'VARCHAR(36) NULL DEFAULT "" COMMENT "邮寄单号"',
            'ship_status' => 'TINYINT(4) NOT NULL COMMENT "邮寄状态"',
            'ship_fee' => 'DECIMAL(10,2) NULL DEFAULT "0.00" COMMENT "邮费"',
            'remark' => 'VARCHAR(255) NULL DEFAULT "" COMMENT "备注"',
            'create_time' => 'INT(11) UNSIGNED NULL DEFAULT "0" COMMENT "创建时间"',
            'pay_time' => 'INT(11) UNSIGNED NULL DEFAULT "0" COMMENT "支付时间"',
            'ship_time' => 'INT(11) UNSIGNED NULL DEFAULT "0" COMMENT "邮寄时间"',
            'finish_time' => 'INT(11) UNSIGNED NULL DEFAULT "0" COMMENT "完成时间"',
        ], $this->tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%order}}');
    }

}
