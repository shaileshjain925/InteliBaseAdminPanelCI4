<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PaymentTransaction extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'payment_transaction_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'payment_transaction_date' => [
                'type' => 'DATE',
                'null' => true
            ],
            'payment_transaction_no' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'v_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'payment_transaction_mode' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'payment_transaction_receive_date' => [
                'type' => 'DATE',
                'null' => true
            ],
            'payment_transaction_receive_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => true,
            ],
            'payment_transaction_remark' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'is_cancelled' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
                'null' => false,
            ],

            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('payment_transaction_id');
        $this->forge->addForeignKey('v_id', 'sales_transaction', 'v_id', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('payment_transaction', true);
    }

    public function down()
    {
        $this->forge->dropTable('payment_transaction', true);
    }
}
