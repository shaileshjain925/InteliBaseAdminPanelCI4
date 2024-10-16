<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CustomerRfq extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'customer_rfq_id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            "customer_rfq_date datetime default current_timestamp",
            'party_id' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
            ],
            'item_id' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
            ],
            'uqc_id' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
            ],
            'part_number' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
            ],
            'part_name' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
            ],
            'part_b' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
            ],
            'qty' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
            ],
            'remark' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
            ],
            'status' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
