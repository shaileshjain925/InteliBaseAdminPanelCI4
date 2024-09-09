<?php

namespace App\Models;

use App\Models\FunctionModel;
use App\Traits\CommonTraits;

class ItemSubGroupsModel extends FunctionModel
{
    use CommonTraits;
    protected $table            = 'item_sub_groups';
    protected $primaryKey       = 'item_sub_group_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['item_sub_group_id', 'item_group_id', 'item_sub_group_name', 'item_sub_group_code', 'item_sub_group_description', 'item_sub_group_image', 'item_sub_group_is_active'];

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
    protected $messageAlias = 'Item Sub Group';

    // Validation
    protected $validationRules = [
        'item_sub_group_id' => 'permit_empty',
        'item_sub_group_name' => 'required|max_length[255]|is_unique[item_sub_groups.item_sub_group_name,item_sub_group_id,{item_sub_group_id}]',
        'item_sub_group_code' => 'required|max_length[5]|is_unique[item_sub_groups.item_sub_group_code,item_sub_group_id,{item_sub_group_id}]',
        'item_group_id' => 'required|is_not_unique[item_groups.item_group_id]',
        'item_sub_group_description' => 'permit_empty',
        'item_sub_group_image' => 'permit_empty',
        'item_sub_group_is_active' => 'permit_empty|in_list[0,1]',
    ];

    protected $validationMessages = [
        'item_sub_group_name' => [
            'required' => 'Sub Group name is required.',
            'max_length' => 'Max 255 characters.',
            'is_unique' => 'Sub Group name already exists.'
        ],
        'item_group_id' => [
            'required' => 'Group is required.',
            'is_not_unique' => 'Selected group does not exist.'
        ],
        'item_sub_group_code' => [
            'required' => 'group code is required.',
            'max_length' => 'Max 5 characters allowed.',
            'is_unique' => 'Sub Group code already exists.'
        ],
        'item_sub_group_is_active' => [
            'required' => 'Is active status is required.',
            'in_list' => 'Must be 0 or 1.'
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
    public function __construct()
    {
        parent::__construct();
        $this->addParentJoin('item_group_id', $this->get_item_group_model(), 'left', ['item_group_name', 'item_group_code']);
    }
}
