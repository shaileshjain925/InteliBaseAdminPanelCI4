<?php

namespace App\Models;

use App\Models\FunctionModel;
use App\Traits\CommonTraits;

class ItemGroupsModel extends FunctionModel
{
    use CommonTraits;
    protected $table            = 'item_groups';
    protected $primaryKey       = 'item_group_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['item_group_id', 'item_group_name', 'item_group_code', 'item_group_image', 'item_group_description', 'item_group_is_active'];
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
    protected $messageAlias = 'Item Group';


    // Validation
    protected $validationRules = [
        'item_group_id'           => 'permit_empty',
        'item_group_name'         => 'required|max_length[255]|is_unique[item_groups.item_group_name,item_group_id,{item_group_id}]',
        'item_group_code'         => 'required|max_length[255]|is_unique[item_groups.item_group_code,item_group_id,{item_group_id}]',
        'item_group_description'  => 'permit_empty',
        'item_group_image'        => 'permit_empty|max_length[255]',
        'item_group_is_active'    => 'permit_empty|in_list[0,1]',
    ];



    protected $validationMessages = [
        'item_group_name' => [
            'required'   => 'Group name is required.',
            'max_length' => 'Max 255 characters allowed.',
            'is_unique'  => 'Group name already exists.',
        ],
        'item_group_code' => [
            'required'   => 'Group code is required.',
            'max_length' => 'Max 255 characters allowed.',
            'is_unique'  => 'Group code already exists.',
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
