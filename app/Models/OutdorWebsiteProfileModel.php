<?php

namespace App\Models;

use App\Models\FunctionModel;

class OutdorWebsiteProfileModel extends FunctionModel
{
    protected $table            = 'outdor_website_profile';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'firm_name', 'firm_slogan', 'firm_logo_url', 'firm_address', 'firm_owner_name', 'firm_cin_no',
        'firm_gst_no', 'firm_pan_no', 'contact_mobile', 'contact_whatsapp', 'contact_email', 'sales_mobile',
        'sales_whatsapp', 'sales_email', 'support_mobile', 'support_whatsapp', 'support_email', 'career_mobile',
        'career_whatsapp', 'career_email', 'google_map_url', 'website_url', 'play_store_url', 'app_store_url',
        'facebook_url', 'instagram_url', 'twitter_url', 'linkedin_url', 'youtube_url', 'telegram_url',
        'pinterest_url', 'google_search_url', 'email_smtp_host', 'email_smtp_port', 'email_smtp_user',
        'email_smtp_password', 'email_smtp_crypto', 'email_from_email', 'email_from_name', 'bank_name',
        'bank_acc_name', 'bank_acc_no', 'bank_ifsc_code', 'bank_acc_type', 'google_pay_upi', 'google_pay_number',
        'phone_pay_upi', 'phone_pay_number', 'paytm_upi', 'paytm_number', 'amazonpay_upi', 'amazonpay_number',
        'bhim_upi', 'bhim_number','about_company','about_owner','terms_condition','privacy_policies','disclaimer_content'
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
        'id' => 'permit_empty',
        'firm_name' => 'required|max_length[255]|alpha_numeric_space',
        'firm_slogan' =>'permit_empty',
        'firm_logo_url' => 'permit_empty|valid_url|max_length[255]',
        'firm_address' => 'permit_empty|max_length[255]',
        'firm_owner_name' => 'permit_empty|max_length[255]|alpha_numeric_space',
        'firm_cin_no' => 'permit_empty',
        'firm_gst_no' => 'permit_empty',
        'firm_pan_no' => 'permit_empty',
        'contact_mobile' => 'permit_empty|numeric|exact_length[10]',
        'contact_whatsapp' => 'permit_empty|numeric|exact_length[10]',
        'contact_email' => 'permit_empty|valid_email|max_length[255]',
        'sales_mobile' => 'permit_empty|numeric|exact_length[10]',
        'sales_whatsapp' => 'permit_empty|numeric|exact_length[10]',
        'sales_email' => 'permit_empty|valid_email|max_length[255]',
        'support_mobile' => 'permit_empty|numeric|exact_length[10]',
        'support_whatsapp' => 'permit_empty|numeric|exact_length[10]',
        'support_email' => 'permit_empty|valid_email|max_length[255]',
        'career_mobile' => 'permit_empty|numeric|exact_length[10]',
        'career_whatsapp' => 'permit_empty|numeric|exact_length[10]',
        'career_email' => 'permit_empty|valid_email|max_length[255]',
        'google_map_url' => 'permit_empty|valid_url|max_length[255]',
        'website_url' => 'permit_empty|valid_url|max_length[255]',
        'play_store_url' => 'permit_empty|valid_url|max_length[255]',
        'app_store_url' => 'permit_empty|valid_url|max_length[255]',
        'facebook_url' => 'permit_empty|valid_url|max_length[255]',
        'instagram_url' => 'permit_empty|valid_url|max_length[255]',
        'twitter_url' => 'permit_empty|valid_url|max_length[255]',
        'linkedin_url' => 'permit_empty|valid_url|max_length[255]',
        'youtube_url' => 'permit_empty|valid_url|max_length[255]',
        'telegram_url' => 'permit_empty|valid_url|max_length[255]',
        'pinterest_url' => 'permit_empty|valid_url|max_length[255]',
        'google_search_url' => 'permit_empty|valid_url|max_length[255]',
        'email_smtp_user' => 'permit_empty|permit_empty|max_length[255]',
        'email_smtp_crypto' => 'permit_empty|in_list[ssl,tls]',
        'email_from_email' => 'permit_empty|valid_email|max_length[255]',
        'email_from_name' => 'permit_empty|max_length[255]',
        'bank_name' => 'permit_empty|max_length[255]|alpha_numeric_space',
        'bank_acc_name' => 'permit_empty|max_length[255]',
        'bank_acc_type' => 'permit_empty|in_list[Saving,Current]',
        'about_company' =>'permit_empty',
        'about_owner' =>'permit_empty',
        'terms_condition' =>'permit_empty',
        'privacy_policies' =>'permit_empty',
        'disclaimer_content'=>'permit_empty',
    ];

    protected $validationMessages = [
        'firm_name' => [
            'required' => 'firm name is required.',
            'max_length' => 'Max Length 255 Character.',
            'alpha_numeric_space' => 'Special Character Not Allowed.'
        ],
        'firm_logo_url' => [
            'valid_url' => 'Please Enter a valid URL.',
            'max_length' =>  'Max Length 255 Character.'
        ],
        'firm_address' => [
            'max_length' => 'Max Length 255 Character.'
        ],
        'firm_owner_name' => [
            'max_length' => 'Max Length 255 Character.',
            'alpha_numeric_space' => 'Special Character Not Allowed.'
        ],
        'firm_cin_no' => [
            'alpha_numeric' => 'Special Character Not Allowed.',
            'max_length' => 'Max Length 21 Character.'
        ],
        'firm_gst_no' => [
            'alpha_numeric' => 'Special Character Not Allowed.',
            'max_length' => 'Max Length 15 Character.'
        ],
        'firm_pan_no' => [
            'alpha_numeric' => 'Special Character Not Allowed.',
            'max_length' => 'Max Length 10 Character.'
        ],
        'contact_mobile' => [
            'exact_length' => 'Please Enter Only 10 digits.'
        ],
        'contact_whatsapp' => [
            'exact_length' => 'Please Enter Only 10 digits.'
        ],
        'contact_email' => [
            'valid_email' => 'Please Enter a valid email.',
            'max_length' => 'Max Length 255 Character.'
        ],
        'sales_mobile' => [
            'exact_length' => 'Please Enter Only 10 digits.'
        ],
        'sales_whatsapp' => [
            'exact_length' => 'Please Enter Only 10 digits.'
        ],
        'sales_email' => [
            'valid_email' => 'Please Enter a valid email',
            'max_length' => 'Max Length 255 Character.'
        ],
        'support_mobile' => [
            'exact_length' => 'Please Enter Only 10 digits.'
        ],
        'support_whatsapp' => [
            'exact_length' => 'Please Enter Only 10 digits.'
        ],
        'support_email' => [
            'valid_email' => 'Please Enter a valid email',
            'max_length' => 'Max Length 255 Character.'
        ],
        'career_mobile' => [
            'exact_length' => 'Please Enter Only 10 digits.'
        ],
        'career_whatsapp' => [
            'exact_length' => 'Please Enter Only 10 digits.'
        ],
        'career_email' => [
            'valid_email' => 'Please Enter a valid email',
            'max_length' => 'Max Length 255 Character.'
        ],
        'google_map_url' => [
            'valid_url' => 'Please Enter a valid URL.',
            'max_length' => 'Max Length 255 Character.'
        ],
        'website_url' => [
            'valid_url' => 'Please Enter a valid URL.',
            'max_length' => 'Max Length 255 Character.'
        ],
        'play_store_url' => [
            'valid_url' => 'Please Enter a valid URL.',
            'max_length' => 'Max Length 255 Character.'
        ],
        'app_store_url' => [
            'valid_url' => 'Please Enter a valid URL.',
            'max_length' => 'Max Length 255 Character.'
        ],
        'facebook_url' => [
            'valid_url' => 'Please Enter a valid URL.',
            'max_length' => 'Max Length 255 Character.'
        ],
        'instagram_url' => [
            'valid_url' => 'Please Enter a valid URL.',
            'max_length' => 'Max Length 255 Character.',
        ],
        'twitter_url' => [
            'valid_url' => 'Please Enter a valid URL.',
            'max_length' => 'Max Length 255 Character.'
        ],
        'linkedin_url' => [
            'valid_url' => 'Please Enter a valid URL.',
            'max_length' => 'Max Length 255 Character.'
        ],
        'youtube_url' => [
            'valid_url' => 'Please Enter a valid URL.',
            'max_length' => 'Max Length 255 Character.'
        ],
        'telegram_url' => [
            'valid_url' => 'Please Enter a valid URL.',
            'max_length' => 'Max Length 255 Character.'
        ],
        'pinterest_url' => [
            'valid_url' => 'Please Enter a valid URL.',
            'max_length' => 'Max Length 255 Character.'
        ],
        'google_search_url' => [
            'valid_url' => 'Please Enter a valid URL.',
            'max_length' =>  'Max Length 255 Character.'
        ],
        'email_smtp_user' => [
            'max_length' => 'Max Length 255 Character.',
        ],
        'email_from_email' => [
            'valid_email' => 'Please Enter a valid email',
            'max_length' => 'Max Length 255 Character.',
        ],
        'email_from_name' => [
            'max_length' => 'Max Length 255 Character.',
        ],
        'bank_name' => [
            'max_length' =>   'Max Length 255 Character.',
            'alpha_numeric_space' => 'Special Character Not Allowed.'
        ],
        'bank_acc_name' => [
            'max_length' => 'Max Length 255 Character.'
        ],
         'bank_acc_type'=>[
            'in_list'=>'Select Bank Type'
         ]


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

    protected $messageAlias = "Outdor Website Profile";
    protected $excludeTrimFields = [];
    public function __construct()
    {
        parent::__construct();
    }
}
