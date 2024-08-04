<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use App\Traits\CommonTraits;


class LocationTypeTable extends Migration
{
    use CommonTraits;
    public function up()
    {
        $this->forge->addField([
            'location_type_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'location_type_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'location_type_description' => [
                'type' => 'TEXT',
                'null' => true
            ],

            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('location_type_id');
        $this->forge->createTable('location_type', true);

        if (!$this->get_location_type_model()->first()) {
            $data = [
                ['type_name' => 'Prime Location', 'description' => 'High traffic area, excellent for visibility'],
                ['type_name' => 'Residential Area', 'description' => 'Good for targeting local residents'],
                ['type_name' => 'Commercial Area', 'description' => 'Near shopping centers, offices, and businesses'],
                ['type_name' => 'Highway', 'description' => 'Alongside major highways, ideal for long-distance visibility'],
                ['type_name' => 'Airport', 'description' => 'Near airports, targeting travelers and visitors'],
                ['type_name' => 'Railway Station', 'description' => 'Near railway stations, targeting commuters and travelers'],
                ['type_name' => 'Bus Terminal', 'description' => 'Near bus terminals, targeting daily commuters'],
                ['type_name' => 'Mall Area', 'description' => 'Near or within shopping malls, targeting shoppers'],
                ['type_name' => 'Event Venues', 'description' => 'Near stadiums, concert halls, and other event venues'],
                ['type_name' => 'Tourist Spots', 'description' => 'Near popular tourist destinations, targeting tourists'],
                ['type_name' => 'Educational Institutions', 'description' => 'Near schools, colleges, and universities'],
                ['type_name' => 'Industrial Area', 'description' => 'Near industrial zones, targeting workers and businesses'],
                ['type_name' => 'Urban Center', 'description' => 'Within the central business district of a city'],
                ['type_name' => 'Suburban Area', 'description' => 'In suburban areas, targeting residents and local businesses'],
                ['type_name' => 'Rural Area', 'description' => 'In rural areas, targeting local population and passersby'],
            ];
            $this->get_location_type_model()->insertBatch($data);
        }
    }

    public function down()
    {
        $this->forge->dropTable('location_type', true);
    }
}
