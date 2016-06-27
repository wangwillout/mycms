<?php
use yii\db\Schema;
use console\migrations\Migration;

class m160127_090754_product_sku extends Migration
{
    public function up()
    {
        $this->createTable('{{%product_sku}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT "sku"',
            0 => 'PRIMARY KEY (`id`)',
            'name' => 'VARCHAR(25) NOT NULL COMMENT "属性名称"',
            'category_id' => 'INT(11) NOT NULL COMMENT "分类"',
            'status' => 'TINYINT(4) NOT NULL  COMMENT "状态(0、禁用 1、启用)"',
            'sort' => 'INT(11) NOT NULL COMMENT "排序"',
            'create_time' => 'INT(11) UNSIGNED NULL DEFAULT "0" COMMENT "创建时间"',
            'update_time' => 'INT(11) UNSIGNED NULL DEFAULT "0" COMMENT "修改时间"',
        ], $this->tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%product_sku}}');
    }
}
