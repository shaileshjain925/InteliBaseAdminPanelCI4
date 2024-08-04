<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MediaTypeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'media_type_name' => 'Newspaper Ad',
                'media_type_description' => 'Printed advertisements published in newspapers.',
            ],
            [
                'media_type_name' => 'Flyer',
                'media_type_description' => 'Printed leaflets distributed by hand to promote events or offers.',
            ],
            [
                'media_type_name' => 'Poster',
                'media_type_description' => 'All types of poster',
            ],
            [
                'media_type_name' => 'Billboard',
                'media_type_description' => 'Large outdoor advertising structures typically found in high-traffic areas.',
            ],
            [
                'media_type_name' => 'Social Media',
                'media_type_description' => 'Digital advertisements displayed on social media platforms like Facebook, Instagram, and Twitter.',
            ],
            [
                'media_type_name' => 'Online Banner',
                'media_type_description' => 'Graphic advertisements displayed on websites, usually at the top or bottom of the page.',
            ],
        ];

        // Using Query Builder
        $this->db->table('media_type')->insertBatch($data);
    }
}
