<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RoleModule extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'role_module_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'role_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'module_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('role_module_id');
        $this->forge->createTable('role_module', true);
    }

    public function down()
    {
        //
    }
}
