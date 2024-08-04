<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LocationTypeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['location_type_name' => 'Prime Location', 'location_type_description' => 'High traffic area, excellent for visibility'],
            ['location_type_name' => 'Residential Area', 'location_type_description' => 'Good for targeting local residents'],
            ['location_type_name' => 'Commercial Area', 'location_type_description' => 'Near shopping centers, offices, and businesses'],
            ['location_type_name' => 'Highway', 'location_type_description' => 'Alongside major highways, ideal for long-distance visibility'],
            ['location_type_name' => 'Airport', 'location_type_description' => 'Near airports, targeting travelers and visitors'],
            ['location_type_name' => 'Railway Station', 'location_type_description' => 'Near railway stations, targeting commuters and travelers'],
            ['location_type_name' => 'Bus Terminal', 'location_type_description' => 'Near bus terminals, targeting daily commuters'],
            ['location_type_name' => 'Mall Area', 'location_type_description' => 'Near or within shopping malls, targeting shoppers'],
            ['location_type_name' => 'Event Venues', 'location_type_description' => 'Near stadiums, concert halls, and other event venues'],
            ['location_type_name' => 'Tourist Spots', 'location_type_description' => 'Near popular tourist destinations, targeting tourists'],
            ['location_type_name' => 'Educational Institutions', 'location_type_description' => 'Near schools, colleges, and universities'],
            ['location_type_name' => 'Industrial Area', 'location_type_description' => 'Near industrial zones, targeting workers and businesses'],
            ['location_type_name' => 'Urban Center', 'location_type_description' => 'Within the central business district of a city'],
            ['location_type_name' => 'Suburban Area', 'location_type_description' => 'In suburban areas, targeting residents and local businesses'],
            ['location_type_name' => 'Rural Area', 'location_type_description' => 'In rural areas, targeting local population and passersby'],
        ];
        $this->db->table('location_type')->insertBatch($data);
    }
}
