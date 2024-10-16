<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModuleMenu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'module_menu_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'module_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'menu_code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'menu_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'menu_type' => [
                'type' => 'ENUM',
                'constraint' => ['master', 'transaction', 'report', 'config'],
                'null' => false
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('module_menu_id');
        $this->forge->addForeignKey('module_id', 'modules', 'module_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('module_menus', true);
    }

    public function down()
    {
        $this->forge->dropTable('module_menus', true);
    }
}
