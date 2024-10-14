<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Response;
use ApiResponseStatusCode;
use Exception;

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
    // ItemBrands -------------------------------------------------------------------------------------------------------
    /** */
    public function item_brand_get_api()
    {
        return $this->api_get($this->get_item_brand_model());
    }
    /** */
    public function item_brand_list_api()
    {
        return $this->api_list($this->get_item_brand_model());
    }
    /** */
    public function item_brand_create_api()
    {
        return $this->api_create($this->get_item_brand_model());
    }
    /** */
    public function item_brand_update_api()
    {
        return $this->api_update($this->get_item_brand_model());
    }
    /** */
    public function item_brand_delete_api()
    {
        return $this->api_delete($this->get_item_brand_model());
    }
    // ItemGroups -------------------------------------------------------------------------------------------------------
    /** */
    public function item_group_get_api()
    {
        return $this->api_get($this->get_item_group_model());
    }
    /** */
    public function item_group_list_api()
    {
        return $this->api_list($this->get_item_group_model());
    }
    /** */
    public function item_group_create_api()
    {
        return $this->api_create($this->get_item_group_model());
    }
    /** */
    public function item_group_update_api()
    {
        return $this->api_update($this->get_item_group_model());
    }
    /** */
    public function item_group_delete_api()
    {
        return $this->api_delete($this->get_item_group_model());
    }
    // Group -------------------------------------------------------------------------------------------------------
    /** */
    public function item_sub_group_get_api()
    {
        return $this->api_get($this->get_item_sub_group_model());
    }
    /** */
    public function item_sub_group_list_api()
    {
        return $this->api_list($this->get_item_sub_group_model());
    }
    /** */
    public function item_sub_group_create_api()
    {
        return $this->api_create($this->get_item_sub_group_model());
    }
    /** */
    public function item_sub_group_update_api()
    {
        return $this->api_update($this->get_item_sub_group_model());
    }
    /** */
    public function item_sub_group_delete_api()
    {
        return $this->api_delete($this->get_item_sub_group_model());
    }
    // ItemCategory -------------------------------------------------------------------------------------------------------
    /** */
    public function item_category_get_api()
    {
        return $this->api_get($this->get_item_category_model());
    }
    /** */
    public function item_category_list_api()
    {
        return $this->api_list($this->get_item_category_model());
    }
    /** */
    public function item_category_create_api()
    {
        return $this->api_create($this->get_item_category_model());
    }
    /** */
    public function item_category_update_api()
    {
        return $this->api_update($this->get_item_category_model());
    }
    /** */
    public function item_category_delete_api()
    {
        return $this->api_delete($this->get_item_category_model());
    }
    // Item UQC -------------------------------------------------------------------------------------------------------
    /** */
    public function item_uqc_get_api()
    {
        return $this->api_get($this->get_item_uqc_model());
    }
    /** */
    public function item_uqc_list_api()
    {
        return $this->api_list($this->get_item_uqc_model());
    }
    /** */
    public function item_uqc_create_api()
    {
        return $this->api_create($this->get_item_uqc_model());
    }
    /** */
    public function item_uqc_update_api()
    {
        return $this->api_update($this->get_item_uqc_model());
    }
    /** */
    public function item_uqc_delete_api()
    {
        return $this->api_delete($this->get_item_uqc_model());
    }
    // Item HSN -------------------------------------------------------------------------------------------------------
    /** */
    public function item_hsn_get_api()
    {
        return $this->api_get($this->get_item_hsn_model());
    }
    /** */
    public function item_hsn_list_api()
    {
        return $this->api_list($this->get_item_hsn_model());
    }
    /** */
    public function item_hsn_create_api()
    {
        return $this->api_create($this->get_item_hsn_model());
    }
    /** */
    public function item_hsn_update_api()
    {
        return $this->api_update($this->get_item_hsn_model());
    }
    /** */
    public function item_hsn_delete_api()
    {
        return $this->api_delete($this->get_item_hsn_model());
    }
    // Item -------------------------------------------------------------------------------------------------------
    /** */
    public function item_get_api()
    {
        return $this->api_get($this->get_item_model());
    }
    /** */
    public function item_list_api()
    {
        return $this->api_list($this->get_item_model());
    }
    /** */
    public function item_create_api()
    {
        return $this->api_create($this->get_item_model());
    }
    /** */
    public function item_update_api()
    {
        return $this->api_update($this->get_item_model());
    }
    /** */
    public function item_delete_api()
    {
        return $this->api_delete($this->get_item_model());
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

    // Payment Terms -------------------------------------------------------------------------------------------------------
    /** */
    public function payment_terms_get_api()
    {
        return $this->api_get($this->get_payment_terms_model());
    }
    /** */
    public function payment_terms_list_api()
    {
        return $this->api_list($this->get_payment_terms_model());
    }
    /** */
    public function payment_terms_create_api()
    {
        return $this->api_create($this->get_payment_terms_model());
    }
    /** */
    public function payment_terms_update_api()
    {
        return $this->api_update($this->get_payment_terms_model());
    }
    /** */
    public function payment_terms_delete_api()
    {
        return $this->api_delete($this->get_payment_terms_model());
    }

    // get_party_rating_credit_model Terms -------------------------------------------------------------------------------------------------------
    /** */
    public function party_rating_credit_get_api()
    {
        return $this->api_get($this->get_party_rating_credit_model());
    }
    /** */
    public function party_rating_credit_list_api()
    {
        return $this->api_list($this->get_party_rating_credit_model());
    }
    /** */
    public function party_rating_credit_create_api()
    {
        return $this->api_create($this->get_party_rating_credit_model());
    }
    /** */
    public function party_rating_credit_update_api()
    {
        return $this->api_update($this->get_party_rating_credit_model());
    }
    /** */
    public function party_rating_credit_delete_api()
    {
        return $this->api_delete($this->get_party_rating_credit_model());
    }

    // get_party_rating_value_model Terms -------------------------------------------------------------------------------------------------------
    /** */
    public function party_rating_value_get_api()
    {
        return $this->api_get($this->get_party_rating_value_model());
    }
    /** */
    public function party_rating_value_list_api()
    {
        return $this->api_list($this->get_party_rating_value_model());
    }
    /** */
    public function party_rating_value_create_api()
    {
        return $this->api_create($this->get_party_rating_value_model());
    }
    /** */
    public function party_rating_value_update_api()
    {
        return $this->api_update($this->get_party_rating_value_model());
    }
    /** */
    public function party_rating_value_delete_api()
    {
        return $this->api_delete($this->get_party_rating_value_model());
    }
    // get_party_contact_model Terms -------------------------------------------------------------------------------------------------------
    /** */
    public function party_contact_get_api()
    {
        return $this->api_get($this->get_party_contact_model());
    }
    /** */
    public function party_contact_list_api()
    {
        return $this->api_list($this->get_party_contact_model());
    }
    /** */
    public function party_contact_create_api()
    {
        return $this->api_create($this->get_party_contact_model());
    }
    /** */
    public function party_contact_update_api()
    {
        return $this->api_update($this->get_party_contact_model());
    }
    /** */
    public function party_contact_delete_api()
    {
        return $this->api_delete($this->get_party_contact_model());
    }
    // Delivery Terms -------------------------------------------------------------------------------------------------------
    /** */
    public function delivery_terms_get_api()
    {
        return $this->api_get($this->get_delivery_terms_model());
    }
    /** */
    public function delivery_terms_list_api()
    {
        return $this->api_list($this->get_delivery_terms_model());
    }
    /** */
    public function delivery_terms_create_api()
    {
        return $this->api_create($this->get_delivery_terms_model());
    }
    /** */
    public function delivery_terms_update_api()
    {
        return $this->api_update($this->get_delivery_terms_model());
    }
    /** */
    public function delivery_terms_delete_api()
    {
        return $this->api_delete($this->get_delivery_terms_model());
    }
    // Party -------------------------------------------------------------------------------------------------------
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
    /** */
    public function party_create_api()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $array_result = [];
        $api_result =  $this->api_create($this->get_party_model(), $array_result);
        if ($array_result['status'] == ApiResponseStatusCode::CREATED) {
            $this->get_party_contact_model()->where('party_id', $array_result['data']['party_id'])->delete();
            if (isset($data['party_contact_data']) && !empty($data['party_contact_data'])) {
                foreach ($data['party_contact_data'] as $key => &$party_contact) {
                    $party_contact['party_id'] = $array_result['data']['party_id'];
                    if (empty($party_contact['person_name'])) {
                        unset($data['party_contact_data'][$key]);
                    }
                }
                if (isset($data['party_contact_data']) && !empty($data['party_contact_data'])) {
                    $party_contact_result = $this->get_party_contact_model()->insertBatch($data['party_contact_data']);
                }
            }
        }
        return $api_result;
    }
    /** */
    public function party_update_api()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $array_result = [];
        $api_result =  $this->api_update($this->get_party_model(), $array_result);
        if ($array_result['status'] == ApiResponseStatusCode::OK) {
            $this->get_party_contact_model()->where('party_id', $array_result['data']['party_id'])->delete();
            if (isset($data['party_contact_data']) && !empty($data['party_contact_data'])) {
                foreach ($data['party_contact_data'] as $key => &$party_contact) {
                    $party_contact['party_id'] = $array_result['data']['party_id'];
                    if (empty($party_contact['person_name'])) {
                        unset($data['party_contact_data'][$key]);
                    }
                }
                if (isset($data['party_contact_data']) && !empty($data['party_contact_data'])) {
                    $party_contact_result = $this->get_party_contact_model()->insertBatch($data['party_contact_data']);
                }
            }
        }
        return $api_result;
    }
    /** */
    public function party_delete_api()
    {
        return $this->api_delete($this->get_party_model());
    }

    // PartyAddress -------------------------------------------------------------------------------------------------------
    /** */
    public function party_address_get_api()
    {
        return $this->api_get($this->get_party_address_model());
    }
    /** */
    public function party_address_list_api()
    {
        return $this->api_list($this->get_party_address_model());
    }
    /** */
    public function party_address_create_api()
    {
        return $this->api_create($this->get_party_address_model());
    }
    /** */
    public function party_address_update_api()
    {
        return $this->api_update($this->get_party_address_model());
    }
    /** */
    public function party_address_delete_api()
    {
        return $this->api_delete($this->get_party_address_model());
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
            'for' => "in_list[user,item_brand,item_group,item_sub_group,item]",
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
            case 'item_brand':
                $folderPath .= "uploads/item_brand/";
                break;
            case 'item_group':
                $folderPath .= "uploads/item_group/";
                break;
            case 'item_sub_group':
                $folderPath .= "uploads/item_sub_group/";
                break;
            case 'item':
                $folderPath .= "uploads/item/";
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

    public function ImportPriceListByExcel()
    {
        try {
            helper(['form', 'excel']);
            $data = getRequestData($this->request, 'ARRAY');
            $file = $data['_files']['csv'];
            if ($file->isValid() && !$file->hasMoved()) {
                $filePath = $file->getTempName();
                $excelData = getExcelDataInArrayHeaderKeyWise($filePath, 2);
                if (empty($excelData)) {
                    return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, 'Record Not Found For Import');
                }
                // Trim Data
                $this->ExcelDataTrim($excelData);
                // Process Data to Default Values
                $this->PriceListExcelDataProcess($excelData);
                // Validate Excel File
                $errors = [];
                if (!$this->PriceListExcelValidate($excelData, $errors)) {
                    return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::VALIDATION_FAILED, "Excel File Validation Failed", [], $errors);
                } else {
                    $result = [];
                    foreach ($excelData as $key => $row) {
                        $data = [
                            "price_list_upload_user_id" => $_SESSION['user_id'],
                            "price_list_uploaded_date" => date("Y-m-d"),
                            "price_list_date" => $row["PL Date"],
                            "price_list_name" => $row["PL Name"],
                            "price_list_item_group" => $row["PL Item Group"],
                            "price_list_rate" => $row["PL Rate"],
                            "price_list_min_order_qty" => $row["PL MOQ"],
                            "price_list_min_order_pack_qty" => $row["PL MPQ"],
                            "price_list_supplier_comment" => $row["PL Supp Comments"],
                            "price_list_comment" => $row["PL Co Comments"],
                        ];
                        $result = $this->get_item_model()->RecordUpdate($data, $row["ID"]);
                    }
                }
                return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, 'Price List Update Successfully', $result);
            } else {
                return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, 'Invalid file or file has already been moved'[]);
            }
        } catch (Exception $e) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
        }
    }
    protected function PriceListExcelDataProcess(&$rows)
    {
        $intFields = ["PL Rate"];
        $defaultDataBluePrint = [
            "ID" => "",
            "PL Date" => "",
            "PL Name" => "",
            "PL Item Group" => "",
            "PL Rate" => 0.00,
            "PL MOQ" => 1.00,
            "PL MPQ" => 1.00,
            "PL Supp Comments" => "",
            "PL Co Comments" => "",
        ];
        foreach ($rows as $key => &$row) {
            foreach ($row as $key1 => &$value) {
                if (empty($value)) {
                    if (array_key_exists($key1, $defaultDataBluePrint)) {
                        $value = $defaultDataBluePrint[$key1];
                    }
                }
            }
        }
        foreach ($rows as $key => &$row) {
            foreach ($row as $key1 => &$value) {
                if (in_array($key1, $intFields)) {
                    $value = floatval($value);
                }
            }
        }
    }
    protected function PriceListExcelValidate($rows, &$errors)
    {
        $validationRules = [
            "ID" => "required",
            "PL Date" => "required|valid_date",
            "PL Name" => "required",
            "PL Item Group" => "permit_empty",
            "PL Rate" => "required",
            "PL MOQ" => "permit_empty",
            "PL MPQ" => "permit_empty",
            "PL Supp Comments" => "permit_empty",
            "PL Co Comments" => "permit_empty",
        ];

        $validation = \Config\Services::validation();
        $isValid = true;

        foreach ($rows as $index => $row) {
            if (!$validation->setRules($validationRules)->run($row)) {
                $errors[$index] = $validation->getErrors();
                $isValid = false;
            }
        }
        return $isValid;
    }
    public function ImportItemListByExcel()
    {
        try {
            helper(['form', 'excel']);
            $data = getRequestData($this->request, 'ARRAY');
            $file = $data['_files']['csv'];
            if ($file->isValid() && !$file->hasMoved()) {
                $filePath = $file->getTempName();
                $excelData = getExcelDataInArrayHeaderKeyWise($filePath, 1);
                if (empty($excelData) && count($excelData) < 2) {
                    return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, 'Record Not Found For Import');
                } else {
                    unset($excelData[0]);
                    $errors = [];
                    $result = $this->ImportItemProcess($excelData, $errors);
                }
            } else {
                return formatCommonResponse(ApiResponseStatusCode::BAD_REQUEST, 'Invalid file or file has already been moved', []);
            }
        } catch (Exception $e) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, $e->getMessage(), []);
        }
    }
    protected function ImportItemProcess(array $item_list = [], &$errors = [])
    {
        $this->ExcelDataTrim($item_list);
        // Process Data to Default Values
        $this->ItemListExcelDataProcess($item_list);
        // Validate Excel File
        if (!$this->ItemListExcelValidate($item_list, $errors)) {
            return formatCommonResponse(ApiResponseStatusCode::VALIDATION_FAILED, "Excel File Validation Failed", [], $errors);
        } else {
            $brand_list = [];
            $brand_names = [];
            $hsn_list = [];
            $hsn_codes = [];
            // Un Created Masters List
            foreach ($item_list as $key => $row) {
                if (empty($row['item_brand_id']) && !in_array($row['item_brand_name'], $brand_names)) {
                    $brand_names[] = $row['item_brand_name'];
                    $brand_list[$key]['item_brand_name'] = $row['item_brand_name'];
                    $brand_list[$key]['item_brand_code'] = $row['item_brand_name'];
                }
                if (empty($row['item_hsn_id']) && !in_array($row['item_hsn_code'], $hsn_codes)) {
                    $hsn_codes[] = $row['item_hsn_code'];
                    $hsn_list[$key]['item_hsn_type'] = 'HSN';
                    $hsn_list[$key]['item_hsn_code'] = $row['item_hsn_code'];
                    $hsn_list[$key]['item_hsn_gst'] = $row['item_hsn_gst'];
                }
            }
            
            return formatCommonResponse(ApiResponseStatusCode::OK, 'Item Import Successfully');
        }
    }
    protected function ItemListExcelDataProcess(&$rows)
    {
        $intFields = ["item_length_cms", "item_width_cms", "item_height_cms", "item_weight_kg", "item_is_spare_part", "item_is_expire", "item_min_order_qty", "item_min_order_pack_qty", "item_pack_conversion", "item_is_active", "item_inspection_required", 'item_hsn_gst'];
        $defaultDataBluePrint = [
            'item_brand_id' => null,
            'item_category_id' => null,
            'item_sub_group_id' => null,
            'item_hsn_id' => null,
            'item_class' => "not-assign",
            'item_code' => "",
            'item_name' => "",
            'item_description' => "",
            'item_supplier_description' => "",
            'item_nature' => "Saleable",
            'item_manufacturing_type' => "FinishedProduct",
            'item_is_spare_part' => 0,
            'item_is_expire' => 0,
            'item_min_order_qty' => 1,
            'item_min_order_pack_qty' => 1,
            'item_length_cms' => 0.00,
            'item_width_cms' => 0.00,
            'item_height_cms' => 0.00,
            'item_weight_kg' => 0.00,
            'item_drawing_no' => "",
            'item_remark' => "",
            'item_uqc_id' => "NOS",
            'item_pack_uqc_id' => "NOS",
            'item_pack_conversion' => 1,
            'item_is_active' => 1,
            'item_quality_check_link' => "",
            'item_inspection_required' => 0,
            'item_hsn_gst' => 0.00,
        ];
        foreach ($rows as $key => &$row) {
            foreach ($row as $key1 => &$value) {
                if (empty($value)) {
                    if (array_key_exists($key1, $defaultDataBluePrint)) {
                        $value = $defaultDataBluePrint[$key1];
                    }
                }
            }
        }
        foreach ($rows as $key => &$row) {
            foreach ($row as $key1 => &$value) {
                if (in_array($key1, $intFields)) {
                    $value = floatval($value);
                }
            }
        }
    }
    protected function ItemListExcelValidate($rows, &$errors)
    {
        $validationRules = [
            'item_name'               => 'required',
            'item_code'               => 'permit_empty',
            'item_class'              => 'required|in_list[listed,non-listed,not-assign]',
            'item_nature'             => 'required|in_list[Capex,Packaging,Services,Saleable,Consumable,MRO,NoBuy,NoStock]',
            'item_manufacturing_type'  => 'required|in_list[FinishedProduct,RawMaterial,SemiFinished,Other]',
            'item_brand_id'           => 'permit_empty',
            'item_category_id'        => 'permit_empty',
            'item_sub_group_id'       => 'required',
            'item_hsn_id'             => 'permit_empty',
            'item_uqc_id'             => 'required',
            'item_pack_uqc_id'        => 'permit_empty',
            'item_description'        => 'permit_empty',
            'item_supplier_description' => 'permit_empty',
            'item_quality_check_link' => 'permit_empty',
            'item_drawing_no'         => 'permit_empty',
            'item_remark'             => 'permit_empty',
            'item_min_order_qty'      => 'permit_empty',
            'item_min_order_pack_qty' => 'permit_empty',
            'item_length_cms'         => 'permit_empty',
            'item_width_cms'          => 'permit_empty',
            'item_height_cms'         => 'permit_empty',
            'item_weight_kg'          => 'permit_empty',
            'item_pack_conversion'    => 'permit_empty',
            'item_is_spare_part'      => 'permit_empty',
            'item_is_expire'          => 'permit_empty',
            'item_inspection_required' => 'permit_empty',
            'item_is_active'          => 'permit_empty',
            'item_hsn_gst' => 'permit_empty|in_list[0.00,0.10,0.25,1.00,1.50,3.00,5.00,6.00,7.50,12.00,18.00,28.00]'
        ];

        $validation = \Config\Services::validation();
        $isValid = true;

        foreach ($rows as $index => $row) {
            if (!$validation->setRules($validationRules)->run($row)) {
                $errors[$index] = $validation->getErrors();
                $isValid = false;
            }
        }
        return $isValid;
    }
    protected function ExcelDataTrim(&$rows)
    {
        foreach ($rows as $key => &$row) {
            foreach ($row as $key1 => &$value) {
                $value = trim($value);
            }
        }
    }
}
