<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Log extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'log_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'log_type' => [
                'type' => 'ENUM',
                'constraint' => ['create', 'update', 'delete','bulkDelete'],
                'null' => false
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'table_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'record_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'log_menu_code' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'log_message' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'log_json_data' => [
                'type' => 'TEXT',
                'null' => false
            ],

            'created_at datetime default current_timestamp',
        ]);

        $this->forge->addPrimaryKey('log_id');
        $this->forge->addForeignKey('user_id', 'users', 'user_id', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('logs', true);
    }
    public function down()
    {
        $this->forge->dropTable('logs', true);
    }
}
