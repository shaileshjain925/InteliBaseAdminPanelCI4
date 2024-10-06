<?php

namespace App\Models;

use App\Models\FunctionModel;

class PartyContactModel extends FunctionModel
{
    protected $table            = 'party_contact';
    protected $primaryKey       = 'party_contact_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $messageAlias = 'Party Contact';
    protected $allowedFields    = [
        'party_contact_id',
        'party_id',
        'person_name',
        'person_designation',
        'person_department',
        'person_isd',
        'person_mobile_number',
        'person_telephone_number',
        'person_email_id',
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
    protected $validationRules      = [];
    protected $validationMessages   = [];
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
    public function __construct($joinRequired = true)
    {
        parent::__construct();
        if ($joinRequired) {
            $this->addParentJoin('party_id', $this->get_party_model(), 'left', [
                'party_type',
                'party_code',
                'party_name',
                'is_active as party_is_active',
            ]);
        }
    }
}
