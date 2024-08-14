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
        $this->forge->createTable('designation', true);

        $designations = [
            ["designation_id" => "1", 'designation_name' => 'Developer'],
            ["designation_id" => "2", 'designation_name' => 'Owner / CEO'],
            ["designation_id" => "3", 'designation_name' => 'National Sales Manager'],
            ["designation_id" => "4", 'designation_name' => 'Regional Sales Manager'],
            ["designation_id" => "5", 'designation_name' => 'Sales Account Manager'],
            ["designation_id" => "6", 'designation_name' => 'Key Account Manager'],
            ["designation_id" => "7", 'designation_name' => 'Business Development Manager'],
            ["designation_id" => "8", 'designation_name' => 'Field Sales Representative'],
            ["designation_id" => "9", 'designation_name' => 'Sales Representative'],
            ["designation_id" => "10", 'designation_name' => 'Sales Support Specialist'],
            ["designation_id" => "11", 'designation_name' => 'CRM Director'],
            ["designation_id" => "12", 'designation_name' => 'CRM Manager'],
            ["designation_id" => "13", 'designation_name' => 'Customer Relationship Manager'],
            ["designation_id" => "14", 'designation_name' => 'Customer Success Manager'],
            ["designation_id" => "15", 'designation_name' => 'CRM Specialist'],
            ["designation_id" => "16", 'designation_name' => 'Customer Retention Specialist'],
            ["designation_id" => "17", 'designation_name' => 'Customer Experience Manager'],
            ["designation_id" => "18", 'designation_name' => 'Inbound Operations Manager'],
            ["designation_id" => "19", 'designation_name' => 'Inbound Logistics Manager'],
            ["designation_id" => "20", 'designation_name' => 'Receiving Supervisor'],
            ["designation_id" => "21", 'designation_name' => 'Receiving Coordinator'],
            ["designation_id" => "22", 'designation_name' => 'Receiving Clerk'],
            ["designation_id" => "23", 'designation_name' => 'Warehouse Inbound Supervisor'],
            ["designation_id" => "24", 'designation_name' => 'Warehouse Inbound Associate'],
            ["designation_id" => "25", 'designation_name' => 'Outbound Operations Manager'],
            ["designation_id" => "26", 'designation_name' => 'Outbound Logistics Manager'],
            ["designation_id" => "27", 'designation_name' => 'Shipping Supervisor'],
            ["designation_id" => "28", 'designation_name' => 'Shipping Coordinator'],
            ["designation_id" => "29", 'designation_name' => 'Shipping Clerk'],
            ["designation_id" => "30", 'designation_name' => 'Warehouse Outbound Supervisor'],
            ["designation_id" => "31", 'designation_name' => 'Warehouse Outbound Associate'],
            ["designation_id" => "32", 'designation_name' => 'Warehouse Operations Manager'],
            ["designation_id" => "33", 'designation_name' => 'Warehouse Process Manager'],
            ["designation_id" => "34", 'designation_name' => 'Process Improvement Specialist'],
            ["designation_id" => "35", 'designation_name' => 'Warehouse Supervisor'],
            ["designation_id" => "36", 'designation_name' => 'Warehouse Team Leader'],
            ["designation_id" => "37", 'designation_name' => 'Warehouse Associate'],
            ["designation_id" => "38", 'designation_name' => 'Purchasing Director'],
            ["designation_id" => "39", 'designation_name' => 'Purchasing Manager'],
            ["designation_id" => "40", 'designation_name' => 'Procurement Manager'],
            ["designation_id" => "41", 'designation_name' => 'Sourcing Manager'],
            ["designation_id" => "42", 'designation_name' => 'Buyer'],
            ["designation_id" => "43", 'designation_name' => 'Purchasing Coordinator'],
            ["designation_id" => "44", 'designation_name' => 'Procurement Specialist'],
            ["designation_id" => "45", 'designation_name' => 'Supply Chain Director'],
            ["designation_id" => "46", 'designation_name' => 'Supply Chain Manager'],
            ["designation_id" => "47", 'designation_name' => 'Logistics Manager'],
            ["designation_id" => "48", 'designation_name' => 'Supply Chain Planner'],
            ["designation_id" => "49", 'designation_name' => 'Supply Chain Analyst'],
            ["designation_id" => "50", 'designation_name' => 'Supply Chain Coordinator'],
            ["designation_id" => "51", 'designation_name' => 'Inventory Control Manager'],
            ["designation_id" => "52", 'designation_name' => 'Chief Financial Officer (CFO)'],
            ["designation_id" => "53", 'designation_name' => 'Finance Director'],
            ["designation_id" => "54", 'designation_name' => 'Finance Manager'],
            ["designation_id" => "55", 'designation_name' => 'Financial Analyst'],
            ["designation_id" => "56", 'designation_name' => 'Accounts Payable Manager'],
            ["designation_id" => "57", 'designation_name' => 'Accounts Receivable Manager'],
            ["designation_id" => "58", 'designation_name' => 'Payroll Manager'],
            ["designation_id" => "59", 'designation_name' => 'Accountant'],
            ["designation_id" => "60", 'designation_name' => 'Billing Specialist'],
            ["designation_id" => "61", 'designation_name' => 'Inventory Control Manager'],
            ["designation_id" => "62", 'designation_name' => 'Inventory Analyst'],
            ["designation_id" => "63", 'designation_name' => 'Inventory Planner'],
            ["designation_id" => "64", 'designation_name' => 'Inventory Coordinator'],
            ["designation_id" => "65", 'designation_name' => 'Stock Controller'],
            ["designation_id" => "66", 'designation_name' => 'Inventory Supervisor'],
            ["designation_id" => "67", 'designation_name' => 'Inventory Clerk'],
            ["designation_id" => "68", 'designation_name' => 'Sales Director'],
        ];
        if (empty($this->get_designation_model()->first())) {
            $this->get_designation_model()->insertBatch($designations);
        }
    }

    public function down()
    {
        $this->forge->createTable('designation', true);
    }
}
