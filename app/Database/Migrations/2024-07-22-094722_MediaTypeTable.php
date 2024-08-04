<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MediaTypeTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'media_type_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'media_type_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'media_type_description' => [
                'type' => 'TEXT',
                'null' => true
            ],
           
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('media_type_id');
        $this->forge->createTable('media_type', true);
    }
    

    public function down()
    {
        $this->forge->dropTable('media_type', true);
    }
}
