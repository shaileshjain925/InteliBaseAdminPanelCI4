<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TermsConditionSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'v_type' => 'invoice',
                'terms_condition' => '<pre><code>Payment is due within 30 days of the invoice date. Late payments may incur additional charges.</code></pre><h3>&nbsp;</h3>',
            ],
            [
                'v_type' => 'order',
                'terms_condition' => '<p>All orders are subject to availability and confirmation of the order price.</p>',
            ],
            [
                'v_type' => 'quotation',
                'terms_condition' => '<p>All quoted prices are valid for 30 days from the date of the quotation.</p>',
            ],
        ];

        // Using Query Builder
        $this->db->table('terms_condition')->insertBatch($data);
    }
}
