<?php

namespace App\Database\Migrations;

use App\Traits\CommonTraits;
use CodeIgniter\Database\Migration;

class Designation extends Migration
{
    use CommonTraits;
    public function up()
    {
        $this->forge->addField([
            'designation_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'designation_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('designation_id');
        $this->forge->createTable('designations', true);
    }

    public function down()
    {
        $this->forge->createTable('designations', true);
    }
}
