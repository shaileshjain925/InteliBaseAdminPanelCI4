<?php

namespace App\Models;

use App\Models\FunctionModel;
use App\Traits\CommonTraits;

class ItemCategoriesModel extends FunctionModel
{
    use CommonTraits;

    protected $table            = 'item_categories';
    protected $primaryKey       = 'item_category_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['item_category_id', 'item_category_name'];
    protected $messageAlias = 'Item Category';

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
        'item_category_id' => "permit_empty",
        'item_category_name' => "required|is_unique[item_categories.item_category_name,item_category_id,{item_category_id}]",
    ];
    protected $validationMessages   = [
        'item_category_name' => [
            'required'   => "Category Name is required.",
            'is_unique'  => "Category Name already exists.",
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
    }
}
