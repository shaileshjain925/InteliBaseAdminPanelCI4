<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PartyTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'party_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'party_type' => [
                'type' => 'ENUM',
                'constraint' => ['lead', 'prospect', 'client', 'vendor'],
                'null' => false,
                'default' => 'lead'
            ],
            'assign_user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'firm_gst_no' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true
            ],
            'firm_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'firm_email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'firm_mobile' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true
            ],
            'firm_address' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'firm_country_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true
            ],
            'firm_state_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true
            ],
            'firm_city_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true
            ],
            'firm_pincode' => [
                'type' => 'INT',
                'constraint' => 10,
                'null' => true
            ],
            'firm_pan_no' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true
            ],
            'contact_person_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'contact_person_email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'contact_person_mobile' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true
            ],
            'dob' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'doa' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'lead_status' => [
                'type' => 'ENUM',
                'constraint' => ['Hot', 'Cold', 'Warm', 'Win', 'Lost'],
                'null' => true,
                'default' => 'Hot',
            ],
            'lead_description' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'lead_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            //vendor details
            'vendor_type' => [
                'type' => 'ENUM',
                'constraint' => ['none', 'agency', 'landlord', 'government'],
                'null' => true,
                'default' => 'none'
            ],
            'bank_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'account_type' => [
                'type' => 'ENUM',
                'constraint' => ['saving', 'current'],
                'null' => true,
                'default' => 'saving'
            ],
            'ifsc_code' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true
            ],
            'account_no' => [
                'type' => 'INT',
                'constraint' => 15,
                'null' => true
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('party_id');
        $this->forge->addForeignKey('firm_country_id', 'country', 'country_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('firm_state_id', 'state', 'state_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('firm_city_id', 'city', 'city_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('assign_user_id', 'user', 'user_id', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('party', true);
    }


    public function down()
    {
        $this->forge->dropTable('party', true);
    }
}
