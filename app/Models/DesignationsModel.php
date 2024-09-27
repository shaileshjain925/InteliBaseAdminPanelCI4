<?php

namespace App\Models;

use App\Models\FunctionModel;
use App\Traits\CommonTraits;

class DesignationsModel extends FunctionModel
{
    use CommonTraits;
    protected $table            = 'designations';
    protected $primaryKey       = 'designation_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['designation_id', 'designation_name', 'created_at', 'updated_at'];

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
        "designation_id" => "permit_empty",
        "designation_name" => "required|is_unique[designations.designation_name,designation_id,{designation_id}]"
    ];
    protected $validationMessages   = [];
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
    protected $messageAlias = 'Designation';
    public function __construct($joinRequired = true)
    {
        parent::__construct();
    }
}
