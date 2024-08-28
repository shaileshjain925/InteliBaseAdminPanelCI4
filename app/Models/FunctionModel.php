<?php

namespace App\Models;

use ApiResponseStatusCode;
use CodeIgniter\Model;
use App\Traits\CommonTraits;
use CodeIgniter\Database\Exceptions\DatabaseException;
use Exception;
use Firebase\JWT\JWT;
use ReflectionException;
use RuntimeException;

class FunctionModel extends Model
{
    use CommonTraits;
    protected string $getRecordFoundMsg;
    protected string $getRecordNotFoundMsg;
    protected string $createRecordSuccessMsg;
    protected string $updateRecordSuccessMsg;
    protected string $deleteRecordSuccessMsg;
    protected string $validationFailedMsg;
    protected string $updateRecordIdNotFoundMsg;
    /** @var array Stores join configurations */
    protected array $joins;
    public function __construct()
    {
        parent::__construct();
    }
    public function initializeMessages()
    {
        if (!isset($this->messageAlias) || empty($this->messageAlias)) {
            $messageAlias = "Record";
        } else {
            $messageAlias = $this->messageAlias;
        }
        $this->getRecordFoundMsg = $messageAlias . " Found Successfully";
        $this->getRecordNotFoundMsg = $messageAlias . " Not Found";
        $this->createRecordSuccessMsg = $messageAlias . " Created Successfully";
        $this->updateRecordSuccessMsg = $messageAlias . " Updated Successfully";
        $this->deleteRecordSuccessMsg = $messageAlias . " Deleted Successfully";
        $this->validationFailedMsg = $messageAlias . " Form Validation Failed";
        $this->updateRecordIdNotFoundMsg = $messageAlias . " ID Not Found";
    }
    // Getter and setter methods for $DBGroup property
    /**
     * Retrieves the current value of the DBGroup property.
     *
     * @return string The database group name.
     */
    public function getDBGroup(): string
    {
        return $this->DBGroup;
    }

    /**
     * Sets the value of the DBGroup property.
     *
     * @param string $DBGroup The new database group name.
     */
    public function setDBGroup(string $DBGroup): void
    {
        $this->DBGroup = $DBGroup;
    }

    /**
     * Retrieves the current table name.
     *
     * @return string The table name.
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * Retrieves the primary key of the table.
     *
     * @return string The primary key.
     */
    public function getPrimaryKey(): string
    {
        return $this->primaryKey;
    }

    /**
     * Retrieves the allowed fields for mass assignment.
     *
     * @return array The allowed fields.
     */
    public function getAllowedFields(): array
    {
        return $this->allowedFields;
    }

    /**
     * Retrieves whether to skip validation.
     *
     * @return bool Whether to skip validation.
     */
    public function getSkipValidation(): bool
    {
        return $this->skipValidation;
    }

    /**
     * Sets whether to skip validation.
     *
     * @param bool $skipValidation Whether to skip validation.
     */
    public function setSkipValidation(bool $skipValidation): void
    {
        $this->skipValidation = $skipValidation;
    }

    /**
     * Sets an alias for the table.
     *
     * @param string $tableAlias The table alias.
     */
    public function setTableAlias(string $tableAlias)
    {
        $this->setTable($this->getTable() . " as " . $tableAlias);
    }

    /**
     * Get a Role record by primary key.
     *
     * @param int|string|array $primaryKey
     * @return array
     */
    public function RecordGet(int|string|array $primaryKey): array
    {
        $this->initializeMessages();
        try {
            $result = $this->find($primaryKey);
            if (empty($result)) {
                return formatCommonResponse(ApiResponseStatusCode::NO_CONTENT, $this->getRecordNotFoundMsg);
            }
            return formatCommonResponse(ApiResponseStatusCode::OK, $this->getRecordFoundMsg, $result);
        } catch (\Throwable $th) {
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST,  $th->getMessage());
        }
    }

    /**
     * List all Role records.
     *
     * @param array $filter
     * @return array
     */
    public function RecordList(array|null $filter = []): array
    {
        $this->initializeMessages();
        try {
            if (!empty($filter)) {
                // select
                if (array_key_exists('_select', $filter) && !empty($filter['_select'])) {
                    $this->select($this->getTable() . "." . $filter['_select']);
                    unset($filter['_select']);
                }
                // selectOther
                if (array_key_exists('_selectOther', $filter) && !empty($filter['_selectOther'])) {
                    $this->select($filter['_selectOther']);
                    unset($filter['_selectOther']);
                }
                // autoJoin
                if (array_key_exists('_autojoin', $filter) && !empty($filter['_autojoin'])) {
                    if (strtoupper($filter['_autojoin']) == 'Y') {
                        $this->autoJoin();
                    }
                    if (strtoupper($filter['_autojoin']) == 'F') {
                        $this->autoJoin(true);
                    }
                    unset($filter['_autojoin']);
                }
                // _otherFilters
                if (array_key_exists('_otherFilters', $filter) && !empty($filter['_otherFilters'])) {
                    unset($filter['_otherFilters']);
                }
                // Where In
                if (array_key_exists('_whereIn', $filter) && !empty($filter['_whereIn'] && is_array($filter['_whereIn']))) {
                    foreach ($filter['_whereIn'] as $key => $fields) {
                        # code...
                        if (array_key_exists('fieldname', $fields) && array_key_exists('value', $fields)) {
                            $this->whereIn(str_replace('-', '.', $fields['fieldname']), $fields['value']);
                        }
                    }
                    unset($filter['_whereIn']);
                }
                // Where Not In
                if (array_key_exists('_whereNotIn', $filter) && !empty($filter['_whereNotIn'] && is_array($filter['_whereNotIn']))) {
                    foreach ($filter['_whereNotIn'] as $key => $fields) {
                        # code...
                        if (array_key_exists('fieldname', $fields) && array_key_exists('value', $fields)) {
                            $this->whereNotIn(str_replace('-', '.', $fields['fieldname']), $fields['value']);
                        }
                    }
                    unset($filter['_whereNotIn']);
                }
                foreach ($filter as $key => $value) {
                    // Check if the key is valid and value is not empty
                    if (!empty($value)) {
                        // Add WHERE condition for the key-value pair
                        $this->where(str_replace('-', '.', $key), $value);
                    }
                }
            }
            // $query = $this->get();
            // $result = $query->getResultArray();
            $result = $this->findAll();
            $lastQuery = $this->getLastQuery();
            if (empty($result)) {
                return formatCommonResponse(ApiResponseStatusCode::NO_CONTENT, $this->getRecordNotFoundMsg);
            }
            return formatCommonResponse(ApiResponseStatusCode::OK, $this->getRecordFoundMsg, $result);
        } catch (\Throwable $th) {
            $lastQuery = $this->getLastQuery();
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST,  $th->getMessage());
        }
    }

    /**
     * Create a new Role record.
     *
     * @param array $data
     * @return array
     * @throws \Throwable
     */
    public function RecordCreate(array &$data): array
    {
        $this->initializeMessages();
        try {
            $result = $this->insert($data);
            if (!$result) {
                return formatCommonResponse(ApiResponseStatusCode::VALIDATION_FAILED, $this->validationFailedMsg, $data, $this->validation->getErrors());
            }
            $data[$this->getPrimaryKey()] = $result;
            return formatCommonResponse(ApiResponseStatusCode::CREATED, $this->createRecordSuccessMsg, $data);
        } catch (\Throwable $th) {
            // Other errors
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST,  $th->getMessage());
        }
    }

    /**
     * Update an existing Role record.
     *
     * @param array $data
     * @param string|int $primaryKey
     * @return array
     * @throws \Throwable
     */
    public function RecordUpdate(array &$data, string|int $primaryKey): array
    {
        $this->initializeMessages();
        try {
            if (empty($this->find($primaryKey))) {
                return formatCommonResponse(ApiResponseStatusCode::NO_CONTENT, $this->updateRecordIdNotFoundMsg, $data, [$this->getPrimaryKey() => $this->getPrimaryKey() . ' Not Found']);
            }
            $result = $this->update($primaryKey, $data);
            if (!$result) {
                return formatCommonResponse(ApiResponseStatusCode::VALIDATION_FAILED, $this->validationFailedMsg, $data, $this->validation->getErrors());
            }
            $result = [$this->getPrimaryKey() => $primaryKey];
            $result = array_merge($result, $data);
            return formatCommonResponse(ApiResponseStatusCode::OK, $this->updateRecordSuccessMsg, $result);
        } catch (\Throwable $th) {
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST,  $th->getMessage());
        }
    }

    /**
     * Delete a Role record by primary key.
     *
     * @param string|int $primaryKey
     * @return array
     */
    public function RecordDelete(string|int $primaryKey): array
    {
        $this->initializeMessages();
        try {
            $data = $this->find($primaryKey);
            $result = $this->delete($primaryKey);

            if (empty($result)) {
                return formatCommonResponse(ApiResponseStatusCode::NO_CONTENT, $this->getRecordNotFoundMsg);
            }
            return formatCommonResponse(ApiResponseStatusCode::OK, $this->deleteRecordSuccessMsg, $data);
        } catch (\Throwable $th) {
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST,  $th->getMessage());
        }
    }
    public function hashPassword($data)
    {
        $passwordField = $this->passwordField ?? null;

        // Handle bulk data (array of records)
        if (isset($data['data'][0]) && is_array($data['data'][0])) {
            foreach ($data['data'] as &$row) {
                if (!empty($passwordField) && isset($row[$passwordField])) {
                    if (empty($row[$passwordField])) {
                        unset($row[$passwordField]);
                    } else {
                        $row[$passwordField] = password_hash($row[$passwordField], PASSWORD_DEFAULT);
                    }
                }
            }
        }
        // Handle single record
        else if (isset($data['data']) && is_array($data['data'])) {
            if (!empty($passwordField) && isset($data['data'][$passwordField])) {
                if (empty($data['data'][$passwordField])) {
                    unset($data['data'][$passwordField]);
                } else {
                    $data['data'][$passwordField] = password_hash($data['data'][$passwordField], PASSWORD_DEFAULT);
                }
            }
        }

        return $data;
    }

    public function checkLogin(string $username, string $password)
    {

        try {
            $loginFields = $this->loginFields ?? null;
            if (empty($loginFields)) {
                return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST, '$loginFields = [] not set in models');
            }
            // Get a new instance of Query Builder
            $builder = $this->builder();

            // Start a new OR group
            $builder->groupStart();

            foreach ($loginFields as $key => $field) {
                // Add OR condition for each login field
                $builder->orWhere($field, $username);
            }

            // Close the OR group
            $builder->groupEnd();

            // Execute the query to find the user by username
            $user = $builder->get()->getRowArray();
            if (empty($user)) {
                return formatCommonResponse(ApiResponseStatusCode::VALIDATION_FAILED, 'No Record Found', [], ['error' => 'Username not Found']);
            }
            // Check if user exists and password matches
            if ($user && !password_verify($password, $user[$this->passwordField])) {
                return formatCommonResponse(ApiResponseStatusCode::VALIDATION_FAILED, 'Invalid Credential', [], ['error' => 'Invalid Credential']);
            } else {
                return formatCommonResponse(ApiResponseStatusCode::OK, 'Login Success', $user);
            }
        } catch (\Throwable $th) {
            return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST, $th->getMessage());
        }
    }

    public function generateJWTToken(array $data): string
    {
        // Retrieve JWT secret key from environment variables
        $key = $_ENV['JWT_SECRET_KEY'] ?? "";

        // Check if JWT secret key is set
        if (empty($key)) {
            throw new RuntimeException('JWT_SECRET_KEY not set in ENV');
        }

        // Algorithm for JWT token
        $algorithm = 'HS256';

        try {
            // Generate JWT token
            $token = JWT::encode($data, $key, $algorithm);
            return $token;
        } catch (Exception $e) {
            // Handle token generation error
            throw new RuntimeException('Error generating JWT token: ' . $e->getMessage());
        }
    }
    protected function getJoins()
    {
        if (!empty($this->joins)) {
            return $this->joins;
        } else {
            return null;
        }
    }
    /**
     * Add a Parent join configuration.
     *
     * @param string $fieldName Field name in the current table
     * @param string $refTableName Referenced table name
     * @param string $refFieldName Field name in the referenced table
     * @param string $joinMethod Join method (e.g., 'left', 'inner')
     * @param array $selectField Optional array of fields to select from the referenced table
     * @return void
     */
    protected function addParentJoin(string $fieldName, object $modelInstance, string $joinMethod = 'left', array $selectField = [], string $refTableAlias = null): void
    {
        $this->joins[] = [
            'tableName' => $this->getTable(),
            'fieldName' => $fieldName,
            'refTableName' => $modelInstance->getTable(),
            'refTableAlias' => (!empty($refTableAlias)) ? $refTableAlias : $modelInstance->getTable(),
            'refFieldName' => $modelInstance->getPrimaryKey(),
            'joinMethod' => $joinMethod,
            'selectField' => $selectField,
        ];
        if (!empty($modelInstance->getJoins())) {
            $this->joins = array_merge($this->joins, $modelInstance->getJoins());
        }
    }

    /**
     * Automatically applies joins based on configurations.
     *
     * @param bool $familyJoin Whether to include joins not related to the current model
     * @return object $this Returns the current object for method chaining
     * @throws Exception If an error occurs during the join process
     */
    public function autoJoin($familyJoin = false): object
    {
        if (!empty($this->joins)) {
            $uniqueJoins = $this->removeDuplicateJoins($this->joins);

            foreach ($uniqueJoins as $join) {
                if (!$familyJoin && $join['tableName'] != $this->getTable()) {
                    continue;
                }

                try {
                    $this->applyJoin($join);
                } catch (Exception $e) {
                    throw new Exception("Error applying join: " . $e->getMessage());
                }
            }
        }

        return $this;
    }

    /**
     * Removes duplicate joins based on refTableName.
     *
     * @param array $joins The array of join configurations
     * @return array The array of unique join configurations
     */
    private function removeDuplicateJoins(array $joins): array
    {
        $refTableNames = array_column($joins, 'refTableName');
        $uniqueRefTableNames = array_unique($refTableNames);

        $uniqueJoins = array_filter($joins, function ($item) use ($uniqueRefTableNames) {
            static $seen = [];
            if (isset($seen[$item['refTableName']])) {
                return false;
            }
            $seen[$item['refTableName']] = true;
            return true;
        });

        return $uniqueJoins;
    }

    /**
     * Applies a single join based on the given configuration.
     *
     * @param array $join The join configuration
     * @return void
     * @throws Exception If an error occurs during the join process
     */
    private function applyJoin(array $join): void
    {
        if (empty($join['selectField'])) {
            $this->select($join['refTableAlias'] . ".*");
        } else {
            foreach ($join['selectField'] as $field) {
                $this->select($join['refTableAlias'] . "." . $field);
            }
        }

        $this->join(
            $join['refTableName'] . " as " . $join['refTableAlias'],
            $join['tableName'] . "." . $join['fieldName'] . "=" . $join['refTableAlias'] . "." . $join['refFieldName'],
            $join['joinMethod']
        );
    }

    public function updateBooleanFields($data)
    {
        $booleanFields = $this->booleanFields ?? null;

        if (!isset($data['data']) || !is_array($data['data'])) {
            return $data; // Handle edge case where 'data' is not set or not an array
        }

        foreach ($booleanFields as $key => $field) {
            // Check if the field exists in the data and if its value indicates it's checked
            if (isset($data['data'][$field])) {
                $data['data'][$field] = ($data['data'][$field] == 1 || $data['data'][$field] == 'on') ? 1 : 0; // Ensure it's explicitly set to 1 or 0
            } else {
                $data['data'][$field] = 0; // Set to 0 or false if not explicitly set to 1
            }
        }

        return $data;
    }


    public function ConvertDateDMY(array $data)
    {
        $dateFields = $this->dateFields ?? null;
        if (isset($data['data'])) {
            // Check if multiple rows or a single row
            if (isset($data['data'][0])) {
                // Multiple rows
                foreach ($data['data'] as &$row) {
                    foreach ($dateFields as $key => $field) {
                        if (isset($row[$field])) {
                            $row[$field] = date('d-m-Y', strtotime($row[$field]));
                        }
                    }
                }
            } else {
                // Single row
                foreach ($dateFields as $key => $field) {
                    if (isset($data['data'][$field])) {
                        $data['data'][$field] = date('d-m-Y', strtotime($data['data'][$field]));
                    }
                }
            }
        }
        return $data;
    }
    /**
     * Trims all string fields before insert and update operations.
     *
     * @param array $data Data to be inserted or updated
     * @return array Modified data with trimmed string fields
     */
    public function allTrim(array $data): array
    {
        // Check if data is provided and has the expected structure
        if (!isset($data['data']) || !is_array($data['data'])) {
            // Return data unchanged if it does not meet expected structure
            return $data;
        }

        // Retrieve the fields to exclude from trimming
        $excludeTrimFields = $this->excludeTrimFields ?? [];

        // Check if data is a batch of records (array of arrays)
        if (isset($data['data'][0]) && is_array($data['data'][0])) {
            foreach ($data['data'] as &$row) {
                if (is_array($row)) {
                    foreach ($row as $key => &$value) {
                        // Skip fields listed in excludeTrimFields
                        if (in_array($key, $excludeTrimFields, true)) {
                            continue;
                        }

                        // Trim the value if it is a string
                        if (is_string($value)) {
                            $value = trim($value);
                        }
                    }
                }
            }
        }
        // Handle single record scenario
        else {
            foreach ($data['data'] as $key => &$value) {
                // Skip fields listed in excludeTrimFields
                if (in_array($key, $excludeTrimFields, true)) {
                    continue;
                }

                // Trim the value if it is a string
                if (is_string($value)) {
                    $value = trim($value);
                }
            }
        }

        return $data;
    }

    public function create_update($model_instance, $data)
    {
        $pk = $model_instance->getPrimaryKey();
        $existing_data = $model_instance->select($pk)->findAll() ?? [];
        $existing_data_primary_keys = array_column($existing_data, $pk);
        $data_for_insert = [];
        $data_for_update = [];

        foreach ($data as $row) {
            if (!in_array($row[$pk], $existing_data_primary_keys)) {
                $data_for_insert[] = $row;
            } else {
                $data_for_update[] = $row;
            }
        }

        $errors = [];

        // Handle batch insert
        if (!empty($data_for_insert)) {
            try {
                $result = $model_instance->insertBatch($data_for_insert);
                if ($result === false) {
                    $errors[] = $model_instance->errors();
                } else {
                    $errors[] = $result . " rows inserted successfully.";
                }
            } catch (ReflectionException $e) {
                $errors[] = $model_instance->errors();;
            } catch (\Exception $e) {
                $errors[] = $model_instance->errors();;
            }
        }

        // Handle batch update
        if (!empty($data_for_update)) {
            try {
                $result = $model_instance->updateBatch($data_for_update, $pk);

                if ($result === false) {
                    $errors[] = $model_instance->errors();
                } else {
                    $errors[] = $result . " rows updated successfully.";
                }
            } catch (DatabaseException $e) {
                $errors[] = $model_instance->errors();;
            } catch (ReflectionException $e) {
                $errors[] = $model_instance->errors();;
            } catch (\Exception $e) {
                $errors[] = $model_instance->errors();;
            }
        }

        // Return errors if any
        return !empty($errors) ? $errors : null;
    }
}
