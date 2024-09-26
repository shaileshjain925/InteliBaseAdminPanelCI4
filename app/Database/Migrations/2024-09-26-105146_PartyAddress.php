<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PartyAddress extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'address_id' => [
                'type'           => 'INT',
                'constraint' => 11,
                'unsigned'      => true,
                'auto_increment' => true,
            ],
            'party_id' => [
                'type'           => 'INT',
                'constraint' => 11,
                'unsigned'      => true,
            ],
            'address_short_name' => [
                'type'           => 'VARCHAR',
                'constraint' => 255,
            ],
            'firm_name' => [
                'type'           => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'firm_gst' => [
                'type'           => 'VARCHAR',
                'constraint' => 15,
            ],
            'party_country_id' => [
                'type'           => 'INT',
                'constraint' => 11,
                'unsigned'      => true,
            ],
            'party_state_id' => [
                'type'           => 'INT',
                'constraint' => 11,
                'unsigned'      => true,
            ],
            'party_city_id' => [
                'type'           => 'INT',
                'constraint' => 11,
                'unsigned'      => true,
            ],
            'party_pincode' => [
                'type'           => 'VARCHAR',
                'constraint' => 11,
            ],
            'party_addresses' => [
                'type'           => 'TEXT',
                'constraint' => 11,
                'constraint'     => 255,
            ],
            'address_person_name' => [
                'type'           => 'VARCHAR',
                'constraint' => 11,
                'constraint'     => 255,
            ],
            'address_person_mobile' => [
                'type'           => 'VARCHAR',
                'constraint' => 11,
                'constraint'     => 255,
            ],
            'address_person_email' => [
                'type'           => 'VARCHAR',
                'constraint' => 11,
                'constraint'     => 255,
            ],
            'address_type' => [
                'type'           => 'ENUM',
                'constraint'     => ['MainOffice', 'Other'],
                'default'        => 'Other',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('address_id');

        // Adding foreign key constraints
        $this->forge->addForeignKey('party_id', 'party', 'party_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('party_country_id', 'countries', 'country_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('party_state_id', 'states', 'state_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('party_city_id', 'cities', 'city_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('party_address', true);
    }

    public function down()
    {
        $this->forge->dropTable('party_address', true);
    }
}
