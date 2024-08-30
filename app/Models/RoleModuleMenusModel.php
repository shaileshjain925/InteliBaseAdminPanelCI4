<?php

namespace App\Models;

use App\Models\FunctionModel;
use App\Traits\CommonTraits;

class RoleModuleMenusModel extends FunctionModel
{
    use CommonTraits;
    protected $table            = 'role_module_menus';
    protected $primaryKey       = 'role_module_menu_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['role_module_menu_id', 'role_id', 'module_menu_id', 'view', 'create', 'edit', 'approval', 'delete', 'print', 'export', 'bulk_delete', 'back_days_data_allowed','back_days_data_edit_allowed', 'created_at', 'updated_at'];
    protected $booleanFields = ['view', 'create', 'edit', 'approval', 'delete', 'print', 'export', 'bulk_delete'];
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
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['updateBooleanFields'];
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
            $this->addParentJoin('role_id', $this->get_roles_model(), 'left', ['role_name']);
            $this->addParentJoin('module_menu_id', $this->get_module_menus_model(), 'left', ['menu_name', 'menu_code']);
        }
    }
}
