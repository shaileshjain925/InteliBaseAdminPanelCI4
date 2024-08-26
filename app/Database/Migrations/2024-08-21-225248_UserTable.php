<?php

namespace App\Database\Migrations;

use App\Traits\CommonTraits;
use CodeIgniter\Database\Migration;
use UserType;

class UserTable extends Migration
{
    use CommonTraits;
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            "user_code" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'reporting_to_user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true
            ],
            'designation_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'role_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'user_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'user_email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
                'null' => false
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
            'user_aadhaar_card' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'user_aadhaar_card_image' => [
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
                'constraint' => [
                    'super_admin',
                    'admin',
                    'staff'
                ],
                'null' => false,
            ],
            'user_data_access' => [
                'type' => 'ENUM',
                'constraint' => [
                    'all',
                    'self',
                    'hierarchy'
                ],
                'null' => false,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'otp' => [
                'type' => 'VARCHAR',
                'constraint' => 6,
                'null' => true, // assuming OTP might not always be present
            ],
            'is_active' => [
                'type' => 'BOOLEAN',
                'default' => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('user_id');
        $this->forge->addUniqueKey('user_code');
        $this->forge->addForeignKey('user_country_id', 'countries', 'country_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('user_state_id', 'states', 'state_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('user_city_id', 'cities', 'city_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('designation_id', 'designations', 'designation_id', 'RESTRICT', 'RESTRICT');
        $this->forge->addForeignKey('role_id', 'roles', 'role_id', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('users', true);
        $this->forge->addForeignKey('reporting_to_user_id', 'users', 'user_id', 'RESTRICT', 'RESTRICT');
    }

    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}
