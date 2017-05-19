<?php

class m170519_092016_table_items extends CDbMigration
{
    public function up()
    {
        $this->createTable('items', [
            'item_id' => 'pk',
            'item_name' => 'varchar(50) not null',
            'cost' => 'decimal(10,2) not null',
            'selling' => 'decimal(10,2) not null',
            'created_date' => 'datetime not null',
            'brands_brand_id' => 'int(11) not null',
        ]);
        $this->addForeignKey('FK_brands_brand_id', 'items', 'brands_brand_id', 'brands', 'brand_id');

        $this->insert('items', ['item_name' => 'Yii Development', 'cost' => 50, 'selling' => 100, 'created_date' => date('Y-m-d H:i:s'), 'brands_brand_id' => '1']);
        $this->insert('items', ['item_name' => 'Yii Development', 'cost' => 50, 'selling' => 100, 'created_date' => date('Y-m-d H:i:s'), 'brands_brand_id' => '2']);
    }

    public function down()
    {
        $this->dropTable('items');
    }
}
