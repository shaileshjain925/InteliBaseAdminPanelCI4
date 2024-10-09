<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateItemsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'item_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'item_brand_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'unsigned' => true
            ],
            'item_category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'unsigned' => true
            ],
            'item_sub_group_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'unsigned' => true
            ],
            'item_hsn_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'unsigned' => true
            ],
            'item_class' => [
                'type' => 'ENUM',
                'constraint' => ['listed', 'non-listed', 'not-assign'],
                'null' => false
            ],
            'item_code' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'unique' => true,
                'null' => true
            ],
            'item_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'unique' => true,
                'null' => false
            ],
            'item_description' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'item_supplier_description' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'item_nature' => [
                'type' => 'ENUM',
                'constraint' => ['Capex', 'Packaging', 'Services', 'Saleable', 'Consumable', 'MRO', 'NoBuy', 'NoStock'],
                'null' => false
            ],
            'item_manufacturing_type' => [
                'type' => 'ENUM',
                'constraint' => ['FinishedProduct', 'RawMaterial', 'SemiFinished', 'Other'],
                'null' => false
            ],
            'item_is_spare_part' => [
                'type' => 'BOOLEAN',
                'null' => false,
                'default' => 0
            ],
            'item_is_expire' => [
                'type' => 'BOOLEAN',
                'null' => false,
                'default' => 0
            ],
            'item_min_order_qty' => [
                'type' => 'DECIMAL',
                'constraint' => '10,3',
                'default' => 1.000
            ],
            'item_min_order_pack_qty' => [
                'type' => 'DECIMAL',
                'constraint' => '10,3',
                'default' => 1.000
            ],
            'item_length_cms' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0.00
            ],
            'item_width_cms' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0.00
            ],
            'item_height_cms' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0.00
            ],
            'item_weight_kg' => [
                'type' => 'DECIMAL',
                'constraint' => '10,3',
                'default' => 0.000
            ],
            'item_drawing_no' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'item_remark' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'item_uqc_id' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
                'null' => false
            ],
            'item_pack_uqc_id' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
                'null' => true
            ],
            'item_pack_conversion' => [
                'type' => 'DECIMAL',
                'constraint' => '10,3',
                'default' => 1.000
            ],
            'item_user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'item_box_image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'item_image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'price_list_upload_user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
                'unsigned' => true,
                'default' => null,
            ],
            'price_list_uploaded_date' => [
                'type' => 'DATE',
                'null' => true,
                'default' => null,
            ],
            'price_list_date' => [
                'type' => 'DATE',
                'null' => true,
                'default' => null,
            ],
            'price_list_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'default' => null,
            ],
            'price_list_rate' => [
                'type' => 'DOUBLE',
                'constraint' => '10,2',
                'null' => true,
                'default' => '0.00',
            ],
            'price_list_min_order_qty' => [
                'type' => 'DOUBLE',
                'constraint' => '10,3',
                'null' => true,
                'default' => '0.000',
            ],
            'price_list_min_order_pack_qty' => [
                'type' => 'DOUBLE',
                'constraint' => '10,3',
                'null' => true,
                'default' => '0.000',
            ],
            'item_is_active' => [
                'type' => 'BOOLEAN',
                'null' => false,
                'default' => 1
            ],
            'item_quality_check_link' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'item_inspection_required' => [
                'type' => 'BOOLEAN',
                'null' => false,
                'default' => 0
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        // Adding Primary Key
        $this->forge->addKey('item_id', true);

        // Adding Foreign Keys
        $this->forge->addForeignKey('item_brand_id', 'item_brands', 'item_brand_id', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('item_category_id', 'item_categories', 'item_category_id', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('item_sub_group_id', 'item_sub_groups', 'item_sub_group_id', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('item_hsn_id', 'item_hsn', 'item_hsn_id', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('item_uqc_id', 'item_uqc', 'item_uqc_id', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('item_pack_uqc_id', 'item_uqc', 'item_uqc_id', 'CASCADE', 'RESTRICT');
        $this->forge->addForeignKey('item_user_id', 'users', 'user_id', 'CASCADE', 'RESTRICT');
        // Creating the table
        $this->forge->createTable('items', true);
    }

    public function down()
    {
        // Dropping the table
        $this->forge->dropTable('items', true);
    }
}
