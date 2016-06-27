<?php
use yii\db\Schema;
use console\migrations\Migration;

class m160126_070936_brand extends Migration
{
    public function up()
    {
        $this->createTable('{{%brand}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT "品牌id"',
            0 => 'PRIMARY KEY (`id`)',
            'name' => 'VARCHAR(25) NOT NULL COMMENT "品牌名称"',
            'logo' => 'VARCHAR(255) NOT NULL COMMENT "品牌logo"',
            'description' => 'TEXT NULL COMMENT "描述"',
            'status' => 'TINYINT(4) NOT NULL  COMMENT "状态(0、禁用 1、启用)"',
            'sort' => 'INT(11) NOT NULL COMMENT "排序"',
            'create_time' => 'INT(11) UNSIGNED NULL DEFAULT "0" COMMENT "创建时间"',
            'update_time' => 'INT(11) UNSIGNED NULL DEFAULT "0" COMMENT "修改时间"',
        ], $this->tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%brand}}');
    }

}
