<?php

namespace App\Models;

use App\Models\FunctionModel;
use App\Traits\CommonTraits;

class ItemBrandsModel extends FunctionModel
{
    use CommonTraits;
    protected $table            = 'item_brands';
    protected $primaryKey       = 'item_brand_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['item_brand_id', 'item_brand_name', 'item_brand_code', 'item_brand_image', 'item_brand_description', 'is_active'];
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
    protected $messageAlias = 'Item Brand';


    // Validation Rules
    protected $validationRules = [
        'item_brand_id'           => 'permit_empty',
        'item_brand_name'         => 'required|max_length[255]|is_unique[item_brands.item_brand_name,item_brand_id,{item_brand_id}]',
        'item_brand_description'  => 'permit_empty',
        'item_brand_code'         => 'required|max_length[255]|is_unique[item_brands.item_brand_code,item_brand_id,{item_brand_id}]',
        'item_brand_image'        => 'permit_empty|max_length[255]',
        'item_brand_is_active'    => 'permit_empty|in_list[0,1]',
    ];

    // Validation Messages
    protected $validationMessages = [
        'item_brand_name' => [
            'required'   => 'Brand name is required.',
            'max_length' => 'Max 255 characters allowed.',
            'is_unique'  => 'Brand name already exists.',
        ],
        'item_brand_code' => [
            'required'   => 'Brand code is required.',
            'max_length' => 'Max 255 characters allowed.',
            'is_unique'  => 'Brand code already exists.',
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


    public function __construct()
    {
        parent::__construct();
    }
}
