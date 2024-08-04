<?php

namespace App\Models;

use App\Models\FunctionModel;

class PartyModel extends FunctionModel
{
    protected $table            = 'party';
    protected $primaryKey       = 'party_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'party_type', 'firm_gst_no', 'firm_name', 'firm_email', 'firm_mobile', 'firm_address',
        'firm_country_id', 'firm_state_id', 'firm_city_id', 'firm_pincode', 'firm_pan_no',
        'contact_person_name', 'contact_person_email', 'contact_person_mobile', 'dob', 'doa',
        'lead_status', 'lead_description', 'lead_date','vendor_type', 'bank_name', 'account_type', 'ifsc_code', 'account_no'
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
        'party_id' => 'permit_empty',
        'party_type' => 'required|in_list[lead,prospect,client,vendor]',
        'firm_gst_no' => 'permit_empty|max_length[15]',
        'firm_name' => 'required|max_length[255]',
        'firm_email' => 'permit_empty|valid_email',
        'firm_mobile' => 'permit_empty|max_length[10]|min_length[10]',
        'firm_address' => 'permit_empty',
        'firm_country_id' => 'permit_empty|is_not_unique[country.country_id]',
        'firm_state_id' => 'permit_empty|is_not_unique[state.state_id]',
        'firm_city_id' => 'permit_empty|is_not_unique[city.city_id]',
        'firm_pincode' => 'permit_empty|integer|max_length[10]',
        'firm_pan_no' => 'permit_empty|max_length[15]',
        'contact_person_name' => 'permit_empty|max_length[255]',
        'contact_person_email' => 'permit_empty|valid_email',
        'contact_person_mobile' => 'permit_empty|max_length[10]|min_length[10]',
        'dob' => 'permit_empty|valid_date',
        'doa' => 'permit_empty|valid_date',
        'lead_description' => 'permit_empty|max_length[255]',
        'lead_status' => 'permit_empty|in_list[Hot,Cold,Warm,Cancel,Converted]',
        'vendor_type' => 'permit_empty|in_list[none,agency,landlord,government]',
        'bank_name' => 'permit_empty|max_length[255]',
        'account_type' => 'permit_empty|in_list[saving,current]',
        'ifsc_code' => 'permit_empty|max_length[15]',
        'account_no' => 'permit_empty|integer|max_length[15]'
    ];

    protected $validationMessages = [
        'party_type' => [
            'required' => 'Party Type is required.',
            'in_list'  => 'Party Type must be one of the following: lead, prospect, client, vendor.'
        ],
        'firm_name' => [
            'required' => 'Firm Name is required.',
            'string'   => 'Firm Name must be a string.',
            'max_length' => 'Max Length 255 Character.'
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

    protected $messageAlias = "Party";
    protected $excludeTrimFields = [];
    public function __construct()
    {
        parent::__construct();
        $this->addParentJoin('firm_country_id', $this->get_country_model(), 'left', ['country_name as firm_country_name']);
        $this->addParentJoin('firm_state_id', $this->get_state_model(), 'left', ['state_name as firm_state_name']);
        $this->addParentJoin('firm_city_id', $this->get_city_model(), 'left', ['city_name as firm_city_name']);
    }
}
