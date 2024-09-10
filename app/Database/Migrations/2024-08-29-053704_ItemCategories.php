<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ItemCategories extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'item_category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'item_category_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('item_category_id');
        $this->forge->createTable('item_categories', true);
    }
    public function down()
    {
        $this->forge->dropTable('item_categories', true);   
    }
}
