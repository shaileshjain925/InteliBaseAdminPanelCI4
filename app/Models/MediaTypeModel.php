<?php

namespace App\Models;

use App\Models\FunctionModel;

class MediaTypeModel extends FunctionModel
{
    protected $table            = 'media_type';
    protected $primaryKey       = 'media_type_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'media_type_id', 'media_type_name', 'media_type_description'
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
        'media_type_id' => 'permit_empty',
        'media_type_name' => 'required|alpha_numeric_space|max_length[255]',
        'media_type_description' => 'permit_empty|max_length[255]',
    ];

    protected $validationMessages = [
        'media_type_name' => [
            'required' => 'Media Type Name is required.',
            'alpha_numeric_space' => 'Special Character Not Allowed.',
            'max_length' => 'Max Length 255 Character.'
        ],
        'media_type_description' => [
            'max_length' => 'Max Length 255 Character.',
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

    protected $messageAlias = "Media Type";
    protected $excludeTrimFields = [];
    public function __construct()
    {
        parent::__construct();
    }
}
