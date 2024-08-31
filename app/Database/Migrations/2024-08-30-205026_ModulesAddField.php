<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModulesAddField extends Migration
{
    public function up()
    {
        $this->forge->addColumn('modules', [
            'is_dashboard' => [
                'type' => 'BOOLEAN',
                'after' => 'module_name',
                'default' => true,
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('modules','is_dashboard');
    }
}
