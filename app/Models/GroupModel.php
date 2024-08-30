<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Traits\CommonTraits;

class GroupModel extends FunctionModel
{
    use CommonTraits;
    protected $table            = 'group';
    protected $primaryKey       = 'group_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['group_id', 'group_type_id','group_name', 'group_image'];

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
    protected $messageAlias = 'group';

    // Validation
    protected $validationRules = [
        'group_id' => 'permit_empty',
        'group_name' => 'required|max_length[255]',
        'group_description' => 'permit_empty',
        'group_type_id' => 'required|is_not_unique[group_type.group_type_id]',
        'is_active' => 'permit_empty|in_list[0,1]',
        'group_image' => 'permit_empty',
        'group_alt_text' => 'permit_empty'
    ];

    protected $validationMessages = [
        'group_name' => [
            'required' => 'group name is required.',
            'max_length' => 'Max 255 characters.',
            'alpha_space' => 'The group name cannot contain special characters or numbers.'

        ],
        'group_type_id' => [
            'required' => 'group type ID is required.',
            'integer' => 'Must be an integer.',
            'is_not_unique' => 'Selected group type does not exist.'
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
        $this->addParentJoin('group_type_id', $this->get_group_type_model(), 'left', ['group_type_name']);
    }
}
