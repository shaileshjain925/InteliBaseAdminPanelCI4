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
            'item_group_id' => [
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
            'item_uom_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false
            ],
            'item_pack_uom_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
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
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]
        ]);

        // Adding Primary Key
        $this->forge->addKey('item_id', true);

        // Adding Foreign Keys
        $this->forge->addForeignKey('item_brand_id', 'brands', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('item_category_id', 'categories', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('item_group_id', 'groups', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('item_sub_group_id', 'sub_groups', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('item_hsn_id', 'hsn', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('item_uom_id', 'uom', 'id', 'CASCADE', 'NO ACTION');
        $this->forge->addForeignKey('item_pack_uom_id', 'uom', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('item_user_id', 'users', 'id', 'CASCADE', 'NO ACTION');

        // Creating the table
        $this->forge->createTable('items', true);
    }

    public function down()
    {
        // Dropping the table
        $this->forge->dropTable('items', true);
    }
}
