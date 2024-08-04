<?php

namespace App\Models;

use App\Models\FunctionModel;

class VoucharTermsAndConditionModel extends FunctionModel
{
    protected $table            = 'terms_condition';
    protected $primaryKey       = 'terms_condition_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'v_type', 'terms_condition'
    ];

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
    protected $validationRules = [
        'terms_condition_id' => 'permit_empty',
        'v_type'           => 'required|in_list[quotation,order,invoice]',
        'terms_condition'  => 'required',
    ];

    protected $validationMessages = [
        'v_type' => [
            'required' => 'Voucher type is required.',
        ],
        'terms_condition' => [   
            'required' => 'Terms and condition is required.',
        ],
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['allTrim'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['allTrim'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    protected $messageAlias = "Voucher Term And Condition";
    protected $excludeTrimFields = [];
    public function __construct()
    {
        parent::__construct();
    }
}
