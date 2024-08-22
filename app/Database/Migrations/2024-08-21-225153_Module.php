<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Module extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'module_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'module_code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'module_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('module_id');
        $this->forge->createTable('module', true);

    }

    public function down()
    {
        //
    }
}
