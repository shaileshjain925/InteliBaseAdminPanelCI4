<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class IlluminationSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'illumination_name' => 'LED Lighting',
            ],
            [
                'illumination_name' => 'Fluorescent Lighting',
            ],
            [
                'illumination_name' => 'Halogen Lighting',
            ],
            [
                'illumination_name' => 'Incandescent Lighting',
            ],
            [
                'illumination_name' => 'LED Display',
            ],
            [
                'illumination_name' => 'Billboard',
            ],
            [
                'illumination_name' => 'SAV',
            ],
        ];

        // Using Query Builder
        $this->db->table('illumination')->insertBatch($data);
    }
}
