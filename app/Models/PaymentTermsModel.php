<?php

namespace App\Models;

use App\Models\FunctionModel;

class PaymentTermsModel extends FunctionModel
{
    protected $table            = 'payment_terms';
    protected $primaryKey       = 'payment_term_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["payment_term_id", "payment_term_code", "payment_term_name", "due_days", "post_due_interest_rate", "status"];
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
    protected $messageAlias = 'Payment Terms';

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
        'payment_term_id' => 'permit_empty',
        'payment_term_code'       => 'required|is_unique[payment_terms.payment_term_code,payment_term_id,{payment_term_id}]',
        'payment_term_name'       => 'required|max_length[255]',
        'due_days'                => 'permit_empty|integer',
        'post_due_interest_rate'  => 'permit_empty',
        'status'                  => 'required|in_list[1,0]'
    ];
    protected $validationMessages = [
        'payment_term_code' => [
            'required' => 'The Payment Term Code is required.',
            'is_unique' => 'The Payment Term Code must be unique.'
        ],
        'payment_term_name' => [
            'required' => 'The Payment Term Name is required.',
            'max_length' => 'The Payment Term Name cannot exceed 255 characters.'
        ],
        'due_days' => [
            'required' => 'The number of Due Days is required.',
            'integer' => 'The Due Days field must be an integer.'
        ],
        'status' => [
            'required' => 'The status field is required.',
            'in_list' => 'The status must be either "1" (active) or "0" (inactive).'
        ]
    ];

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
        if ($joinRequired) {
        }
    }
}
