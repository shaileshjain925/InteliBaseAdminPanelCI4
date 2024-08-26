<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RoleModuleMenu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'role_module_menu_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'role_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'module_menu_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'view' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'create' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'edit' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'approval' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'delete' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'print' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'export' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'bulk_delete' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'back_days_data_allowed' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'default' => 0,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('role_module_menu_id');
        $this->forge->createTable('role_module_menus', true);
    }

    public function down()
    {
        $this->forge->dropTable('role_module_menus', true);
    }
}
