<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class VoucharTermsAndConditionTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'terms_condition_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'v_type' => [
                'type' => 'ENUM',
                'constraint' => ['quotation', 'order', 'invoice'],
                'null' => false,
            ],
            'terms_condition' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);
        $this->forge->addPrimaryKey('terms_condition_id');
        $this->forge->createTable('terms_condition', true);
    }

    public function down()
    {
        $this->forge->dropTable('terms_condition', true);
    }
}
