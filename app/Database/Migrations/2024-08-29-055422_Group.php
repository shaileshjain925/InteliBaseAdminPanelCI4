<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Group extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'group_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'group_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'group_type_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'group_description' => [
                'type' => 'TEXT',
                'NULL' => true
            ],
            'group_code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'group_image' => [
                'type' => 'VARCHAR', 
                'constraint' => 255, 
            ],
            'is_active' => [
                'type' => 'BOOLEAN',
                'default' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('group_id');
        $this->forge->addForeignKey('group_type_id', 'group_types', 'group_type_id','CASCADE','CASCADE');
        $this->forge->createTable('groups',true);
    }

    public function down()
    {
        $this->forge->dropTable('groups',true);
    }
}
