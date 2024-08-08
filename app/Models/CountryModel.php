<?php

namespace App\Models;

use App\Models\FunctionModel;

class CountryModel extends FunctionModel
{
    protected $table            = 'country';
    protected $primaryKey       = 'country_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['country_id', 'country_name', 'alias', 'short_name', 'phonecode', 'currency', 'currency_name', 'currency_symbol', 'region'];


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
        "country_id" => "permit_empty",
        'country_name' => 'required|alpha_numeric_space|max_length[100]',
        'alias' => 'permit_empty|max_length[3]',
        'short_name' => 'permit_empty|alpha_numeric_space|max_length[2]',
        'phonecode' => 'permit_empty|max_length[255]',
        'currency' => 'permit_empty|max_length[255]',
        'currency_name' => 'permit_empty|max_length[255]',
        'currency_symbol' => 'permit_empty|max_length[255]',
        'region' => 'permit_empty|max_length[255]',
    ];
    protected $validationMessages = [
        'country_name' => [
            'required' => 'Country Name is required.',
            'alpha_numeric_space' => 'Special Character Not Allowed.',
            'max_length' => 'Max Length 255 Character',
        ],
        'alias' => [
            'max_length' => 'Max Length 3 Character',
        ],
        'short_name' => [
            'alpha_numeric_space' => 'Special Character Not Allowed.',
            'max_length' => 'Max Length 2 Character',
        ],
        'phonecode' => [
            'max_length' => 'Max Length 255 Character',
        ],
        'currency' => [
            'max_length' => 'Max Length 255 Character',
        ],
        'currency_name' => [
            'max_length' => 'Max Length 255 Character',
        ],
        'currency_symbol' => [
            'max_length' => 'Max Length 255 Character',
        ],
        'region' => [
            'max_length' => 'Max Length 255 Character',
        ],
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['allTrim'];
    protected $afterInsert    = ['allTrim'];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    protected $messageAlias = "Country";
    protected $excludeTrimFields = [];
}
