<?php

namespace App\Models;

use App\Models\FunctionModel;

class LocationTypeModel extends FunctionModel
{
    protected $table            = 'location_type';
    protected $primaryKey       = 'location_type_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'location_type_id', 'location_type_name', 'location_type_description',
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
        'location_type_id' => "permit_empty",
        'location_type_name' => "required|alpha_numeric_space|max_length[255]",
        'location_type_description' => "permit_empty|max_length[255]",
    ];

    protected $validationMessages = [
        'location_type_name' => [
            'required' => 'Location Type Name is required.',
            'alpha_numeric_space' => 'Special Character Not Allowed.',
            'max_length' => 'Max Length 255 Character',
        ],
        'location_type_description' => [
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

    protected $messageAlias = "Location Type";
    protected $excludeTrimFields = [];
    public function __construct()
    {
        parent::__construct();
    }
}
