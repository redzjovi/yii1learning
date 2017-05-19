<?php

class m170519_090654_table_brands extends CDbMigration
{
    public function up()
    {
        $this->createTable('brands', [
            'brand_id' => 'pk',
            'brand_name' => 'varchar(50) not null',
        ]);

        $this->insert('brands', ['brand_name' => 'CodeIgniter']);
        $this->insert('brands', ['brand_name' => 'Laravel']);
        $this->insert('brands', ['brand_name' => 'Yii']);
    }

    public function down()
    {
        $this->dropTable('brands');
    }
}