<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ItemSubGroups extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'item_sub_group_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'item_sub_group_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'item_group_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'item_sub_group_description' => [
                'type' => 'TEXT',
                'NULL' => true
            ],
            'item_sub_group_code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'item_sub_group_image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'item_sub_group_is_active' => [
                'type' => 'BOOLEAN',
                'default' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('item_sub_group_id');
        $this->forge->addForeignKey('item_group_id', 'item_groups', 'item_group_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('item_sub_groups', true);
    }

    public function down()
    {
        $this->forge->dropTable('item_sub_groups', true);
    }
}
