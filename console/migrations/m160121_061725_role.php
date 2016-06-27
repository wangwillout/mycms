<?php
use yii\db\Schema;
use console\migrations\Migration;

class m160121_061725_role extends Migration
{
    public function up()
    {
        $this->createTable('{{%role}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT "角色id"',
            0 => 'PRIMARY KEY (`id`)',
            'name' => 'VARCHAR(50) NOT NULL COMMENT "角色名"',
            'remark' => 'VARCHAR(100) NULL  COMMENT "备注"',
            'status' => 'TINYINT(4) NOT NULL COMMENT "状态（0、停用 1、启用）"',
            'permission' => 'TEXT NULL COMMENT "权限值"',
            'create_time' => 'INT(11) UNSIGNED NULL DEFAULT "0" COMMENT "创建时间"',
            'update_time' => 'INT(11) UNSIGNED NULL DEFAULT "0" COMMENT "修改时间"',
        ], $this->tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%role}}');
    }
}
