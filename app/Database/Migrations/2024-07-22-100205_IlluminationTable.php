<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class IlluminationTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'illumination_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'illumination_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
           
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('illumination_id');
        $this->forge->createTable('illumination', true);
    }

    public function down()
    {
        $this->forge->dropTable('illumination', true);
    }
}
