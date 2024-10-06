<?php

namespace App\Models;

use App\Models\FunctionModel;

class PartyRatingValueModel extends FunctionModel
{
    protected $table            = 'party_rating_value';
    protected $primaryKey       = 'party_rating_value_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $messageAlias = 'Party Rating Value';
    protected $allowedFields    = [
        'party_rating_value_id',
        'party_rating_value_name',
        'party_rating_value_description',
        'party_rating_value_non_listed_percentage',
        'party_rating_value_listed_percentage'
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
    }
}
