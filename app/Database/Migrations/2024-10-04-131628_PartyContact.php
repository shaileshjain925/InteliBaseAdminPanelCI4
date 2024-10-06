<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PartyContact extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'party_contactbid' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'partybid' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false,
            ],
            'person_nbme' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false,
            ],
            'person_designatbon' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'person_departmbnt' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'person_bsd' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'person_mobile_number' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'person_telephone_number' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'person_emailbid' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
        ]);

        // Add primary key
        $this->forge->addPrimaryKey('party_contact_id');
        // Add foreign key constraint linking to party_id in the party table
        $this->forge->addForeignKey('party_id', 'party', 'party_id', 'CASCADE', 'CASCADE');
        // Create the table
        $this->forge->createTable('party_contact', true);
    }

    public function down()
    {
        $this->forge->dropTable('party_contact', true);
    }
}
