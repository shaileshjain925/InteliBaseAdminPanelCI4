<?php

namespace App\Models;

use App\Models\FunctionModel;
use App\Traits\CommonTraits;

class ModulesModel extends FunctionModel
{
    use CommonTraits;
    protected $table            = 'modules';
    protected $primaryKey       = 'module_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['module_id', 'module_code', 'module_name', 'is_dashboard', 'created_at', 'updated_at'];

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
        'module_id' => "required",
        'module_code' => "required|is_unique[modules.module_code,module_id,{module_id}]",
        'module_name' => "required|is_unique[modules.module_name,module_id,{module_id}]",
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
    protected $messageAlias = 'Modules';
    public function __construct($joinRequired = true)
    {
        parent::__construct();
    }
    public function role_modules_data($role_id)
    {
        $this->select('
            modules.module_id,
            modules.module_name,
            IFNULL(modules.is_dashboard, 0) as is_dashboard,
            IFNULL(role_modules.dashboard, 0) as dashboard,
            IFNULL(role_modules.is_primary_dashboard, 0) as is_primary_dashboard,
            IFNULL(role_modules.master_view, 0) as master_view,
            IFNULL(role_modules.master_create, 0) as master_create,
            IFNULL(role_modules.master_edit, 0) as master_edit,
            IFNULL(role_modules.master_approval, 0) as master_approval,
            IFNULL(role_modules.master_delete, 0) as master_delete,
            IFNULL(role_modules.master_print, 0) as master_print,
            IFNULL(role_modules.master_export, 0) as master_export,
            IFNULL(role_modules.master_bulk_delete, 0) as master_bulk_delete,
            IFNULL(role_modules.transaction_view, 0) as transaction_view,
            IFNULL(role_modules.transaction_create, 0) as transaction_create,
            IFNULL(role_modules.transaction_edit, 0) as transaction_edit,
            IFNULL(role_modules.transaction_approval, 0) as transaction_approval,
            IFNULL(role_modules.transaction_delete, 0) as transaction_delete,
            IFNULL(role_modules.transaction_print, 0) as transaction_print,
            IFNULL(role_modules.transaction_export, 0) as transaction_export,
            IFNULL(role_modules.transaction_bulk_delete, 0) as transaction_bulk_delete,
            IFNULL(role_modules.report_view, 0) as report_view,
            IFNULL(role_modules.report_print, 0) as report_print,
            IFNULL(role_modules.report_export, 0) as report_export,
            IFNULL(role_modules.config_view, 0) as config_view
        ');
        $this->join("role_modules", "role_modules.module_id = modules.module_id AND role_modules.role_id = $role_id", "left");
        $modules_menus_ids = array_column($this->get_module_menus_model(false)->distinct()->select('module_id')->findAll() ?? [], 'module_id');
        $this->whereIn('modules.module_id', $modules_menus_ids);
        return $this->findAll() ?? [];
    }
}
