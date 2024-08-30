<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Traits\CommonTraits;

class GroupTypeModel extends FunctionModel
{
    use CommonTraits;
    protected $table            = 'group_type';
    protected $primaryKey       = 'group_type_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['group_type_id', 'group_type_name','group_type_image', 'group_type_description', 'is_active'];
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
    protected $messageAlias = 'group_type';
    

    // Validation
    protected $validationRules = [
        'group_type_id' => 'permit_empty',
        'group_type_name' => 'required|max_length[255]|is_unique[group_type.group_type_name,group_type_id,{group_type_id}]',
        'group_type_description' => 'permit_empty',
        'group_type_image' => 'permit_empty',
        'group_type_alt_text' => 'permit_empty',
        'is_active' => 'permit_empty|in_list[0,1]'
    ];

   

    protected $validationMessages = [
        'group_type_name' => [
            'required' => 'group type name is required.',
            'max_length' => 'Max 255 characters allowed.',
            'alpha_space' => 'The group name cannot contain special characters or numbers.'
        ],
        'is_active' => [
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
    }
}
