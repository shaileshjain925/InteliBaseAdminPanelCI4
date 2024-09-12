<?php

namespace App\Models;

use App\Models\FunctionModel;

class ItemModel extends FunctionModel
{
    protected $table            = 'items';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['item_id', 'item_brand_id', 'item_category_id', 'item_sub_group_id', 'item_hsn_id', 'item_class', 'item_code', 'item_name', 'item_description', 'item_supplier_description', 'item_nature', 'item_manufacturing_type', 'item_is_spare_part', 'item_is_expire', 'item_min_order_qty', 'item_min_order_pack_qty', 'item_length_cms', 'item_width_cms', 'item_height_cms', 'item_weight_kg', 'item_drawing_no', 'item_remark', 'item_uqc_id', 'item_pack_uqc_id', 'item_pack_conversion', 'item_user_id', 'item_box_image', 'item_image', 'item_is_active', 'item_quality_check_link', 'item_inspection_required'];


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
    protected $messageAlias = 'Item';

    // Validation
    protected $validationRules      = [
        'item_id'                 => 'permit_empty',
        'item_brand_id'           => 'permit_empty|is_not_unique[item_brands.item_brand_id]',
        'item_category_id'        => 'permit_empty|is_not_unique[item_categories.item_category_id]',
        'item_sub_group_id'       => 'permit_empty|is_not_unique[item_sub_groups.item_sub_group_id]',
        'item_hsn_id'             => 'permit_empty|is_not_unique[item_hsn.item_hsn_id]',
        'item_class'              => 'required|in_list[listed,non-listed,not-assign]',
        'item_code'               => 'permit_empty|is_unique[items.item_code,item_id,{item_id}]|max_length[255]',
        'item_name'               => 'required|is_unique[items.item_name,item_id,{item_id}]|max_length[255]',
        'item_description'        => 'permit_empty',
        'item_supplier_description' => 'permit_empty',
        'item_nature'             => 'required|in_list[Capex,Packaging,Services,Saleable,Consumable,MRO,NoBuy,NoStock]',
        'item_manufacturing_type'  => 'required|in_list[FinishedProduct,RawMaterial,SemiFinished,Other]',
        'item_is_spare_part'      => 'permit_empty',
        'item_is_expire'          => 'permit_empty',
        'item_min_order_qty'      => 'permit_empty',
        'item_min_order_pack_qty' => 'permit_empty',
        'item_length_cms'         => 'permit_empty',
        'item_width_cms'          => 'permit_empty',
        'item_height_cms'         => 'permit_empty',
        'item_weight_kg'          => 'permit_empty',
        'item_drawing_no'         => 'permit_empty|max_length[255]',
        'item_remark'             => 'permit_empty',
        'item_uqc_id'             => 'required|is_not_unique[item_uqc.item_uqc_id]',
        'item_pack_uqc_id'        => 'permit_empty|is_not_unique[item_uqc.item_uqc_id]',
        'item_pack_conversion'    => 'permit_empty',
        'item_user_id'            => 'required',
        'item_box_image'          => 'permit_empty',
        'item_image'              => 'permit_empty',
        'item_quality_check_link' => 'permit_empty',
        'item_inspection_required' => 'permit_empty',
        'item_is_active'          => 'permit_empty',
    ];
    protected $booleanFields = ['item_is_spare_part', 'item_is_expire', 'item_inspection_required', 'item_is_active'];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['updateBooleanFields'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['updateBooleanFields'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function __construct($joinRequired = true)
    {
        parent::__construct();
        if ($joinRequired) {
            $this->addParentJoin('item_brand_id', $this->get_item_brand_model(), 'left', ['item_brand_name']);
            $this->addParentJoin('item_category_id', $this->get_item_category_model(), 'left', ['item_category_name']);
            $this->addParentJoin('item_sub_group_id', $this->get_item_sub_group_model(), 'left', ['item_sub_group_name']);
            $this->addParentJoin('item_hsn_id', $this->get_item_hsn_model(), 'left', ['item_hsn_code', 'item_hsn_type', 'item_hsn_gst']);
            $this->addParentJoin('item_uqc_id', $this->get_item_uqc_model(), 'left', ['item_uqc_name']);
            $this->addParentJoin('item_pack_uqc_id', $this->get_item_uqc_model(), 'left', ['item_uqc_name as item_uqc_pack_name']);
            $this->addParentJoin('item_user_id', $this->get_users_model(), 'left', ['user_name']);
        }
    }
}
