<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ItemUqc extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'item_uqc_id' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
                'unique' => true
            ],
            'item_uqc_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('item_uqc_id');
        $this->forge->createTable('item_uqc', true);
    }

    public function down()
    {
        $this->forge->dropTable('item_uqc', true);
    }
}
