<?php

namespace App\Models;

use App\Models\FunctionModel;

class LeadModel extends FunctionModel
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
        'party_id'=>'permit_empty',
        'party_type' => 'required|in_list[lead,prospect,client,vendor]',
        'contact_person_name' => 'required|max_length[255]|alpha_numeric_space',
        'contact_person_email' => 'permit_empty|valid_email',
        'contact_person_mobile' => 'required|max_length[10]|min_length[10]|is_unique[party.contact_person_mobile,party_id,{party_id}]',
        'lead_description' => 'permit_empty',
        'lead_status' => 'required|in_list[Hot,Cold,Warm,Win,Lost]',
        'lead_date' => 'permit_empty|valid_date'
    ];
    protected $validationMessages = [
        'contact_person_name' => [
            'required' => 'Person Name is required.',
            'max_length' => 'Max Length 255 Character.',
            'alpha_numeric_space' => 'Special Character Not Allowed.'
        ],
        'contact_person_email' => [
            'valid_email' => 'Please Enter a valid email address.'
        ],
        'contact_person_mobile' => [
            'required' => 'Mobile Number is required.',
            'max_length' => 'Max Length 10 Character.',
            'min_length' => 'Min Length 10 Character.',
            'is_unique' => 'This Mobile Number is all ready Exists',
        ],
        'lead_status' => [
            'required' => 'Lead Status is required.',
            'in_list' =>'Lead Status is required',
        ],
        'lead_date' => [
            'valid_date' => 'Date must be a valid.',
            
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
    protected $messageAlias = "Lead";
    protected $excludeTrimFields = [];
    public function __construct()
    {
        parent::__construct();
        $this->addParentJoin('firm_country_id', $this->get_country_model(), 'left', ['country_name as firm_country_name']);
        $this->addParentJoin('firm_state_id', $this->get_state_model(), 'left', ['state_name as firm_state_name']);
        $this->addParentJoin('firm_city_id', $this->get_city_model(), 'left', ['city_name as firm_city_name']);
    }
}
