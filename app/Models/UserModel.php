<?php

namespace App\Models;

use App\Models\FunctionModel;
use UserType;

class UserModel extends FunctionModel
{
    protected $table            = 'user';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_name', 'reporting_to_user_id', 'designation_id', 'user_email', 'user_mobile', 'user_address', 'user_country_id',
        'user_state_id', 'user_city_id', 'user_pincode', 'user_aadhaar_card',
        'user_aadhaar_card_image', 'user_image', 'user_type', 'password',
        'otp', 'is_active'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [
        'is_active' => 'boolean'
    ];

    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'user_id' => 'permit_empty',
        'reporting_to_user_id' => 'permit_empty|is_not_unique[user.user_id]',
        'designation_id' => 'permit_empty|is_not_unique[designation.designation_id]',
        'user_name'           => 'required|max_length[255]',
        'user_email'          => 'permit_empty|valid_email|max_length[255]',
        'user_mobile'         => 'permit_empty|max_length[10]|min_length[10]',
        'user_address'        => 'permit_empty',
        'user_country_id'     => 'required|is_not_unique[country.country_id]',
        'user_state_id'       => 'required|is_not_unique[state.state_id]',
        'user_city_id'        => 'required|is_not_unique[city.city_id]',
        'user_pincode'        => 'required|integer|max_length[10]',
        'user_aadhaar_card'    => 'permit_empty|max_length[12]',
        'user_aadhaar_card_image' => 'permit_empty|max_length[255]',
        'password'        => 'required',
        'user_image'          => 'permit_empty|max_length[255]',
        'user_type'           => "required|in_list[super_admin,admin,sales_manager,sales_executive,purchase,finance,crm]",
        'otp'                 => 'permit_empty|max_length[6]',
    ];

    protected $validationMessages = [
        'user_name' => [
            'required' => 'Staff name is required.',
            'max_length' => 'Max Length 255 Character.'
        ],
        'user_email' => [
            'valid_email' => 'Please Enter valid email address.',
            'max_length'  => 'Max Length 255 Character.'
        ],
        'user_mobile' => [
            'max_length' => 'Max Length 10 Character.',
            'min_length' => 'Min Length 10 Character.',
        ],
        'user_country_id' => [
            'required' => 'Staff country is required.',
        ],
        'user_state_id' => [
            'required' => 'Staff state is required.',
        ],
        'user_city_id' => [
            'required' => 'Staff city is required.',
        ],
        'user_aadhaar_card' => [
            'max_length' => 'Max Length 12 Character.',
        ],
        'user_pincode' => [
            'required' => 'Staff pincode is required.',
            'max_length' => 'Max Length 10 Character.'
        ],
        'user_type' => [
            'required' => 'Staff type is required.',
            'in_list'  => 'Staff type must be one of: admin, sales_executive, site_engineer,manager.'
        ],
        'password' => [
            'required' => 'Password is required.',
        ],

    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $loginFields = ['user_email', 'user_mobile'];
    protected $beforeInsert   = ['hashPassword', 'allTrim'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['hashPassword', 'allTrim'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected $messageAlias = "Staff";
    protected $excludeTrimFields = [];
    protected $passwordField = 'password';
    public function __construct($joinRequired = true)
    {
        parent::__construct();
        if ($joinRequired) {
            $this->addParentJoin('user_country_id', $this->get_country_model(), 'left', ['country_name as user_country_name']);
            $this->addParentJoin('user_state_id', $this->get_state_model(), 'left', ['state_name as user_state_name']);
            $this->addParentJoin('user_city_id', $this->get_city_model(), 'left', ['city_name as user_city_name']);
            $this->addParentJoin('reporting_to_user_id', $this->get_user_model(false), 'left', ['user_name as reporting_to_user_name'], 'reporting_user');
            $this->addParentJoin('designation_id', $this->get_designation_model(), 'left', ['designation_name']);
        }
    }
}
