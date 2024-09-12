<?php

namespace App\Models;

use App\Models\FunctionModel;

class ItemUqcModel extends FunctionModel
{
    protected $table            = 'item_uqc';
    protected $primaryKey       = 'item_uqc_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['item_uqc_id', 'item_uqc_name'];
    protected $messageAlias = 'Item UQC';


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
        'item_uqc_id' => 'required',
        'item_uqc_name' => 'required|is_unique[item_uqc.item_uqc_name,item_uqc_id,{item_uqc_id}]',
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
