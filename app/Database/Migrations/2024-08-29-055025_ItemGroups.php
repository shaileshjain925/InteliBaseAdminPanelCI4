<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ItemGroups extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'item_group_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'item_group_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'item_group_description' => [
                'type' => 'TEXT',
                'NULL' => true
            ],
            'item_group_code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'item_group_image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'item_group_is_active' => [
                'type' => 'BOOLEAN',
                'default' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('item_group_id');
        $this->forge->addUniqueKey('item_group_name');
        $this->forge->createTable('item_groups', true);
    }

    public function down()
    {
        $this->forge->dropTable('item_groups', true);
    }
}
