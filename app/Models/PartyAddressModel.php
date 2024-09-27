<?php

namespace App\Models;

use App\Models\FunctionModel;

class PartyAddressModel extends FunctionModel
{
    protected $table            = 'party_address';
    protected $primaryKey       = 'address_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'address_id',
        'party_id',
        'address_short_name',
        'firm_name',
        'firm_gst',
        'party_country_id',
        'party_state_id',
        'party_city_id',
        'party_pincode',
        'party_addresses',
        'address_person_name',
        'address_person_mobile',
        'address_person_email',
        'address_type',
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
    protected $validationRules      = [
        'address_id' => 'permit_empty',
        'party_id' => 'required|is_not_unique[party.party_id]',
        'address_short_name' => 'required|max_length[255]',
        'firm_name' => 'required|max_length[255]',
        'firm_gst' => 'permit_empty|max_length[15]',
        'party_country_id' => 'required|is_not_unique[countries.country_id]',
        'party_state_id' => 'required|is_not_unique[states.state_id]',
        'party_city_id' => 'required|is_not_unique[cities.city_id]',
        'party_pincode' => 'required|max_length[11]',
        'party_addresses' => 'required',
        'address_person_name' => 'required|max_length[255]',
        'address_person_mobile' => 'required|max_length[255]',
        'address_person_email' => 'required|valid_email|max_length[255]',
        'address_type' => 'required|in_list[MainOffice,Other]',
    ];
    protected $validationMessages = [
        'address_id' => [
            'permit_empty' => 'The address ID is optional.',
        ],
        'party_id' => [
            'required' => 'The party ID is required.',
            'is_not_unique' => 'The party ID must exist in the party table.',
        ],
        'address_short_name' => [
            'required' => 'The address short name is required.',
            'max_length' => 'The address short name cannot exceed 255 characters.',
        ],
        'firm_name' => [
            'required' => 'The firm name is required.',
            'max_length' => 'The firm name cannot exceed 255 characters.',
        ],
        'firm_gst' => [
            'permit_empty' => 'The GST number is optional.',
            'max_length' => 'The GST number cannot exceed 15 characters.',
        ],
        'party_country_id' => [
            'required' => 'The country is required.',
            'is_not_unique' => 'The country must exist in the countries table.',
        ],
        'party_state_id' => [
            'required' => 'The state is required.',
            'is_not_unique' => 'The state must exist in the states table.',
        ],
        'party_city_id' => [
            'required' => 'The city is required.',
            'is_not_unique' => 'The city must exist in the cities table.',
        ],
        'party_pincode' => [
            'required' => 'The pincode is required.',
            'max_length' => 'The pincode cannot exceed 11 characters.',
        ],
        'party_addresses' => [
            'required' => 'The address details are required.',
        ],
        'address_person_name' => [
            'required' => 'The contact person\'s name is required.',
            'max_length' => 'The contact person\'s name cannot exceed 255 characters.',
        ],
        'address_person_mobile' => [
            'required' => 'The contact person\'s mobile number is required.',
            'max_length' => 'The mobile number cannot exceed 255 characters.',
        ],
        'address_person_email' => [
            'required' => 'The contact person\'s email is required.',
            'valid_email' => 'Please provide a valid email address.',
            'max_length' => 'The email address cannot exceed 255 characters.',
        ],
        'address_type' => [
            'required' => 'The address type is required.',
            'in_list' => 'The address type must be either MainOffice or Other.',
        ],
    ];

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
    protected $messageAlias = 'Address';
    public function __construct($joinRequired = true, $alias = 'party')
    {
        parent::__construct();
        if ($joinRequired) {
            $this->addParentJoin('party_country_id', $this->get_countries_model(false), 'left', ["country_name as " . $alias . "_country_name"], $alias . "_countries");
            $this->addParentJoin('party_state_id', $this->get_states_model(false), 'left', ["state_name as " . $alias . "_state_name"], $alias . "_states");
            $this->addParentJoin('party_city_id', $this->get_cities_model(false), 'left', ["city_name as " . $alias . "_city_name"], $alias . "_cities");
        }
    }
}
