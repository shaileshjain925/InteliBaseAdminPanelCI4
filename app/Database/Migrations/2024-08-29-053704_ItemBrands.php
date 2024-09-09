<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ItemBrands extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'item_brand_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'item_brand_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'item_brand_description' => [
                'type' => 'TEXT',
                'NULL' => true
            ],
            'item_brand_code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'item_brand_image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],

            'item_brand_is_active' => [
                'type' => 'BOOLEAN',
                'default' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('item_brand_id');
        $this->forge->addUniqueKey('item_brand_name');
        $this->forge->createTable('item_brands', true);
    }

    public function down()
    {
        $this->forge->dropTable('item_brands', true);
    }
}
