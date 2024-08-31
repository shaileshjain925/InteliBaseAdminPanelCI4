<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BusinessType extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'business_type_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'business_type_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('business_type_id');
        $this->forge->createTable('business_types', true);
    }

    public function down()
    {
        $this->forge->createTable('business_types', true);
    }
}
