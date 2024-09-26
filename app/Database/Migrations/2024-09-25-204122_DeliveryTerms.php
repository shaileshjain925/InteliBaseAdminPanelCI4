<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DeliveryTerms extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'delivery_term_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'delivery_term_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'unique' => true,
                'null'       => false,
            ],
            'delivery_term_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'delivery_term_description' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('delivery_term_id'); // Primary key
        $this->forge->createTable('delivery_terms', true);
    }

    public function down()
    {
        $this->forge->dropTable('delivery_terms', true);
    }
}
