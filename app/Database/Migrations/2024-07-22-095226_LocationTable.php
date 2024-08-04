<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LocationTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'location_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'location_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'location_type_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],
            'address' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'location_country_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'location_state_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'location_city_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'pincode' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'latitude' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'longitude' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'google_map_link' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('location_id');
        $this->forge->addForeignKey('location_country_id', 'country', 'country_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('location_state_id', 'state', 'state_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('location_city_id', 'city', 'city_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('location_type_id', 'location_type', 'location_type_id', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('location', true);
    }

    public function down()
    {
        $this->forge->dropTable('location', true);
    }
}
