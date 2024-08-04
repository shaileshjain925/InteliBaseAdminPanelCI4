<?php

namespace App\Models;

use App\Models\FunctionModel;

class LocationModel extends FunctionModel
{
    protected $table            = 'location';
    protected $primaryKey       = 'location_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'location_id', 'location_name', 'location_type_id', 'address',
        'location_country_id', 'location_state_id', 'location_city_id',
        'pincode', 'latitude', 'longitude', 'google_map_link'
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
        'location_id' => "permit_empty",
        'location_name' => "required|alpha_numeric_space|max_length[255]",
        'location_type_id' => "required|integer",
        'location_country_id' => "required|integer|is_not_unique[country.country_id]",
        'location_state_id' => "required|integer|is_not_unique[state.state_id]",
        'location_city_id' => "required|integer|is_not_unique[city.city_id]",
        'pincode' => "permit_empty|integer|max_length[10]",
        'latitude' => "permit_empty|string|max_length[255]",
        'longitude' => "permit_empty|string|max_length[255]",
        'google_map_link' => "permit_empty|valid_url|max_length[255]",
    ];

    protected $validationMessages = [
        'location_name' => [
            'required' => 'Location Name is required.',
            'alpha_numeric_space' => 'Special Character Not Allowed.',
            'max_length' => 'Max Length 255 Character',
        ],
        'location_type_id' => [
            'required' => 'Location Type ID is required.',
        ],
        'location_country_id' => [
            'required' => 'Country ID is required.',
        ],
        'location_state_id' => [
            'required' => 'State ID is required.',
        ],
        'location_city_id' => [
            'required' => 'City ID is required.',
        ],
        'pincode' => [
            'max_length' => 'Max Length 10 Character',
        ],
        'latitude' => [
            'max_length' => 'Max Length 255 Character',
        ],
        'longitude' => [
            'max_length' => 'Max Length 255 Character',
        ],
        'google_map_link' => [
            'valid_url' => 'Please Enter a valid URL.',
            'max_length' => 'Max Length 255 Character',
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

    protected $messageAlias = "Location";
    protected $excludeTrimFields = [];
    public function __construct()
    {
        parent::__construct();
        $this->addParentJoin('location_country_id', $this->get_country_model(), 'left', ['country_name as location_country_name']);
        $this->addParentJoin('location_state_id', $this->get_state_model(), 'left', ['state_name as location_state_name']);
        $this->addParentJoin('location_city_id', $this->get_city_model(), 'left', ['city_name as location_city_name']);
        $this->addParentJoin('location_type_id', $this->get_location_type_model(), 'left', ['location_type_name']);
    }
}
