<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Party extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'party_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'party_type' => [
                'type' => 'ENUM',
                'constraint' => ['Customer', 'Supplier'],
                'null' => false,
            ],
            'party_code' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
                'unique' => true,
            ],
            'party_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'party_email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'party_number' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => false,
            ],
            'pan_no' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],

            // Business information
            'firm_type' => [
                'type' => 'ENUM',
                'constraint' => ['PROPRIETORSHIP', 'PARTNERSHIP', 'LLP', 'PVT LTD', 'LIMITED', 'GOVT', 'ENTERPRISE', 'SEMI GOVT.ENTR', 'EOU'],
                'null' => false,
            ],
            'business_type_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'business_nature_code' => [
                'type' => 'ENUM',
                'constraint' => ['Retail', 'Wholesale', 'Stockist', 'Manufacture', 'Service'],
                'null' => false,
            ],

            // Payment, delivery, and packaging information
            'payment_term_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'delivery_term_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'estimated_days_to_deliver' => [
                'type' => 'INT',
                'default' => 0,
            ],
            'packaging_type' => [
                'type' => 'ENUM',
                'constraint' => ['Standard', 'Non-Standard'],
                'null' => false,
            ],

            // Banking details
            'bank_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'bank_no' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'bank_ifsc' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
            'bank_holder_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],

            // Additional information
            'notes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'website' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'contact_person_json_data' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            // Status
            'is_active' => [
                'type' => 'BOOLEAN',
                'default' => true,
            ],
        ]);

        $this->forge->addKey('party_id', true); // Primary key
        $this->forge->addForeignKey('payment_term_id', 'payment_terms', 'payment_term_id', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('business_type_id', 'business_types', 'business_type_id', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('delivery_term_id', 'delivery_terms', 'delivery_term_id', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('party');
    }

    public function down()
    {
        $this->forge->dropTable('party');
    }
}
