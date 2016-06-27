<?php
use yii\db\Schema;
use console\migrations\Migration;

class m160130_065524_shipment extends Migration
{
    public function up()
    {
        $this->createTable('{{%shipment}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT "邮寄id"',
            0 => 'PRIMARY KEY (`id`)',
            'name' => 'VARCHAR(50) NOT NULL COMMENT "名称"',
            'tag' => 'VARCHAR(20) NOT NULL COMMENT "标签"',
            'remark' => 'TEXT NOT NULL COMMENT "备注"',
            'status' => 'TINYINT(4) NOT NULL  COMMENT "状态(0、禁用 1、启用)"',
            'create_time' => 'INT(11) UNSIGNED NULL DEFAULT "0" COMMENT "创建时间"',
            'update_time' => 'INT(11) UNSIGNED NULL DEFAULT "0" COMMENT "修改时间"',
        ], $this->tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%shipment}}');
    }

}
