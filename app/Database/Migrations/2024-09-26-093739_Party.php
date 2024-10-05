<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Party extends Migration
{
    public function up()
    {
        // Create party table
        $this->forge->addField([
            'party_id' => [
                'type'           => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'party_type' => [
                'type'       => 'ENUM',
                'constraint' => ['Customer', 'Supplier'],
                'null'       => false,
            ],
            'party_code' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
                'unique' => true,
            ],
            'party_alloted_id' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'party_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'party_email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'party_number' => [
                'type'       => 'VARCHAR',
                'constraint' => '15',
                'null'       => false,
            ],
            'pan_no' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
            ],
            'party_tin' => [
                'type'       => 'VARCHAR',
                'constraint' => '45',
                'null'       => true,
            ],
            'party_cin' => [
                'type'       => 'VARCHAR',
                'constraint' => '45',
                'null'       => true,
            ],
            'party_rating_credit_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'party_rating_value_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'firm_type' => [
                'type'       => 'ENUM',
                'constraint' => ['PROPRIETORSHIP', 'PARTNERSHIP', 'LLP', 'PVT LTD', 'LIMITED', 'GOVT', 'ENTERPRISE', 'SEMI GOVT.ENTR', 'EOU'],
                'null'       => false,
            ],
            'business_type_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'business_nature_code' => [
                'type'       => 'ENUM',
                'constraint' => ['Retail', 'Wholesale', 'Stockist', 'Manufacture', 'Service'],
                'null'       => false,
            ],
            'payment_term_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'delivery_term_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'packaging_type' => [
                'type'       => 'ENUM',
                'constraint' => ['Standard', 'Non-Standard'],
                'null'       => false,
            ],
            'bank_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'bank_no' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
            ],
            'bank_ifsc' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
            ],
            'bank_holder_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'notes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'website' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'is_active' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
            ],
            'default_billing_address_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => true,
            ],
            'default_shipping_address_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => true,
            ],
            'party_user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
        ]);

        // Define primary key
        $this->forge->addPrimaryKey('party_id');
        // Add foreign keys
        $this->forge->addForeignKey('payment_term_id', 'payment_terms', 'payment_term_id', 'RESTRICT', 'CASCADE');
        $this->forge->addForeignKey('business_type_id', 'business_types', 'business_type_id', 'RESTRICT', 'CASCADE');
        $this->forge->addForeignKey('delivery_term_id', 'delivery_terms', 'delivery_term_id', 'RESTRICT', 'CASCADE');
        $this->forge->addForeignKey('party_rating_credit_id', 'party_rating_credit', 'party_rating_credit_id', 'RESTRICT', 'CASCADE');
        $this->forge->addForeignKey('party_rating_value_id', 'party_rating_value', 'party_rating_value_id', 'RESTRICT', 'CASCADE');
        $this->forge->addForeignKey('default_billing_address_id', 'party_address', 'address_id', 'SET NULL', 'SET NULL');
        $this->forge->addForeignKey('default_shipping_address_id', 'party_address', 'address_id', 'SET NULL', 'SET NULL');
        $this->forge->addForeignKey('party_user_id', 'users', 'user_id', 'RESTRICT', 'RESTRICT');

        $this->forge->createTable('party', true);
    }

    public function down()
    {
        // Drop party table
        $this->forge->dropTable('party', true);
    }
}
