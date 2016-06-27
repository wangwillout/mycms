<?php
use yii\db\Schema;
use console\migrations\Migration;

class m160121_054752_admin extends Migration
{
    public function up()
    {
         $this->createTable('{{%admin}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT "管理员id"',
            0 => 'PRIMARY KEY (`id`)',
            'account' => 'VARCHAR(50) NOT NULL COMMENT "账号"',
            'password' => 'VARCHAR(50) NOT NULL COMMENT "密码"',
            'avatar' => 'VARCHAR(255) NOT NULL COMMENT "用户头像"',
            'description' => 'TEXT NULL  COMMENT "个人简介"',
            'is_sys' => 'TINYINT(4) NOT NULL COMMENT "是否管理员（0、否 1、是）"',
            'status' => 'TINYINT(4) NOT NULL COMMENT "状态（0、停用 1、启用）"',
            'role_id' => 'TINYINT(4) NOT NULL COMMENT "角色id"',
            'create_time' => 'INT(11) UNSIGNED NULL DEFAULT "0" COMMENT "创建时间"',
            'update_time' => 'INT(11) UNSIGNED NULL DEFAULT "0" COMMENT "修改时间"',
        ], $this->tableOptions);
    }

    public function down()
    {
         $this->dropTable('{{%admin}}');
    }

}
