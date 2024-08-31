<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Response;
use ApiResponseStatusCode;

class AdminApiController extends BaseController
{

    public function handleOptionsRequest()
    {
        return $this->response->setStatusCode(Response::HTTP_OK);
    }

    // country ---------------------------------------------------------------------------------------------------------
    /**
     * {"country_id":"required"}
     */
    public function country_get_api()
    {
        return $this->api_get($this->get_countries_model());
    }
    /**
     *  {
     *  "country_id": "",
     *	"country_name": "",
     *	"alias": "",
     *	"short_name": "",
     *	"phonecode": "",
     *	"currency": "",
     *	"currency_name": "",
     *	"currency_symbol": "",
     *	"region": "",
     *  "select":"",
     *  "autojoin":"" // "y","f"
     *  }
     */
    public function country_list_api()
    {
        return $this->api_list($this->get_countries_model());
    }
    /**
     *  
     */

    public function country_create_api()
    {
        return $this->api_create($this->get_countries_model());
    }
    /**
     * {
     *     "country_id": "required",
     *     "country_name": "required|max_length[100]",
     *     "alias": "max_length[3]",
     *     "short_name": "max_length[2]",
     *     "phonecode": "max_length[255]",
     *     "currency": "max_length[255]",
     *     "currency_name": "max_length[255]",
     *     "currency_symbol": "max_length[255]",
     *     "region": "max_length[255]"
     * } 
     */
    public function country_update_api()
    {
        return $this->api_update($this->get_countries_model());
    }
    /**
     * {"country_id":"required"}
     */
    public function country_delete_api()
    {
        return $this->api_delete($this->get_countries_model());
    }
    /**
     * {"state_id":"required"}
     */
    // state ----------------------------------------------------------------------------------------------------------
    /** */
    public function state_get_api()
    {
        return $this->api_get($this->get_states_model());
    }
    /** */
    public function state_list_api()
    {
        return $this->api_list($this->get_states_model());
    }
    /** */
    public function state_create_api()
    {
        return $this->api_create($this->get_states_model());
    }
    /** */
    public function state_update_api()
    {
        return $this->api_update($this->get_states_model());
    }
    /** */
    public function state_delete_api()
    {
        return $this->api_delete($this->get_states_model());
    }

    // city -------------------------------------------------------------------------------------------------------
    /** */
    public function city_get_api()
    {
        return $this->api_get($this->get_cities_model());
    }
    /** */
    public function city_list_api()
    {
        return $this->api_list($this->get_cities_model());
    }
    /** */
    public function city_create_api()
    {
        return $this->api_create($this->get_cities_model());
    }
    /** */
    public function city_update_api()
    {
        return $this->api_update($this->get_cities_model());
    }
    /** */
    public function city_delete_api()
    {
        return $this->api_delete($this->get_cities_model());
    }


    // designation -------------------------------------------------------------------------------------------------------
    /** */
    public function designation_get_api()
    {
        return $this->api_get($this->get_designations_model());
    }
    /** */
    public function designation_list_api()
    {
        return $this->api_list($this->get_designations_model());
    }
    /** */
    public function designation_create_api()
    {
        $result = null;
        $response =  $this->api_create($this->get_designations_model(), $result);
        if ($result['status'] == ApiResponseStatusCode::CREATED) {
            $this->createLog('create', 'DESIGNATIONS', "Designation Created (" . $result['data']['designation_name'] . ")", 'designations', $result['data']['designation_id'] ?? null, $result['data']);
        }
        return $response;
    }
    /** */
    public function designation_update_api()
    {
        $result = null;
        $response =  $this->api_update($this->get_designations_model(), $result);
        if ($result['status'] == ApiResponseStatusCode::OK) {
            $this->createLog(
                'update',
                'DESIGNATIONS',
                "Designation Update (" . $result['data']['designation_name'] . ")",
                'designations',
                $result['data']['designation_id'] ?? null,
                $result['data']
            );
            return $response;
        }
    }
    /** */
    public function designation_delete_api()
    {
        $result = null;
        $response =  $this->api_delete($this->get_designations_model(), $result);
        if ($result['status'] == ApiResponseStatusCode::OK) {
            $this->createLog(
                'delete',
                'DESIGNATIONS',
                "Designation Deleted (" . $result['data']['designation_name'] . ")",
                'designations',
                $result['data']['designation_id'] ?? null,
                $result['data']
            );
        }
        return $response;
    }

    // Module -------------------------------------------------------------------------------------------------------
    /** */
    public function module_get_api()
    {
        return $this->api_get($this->get_modules_model());
    }
    /** */
    public function module_list_api()
    {
        return $this->api_list($this->get_modules_model());
    }
    /** */
    public function module_create_api()
    {
        return $this->api_create($this->get_modules_model());
    }
    /** */
    public function module_update_api()
    {
        return $this->api_update($this->get_modules_model());
    }
    /** */
    public function module_delete_api()
    {
        return $this->api_delete($this->get_modules_model());
    }

    // Module Menu -------------------------------------------------------------------------------------------------------
    /** */
    public function module_menu_get_api()
    {
        return $this->api_get($this->get_module_menus_model());
    }
    /** */
    public function module_menu_list_api()
    {
        return $this->api_list($this->get_module_menus_model());
    }
    /** */
    public function module_menu_create_api()
    {
        return $this->api_create($this->get_module_menus_model());
    }
    /** */
    public function module_menu_update_api()
    {
        return $this->api_update($this->get_module_menus_model());
    }
    /** */
    public function module_menu_delete_api()
    {
        return $this->api_delete($this->get_module_menus_model());
    }
    // roles -------------------------------------------------------------------------------------------------------
    /** */
    public function role_get_api()
    {
        return $this->api_get($this->get_roles_model());
    }
    /** */
    public function role_list_api()
    {
        return $this->api_list($this->get_roles_model());
    }
    /** */
    public function role_create_api()
    {
        $result = null;
        $response =  $this->api_create($this->get_roles_model(), $result);
        if ($result['status'] == ApiResponseStatusCode::CREATED) {
            $this->createLog('create', 'ROLES', "Role Created (" . $result['data']['role_name'] . ")", 'roles', $result['data']['role_id'] ?? null, $result['data']);
        }
        return $response;
    }
    /** */
    public function role_update_api()
    {
        $result = null;
        $response =  $this->api_update($this->get_roles_model(), $result);
        if ($result['status'] == ApiResponseStatusCode::OK) {
            $this->createLog(
                'update',
                'ROLES',
                "Role Update (" . $result['data']['role_name'] . ")",
                'roles',
                $result['data']['role_id'] ?? null,
                $result['data']
            );
        }
        return $response;
    }
    /** */
    public function role_delete_api()
    {
        $result = null;
        $response =  $this->api_delete($this->get_roles_model(), $result);
        if ($result['status'] == ApiResponseStatusCode::OK) {
            $this->createLog(
                'delete',
                'ROLES',
                "Role Deleted (" . $result['data']['role_name'] . ")",
                'roles',
                $result['data']['role_id'] ?? null,
                $result['data']
            );
        }
        return $response;
    }
    // role Modules -------------------------------------------------------------------------------------------------------
    /** */
    public function role_module_get_api()
    {
        return $this->api_get($this->get_role_modules_model());
    }
    /** */
    public function role_module_list_api()
    {
        return $this->api_list($this->get_role_modules_model());
    }
    /** */
    public function role_module_create_api()
    {
        return $this->api_create($this->get_role_modules_model());
    }
    /** */
    public function role_module_update_api()
    {
        return $this->api_update($this->get_role_modules_model());
    }
    /** */
    public function role_module_delete_api()
    {
        return $this->api_delete($this->get_role_modules_model());
    }

    // role Module Menu-------------------------------------------------------------------------------------------------------
    /** */
    public function role_module_menu_get_api()
    {
        return $this->api_get($this->get_role_module_menus_model());
    }
    /** */
    public function role_module_menu_list_api()
    {
        return $this->api_list($this->get_role_module_menus_model());
    }
    /** */
    public function role_module_menu_create_api()
    {
        return $this->api_create($this->get_role_module_menus_model());
    }
    /** */
    public function role_module_menu_update_api()
    {
        return $this->api_update($this->get_role_module_menus_model());
    }
    /** */
    public function role_module_menu_delete_api()
    {
        return $this->api_delete($this->get_role_module_menus_model());
    }
    // logs -------------------------------------------------------------------------------------------------------
    /** */
    public function log_get_api()
    {
        return $this->api_get($this->get_logs_model());
    }
    /** */
    public function log_list_api()
    {
        return $this->api_list($this->get_logs_model());
    }
    // GroupType -------------------------------------------------------------------------------------------------------
    /** */
    public function group_type_get_api()
    {
        return $this->api_get($this->get_group_type_model());
    }
    /** */
    public function group_type_list_api()
    {
        return $this->api_list($this->get_group_type_model());
    }
    /** */
    public function group_type_create_api()
    {
        return $this->api_create($this->get_group_type_model());
    }
    /** */
    public function group_type_update_api()
    {
        return $this->api_update($this->get_group_type_model());
    }
    /** */
    public function group_type_delete_api()
    {
        return $this->api_delete($this->get_group_type_model());
    }
    // Group -------------------------------------------------------------------------------------------------------
    /** */
    public function group_get_api()
    {
        return $this->api_get($this->get_group_model());
    }
    /** */
    public function group_list_api()
    {
        return $this->api_list($this->get_group_model());
    }
    /** */
    public function group_create_api()
    {
        return $this->api_create($this->get_group_model());
    }
    /** */
    public function group_update_api()
    {
        return $this->api_update($this->get_group_model());
    }
    /** */
    public function group_delete_api()
    {
        return $this->api_delete($this->get_group_model());
    }
    // Category -------------------------------------------------------------------------------------------------------
    /** */
    public function category_get_api()
    {
        return $this->api_get($this->get_category_model());
    }
    /** */
    public function category_list_api()
    {
        return $this->api_list($this->get_category_model());
    }
    /** */
    public function category_create_api()
    {
        return $this->api_create($this->get_category_model());
    }
    /** */
    public function category_update_api()
    {
        return $this->api_update($this->get_category_model());
    }
    /** */
    public function category_delete_api()
    {
        return $this->api_delete($this->get_category_model());
    }
    // Business Types -------------------------------------------------------------------------------------------------------
    /** */
    public function business_types_get_api()
    {
        return $this->api_get($this->get_business_types_model());
    }
    /** */
    public function business_types_list_api()
    {
        return $this->api_list($this->get_business_types_model());
    }
    /** */
    public function business_types_create_api()
    {
        return $this->api_create($this->get_business_types_model());
    }
    /** */
    public function business_types_update_api()
    {
        return $this->api_update($this->get_business_types_model());
    }
    /** */
    public function business_types_delete_api()
    {
        return $this->api_delete($this->get_business_types_model());
    }
    // UserDataAccess -------------------------------------------------------------------------------------------------------
    /** */
    public function user_data_access_create_api()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $this->get_user_data_access_model()->where('user_id', $data['user_id'])->delete();
        $insert_data = [];
        foreach ($data as $key => $row) {
            if (is_array($row)) {
                foreach ($row as $value) {
                    $insert_data[] = [
                        'user_id' => $data['user_id'],
                        'user_data_access_type' => $key,
                        'record_id' => $value
                    ];
                }
            }
        }
        $this->get_user_data_access_model()->insertBatch($insert_data);
        return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::CREATED, 'User Data Access Rights Saved');
    }
    // user -------------------------------------------------------------------------------------------------------
    /** */
    public function user_get_api()
    {
        return $this->api_get($this->get_users_model());
    }
    /** */
    public function user_list_api()
    {
        return $this->api_list($this->get_users_model());
    }
    /** */
    public function user_create_api()
    {
        $result = null;
        $response =  $this->api_create($this->get_users_model(), $result);
        if ($result['status'] == ApiResponseStatusCode::CREATED) {
            $this->createLog('create', 'STAFF', "user Created (" . $result['data']['user_name'] . ")", 'users', $result['data']['user_id'] ?? null, $result['data']);
        }
        return $response;
    }
    /** */
    public function user_update_api()
    {
        $result = null;
        $response =  $this->api_update($this->get_users_model(), $result);
        if ($result['status'] == ApiResponseStatusCode::OK) {
            $this->createLog(
                'update',
                'STAFF',
                "user Update (" . $result['data']['user_name'] . ")",
                'users',
                $result['data']['user_id'] ?? null,
                $result['data']
            );
            return $response;
        }
    }
    /** */
    public function user_delete_api()
    {
        $result = null;
        $response =  $this->api_delete($this->get_users_model(), $result);
        if ($result['status'] == ApiResponseStatusCode::OK) {
            $this->createLog(
                'delete',
                'STAFF',
                "user Deleted (" . $result['data']['user_name'] . ")",
                'users',
                $result['data']['user_id'] ?? null,
                $result['data']
            );
        }
        return $response;
    }
    /**
     * {"username":"required","password":"required"}
     */
    public function login_api()
    {
        $data = getRequestData($this->request, 'ARRAY');
        // Load validation service
        $validation = \Config\Services::validation();
        // Define validation rules for 'username', 'password', 'confirm-password', 'otp'
        $validation->setRules([
            "username" => "required",
            "password" => "required"
        ]);
        if ($validation->run($data) === false) {
            // Return validation failed response
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, "Validation Failed", [], $validation->getErrors());
        }
        if (isset($data["remember_me"]) && $data["remember_me"] == 'on') {
            // Set username in cookies for life time
            setcookie('username', $data['username'], time() + 606024 * 90);
        } else {
            // Unset Cookie
            setcookie('username', '', time() - 3600);
        }

        $user_data = $this->get_users_model()->checkLogin($data['username'], $data['password']);
        if ($user_data['status'] != ApiResponseStatusCode::OK) {
            return formatApiAutoResponse($this->request, $this->response, $user_data);
        }
        if ($user_data['data']['is_active'] == 0) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, "Account Is Inactive");
        }
        if ($user_data['data']['user_type'] == "super_admin") {
            $user_data['data']['ref_user_type'] = "super_admin";
        }
        $user_data['data']['_access_rights'] = $this->get_users_model(false)->getUserLoginSessionAccessRights($user_data['data']);
        $session_data = $user_data['data'];
        $session_data['logged_in'] = true;
        // Session
        $session = \Config\Services::session();
        $session->set($session_data);
        return formatApiAutoResponse($this->request, $this->response, $user_data);
    }
    protected function FileTypeValidate($fileObject, $allowedFileTypeArray): bool
    {
        $fileType = $fileObject['type'];
        // Check if the file type is in the allowed file types array
        return in_array($fileType, $allowedFileTypeArray);
    }
    protected function FileSizeValidate($fileObject, $maximumFileSizeInKB): bool
    {
        $fileSize = $fileObject['size'];
        // Check if the file size is within the allowed limit
        return $fileSize <= $maximumFileSizeInKB * 1024;
    }

    public function ImageUpload()
    {
        $requestedData = getRequestData($this->request, 'ARRAY');
        // Load validation service
        $validation = \Config\Services::validation();

        // Define validation rules for 'username', 'password', 'confirm-password', 'otp'
        $validation->setRules([
            'file' => "required",
            'for' => "in_list[user,group_type,group]",
        ]);
        if ($validation->run($requestedData) === false) {
            // Return validation failed response
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, 'Validation Failed', [], $validation->getErrors());
        }
        // if (!$this->FileSizeValidate($requestedData['file'], 500)) {
        //     return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, 'File Size Max 500kb Allowed', []);
        // }
        $FileTypeArray = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/webp', 'image/svg+xml'];
        if (!$this->FileTypeValidate($requestedData['file'], $FileTypeArray)) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, 'Invalid File Type Only Image Allowed', []);
        }
        $folderPath = "";
        switch ($requestedData['for']) {
            case 'user':
                $folderPath .= "uploads/user/";
                break;
            case 'group_type':
                $folderPath .= "uploads/group_type/";
                break;
            case 'group':
                $folderPath .= "uploads/group/";
                break;
        }
        $errorMessage = "";
        $uploadResult = uploadImageWithThumbnail($requestedData['file'], $folderPath, $errorMessage);
        if ($uploadResult == false) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $errorMessage, []);
        }
        return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, "Image Upload Successfully", $uploadResult);
    }

    public function deleteImage()
    {
        $requestedData = getRequestData($this->request, 'ARRAY');

        // Load validation service
        $validation = \Config\Services::validation();

        // Define validation rules for 'image_file_path'
        $validation->setRules([
            "image_file_path" => "required"
        ]);

        if ($validation->run($requestedData) === false) {
            // Return validation failed response
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, 'Validation Failed', [], $validation->getErrors());
        }

        $imagePath = realpath(ROOTPATH . "/public/" . $requestedData['image_file_path']);
        $thumbnailPath = realpath(ROOTPATH . "/public/" . getThumbnailImagePath($requestedData['image_file_path']));

        // Log the paths for debugging
        // log_message('debug', 'Image path: ' . $imagePath);
        // log_message('debug', 'Thumbnail path: ' . $thumbnailPath);

        if ($imagePath && file_exists($imagePath)) {
            if (unlink($imagePath)) {
                if ($thumbnailPath && file_exists($thumbnailPath)) {
                    unlink($thumbnailPath);
                }
                return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, "Image Deleted successfully");
            } else {
                // Log an error if the file could not be deleted
                // log_message('error', 'Failed to delete image: ' . $imagePath);
                return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, "Failed to delete image");
            }
        } else {
            // Log an error if the file path is invalid or the file does not exist
            // log_message('error', 'Image file not found or invalid path: ' . $imagePath);
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::NOT_FOUND, "Image file not found");
        }
    }
}
