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
    /***/
    public function country_list_api()
    {
        return $this->api_list($this->get_country_model());
    }
    /**
     * {"country_name": "required|max_length[100]","alias": "max_length[3]","short_name": "max_length[2]","phonecode": "max_length[255]","currency": "max_length[255]","currency_name": "max_length[255]","currency_symbol": "max_length[255]","region": "max_length[255]"} 
     */

    public function country_create_api()
    {
        return $this->api_create($this->get_country_model());
    }
    /**
     * {"country_id": "required","country_name": "required|max_length[100]","alias": "max_length[3]","short_name": "max_length[2]","phonecode": "max_length[255]","currency": "max_length[255]","currency_name": "max_length[255]","currency_symbol": "max_length[255]","region": "max_length[255]"} 
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

    // state ----------------------------------------------------------------------------------------------------------
    /**
     * {"state_id":"required"}
     */
    public function state_get_api()
    {
        return $this->api_get($this->get_state_model());
    }
    /** */
    public function state_list_api()
    {
        return $this->api_list($this->get_state_model());
    }
    /**
     *{'state_name': 'required|alpha_numeric_space|max_length[255]','state_code': 'max_length[3]','country_id': 'required|is_not_unique[country.country_id]','short_name': 'alpha_numeric_space|max_length[255]'}
     */
    public function state_create_api()
    {
        return $this->api_create($this->get_state_model());
    }
    /**
     * {'state_id': 'required','state_name': 'required|alpha_numeric_space|max_length[255]','state_code': 'max_length[3]','country_id': 'required|is_not_unique[country.country_id]','short_name': 'alpha_numeric_space|max_length[255]'}
     */
    public function state_update_api()
    {
        return $this->api_update($this->get_state_model());
    }
    /**  {'state_id': 'required'}*/
    public function state_delete_api()
    {
        return $this->api_delete($this->get_state_model());
    }

    // city -------------------------------------------------------------------------------------------------------
    /** 
     * {'city_id' : 'required'}
     */
    public function city_get_api()
    {
        return $this->api_get($this->get_city_model());
    }
    /** */
    public function city_list_api()
    {
        return $this->api_list($this->get_city_model());
    }
    /** 
     * {'city_name' : 'required|alpha_numeric_space|max_length[255]','country_id' : 'required|integer|is_not_unique[country.country_id]','state_id' : 'required|integer|is_not_unique[state.state_id]'}
     */
    public function city_create_api()
    {
        return $this->api_create($this->get_city_model());
    }
    /** 
     * {'city_id' : 'required','city_name' : 'required|alpha_numeric_space|max_length[255]','country_id' : 'required|integer|is_not_unique[country.country_id]','state_id' : 'required|integer|is_not_unique[state.state_id]'}
     */
    public function city_update_api()
    {
        return $this->api_update($this->get_city_model());
    }
    /**{'city_id' : 'required'} */
    public function city_delete_api()
    {
        return $this->api_delete($this->get_city_model());
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
            'for' => "in_list[user,media,blog]",
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
            case 'media':
                $folderPath .= "uploads/media/";
                break;
                case 'blog':
                    $folderPath .= "uploads/blog/";
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
        $session_data = [];
        // switch ($user_data['data']['user_type']) {
        //     case 'center':
        //         $session_data = array_merge($user_data['data'], $this->get_center_model()->find($user_data['data']['reference_id']));
        //         break;
        //     case 'mr':
        //         $session_data = array_merge($user_data['data'], $this->get_mr_model()->find($user_data['data']['reference_id']));
        //         break;
        //     case 'kisan':
        //         $session_data = array_merge($user_data['data'], $this->get_kisan_model()->find($user_data['data']['reference_id']));
        //         break;
        // }
        $session_data['logged_in'] = true;
        // Session
        $session = \Config\Services::session();
        $session->set($session_data);
        return formatApiAutoResponse($this->request, $this->response, $user_data);
    }


    // illumination ----------------------------------------------------------------------------------------------------------
    /**
     * {'illumination_id' :'required'}
     */
    public function illumination_get_api()
    {
        return $this->api_get($this->get_illumination_model());
    }
    /** */
    public function illumination_list_api()
    {
        return $this->api_list($this->get_illumination_model());
    }
    /**
     * {'illumination_name' :'required|alpha_numeric_space|max_length[255]'}
     */
    public function illumination_create_api()
    {
        return $this->api_create($this->get_illumination_model());
    }
    /**
     * {'illumination_id' :'required','illumination_name' :'required|alpha_numeric_space|max_length[255]'}
     */
    public function illumination_update_api()
    {
        return $this->api_update($this->get_illumination_model());
    }
    /**
     * {'illumination_id' :'required'}
     */
    public function illumination_delete_api()
    {
        return $this->api_delete($this->get_illumination_model());
    }

    // location ----------------------------------------------------------------------------------------------------------

    /**
     * {"location_id": "required"} 

     */
    public function location_get_api()
    {
        return $this->api_get($this->get_location_model());
    }
    /** */
    public function location_list_api()
    {
        return $this->api_list($this->get_location_model());
    }
    /**
     * {"location_name": "required|alpha_numeric_space|max_length",location_type_id": "required|"location_country_id": "required|integer|is_not_unique[country.coun"location_state_id": "required|integer|is_not_unique[state.st"location_city_id": "required|integer|is_not_unique[city.city_id]","pincode": "permit_empty|integer|max_length[10]","latitude": "permit_empty|string|max_length[255]","longitude": "permit_empty|string|max_length[255]","google_map_link": "permit_empty|valid_url|max_length[255]"} 
     */
    public function location_create_api()
    {
        return $this->api_create($this->get_location_model());
    }
    /**
     * {"location_id": "required","location_name": "required|alpha_numeric_space|max_length[255]","location_type_id": "required|integer","location_country_id": "required|integer|is_not_unique[country.country_id]","location_state_id": "required|integer|is_not_unique[state.state_id]","location_city_id": "required|integer|is_not_unique[city.city_id]","pincode": "permit_empty|integer|max_length[10]","latitude": "permit_empty|string|max_length[255]","longitude": "permit_empty|string|max_length[255]","google_map_link": "permit_empty|valid_url|max_length[255]"} 
     */
    public function location_update_api()
    {
        return $this->api_update($this->get_location_model());
    }

    /**
     * {"location_id": "required"} 

     */
    public function location_delete_api()
    {
        return $this->api_delete($this->get_location_model());
    }

    // location_type ----------------------------------------------------------------------------------------------------------
    /** */
    public function location_type_get_api()
    {
        return $this->api_get($this->get_location_type_model());
    }
    /** */
    public function location_type_list_api()
    {
        return $this->api_list($this->get_location_type_model());
    }
    /** */
    public function location_type_create_api()
    {
        return $this->api_create($this->get_location_type_model());
    }
    /** */
    public function location_type_update_api()
    {
        return $this->api_update($this->get_location_type_model());
    }
    /** */
    public function location_type_delete_api()
    {
        return $this->api_delete($this->get_location_type_model());
    }

    // media ----------------------------------------------------------------------------------------------------------
    /** */
    public function media_get_api()
    {
        return $this->api_get($this->get_media_model());
    }
    /** */
    public function media_list_api()
    {
        return $this->api_list($this->get_media_model());
    }
    /** */
    public function media_create_api()
    {
        return $this->api_create($this->get_media_model());
    }
    /** */
    public function media_update_api()
    {
        return $this->api_update($this->get_media_model());
    }
    /** */
    public function media_delete_api()
    {
        return $this->api_delete($this->get_media_model());
    }

    // media_type ----------------------------------------------------------------------------------------------------------
    /**
     * {'media_type_id' : 'required'}
     */
    public function media_type_get_api()
    {
        return $this->api_get($this->get_media_type_model());
    }
    /** */
    public function media_type_list_api()
    {
        return $this->api_list($this->get_media_type_model());
    }
    /**
     * {'media_type_name' : 'required|alpha_numeric_space|max_length[255]','media_type_description' : 'permit_empty|max_length[255]'}
     */
    public function media_type_create_api()
    {
        return $this->api_create($this->get_media_type_model());
    }
    /**
     * {'media_type_id' : 'required','media_type_name' : 'required|alpha_numeric_space|max_length[255]','media_type_description' : 'permit_empty|max_length[255]'}
     */
    public function media_type_update_api()
    {
        return $this->api_update($this->get_media_type_model());
    }
    /**{'media_type_id' : 'required'} */
    public function media_type_delete_api()
    {
        return $this->api_delete($this->get_media_type_model());
    }

    // outdor_website_profile ----------------------------------------------------------------------------------------------------------
    /** 
     * {"id" : "required"}
    */
    public function outdor_website_profile_get_api()
    {
        return $this->api_get($this->get_outdor_website_profile_model());
    }
    /** */
    public function outdor_website_profile_list_api()
    {
        return $this->api_list($this->get_outdor_website_profile_model());
    }
   /**
     * {"firm_name" : "required|max_length[255]|alpha_numeric_space","firm_slogan" :"permit_empty","firm_logo_url" : "permit_empty|valid_url|max_length[255]","firm_address" : "permit_empty|max_length[255]","firm_owner_name" : "permit_empty|max_length[255]|alpha_numeric_space","firm_cin_no" : "permit_empty","firm_gst_no" : "permit_empty","firm_pan_no" : "permit_empty","contact_mobile" : "permit_empty|numeric|exact_length[10]","contact_whatsapp" : "permit_empty|numeric|exact_length[10]","contact_email" : "permit_empty|valid_email|max_length[255]", "sales_mobile" : "permit_empty|numeric|exact_length[10]", "sales_whatsapp" : "permit_empty|numeric|exact_length[10]", "sales_email" : "permit_empty|valid_email|max_length[255]", "support_mobile" : "permit_empty|numeric|exact_length[10]", "support_whatsapp" : "permit_empty|numeric|exact_length[10]", "support_email" : "permit_empty|valid_email|max_length[255]","career_mobile" : "permit_empty|numeric|exact_length[10]","career_whatsapp" : "permit_empty|numeric|exact_length[10]","career_email" : "permit_empty|valid_email|max_length[255]","google_map_url" : "permit_empty|valid_url|max_length[255]","website_url" : "permit_empty|valid_url|max_length[255]","play_store_url" : "permit_empty|valid_url|max_length[255]", "app_store_url" : "permit_empty|valid_url|max_length[255]", "facebook_url" : "permit_empty|valid_url|max_length[255]","instagram_url" : "permit_empty|valid_url|max_length[255]","twitter_url" : "permit_empty|valid_url|max_length[255]","linkedin_url" : "permit_empty|valid_url|max_length[255]","youtube_url" : "permit_empty|valid_url|max_length[255]","telegram_url" : "permit_empty|valid_url|max_length[255]","pinterest_url" : "permit_empty|valid_url|max_length[255]","google_search_url" : "permit_empty|valid_url|max_length[255]","email_smtp_user" : "permit_empty|permit_empty|max_length[255]","email_smtp_crypto" : "permit_empty|in_list[ssl,tls]","email_from_email" : "permit_empty|valid_email|max_length[255]","email_from_name" : "permit_empty|max_length[255]","bank_name" : "permit_empty|max_length[255]|alpha_numeric_space","bank_acc_name" : "permit_empty|max_length[255]","bank_acc_type" : "permit_empty|in_list[Saving,Current]", "about_company" :"permit_empty", "about_owner" :"permit_empty","terms_condition" :"permit_empty","privacy_policies" :"permit_empty","disclaimer_content":"permit_empty"}
     */
    public function outdor_website_profile_create_api()
    {
        return $this->api_create($this->get_outdor_website_profile_model());
    }
    /**
     * {"id" : "required","firm_name" : "required|max_length[255]|alpha_numeric_space","firm_slogan" :"permit_empty","firm_logo_url" : "permit_empty|valid_url|max_length[255]","firm_address" : "permit_empty|max_length[255]","firm_owner_name" : "permit_empty|max_length[255]|alpha_numeric_space","firm_cin_no" : "permit_empty","firm_gst_no" : "permit_empty","firm_pan_no" : "permit_empty","contact_mobile" : "permit_empty|numeric|exact_length[10]","contact_whatsapp" : "permit_empty|numeric|exact_length[10]","contact_email" : "permit_empty|valid_email|max_length[255]", "sales_mobile" : "permit_empty|numeric|exact_length[10]", "sales_whatsapp" : "permit_empty|numeric|exact_length[10]", "sales_email" : "permit_empty|valid_email|max_length[255]", "support_mobile" : "permit_empty|numeric|exact_length[10]", "support_whatsapp" : "permit_empty|numeric|exact_length[10]", "support_email" : "permit_empty|valid_email|max_length[255]","career_mobile" : "permit_empty|numeric|exact_length[10]","career_whatsapp" : "permit_empty|numeric|exact_length[10]","career_email" : "permit_empty|valid_email|max_length[255]","google_map_url" : "permit_empty|valid_url|max_length[255]","website_url" : "permit_empty|valid_url|max_length[255]","play_store_url" : "permit_empty|valid_url|max_length[255]", "app_store_url" : "permit_empty|valid_url|max_length[255]", "facebook_url" : "permit_empty|valid_url|max_length[255]","instagram_url" : "permit_empty|valid_url|max_length[255]","twitter_url" : "permit_empty|valid_url|max_length[255]","linkedin_url" : "permit_empty|valid_url|max_length[255]","youtube_url" : "permit_empty|valid_url|max_length[255]","telegram_url" : "permit_empty|valid_url|max_length[255]","pinterest_url" : "permit_empty|valid_url|max_length[255]","google_search_url" : "permit_empty|valid_url|max_length[255]","email_smtp_user" : "permit_empty|permit_empty|max_length[255]","email_smtp_crypto" : "permit_empty|in_list[ssl,tls]","email_from_email" : "permit_empty|valid_email|max_length[255]","email_from_name" : "permit_empty|max_length[255]","bank_name" : "permit_empty|max_length[255]|alpha_numeric_space","bank_acc_name" : "permit_empty|max_length[255]","bank_acc_type" : "permit_empty|in_list[Saving,Current]", "about_company" :"permit_empty", "about_owner" :"permit_empty","terms_condition" :"permit_empty","privacy_policies" :"permit_empty","disclaimer_content":"permit_empty"}
     */
    public function outdor_website_profile_update_api()
    {
        return $this->api_update($this->get_outdor_website_profile_model());
    }
    /**
     * {"id" : "required"}
     */
    public function outdor_website_profile_delete_api()
    {
        return $this->api_delete($this->get_outdor_website_profile_model());
    }

    // party ----------------------------------------------------------------------------------------------------------
    /** */
    public function party_get_api()
    {
        return $this->api_get($this->get_party_model());
    }
    /** */
    public function party_list_api()
    {
        return $this->api_list($this->get_party_model());
    }
    /**
     
     */
    public function party_create_api()
    {
        return $this->api_create($this->get_party_model());
    }
    /** 
    
     */
    public function party_update_api()
    {
        return $this->api_update($this->get_party_model());
    }
    /** */
    public function party_delete_api()
    {
        return $this->api_delete($this->get_party_model());
    }
    // lead ----------------------------------------------------------------------------------------------------------
    /** 
     * {'party_id':'required'}
     */
    public function lead_get_api()
    {
        return $this->api_get($this->get_lead_model());
    }
    /** */
    public function lead_list_api()
    {
        return $this->api_list($this->get_lead_model());
    }
    /** 
     * {'party_type' : 'required|in_list[lead,prospect,client,vendor]','contact_person_name' : 'required|max_length[255]|alpha_numeric_space','contact_person_email' : 'permit_empty|valid_email','contact_person_mobile' : 'required|max_length[10]|min_length[10]|is_unique[party.contact_person_mobile,party_id,{party_id}]','lead_description' : 'permit_empty','lead_status' : 'required|in_list[Hot,Cold,Warm,Cancel,Converted]','lead_date' : 'permit_empty|valid_date'}
     */
    public function lead_create_api()
    {
        return $this->api_create($this->get_lead_model());
    }
    /** 
     * {'party_id':'required','party_type' : 'required|in_list[lead,prospect,client,vendor]','contact_person_name' : 'required|max_length[255]|alpha_numeric_space','contact_person_email' : 'permit_empty|valid_email','contact_person_mobile' : 'required|max_length[10]|min_length[10]|is_unique[party.contact_person_mobile,party_id,{party_id}]','lead_description' : 'permit_empty','lead_status' : 'required|in_list[Hot,Cold,Warm,Cancel,Converted]','lead_date' : 'permit_empty|valid_date'}
     */
    public function lead_update_api()
    {
        return $this->api_update($this->get_lead_model());
    }
    /**
     *  {'party_id': 'required'}
     */
    public function lead_delete_api()
    {
        return $this->api_delete($this->get_lead_model());
    }

    // client ----------------------------------------------------------------------------------------------------------
    /** 
     * {'party_id': 'required'}
     */
    public function client_get_api()
    {
        return $this->api_get($this->get_client_model());
    }
    /** */
    public function client_list_api()
    {
        return $this->api_list($this->get_client_model());
    }
    /** 
     * * {'party_type': 'required|in_list[lead,prospect,client,vendor]','firm_gst_no': 'permit_empty|max_length[15]','firm_name': 'required|max_length[255]|alpha_numeric_space','firm_email': 'permit_empty|valid_email','firm_mobile': 'permit_empty|max_length[10]|min_length[10]','firm_address': 'permit_empty|max_length[255]','firm_country_id': 'permit_empty|is_not_unique[country.country_id]','firm_state_id': 'permit_empty|is_not_unique[state.state_id]','firm_city_id': 'permit_empty|is_not_unique[city.city_id]','firm_pincode': 'permit_empty|integer|max_length[10]','firm_pan_no': 'permit_empty|max_length[15]','contact_person_name': 'permit_empty|max_length[255]|alpha_numeric_space','contact_person_email': 'permit_empty|valid_email','contact_person_mobile': 'permit_empty|max_length[10]|min_length[10]','dob': 'permit_empty|valid_date','doa': 'permit_empty|valid_date'}
     */
    public function client_create_api()
    {
        return $this->api_create($this->get_client_model());
    }
    /** 
     * {'party_id': 'required','party_type': 'required|in_list[lead,prospect,client,vendor]','firm_gst_no': 'permit_empty|max_length[15]','firm_name': 'required|max_length[255]|alpha_numeric_space','firm_email': 'permit_empty|valid_email','firm_mobile': 'permit_empty|max_length[10]|min_length[10]','firm_address': 'permit_empty|max_length[255]','firm_country_id': 'permit_empty|is_not_unique[country.country_id]','firm_state_id': 'permit_empty|is_not_unique[state.state_id]','firm_city_id': 'permit_empty|is_not_unique[city.city_id]','firm_pincode': 'permit_empty|integer|max_length[10]','firm_pan_no': 'permit_empty|max_length[15]','contact_person_name': 'permit_empty|max_length[255]|alpha_numeric_space','contact_person_email': 'permit_empty|valid_email','contact_person_mobile': 'permit_empty|max_length[10]|min_length[10]','dob': 'permit_empty|valid_date','doa': 'permit_empty|valid_date'}
     */
    public function client_update_api()
    {
        return $this->api_update($this->get_client_model());
    }
    /** 
     *  {'party_id': 'required'}
     */
    public function client_delete_api()
    {
        return $this->api_delete($this->get_client_model());
    }

    // vendor ----------------------------------------------------------------------------------------------------------
    /**
     * {'party_id': 'required'}
     */
    public function vendor_get_api()
    {
        return $this->api_get($this->get_vendor_model());
    }
    /** */
    public function vendor_list_api()
    {
        return $this->api_list($this->get_vendor_model());
    }
    /** 
     * {'party_type': 'required|in_list[lead,prospect,client,vendor]','firm_gst_no': 'permit_empty|max_length[15]','firm_name': 'required|max_length[255]|alpha_numeric_space','firm_email': 'permit_empty|valid_email','firm_mobile': 'permit_empty|max_length[10]|min_length[10]','firm_address': 'permit_empty|max_length[255]','firm_pan_no': 'permit_empty|max_length[15]','firm_country_id': 'permit_empty|is_not_unique[country.country_id]','firm_state_id': 'permit_empty|is_not_unique[state.state_id]','firm_city_id': 'permit_empty|is_not_unique[city.city_id]','contact_person_name': 'permit_empty|max_length[255]|alpha_numeric_space','contact_person_email': 'permit_empty|valid_email','contact_person_mobile': 'permit_empty|max_length[10]|min_length[10]','vendor_type': 'permit_empty|in_list[none,agency,landlord,government]','bank_name': 'permit_empty|max_length[255]','account_type': 'permit_empty|in_list[saving,current]','ifsc_code': 'permit_empty|max_length[15]','account_no': 'permit_empty|integer|max_length[15]'}
     */
    public function vendor_create_api()
    {
        return $this->api_create($this->get_vendor_model());
    }
    /** 
     * {'party_id': 'required','party_type': 'required|in_list[lead,prospect,client,vendor]','firm_gst_no': 'permit_empty|max_length[15]','firm_name': 'required|max_length[255]|alpha_numeric_space','firm_email': 'permit_empty|valid_email','firm_mobile': 'permit_empty|max_length[10]|min_length[10]','firm_address': 'permit_empty|max_length[255]','firm_pan_no': 'permit_empty|max_length[15]','firm_country_id': 'permit_empty|is_not_unique[country.country_id]','firm_state_id': 'permit_empty|is_not_unique[state.state_id]','firm_city_id': 'permit_empty|is_not_unique[city.city_id]','contact_person_name': 'permit_empty|max_length[255]|alpha_numeric_space','contact_person_email': 'permit_empty|valid_email','contact_person_mobile': 'permit_empty|max_length[10]|min_length[10]','vendor_type': 'permit_empty|in_list[none,agency,landlord,government]','bank_name': 'permit_empty|max_length[255]','account_type': 'permit_empty|in_list[saving,current]','ifsc_code': 'permit_empty|max_length[15]','account_no': 'permit_empty|integer|max_length[15]'}
     */
    public function vendor_update_api()
    {
        return $this->api_update($this->get_vendor_model());
    }
    /**
     *  {'party_id': 'required'}
     */
    public function vendor_delete_api()
    {
        return $this->api_delete($this->get_vendor_model());
    }

    // subscribers ----------------------------------------------------------------------------------------------------------
    /** {"subscribers_id" : "required"}*/
    public function subscribers_get_api()
    {
        return $this->api_get($this->get_subscribers_list_model());
    }
    /** */
    public function subscribers_list_api()
    {
        return $this->api_list($this->get_subscribers_list_model());
    }
   /** 
     * {"email" : "permit_empty|valid_email","is_subscribers" : "required|in_list[0,1]"}
    */
    public function subscribers_create_api()
    {
        return $this->api_create($this->get_subscribers_list_model());
    }
    /** 
     * {"subscribers_id" : "required","email" : "permit_empty|valid_email","is_subscribers" : "required|in_list[0,1]"}
    */
    public function subscribers_update_api()
    {
        return $this->api_update($this->get_subscribers_list_model());
    }
    /**{"subscribers_id" : "required"} */
    public function subscribers_delete_api()
    {
        return $this->api_delete($this->get_subscribers_list_model());
    }
    
    // blog ----------------------------------------------------------------------------------------------------------
    /**{"blog_id" : "required|integer"} */
    public function blog_get_api()
    {
        return $this->api_get($this->get_blog_post_model());
    }
    /** */
    public function blog_list_api()
    {
        return $this->api_list($this->get_blog_post_model());
    }
    /**
     * {"blog_title" : "required|alpha_space|max_length[255]|is_unique[blog.blog_title,blog_id,{blog_id}]","blog_author_name" : "permit_empty|alpha_space|max_length[255]","blog_short_content" : "permit_empty|string","blog_long_content" : "permit_empty|string","blog_featured_image" : "permit_empty|string|max_length[255]","blog_status" : "required|in_list[draft,published]","user_id" : "permit_empty|integer|is_not_unique[user.user_id]","blog_views_count" : "permit_empty","published_at" : "permit_empty","blog_likes_count" : "permit_empty","blog_seo_title" : "permit_empty|alpha_space|max_length[60]","blog_seo_keyword" : "permit_empty|max_length[70]","blog_seo_description" : "permit_empty|max_length[155]","blog_alt_text" : "permit_empty"}
     */
    public function blog_create_api()
    {
        return $this->api_create($this->get_blog_post_model());
    }
    /**
     * {"blog_id" : "required|integer","blog_title" : "required|alpha_space|max_length[255]|is_unique[blog.blog_title,blog_id,{blog_id}]","blog_author_name" : "permit_empty|alpha_space|max_length[255]","blog_short_content" : "permit_empty|string","blog_long_content" : "permit_empty|string","blog_featured_image" : "permit_empty|string|max_length[255]","blog_status" : "required|in_list[draft,published]","user_id" : "permit_empty|integer|is_not_unique[user.user_id]","blog_views_count" : "permit_empty","published_at" : "permit_empty","blog_likes_count" : "permit_empty","blog_seo_title" : "permit_empty|alpha_space|max_length[60]","blog_seo_keyword" : "permit_empty|max_length[70]","blog_seo_description" : "permit_empty|max_length[155]","blog_alt_text" : "permit_empty"}
     */
    public function blog_update_api()
    {
        return $this->api_update($this->get_blog_post_model());
    }
    /** {"blog_id" : "required|integer"}*/
    public function blog_delete_api()
    {
        return $this->api_delete($this->get_blog_post_model());
    }


    // sales_item_transaction ----------------------------------------------------------------------------------------------------------
    /** */
    public function sales_item_transaction_get_api()
    {
        return $this->api_get($this->get_sales_item_transaction_model());
    }
    /** */
    public function sales_item_transaction_list_api()
    {
        return $this->api_list($this->get_sales_item_transaction_model());
    }
    /** */
    public function sales_item_transaction_create_api()
    {
        return $this->api_create($this->get_sales_item_transaction_model());
    }
    /** */
    public function sales_item_transaction_update_api()
    {
        return $this->api_update($this->get_sales_item_transaction_model());
    }
    /** */
    public function sales_item_transaction_delete_api()
    {
        return $this->api_delete($this->get_sales_item_transaction_model());
    }

    // sales_transaction ----------------------------------------------------------------------------------------------------------
    /** */
    public function sales_transaction_get_api()
    {
        return $this->api_get($this->get_sales_transaction_model());
    }
    /** */
    public function sales_transaction_list_api()
    {
        return $this->api_list($this->get_sales_transaction_model());
    }
    /** */
    public function sales_transaction_create_api()
    {
        return $this->api_create($this->get_sales_transaction_model());
    }
    /** */
    public function sales_transaction_update_api()
    {
        return $this->api_update($this->get_sales_transaction_model());
    }
    /** */
    public function sales_transaction_delete_api()
    {
        return $this->api_delete($this->get_sales_transaction_model());
    }

    // user ----------------------------------------------------------------------------------------------------------
    /** */
    public function user_get_api()
    {
        return $this->api_get($this->get_user_model());
    }
    /** */
    public function user_list_api()
    {
        return $this->api_list($this->get_user_model());
    }
    /** */
    public function user_create_api()
    {
        return $this->api_create($this->get_user_model());
    }
    /** */
    public function user_update_api()
    {
        return $this->api_update($this->get_user_model());
    }
    /** */
    public function user_delete_api()
    {
        return $this->api_delete($this->get_user_model());
    }

    // vouchar_terms_and_condition ----------------------------------------------------------------------------------------------------------
    /** */
    public function vouchar_terms_and_condition_get_api()
    {
        return $this->api_get($this->get_vouchar_terms_and_condition_model());
    }
    /** */
    public function vouchar_terms_and_condition_list_api()
    {
        return $this->api_list($this->get_vouchar_terms_and_condition_model());
    }
    /** */
    public function vouchar_terms_and_condition_create_api()
    {
        return $this->api_create($this->get_vouchar_terms_and_condition_model());
    }
    /** */
    public function vouchar_terms_and_condition_update_api()
    {
        return $this->api_update($this->get_vouchar_terms_and_condition_model());
    }
    /** */
    public function vouchar_terms_and_condition_delete_api()
    {
        return $this->api_delete($this->get_vouchar_terms_and_condition_model());
    }
   
}
