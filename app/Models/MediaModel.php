<?php

namespace App\Models;

use App\Models\FunctionModel;

class MediaModel extends FunctionModel
{
    protected $table            = 'media';
    protected $primaryKey       = 'media_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'media_id', 'media_name', 'media_type_id', 'illumination_id', 'width', 'height',
        'total_square_ft', 'location_id', 'party_id', 'contract_from_date', 'contract_to_date',
        'purchase_amount', 'gst_amount', 'total', 'minimum_rent_days', 'rent_rate_per_day',
        'media_charge', 'printing_charge', 'mounting_charge', 'media_image_1', 'media_image_2',
        'media_image_3'
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
        'media_id' => "permit_empty",
        'media_name' => "required|alpha_numeric_space|max_length[255]",
        'media_type_id' => "required|is_not_unique[media_type.media_type_id]",
        'illumination_id' => "required|is_not_unique[illumination.illumination_id]",
        'location_id' => "required|is_not_unique[location.location_id]",
        'party_id' => "permit_empty|is_not_unique[party.party_id]",
        'contract_from_date' => "permit_empty|valid_date",
        'contract_to_date' => "permit_empty|valid_date",
        'purchase_amount' => "required",
        'gst_amount' => "required",
        'total' => "required",
        'minimum_rent_days' => "required|integer",
        'rent_rate_per_day' => "required",
        'media_charge' => "permit_empty",
        'printing_charge' => "permit_empty",
        'mounting_charge' => "permit_empty",
        'media_image_1' => "permit_empty|max_length[255]",
        'media_image_2' => "permit_empty|max_length[255]",
        'media_image_3' => "permit_empty|max_length[255]",
    ];

    protected $validationMessages = [
        'media_name' => [
            'required' => 'Media Name is required.',
            'alpha_numeric_space' => 'Special Character Not Allowed.',
            'max_length' => 'Max Length 255 Character',
        ],
        'media_type_id' => [
            'required' => 'Media Type ID is required.',
        ],
        'illumination_id' => [
            'required' => 'Illumination ID is required.',
        ],
        'location_id' => [
            'required' => 'Location ID is required.',
        ],
        'contract_from_date' => [
            'valid_date' => 'Contract From Date must be a valid date.',
        ],
        'contract_to_date' => [
            'valid_date' => 'Contract To Date must be a valid date.',
        ],
        'purchase_amount' => [
            'required' => 'Purchase Amount is required.',
        ],
        'gst_amount' => [
            'required' => 'GST Amount is required.',
        ],
        'total' => [
            'required' => 'Total is required.',
        ],
        'minimum_rent_days' => [
            'required' => 'Minimum Rent Days is required.',
        ],
        'rent_rate_per_day' => [
            'required' => 'Rent Rate Per Day is required.',
        ],
        'printing_charge' => [
            'required' => 'Printing Charge is required.',
        ],
        'mounting_charge' => [
            'required' => 'Mounting Charge is required.',
        ],
        'media_image_1' => [
            'max_length' => 'Max Length 255 Character.',
        ],
        'media_image_2' => [
            'max_length' => 'Max Length 255 Character.',
        ],
        'media_image_3' => [
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

    protected $messageAlias = "Media";
    protected $excludeTrimFields = [];


    public function __construct()
    {
        parent::__construct();
        $this->addParentJoin('media_type_id', $this->get_media_type_model(), 'left', ['media_type_name ']);
        $this->addParentJoin('illumination_id', $this->get_illumination_model(), 'left', ['illumination_name']);
        $this->addParentJoin('location_id', $this->get_location_model(), 'left', ['location_name']);
  
        $this->addParentJoin('party_id', $this->get_party_model(), 'left', ['firm_name','contact_person_name','contact_person_email','contact_person_mobile','firm_address','vendor_type']);
    }
}
