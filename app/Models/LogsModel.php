<?php

namespace App\Models;

use App\Models\FunctionModel;
use App\Traits\CommonTraits;

class LogsModel extends FunctionModel
{
    use CommonTraits;
    protected $table            = 'logs';
    protected $primaryKey       = 'log_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['log_id', 'log_type', 'user_id', 'table_name', 'record_id', 'log_menu_code', 'log_message', 'log_json_data'];

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
        'log_id' => "permit_empty",
        'log_type' => 'required|in_list[create,update,delete,bulkDelete]',
        'user_id' => "required",
        'table_name' => "permit_empty",
        'record_id' => "permit_empty",
        'log_menu_code' => "required",
        'log_message' => "required",
        'log_json_data' => "permit_empty",
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
    public function __construct($joinRequired = true)
    {
        parent::__construct();
        if ($joinRequired) {
            $this->addParentJoin('user_id', $this->get_users_model(), 'left', ['user_name','user_code']);
        }
    }
}
