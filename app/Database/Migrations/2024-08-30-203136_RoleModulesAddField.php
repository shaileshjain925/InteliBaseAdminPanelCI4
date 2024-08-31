<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RoleModulesAddField extends Migration
{
    public function up()
    {
        $this->forge->addColumn('role_modules', [
            'is_primary_dashboard' => [
                'type' => 'BOOLEAN',
                'after' => 'dashboard',
                'default' => false,
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('role_modules', 'is_primary_dashboard');
    }
}
