<?php

namespace App\Models;

use App\Models\FunctionModel;

class StateModel extends FunctionModel
{
    protected $table            = 'state';
    protected $primaryKey       = 'state_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['state_id', 'state_name', 'state_code', 'country_id', 'short_name'];

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
        'state_id' => 'permit_empty',
        'state_name' => 'required|alpha_numeric_space|max_length[255]',
        'state_code' => 'max_length[3]',
        'country_id' => 'required|is_not_unique[country.country_id]',
        'short_name' => 'alpha_numeric_space|max_length[255]',
    ];
    protected $validationMessages = [
        'state_name' => [
            'required' => 'State Name is required.',
            'alpha_numeric_space' => 'Special Character Not Allowed.',
            'max_length' => 'Max Length 255 Character.',
        ],
        'state_code' => [
            'max_length' => 'Max Length 255 Character.',
        ],
        'country_id' => [
            'required' => 'Country ID is required.',
        ],
        'short_name' => [
            'alpha_numeric_space' => 'Special Character Not Allowed.',
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
    protected $messageAlias = "State";
    protected $excludeTrimFields = [];
    public function __construct($joinRequired = true)
    {
        parent::__construct();
        if ($joinRequired) {
            $this->addParentJoin('country_id', $this->get_country_model(), 'left', ['country_name', 'phonecode as "country code"']);
        }
    }
}
