<?php

namespace App\Models;

use App\Traits\CommonTraits;
use CodeIgniter\Model;

class ModuleMenusModel extends Model
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
            $this->addParentJoin('module_id', $this->get_modules_model(false), 'left', ['module_name']);
        }
    }
}
