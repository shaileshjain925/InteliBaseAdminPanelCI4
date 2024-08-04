<?php

namespace App\Models;

use App\Models\FunctionModel;


class IlluminationModel extends FunctionModel
{
    protected $table            = 'illumination';
    protected $primaryKey       = 'illumination_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['illumination_id', 'illumination_name'];

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
        'illumination_id' => "permit_empty",
        'illumination_name' => "required|alpha_numeric_space|max_length[255]",
    ];
    protected $validationMessages = [
        'illumination_name' => [
            'required' => 'Illimionation Name is required.',
            'alpha_numeric_space' => 'Special Character Not Allowed.',
            'max_length' => 'Max Length 255 Character',
        ]
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
    protected $messageAlias = "Illumination";
    protected $excludeTrimFields = [];
    public function __construct()
    {
        parent::__construct();
    }
}
