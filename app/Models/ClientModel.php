<?php

namespace App\Models;

use App\Models\FunctionModel;


class ClientModel extends FunctionModel
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
        'firm_name' => 'required|max_length[255]|alpha_numeric_space',
        'firm_email' => 'permit_empty|valid_email',
        'firm_mobile' => 'permit_empty|max_length[10]|min_length[10]',
        'firm_address' => 'permit_empty|max_length[255]',
        'firm_country_id' => 'permit_empty|is_not_unique[country.country_id]',
        'firm_state_id' => 'permit_empty|is_not_unique[state.state_id]',
        'firm_city_id' => 'permit_empty|is_not_unique[city.city_id]',
        'firm_pincode' => 'permit_empty|integer|max_length[10]',
        'firm_pan_no' => 'permit_empty|max_length[15]',
        'contact_person_name' => 'permit_empty|max_length[255]|alpha_numeric_space',
        'contact_person_email' => 'permit_empty|valid_email',
        'contact_person_mobile' => 'permit_empty|max_length[10]|min_length[10]',
        'dob' => 'permit_empty|valid_date',
        'doa' => 'permit_empty|valid_date',
    ];
    protected $validationMessages = [
        'firm_gst_no' => [
            'max_length' => 'Max Length 15 Character.'
        ],
        'firm_name' => [
            'required' => 'firm name is required.',
            'max_length' => 'Max Length 255 Character.',
            'alpha_numeric_space' => 'Special Character Not Allowed.'
        ],
        'firm_email' => [
            'valid_email' => 'Please Enter a valid email.'
        ],
        'firm_mobile' => [
            'max_length' => 'Max Length 10 Character.',
            'min_length' => 'Min Length 10 Character.'
        ],
        'firm_address' => [
            'max_length' => 'Max Length 255 Character.'
        ],
        'firm_pan_no' => [
            'max_length' => 'Max Length 15 Character.'
        ],
        'firm_pincode' => [
            'max_length' => 'Max Length 10 Character.'
        ],
        'contact_person_name' => [
            'max_length' => 'Max Length 255 Character.',
            'alpha_numeric_space' => 'Special Character Not Allowed.'
        ],
        'contact_person_email' => [
            'valid_email' => 'Please Enter a valid email.'
        ],
        'contact_person_mobile' => [
            'max_length' => 'Max Length 10 Character.',
            'min_length' => 'Min Length 10 Character.'
        ],
        'dob' => [
            'valid_date' => 'Date must be a valid date.',
        ],
        'doa' => [
            'valid_date' => 'Date must be a valid date.',
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
    protected $messageAlias = "Client";
    protected $excludeTrimFields = [];

    public function __construct()
    {
        parent::__construct();
        $this->addParentJoin('firm_country_id', $this->get_country_model(), 'left', ['country_name as firm_country_name']);
        $this->addParentJoin('firm_state_id', $this->get_state_model(), 'left', ['state_name as firm_state_name']);
        $this->addParentJoin('firm_city_id', $this->get_city_model(), 'left', ['city_name as firm_city_name']);
    }
}
