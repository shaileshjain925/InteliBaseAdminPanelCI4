<?php

namespace App\Models;

use App\Models\FunctionModel;

class SalesTransactionModel extends FunctionModel
{
    protected $table            = 'sales_transaction';
    protected $primaryKey       = 'v_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'v_no', 'v_type', 'v_date', 'ref_type', 'reference_id', 'reference_no',
        'reference_date', 'party_id', 'party_gst_no', 'v_due_date', 'campaign_from_date',
        'campaign_to_date', 'campaign_days', 'sub_total_amount', 'discount_percentage',
        'discount_amount', 'sgst_total_amount', 'cgst_total_amount', 'igst_total_amount',
        'gst_total_amount', 'round_off_amount', 'total_amount', 'v_remark',
        'v_terms_condition', 'is_cancelled'
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
        'v_id' => 'permit_empty',
        'v_no' => 'required|string|max_length[255]',
        'v_type' => 'required|in_list[quotation,order,invoice]',
        'v_date' => 'required|valid_date',
        'ref_type' => 'permit_empty|in_list[quotation,order,invoice]',
        'reference_id' => 'permit_empty|is_not_unique[sales_transaction.v_id]',
        'reference_no' => 'permit_empty|max_length[255]',
        'reference_date' => 'permit_empty|valid_date',
        'party_id' => 'permit_empty|is_not_unique[party.party_id]',
        'party_gst_no' => 'permit_empty|max_length[15]',
        'v_due_date' => 'permit_empty|valid_date',
        'campaign_from_date' => 'permit_empty|valid_date',
        'campaign_to_date' => 'permit_empty|valid_date',
        'campaign_days' => 'permit_empty|integer',
        'sub_total_amount' => 'permit_empty',
        'discount_percentage' => 'permit_empty',
        'discount_amount' => 'permit_empty',
        'sgst_total_amount' => 'permit_empty',
        'cgst_total_amount' => 'permit_empty',
        'igst_total_amount' => 'permit_empty',
        'gst_total_amount' => 'permit_empty',
        'round_off_amount' => 'permit_empty',
        'total_amount' => 'permit_empty',
        'v_remark' => 'permit_empty',
        'v_terms_condition' => 'permit_empty',
    ];

    protected $validationMessages = [
        'v_no' => [
            'required' => 'Voucher number is required.',
            'max_length' => 'Max Length 255 Character.'
        ],
        'v_type' => [
            'required' => 'Voucher Type is required.',
        ],
        'v_date' => [
            'required' => 'Voucher Date is required',
            'valid_date' => 'Voucher Date must be a valid date.',
        ],
        'reference_date' => [
            'valid_date' => 'Date must be a valid date.',
        ],
        'v_due_date' => [
            'valid_date' => 'Date must be a valid date.',
        ],
        'campaign_from_date' => [
            'valid_date' => 'Date must be a valid date.',
        ],
        'campaign_to_date' => [
            'valid_date' => 'Date must be a valid date.',
        ],
        'reference_no' => [
            'max_length' => 'Max Length 255 Character.',
        ],
        'party_gst_no' => [
            'max_length' => 'Max Length 15 Character.',
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

    protected $messageAlias = "Sale Transaction";
    protected $excludeTrimFields = [];
    public function __construct()
    {
        parent::__construct();
        $this->addParentJoin('party_id', $this->get_party_model(), 'left', ['firm_name']);
    }
}
