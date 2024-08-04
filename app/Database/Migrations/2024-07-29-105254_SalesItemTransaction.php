<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SalesItemTransaction extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'vitem_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'v_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => '11',
                'null' => false,
            ],
            'media_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => '11',
                'null' => true,
            ],
            'total_days' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true
            ],
            'per_day_rental_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => true,
            ],
            'total_rental_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => true,
            ],
            'mounting_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => true,
            ],
            'printing_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => true,
            ],
            'gst_percentage' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'default' => 0.00,
                'null' => true,
            ],
            'sgst_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => true,
            ],
            'cgst_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => true,
            ],

            'igst_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => true,
            ],
            'gst_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => true,
            ],
            'total_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => true,
            ],
            'voucher_discount_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => true,
            ],
            'assign_user_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => '11',
                'null' => true,
            ],
            'assign_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'assign_status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'completed'],
                'null' => true,
            ],
            'assign_remark' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'proof_remark' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'proof_image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('vitem_id');
        $this->forge->addForeignKey('v_id', 'sales_transaction', 'v_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('media_id', 'media', 'media_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('assign_user_id', 'user', 'user_id', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('sales_transaction_item', true);
    }

    public function down()
    {
        $this->forge->dropTable('sales_transaction_item', true);
    }
}
