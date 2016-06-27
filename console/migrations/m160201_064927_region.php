<?php
use yii\db\Schema;
use console\migrations\Migration;

class m160201_064927_region extends Migration
{
    public function up()
    {
        $this->createTable('{{%region}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT "地址表id"',
            0 => 'PRIMARY KEY (`id`)',
            'parent_id' => 'INT(11) NOT NULL COMMENT "父类id"',
            'name' => 'VARCHAR(120) NOT NULL COMMENT "地区名称"',
            'type' => 'TINYINT(4) NOT NULL COMMENT "级数"',
        ], $this->tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%region}}');
    }
}
