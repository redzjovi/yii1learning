<?php

class m170519_075634_table_users extends CDbMigration
{
    public function up()
    {
        $this->createTable('users', [
            'id' => 'pk',
            'username' => 'varchar(50) not null',
            'password' => 'varchar(32) not null',
        ]);

        $this->insert('users', ['username' => 'admin', 'password' => 'admin']);
        $this->insert('users', ['username' => 'Ann', 'password' => 'ann']);
        $this->insert('users', ['username' => 'Karen', 'password' => 'karen']);
    }

    public function down()
    {
        $this->dropTable('users');
    }

    /*
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
