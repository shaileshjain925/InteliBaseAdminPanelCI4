<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SubscribersList extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'subscribers_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'is_subscribers' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('subscribers_id', true);
        $this->forge->createTable('subscribers', true);
    
    }

    public function down()
    {
        $this->forge->dropTable('subscribers', true);
    }
}
