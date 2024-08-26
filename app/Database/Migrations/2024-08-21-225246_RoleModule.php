<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RoleModule extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'role_module_id' => [
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
            'module_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'dashboard' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'master_view' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'master_create' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'master_edit' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'master_approval' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'master_delete' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'master_print' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'master_export' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'master_bulk_delete' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'transaction_view' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'transaction_create' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'transaction_edit' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'transaction_approval' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'transaction_delete' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'transaction_print' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'transaction_export' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'transaction_bulk_delete' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'report_view' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'report_print' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'report_export' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'config_view' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('role_module_id');
        $this->forge->addForeignKey('role_id', 'roles', 'role_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('module_id', 'modules', 'module_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('role_modules', true);
    }

    public function down()
    {
        $this->forge->dropTable('role_modules', true);
    }
}
