<?php

namespace App\Models;

use App\Models\FunctionModel;


class SalesItemTransactionModel extends FunctionModel
{
    protected $table            = 'sales_transaction_item';
    protected $primaryKey       = 'vitem_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'v_id', 'media_id', 'total_days', 'per_day_rental_amount', 'total_rental_amount',
        'mounting_amount', 'printing_amount', 'gst_percentage', 'sgst_amount', 'cgst_amount',
        'igst_amount', 'gst_amount', 'total_amount', 'voucher_discount_amount', 'assign_user_id',
        'assign_date', 'assign_status', 'assign_remark', 'proof_remark', 'proof_image'
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
        'vitem_id' => 'permit_empty',
        'v_id'                 => 'required|is_not_unique[sales_transaction.v_id]',
        'media_id'             => 'permit_empty|is_not_unique[media.media_id]',
        'total_days'           => 'permit_empty|integer',
        'per_day_rental_amount' => 'permit_empty',
        'total_rental_amount'  => 'permit_empty',
        'mounting_amount'      => 'permit_empty',
        'printing_amount'      => 'permit_empty',
        'gst_percentage'       => 'permit_empty|max_length[5]',
        'sgst_amount'          => 'permit_empty',
        'cgst_amount'          => 'permit_empty',
        'igst_amount'          => 'permit_empty',
        'gst_amount'           => 'permit_empty',
        'total_amount'         => 'permit_empty',
        'voucher_discount_amount' => 'permit_empty',
        'assign_user_id'       => 'permit_empty|integer',
        'assign_date'          => 'permit_empty|valid_date',
        'assign_status'        => 'permit_empty|in_list[pending,completed]',
        'assign_remark'        => 'permit_empty',
        'proof_remark'         => 'permit_empty',
        'proof_image'          => 'permit_empty|max_length[255]',
    ];

    protected $validationMessages = [
        'v_id' => [
            'required' => 'Transaction ID is required.',
        ],
        'assign_date' => [
            'valid_date' => 'Date must be a valid date.',
        ],
        'proof_image' => [
            'max_length' => 'Max Length 255 Character.',
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
    protected $messageAlias = "Sale Transaction Item";
    protected $excludeTrimFields = [];
    public function __construct()
    {
        parent::__construct();
        $this->addParentJoin('media_id', $this->get_media_model(), 'left', ['media_name']);
        $this->addParentJoin('assign_user_id', $this->get_user_model(), 'left', ['user_name']);
    }
}
