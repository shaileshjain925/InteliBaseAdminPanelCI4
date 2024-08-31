<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GroupType extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'group_type_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'group_type_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'group_type_description' => [
                'type' => 'TEXT',
                'NULL' => true
            ],
            'group_type_code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'group_type_image' => [
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
        $this->forge->addPrimaryKey('group_type_id');
        $this->forge->addUniqueKey('group_type_name');
        $this->forge->createTable('group_types', true);
    }

    public function down()
    {
        $this->forge->dropTable('group_types', true);
    }
}
