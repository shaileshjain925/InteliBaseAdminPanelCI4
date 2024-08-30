<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RoleModuleMenusAddFileds extends Migration
{
    public function up()
    {
        $this->forge->addColumn('role_module_menus', [
            'back_days_data_edit_allowed' => [
                'type' => 'INT',
                'constraint' => 11,
                'after' => 'back_days_data_allowed',
                'default' => 0
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('role_module_menus', 'back_days_data_edit_allowed');
    }
}
