<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PaymentTerms extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'payment_term_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'payment_term_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'unique' => true,
                'null'       => false,
            ],
            'payment_term_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'due_days' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,  // Default to immediate payment if not specified
            ],
            'post_due_interest_rate' => [
                'type'       => 'DECIMAL',
                'constraint' => '5,2',
                'null'       => true,
            ],
            'status' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1, // 1: Active, 0: Inactive
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('payment_term_id'); // Primary key
        $this->forge->createTable('payment_terms', true);
    }

    public function down()
    {
        $this->forge->dropTable('payment_terms', true);
    }
}
