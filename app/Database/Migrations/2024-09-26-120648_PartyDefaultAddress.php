<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PartyDefaultAddress extends Migration
{
    public function up()
    {
        // Add the new columns to the 'party' table
        $this->forge->addColumn('party', [
            'default_billing_address_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'default_shipping_address_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ]
        ]);

        // Add foreign keys for the new columns
        $this->db->query('ALTER TABLE `party` ADD CONSTRAINT `fk_party_billing_address` FOREIGN KEY (`default_billing_address_id`) REFERENCES `party_address`(`address_id`) ON DELETE SET NULL ON UPDATE CASCADE;');
        $this->db->query('ALTER TABLE `party` ADD CONSTRAINT `fk_party_shipping_address` FOREIGN KEY (`default_shipping_address_id`) REFERENCES `party_address`(`address_id`) ON DELETE SET NULL ON UPDATE CASCADE;');
    }

    public function down()
    {
        // To rollback, drop the foreign keys first
        $this->forge->dropForeignKey('party', 'fk_party_billing_address');
        $this->forge->dropForeignKey('party', 'fk_party_shipping_address');

        // Then, remove the columns
        $this->forge->dropColumn('party', ['default_billing_address_id', 'default_shipping_address_id']);
    }
}
