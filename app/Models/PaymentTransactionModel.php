<?php

namespace App\Models;

use App\Models\FunctionModel;

class PaymentTransactionModel extends FunctionModel
{
    protected $table            = 'payment_transaction';
    protected $primaryKey       = 'payment_transaction_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'payment_transaction_date', 'payment_transaction_no', 'v_id', 'payment_transaction_mode', 'payment_transaction_receive_date', 'payment_transaction_receive_amount', 'payment_transaction_remark', 'is_cancelled'
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
        "payment_transaction_id" => "permit_empty",
        'payment_transaction_date' => 'permit_empty|valid_date',
        'payment_transaction_no' => 'required|max_length[255]',
        'v_id' => 'required|is_not_unique[sales_transaction.v_id]',
        'payment_transaction_mode' => 'required|max_length[255]',
        'payment_transaction_receive_date' => 'permit_empty|valid_date',
        'payment_transaction_receive_amount' => 'permit_empty',
        'payment_transaction_remark' => 'permit_empty',
        'is_cancelled' => 'permit_empty'
    ];

    protected $validationMessages = [
        'payment_transaction_date' => [
            'valid_date' => 'The transaction date must be a valid date.'
        ],
        'payment_transaction_no' => [
            'required' => 'The transaction number is required.',
            'max_length' => 'The transaction number cannot exceed 255 characters.'
        ],
        'v_id' => [
            'required' => 'The voucher ID is required.',
        ],
        'payment_transaction_mode' => [
            'required' => 'The transaction mode is required.',
            'max_length' => 'The transaction mode cannot exceed 255 characters.'
        ],
        'payment_transaction_receive_date' => [
            'valid_date' => 'The receive date must be a valid date.'
        ],
        'payment_transaction_receive_amount' => [
            'decimal' => 'The receive amount must be a decimal value.'
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

    protected $messageAlias = "Payment";
    protected $excludeTrimFields = [];
    public function __construct()
    {
        parent::__construct();
        $this->addParentJoin('v_id', $this->get_sales_transaction_model(), 'left', ['v_no']);
    }
}
