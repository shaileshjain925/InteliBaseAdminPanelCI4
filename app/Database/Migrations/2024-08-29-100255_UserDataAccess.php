<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserDataAccess extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_data_access_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'user_data_access_type'=>[
                'type'=>'VARCHAR',
                'constraint'=>255,
                'null' => false
            ],
            'record_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
           
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('user_data_access_id');
        $this->forge->addForeignKey('user_id', 'users', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_data_access', true);
    }

    public function down()
    {
        $this->forge->dropTable('user_data_access', true);
    }
}
