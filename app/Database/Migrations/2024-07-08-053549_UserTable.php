<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'user_email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'user_mobile' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
                'null' => true
            ],
            'user_address' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'user_country_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'user_state_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'user_city_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'user_pincode' => [
                'type' => 'INT',
                'constraint' => 10,
                'null' => false,
            ],
            'user_aadhar_card' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'user_aadhar_card_image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'user_image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'user_type' => [
                'type' => 'ENUM',
                'constraint' => ['admin', 'sales_executive', 'site_engineer', 'manager'],
                'null' => false
            ],
            'password' => [
                'type' => 'TEXT',
            ],
            'otp' => [
                'type' => 'VARCHAR',
                'constraint' => 6,
                'null' => true, // assuming OTP might not always be present
            ],
            'is_active' => [
                'type' => 'BOOLEAN',
                'default' => false,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('user_id');
        $this->forge->addForeignKey('user_country_id', 'country', 'country_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('user_state_id', 'state', 'state_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('user_city_id', 'city', 'city_id', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('user', true);
    }

    public function down()
    {
        $this->forge->dropTable('user', true);
    }
}
