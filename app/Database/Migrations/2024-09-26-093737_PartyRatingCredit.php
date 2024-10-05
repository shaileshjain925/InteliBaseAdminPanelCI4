<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PartyRatingCredit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'party_rating_credit_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'party_rating_credit_name' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => false,
            ],
            'party_rating_credit_description' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'party_rating_credit_non_listed_percentage' => [
                'type' => 'FLOAT',
                'null' => false,
            ],
            'party_rating_credit_listed_percentage' => [
                'type' => 'FLOAT',
                'null' => false,
            ],
        ]);

        $this->forge->addPrimaryKey('party_rating_credit_id');  // Set Primary Key
        $this->forge->createTable('party_rating_credit', true);
    }

    public function down()
    {
        $this->forge->dropTable('party_rating_credit', true);
    }
}
