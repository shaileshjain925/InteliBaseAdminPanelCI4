<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserTableAddField extends Migration
{
    public function up()
    {
        $this->forge->addColumn('user', [
            "user_code" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
                'null' => true
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('user', "user_code");
    }
}
