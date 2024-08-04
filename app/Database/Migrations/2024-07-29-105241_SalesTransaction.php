<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SalesTransaction extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'v_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'v_no' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'v_type' => [
                'type' => 'ENUM',
                'constraint' => ['quotation', 'order', 'invoice'],
                'null' => false,
            ],
            'v_date' => [
                'type' => 'DATE',
                'null' => false
            ],
            'ref_type' => [
                'type' => 'ENUM',
                'constraint' => ['quotation', 'order', 'invoice'],
                'null' => true,
            ],
            'reference_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => '11',
                'null' => true,
            ],
            'reference_no' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'reference_date' => [
                'type' => 'DATE',
                'null' => true
            ],
            'party_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'constraint' => '11',
                'null' => true,
            ],
            'party_gst_no' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true
            ],
            'v_due_date' => [
                'type' => 'DATE',
                'null' => true
            ],
            'campaign_from_date' => [
                'type' => 'DATE',
                'null' => true
            ],
            'campaign_to_date' => [
                'type' => 'DATE',
                'null' => true
            ],
            'campaign_days' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true
            ],
            'sub_total_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => true,
            ],
            'discount_percentage' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => true,
            ],
            'discount_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => true,
            ],
            'sgst_total_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => true,
            ],
            'cgst_total_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => true,
            ],
            'igst_total_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => true,
            ],
            'gst_total_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => true,
            ],
            'round_off_amount' => [
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
            'v_remark' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'v_terms_condition' => [
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
        $this->forge->addPrimaryKey('v_id');
        $this->forge->addForeignKey('reference_id', 'sales_transaction', 'v_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('party_id', 'party', 'party_id', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('sales_transaction', true);
    }

    public function down()
    {
        $this->forge->dropTable('sales_transaction', true);
    }
}
