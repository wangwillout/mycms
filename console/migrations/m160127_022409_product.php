<?php
use yii\db\Schema;
use console\migrations\Migration;

class m160127_022409_product extends Migration
{
    public function up()
    {
        $this->createTable('{{%product}}', [
            'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT "商品                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     id"',
            0 => 'PRIMARY KEY (`id`)',
            'category_id' => 'INT(11) NOT NULL COMMENT "分类"',
            'name' => 'VARCHAR(100) NOT NULL COMMENT "商品名称"',
            'sku_id' => 'INT(11) NOT NULL COMMENT "sku"',
            'stock' => 'INT(11) NOT NULL COMMENT "库存"',
            'weight' => 'DECIMAL(10,3) NOT NULL COMMENT "重量"',
            'market_price' => 'DECIMAL(10,2) NOT NULL COMMENT "市场价"',
            'price' => 'DECIMAL(10,2) NOT NULL COMMENT "商城价"',
            'brief' => 'VARCHAR(150) NULL DEFAULT "" COMMENT "简述"',
            'content' => 'TEXT NULL COMMENT "内容"',
            'description' => 'TEXT NULL COMMENT "描述"',
            'thumb' => 'VARCHAR(255)  NULL DEFAULT "" COMMENT "商品图片"',
            'keywords' => 'VARCHAR(100) NULL DEFAULT "" COMMENT "关键词"',
            'type' => 'INT(11) NOT NULL COMMENT "类型（1、新品 2、热销 3、赠品 4、促销 5、团购）"',
            'brand_id' => 'INT(11) NOT NULL COMMENT "品牌"', 
            'star' =>'DECIMAL(11,2) NULL DEFAULT "5.0" COMMENT "评分星级"',
            'status' => 'TINYINT(4) NOT NULL  COMMENT "状态(0、禁用 1、启用)"',
            'create_time' => 'INT(11) UNSIGNED NULL DEFAULT "0" COMMENT "创建时间"',
            'update_time' => 'INT(11) UNSIGNED NULL DEFAULT "0" COMMENT "修改时间"',
        ], $this->tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%product}}');
    }

}
