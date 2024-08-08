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
        return $this->api_get($this->get_country_model());
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
        return $this->api_list($this->get_country_model());
    }
    /**
     *  
     */

    public function country_create_api()
    {
        return $this->api_create($this->get_country_model());
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
        return $this->api_update($this->get_country_model());
    }
    /**
     * {"country_id":"required"}
     */
    public function country_delete_api()
    {
        return $this->api_delete($this->get_country_model());
    }
    /**
     * {"state_id":"required"}
     */
    // state ----------------------------------------------------------------------------------------------------------
    /** */
    public function state_get_api()
    {
        return $this->api_get($this->get_state_model());
    }
    /** */
    public function state_list_api()
    {
        return $this->api_list($this->get_state_model());
    }
    /** */
    public function state_create_api()
    {
        return $this->api_create($this->get_state_model());
    }
    /** */
    public function state_update_api()
    {
        return $this->api_update($this->get_state_model());
    }
    /** */
    public function state_delete_api()
    {
        return $this->api_delete($this->get_state_model());
    }

    // city -------------------------------------------------------------------------------------------------------
    /** */
    public function city_get_api()
    {
        return $this->api_get($this->get_city_model());
    }
    /** */
    public function city_list_api()
    {
        return $this->api_list($this->get_city_model());
    }
    /** */
    public function city_create_api()
    {
        return $this->api_create($this->get_city_model());
    }
    /** */
    public function city_update_api()
    {
        return $this->api_update($this->get_city_model());
    }
    /** */
    public function city_delete_api()
    {
        return $this->api_delete($this->get_city_model());
    }


    // city -------------------------------------------------------------------------------------------------------
    /** */
    public function designation_get_api()
    {
        return $this->api_get($this->get_designation_model());
    }
    /** */
    public function designation_list_api()
    {
        return $this->api_list($this->get_city_model());
    }
    /** */
    public function designation_create_api()
    {
        return $this->api_create($this->get_designation_model(false));
    }
    /** */
    public function designation_update_api()
    {
        return $this->api_update($this->get_city_model(false));
    }
    /** */
    public function designation_delete_api()
    {
        return $this->api_delete($this->get_city_model(false));
    }

    // city -------------------------------------------------------------------------------------------------------
    /** */
    public function user_get_api()
    {
        return $this->api_get($this->get_user_model());
    }
    /** */
    public function user_list_api()
    {
        return $this->api_list($this->get_city_model());
    }
    /** */
    public function user_create_api()
    {
        return $this->api_create($this->get_user_model(false));
    }
    /** */
    public function user_update_api()
    {
        return $this->api_update($this->get_city_model(false));
    }
    /** */
    public function user_delete_api()
    {
        return $this->api_delete($this->get_city_model(false));
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

        $user_data = $this->get_user_model()->checkLogin($data['username'], $data['password']);
        if ($user_data['status'] != ApiResponseStatusCode::OK) {
            return formatApiAutoResponse($this->request, $this->response, $user_data);
        }
        if ($user_data['data']['is_active'] == 0) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, "Account Is Inactive");
        }
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
            'for' => "in_list[center,mr,kisan,purchase_bill,crop,kisan_vehicle,visit_image,seed_bill_image]",
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
            case 'center':
                $folderPath .= "uploads/center/";
                break;
            case 'mr':
                $folderPath .= "uploads/mr/";
                break;
            case 'kisan':
                $folderPath .= "uploads/kisan/";
                break;
            case 'kisan_vehicle':
                $folderPath .= "uploads/kisan_vehicle/";
                break;
            case 'purchase_bill':
                $folderPath .= "uploads/purchase_bill/";
                break;
            case 'crop':
                $folderPath .= "uploads/crop/";
                break;
            case 'visit_image':
                $folderPath .= "uploads/visit_image/";
                break;
            case 'seed_bill_image':
                $folderPath .= "uploads/seed_bill_image/";
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
