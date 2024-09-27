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
    protected $allowedFields = [
        'party_id',
        'party_type',
        'party_code',
        'party_name',
        'party_email',
        'party_number',
        'pan_no',
        'firm_type',
        'business_type_id',
        'business_nature_code',
        'payment_term_id',
        'delivery_term_id',
        'estimated_days_to_deliver',
        'packaging_type',
        'bank_name',
        'bank_no',
        'bank_ifsc',
        'bank_holder_name',
        'notes',
        'website',
        'contact_person_json_data',
        'is_active',
        'default_billing_address_id',
        'default_shipping_address_id'
    ];
    protected $nullSetIfEmpty = [
        'business_type_id',
        'payment_term_id',
        'delivery_term_id',
        'default_billing_address_id',
        'default_shipping_address_id'
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
        'party_type' => 'required|in_list[Customer,Supplier]',
        'party_code' => 'permit_empty|is_unique[party.party_code,party_id,{party_id}]',
        'party_name' => 'required|max_length[255]',
        'party_email' => 'required|valid_email',
        'party_number' => 'required|max_length[15]',
        'pan_no' => 'permit_empty|max_length[50]',
        'firm_type' => 'required|in_list[PROPRIETORSHIP,PARTNERSHIP,LLP,PVT LTD,LIMITED,GOVT,ENTERPRISE,SEMI GOVT.ENTR,EOU]',
        'business_type_id' => 'permit_empty|is_not_unique[business_types.business_type_id]',
        'business_nature_code' => 'required|in_list[Retail,Wholesale,Stockist,Manufacture,Service]',
        'payment_term_id' => 'required|is_not_unique[payment_terms.payment_term_id]',
        'delivery_term_id' => 'permit_empty|is_not_unique[delivery_terms.delivery_term_id]',
        'estimated_days_to_deliver' => 'required|integer',
        'packaging_type' => 'required|in_list[Standard,Non-Standard]',
        'bank_name' => 'permit_empty|max_length[255]',
        'bank_no' => 'permit_empty|max_length[50]',
        'bank_ifsc' => 'permit_empty|max_length[20]',
        'bank_holder_name' => 'permit_empty|max_length[255]',
        'notes' => 'permit_empty',
        'website' => 'permit_empty|valid_url',
        'contact_person_json_data' => 'permit_empty',
        'is_active' => 'required|in_list[0,1]',
        'default_billing_address_id' => 'permit_empty|is_not_unique[party_address.address_id]',
        'default_shipping_address_id' => 'permit_empty|is_not_unique[party_address.address_id]',
    ];
    protected $validationMessages = [
        'party_id' => [
            'permit_empty' => 'The party ID is optional.',
        ],
        'party_type' => [
            'required' => 'The party type is required.',
            'in_list' => 'The party type must be either Customer or Supplier.',
        ],
        'party_code' => [
            'permit_empty' => 'The party code is optional.',
            'is_unique' => 'The party code must be unique.',
        ],
        'party_name' => [
            'required' => 'The party name is required.',
            'max_length' => 'The party name cannot exceed 255 characters.',
        ],
        'party_email' => [
            'required' => 'The party email is required.',
            'valid_email' => 'Please provide a valid email address.',
        ],
        'party_number' => [
            'required' => 'The party number is required.',
            'max_length' => 'The party number cannot exceed 15 characters.',
        ],
        'pan_no' => [
            'permit_empty' => 'The PAN number is optional.',
            'max_length' => 'The PAN number cannot exceed 50 characters.',
        ],
        'firm_type' => [
            'required' => 'The firm type is required.',
            'in_list' => 'The firm type must be one of the following: PROPRIETORSHIP, PARTNERSHIP, LLP, PVT LTD, LIMITED, GOVT, ENTERPRISE, SEMI GOVT.ENTR, EOU.',
        ],
        'business_type_id' => [
            'permit_empty' => 'The business type ID is optional.',
            'is_not_unique' => 'The business type ID must exist in the business types table.',
        ],
        'business_nature_code' => [
            'required' => 'The business nature code is required.',
            'in_list' => 'The business nature code must be one of the following: Retail, Wholesale, Stockist, Manufacture, Service.',
        ],
        'payment_term_id' => [
            'required' => 'The payment term ID is required.',
            'is_not_unique' => 'The payment term ID must exist in the payment terms table.',
        ],
        'delivery_term_id' => [
            'permit_empty' => 'The delivery term ID is optional.',
            'is_not_unique' => 'The delivery term ID must exist in the delivery terms table.',
        ],
        'estimated_days_to_deliver' => [
            'required' => 'Estimated days to deliver is required.',
            'integer' => 'Estimated days to deliver must be an integer.',
        ],
        'packaging_type' => [
            'required' => 'The packaging type is required.',
            'in_list' => 'The packaging type must be either Standard or Non-Standard.',
        ],
        'bank_name' => [
            'permit_empty' => 'The bank name is optional.',
            'max_length' => 'The bank name cannot exceed 255 characters.',
        ],
        'bank_no' => [
            'permit_empty' => 'The bank number is optional.',
            'max_length' => 'The bank number cannot exceed 50 characters.',
        ],
        'bank_ifsc' => [
            'permit_empty' => 'The IFSC code is optional.',
            'max_length' => 'The IFSC code cannot exceed 20 characters.',
        ],
        'bank_holder_name' => [
            'permit_empty' => 'The bank holder name is optional.',
            'max_length' => 'The bank holder name cannot exceed 255 characters.',
        ],
        'notes' => [
            'permit_empty' => 'Notes are optional.',
        ],
        'website' => [
            'permit_empty' => 'The website is optional.',
            'valid_url' => 'Please provide a valid URL.',
        ],
        'contact_person_json_data' => [
            'permit_empty' => 'Contact person data is optional.',
        ],
        'is_active' => [
            'required' => 'The active status is required.',
            'in_list' => 'The active status must be either 0 (inactive) or 1 (active).',
        ],
        'default_billing_address_id' => [
            'permit_empty' => 'The default billing address ID is optional.',
            'is_not_unique' => 'The default billing address ID must exist in the party address table.',
        ],
        'default_shipping_address_id' => [
            'permit_empty' => 'The default shipping address ID is optional.',
            'is_not_unique' => 'The default shipping address ID must exist in the party address table.',
        ],
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['nullSetIfEmpty'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['nullSetIfEmpty'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    protected $messageAlias = 'Party';
    public function __construct($joinRequired = true)
    {
        parent::__construct();
        if ($joinRequired) {
            $this->addParentJoin('business_type_id', $this->get_business_types_model(), 'left', ['business_type_name']);
            $this->addParentJoin('payment_term_id', $this->get_payment_terms_model(), 'left', ['payment_term_code', 'payment_term_name', 'due_days', 'post_due_interest_rate']);
            $this->addParentJoin('delivery_term_id', $this->get_delivery_terms_model(), 'left', ['delivery_term_code', 'delivery_term_name', 'delivery_term_description']);
            $billing_alias = "billing";
            // $this->addParentJoin('default_billing_address_id', $this->get_party_address_model(true, $billing_alias), 'left', [
            //     "address_short_name as " . $billing_alias . "_address_short_name",
            //     "firm_name as " . $billing_alias . "_firm_name",
            //     "firm_gst as " . $billing_alias . "_firm_gst",
            //     "party_country_id as " . $billing_alias . "_party_country_id",
            //     "party_state_id as " . $billing_alias . "_party_state_id",
            //     "party_city_id as " . $billing_alias . "_party_city_id",
            //     "party_pincode as " . $billing_alias . "_party_pincode",
            //     "party_addresses as " . $billing_alias . "_party_addresses",
            //     "address_person_name as " . $billing_alias . "_address_person_name",
            //     "address_person_mobile as " . $billing_alias . "_address_person_mobile",
            //     "address_person_email as " . $billing_alias . "_address_person_email",
            //     "address_type as " . $billing_alias . "_address_type",
            // ], $billing_alias . "_address");
            // $shipping_alias = "shipping";
            // $this->addParentJoin('default_shipping_address_id', $this->get_party_address_model(true, $shipping_alias), 'left', [
            //     "address_short_name as " . $shipping_alias . "_address_short_name",
            //     "firm_name as " . $shipping_alias . "_firm_name",
            //     "firm_gst as " . $shipping_alias . "_firm_gst",
            //     "party_country_id as " . $shipping_alias . "_party_country_id",
            //     "party_state_id as " . $shipping_alias . "_party_state_id",
            //     "party_city_id as " . $shipping_alias . "_party_city_id",
            //     "party_pincode as " . $shipping_alias . "_party_pincode",
            //     "party_addresses as " . $shipping_alias . "_party_addresses",
            //     "address_person_name as " . $shipping_alias . "_address_person_name",
            //     "address_person_mobile as " . $shipping_alias . "_address_person_mobile",
            //     "address_person_email as " . $shipping_alias . "_address_person_email",
            //     "address_type as " . $shipping_alias . "_address_type",
            // ], $shipping_alias . "_address");
        }
    }
}
