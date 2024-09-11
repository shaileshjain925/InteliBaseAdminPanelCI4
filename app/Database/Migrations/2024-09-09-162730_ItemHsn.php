<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ItemHsn extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'item_hsn_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'item_hsn_type' => [
                'type' => 'ENUM',
                'constraint' => ['HSN', 'SAC'],
                'null' => false,
                'default' => 'HSN'
            ],
            'item_hsn_code' => [
                'type' => 'INT',
                'constraint' => 8,
                'null' => false,
                'unique' => true,
            ],
            'item_hsn_description' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'item_hsn_gst' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'null' => false,
                'default' => 0
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('item_hsn_id');
        $this->forge->createTable('item_hsn', true);
    }

    public function down()
    {
        $this->forge->createTable('item_hsn', true);
    }
}
