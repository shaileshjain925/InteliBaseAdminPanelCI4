<?php

namespace App\Models;

use App\Models\FunctionModel;

class DeliveryTermsModel extends FunctionModel
{
    protected $table            = 'delivery_terms';
    protected $primaryKey       = 'delivery_term_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["delivery_term_id", "delivery_term_code", "delivery_term_name", "delivery_term_description"];
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;
    protected $messageAlias = 'Delivery Terms';

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
        'delivery_term_id' => 'permit_empty',
        'delivery_term_code'       => 'required|is_unique[delivery_terms.delivery_term_code,delivery_term_id,{delivery_term_id}]',
        'delivery_term_name'       => 'required|max_length[255]',
        "delivery_term_description" => "permit_empty"
    ];
    protected $validationMessages = [
        'delivery_term_code' => [
            'required' => 'The Delivery Term Code is required.',
            'is_unique' => 'The Delivery Term Code must be unique.'
        ],
        'delivery_term_name' => [
            'required' => 'The Delivery Term Name is required.',
            'max_length' => 'The Delivery Term Name cannot exceed 255 characters.'
        ],
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
