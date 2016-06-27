<?php
use yii\db\Schema;
use console\migrations\Migration;

class m160126_064832_product_category extends Migration
{
    public function up()
    {
        $this->createTable('{{%product_category}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT "分类id"',
            0 => 'PRIMARY KEY (`id`)',
            'pid' => 'INT(11) NOT NULL COMMENT "父类id"',
            'name' => 'VARCHAR(25) NOT NULL COMMENT "分类名称"',
            'display' => 'TINYINT(4) NOT NULL  COMMENT "是否显示(0、否 1、是)"',
            'sort' => 'INT(11) NOT NULL COMMENT "排序"',
            'create_time' => 'INT(11) UNSIGNED NULL DEFAULT "0" COMMENT "创建时间"',
            'update_time' => 'INT(11) UNSIGNED NULL DEFAULT "0" COMMENT "修改时间"',
        ], $this->tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%product_category}}');
    }

}
