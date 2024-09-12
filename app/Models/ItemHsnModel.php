<?php

namespace App\Models;

use App\Models\FunctionModel;

class ItemHsnModel extends FunctionModel
{
    protected $table            = 'item_hsn';
    protected $primaryKey       = 'item_hsn_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['item_hsn_id', 'item_hsn_type', 'item_hsn_code', 'item_hsn_description', 'item_hsn_gst'];
    protected $messageAlias = 'Item HSN';

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'item_hsn_id' => 'permit_empty',
        'item_hsn_type' => 'required|in_list[HSN,SAC]',
        'item_hsn_code' => 'required|is_unique[item_hsn.item_hsn_code,item_hsn_id,{item_hsn_id}]',
        'item_hsn_description' => 'permit_empty',
        'item_hsn_gst' => 'required|in_list[0.00,0.10,0.25,1.00,1.50,3.00,5.00,6.00,7.50,12.00,18.00,28.00]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function __construct($joinRequired = true)
    {
        parent::__construct();
    }
}
