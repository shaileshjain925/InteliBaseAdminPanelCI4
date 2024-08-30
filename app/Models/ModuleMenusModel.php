<?php

namespace App\Models;

use App\Models\FunctionModel;
use App\Traits\CommonTraits;

class ModuleMenusModel extends FunctionModel

{
    use CommonTraits;
    protected $table            = 'module_menus';
    protected $primaryKey       = 'module_menu_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['module_menu_id', 'module_id', 'menu_code', 'menu_name', 'menu_type', 'created_at', 'updated_at'];

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
        'module_menu_id' => 'required',
        'module_id' => 'required|is_not_unique[modules.module_id]',
        'menu_code' => 'required|is_unique[module_menus.menu_code,module_menu_id,{module_menu_id}]',
        'menu_name' => 'required|is_unique[module_menus.menu_name,module_menu_id,{module_menu_id}]',
        'menu_type' => 'required|in_list[master,transaction,report,config]',
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
            $this->addParentJoin('module_id', $this->get_modules_model(), 'left', ['module_name']);
        }
    }
    public function role_module_menus_data($role_id, $modules_ids)
    {
        $this->select("
            modules.module_id,
            modules.module_name,
            module_menus.module_menu_id,
            module_menus.menu_name,
            module_menus.menu_type,
            IFNULL(role_module_menus.view, 0) as 'view',
            IFNULL(role_module_menus.create, 0) as 'create',
            IFNULL(role_module_menus.edit, 0) as 'edit',
            IFNULL(role_module_menus.approval, 0) as 'approval',
            IFNULL(role_module_menus.delete, 0) as 'delete',
            IFNULL(role_module_menus.print, 0) as 'print',
            IFNULL(role_module_menus.export, 0) as 'export',
            IFNULL(role_module_menus.bulk_delete, 0) as 'bulk_delete',
            IFNULL(role_module_menus.back_days_data_allowed, 0) as 'back_days_data_allowed',
            IFNULL(role_module_menus.back_days_data_edit_allowed, 0) as 'back_days_data_edit_allowed'
        ");

        $this->join("modules", "modules.module_id = module_menus.module_id", "left");
        $this->join("role_module_menus", "role_module_menus.module_menu_id = module_menus.module_menu_id AND role_module_menus.role_id = $role_id", "left");
        $this->whereIn('modules.module_id', $modules_ids);
        return $this->findAll() ?? [];
    }
}
