<?php

namespace App\Models;

use App\Models\FunctionModel;
use App\Traits\CommonTraits;

class UsersModel extends FunctionModel
{
    use CommonTraits;
    protected $table            = 'users';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['user_id', 'user_code', 'reporting_to_user_id', 'designation_id', 'role_id', 'user_name', 'user_email', 'user_mobile', 'user_address', 'user_country_id', 'user_state_id', 'user_city_id', 'user_pincode', 'user_aadhaar_card', 'user_aadhaar_card_image', 'user_image', 'user_type', 'password', 'otp', 'is_active', 'created_at', 'updated_at'];

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
        'reporting_to_user_id' => 'permit_empty',
        'designation_id' => 'required|is_not_unique[designations.designation_id]',
        'user_name'           => 'required|max_length[255]|is_unique[users.user_name,user_id,{user_id}]',
        'user_code'          => 'required|max_length[255]|is_unique[users.user_code,user_id,{user_id}]',
        'user_email'          => 'permit_empty|valid_email|max_length[255]|is_unique[users.user_email,user_id,{user_id}]',
        'user_mobile'         => 'permit_empty|max_length[10]|min_length[10]|is_unique[users.user_mobile,user_id,{user_id}]',
        'user_address'        => 'permit_empty',
        'user_country_id'     => 'required|is_not_unique[countries.country_id]',
        'user_state_id'       => 'required|is_not_unique[states.state_id]',
        'user_city_id'        => 'required|is_not_unique[cities.city_id]',
        'user_pincode'        => 'required|integer|max_length[10]',
        'user_aadhaar_card'    => 'permit_empty|max_length[12]',
        'user_aadhaar_card_image' => 'permit_empty|max_length[255]',
        'password'        => 'permit_empty',
        'user_image'          => 'permit_empty|max_length[255]',
        'user_type'           => "required|in_list[super_admin,admin,staff]",
        'otp'                 => 'permit_empty|max_length[6]',
    ];

    protected $validationMessages = [
        'user_id' => [
            // No specific validation message required since it's permit_empty
        ],
        'reporting_to_user_id' => [
            'is_not_unique' => 'The selected reporting user does not exist.',
        ],
        'designation_id' => [
            'is_not_unique' => 'The selected designation does not exist.',
        ],
        'user_name' => [
            'required' => 'Staff name is required.',
            'max_length' => 'Staff name cannot exceed 255 characters.',
            'is_unique'   => 'The Staff Name field must contain a unique value.',
        ],
        'user_email' => [
            'max_length'  => 'Email address cannot exceed 255 characters.',
            'is_unique'   => 'This Staff Code is already associated with another Staff.',
        ],
        'user_email' => [
            'valid_email' => 'Please enter a valid email address.',
            'max_length'  => 'Email address cannot exceed 255 characters.',
            'is_unique'   => 'This email is already associated with another Staff.',
        ],
        'user_mobile' => [
            'max_length' => 'Mobile number must be exactly 10 digits long.',
            'min_length' => 'Mobile number must be exactly 10 digits long.',
            'is_unique'   => 'This mobile no. is already associated with another Staff.',
        ],
        'user_country_id' => [
            'required' => 'Country is required.',
            'is_not_unique' => 'The selected country does not exist.',
        ],
        'user_state_id' => [
            'required' => 'State is required.',
            'is_not_unique' => 'The selected state does not exist.',
        ],
        'user_city_id' => [
            'required' => 'City is required.',
            'is_not_unique' => 'The selected city does not exist.',
        ],
        'user_pincode' => [
            'required' => 'Pincode is required.',
            'integer' => 'Pincode must be an integer.',
            'max_length' => 'Pincode cannot exceed 10 characters.',
        ],
        'user_aadhaar_card' => [
            'max_length' => 'Aadhaar card number cannot exceed 12 characters.',
        ],
        'user_aadhaar_card_image' => [
            // No specific validation message required since it's permit_empty
        ],
        'password' => [
            'required' => 'Password is required.',
        ],
        'user_image' => [
            // No specific validation message required since it's permit_empty
        ],
        'user_type' => [
            'required' => 'Staff type is required.',
            'in_list'  => 'Staff type must be one of the following: super_admin, admin, staff, sales_executive, purchase, finance, crm.',
        ],
        'otp' => [
            'max_length' => 'OTP cannot exceed 6 characters.',
        ],
    ];


    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $loginFields = ['user_code'];
    protected $beforeInsert   = ['hashPassword', 'allTrim'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['hashPassword', 'allTrim'];
    protected $beforeInsertBatch = ['hashPassword', 'allTrim'];
    protected $beforeUpdateBatch = ['hashPassword', 'allTrim'];
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
            $this->addParentJoin('user_country_id', $this->get_countries_model(false), 'left', ['country_name as user_country_name']);
            $this->addParentJoin('user_state_id', $this->get_states_model(false), 'left', ['state_name as user_state_name']);
            $this->addParentJoin('user_city_id', $this->get_cities_model(false), 'left', ['city_name as user_city_name']);
            $this->addParentJoin('reporting_to_user_id', $this->get_users_model(false), 'left', ['user_name as reporting_to_user_name'], 'reporting_user');
            $this->addParentJoin('designation_id', $this->get_designations_model(), 'left', ['designation_name']);
            $this->addParentJoin('role_id', $this->get_roles_model(), 'left', ['role_name']);
        }
    }
}
