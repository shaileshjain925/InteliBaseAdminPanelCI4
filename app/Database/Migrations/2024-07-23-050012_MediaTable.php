<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MediaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'media_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'media_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'media_type_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'illumination_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'width' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => false,
            ],
            'height' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => false,
            ],
            'total_square_ft' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => false,
            ],
            'location_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'party_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true
            ],
            //Contract Details
            'contract_from_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'contract_to_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'purchase_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => false,
            ],
            'gst_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => false,
            ],
            'total' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => false,
            ],
            //Selling Details
            'minimum_rent_days' => [
                'type' => 'INT',
                'constraint' => 11,
                "default" => 1,
            ],
            'rent_rate_per_day' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => false,
            ],
            'media_charge' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => true,
            ],
            'printing_charge' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => false,
            ],
            'mounting_charge' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                "default" => 0.00,
                'null' => false
            ],
            'media_image_1' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'media_image_2' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'media_image_3' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('media_id');
        $this->forge->addForeignKey('media_type_id', 'media_type', 'media_type_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('illumination_id', 'illumination', 'illumination_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('location_id', 'location', 'location_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('party_id', 'party', 'party_id', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('media', true);
    }

    public function down()
    {
        $this->forge->dropTable('media', true);
    }
}
