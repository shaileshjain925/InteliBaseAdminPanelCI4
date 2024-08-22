<?php

namespace Config;
// Load custom helpers
helper("commonfunction_helper");
helper('array');

// Retrieve PHP_SELF
$php_self = $_SERVER['PHP_SELF'];

// Define allowed file extensions
$extensions = ['js', 'css', 'img', 'map', 'jpg', 'jpeg', 'png', 'gif', 'webp', 'woff', 'woff2', 'ttf', 'otf', 'mp4', 'webm', 'ogg', 'mp3', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'txt'];

// Extract file extension using pathinfo
$file_extension = pathinfo($php_self, PATHINFO_EXTENSION);
function encodeArray($array)
{
    $serializedArray = serialize($array);
    return urlencode($serializedArray);
}

// Ensure this part is outside the CodeIgniter routing definitions
if (!in_array($file_extension, $extensions)) {
    // Admin Page Controller Start -----------------------------------------------------------------------------
    $routes->get('/', 'AdminPageController::login_page', ['as' => 'login_page']);
    $routes->get('setSession', 'AdminPageController::setSession/super_admin', ['as' => 'setSession']);
    $routes->get('setSession/(:num)', 'AdminPageController::setSession/$1');
    $routes->get('logout', 'AdminPageController::logout', ['as' => 'logout']);
    $routes->group('Admin', ['filter' => 'AdminAuth'], function ($routes) {
        $routes->get('LoginByOther/(:any)', 'AdminPageController::LoginByOther/$1', ['as' => 'LoginByOther']);
        $routes->get('', 'AdminPageController::default_dashboard_page', ['as' => 'default_dashboard_page']);
        $routes->group('Dashboard', function ($routes) {
            $routes->get('SuperAdmin', 'AdminPageController::super_admin_dashboard_page', ['as' => 'super_admin_dashboard_page']);
            $routes->get('Admin', 'AdminPageController::admin_dashboard_page', ['as' => 'admin_dashboard_page']);
            $routes->get('Sales', 'AdminPageController::sales_dashboard_page', ['as' => 'sales_dashboard_page']);
            $routes->get('Purchase', 'AdminPageController::purchase_dashboard_page', ['as' => 'purchase_dashboard_page']);
            $routes->get('Finance', 'AdminPageController::finance_dashboard_page', ['as' => 'finance_dashboard_page']);
            $routes->get('CRM', 'AdminPageController::crm_dashboard_page', ['as' => 'crm_dashboard_page']);
        });
        $routes->group('Dummy', function ($routes) {
            $routes->get('List', 'AdminPageController::dummy_list_page', ['as' => 'dummy_list_page']);
            $routes->get('CreateUpdate', 'AdminPageController::dummy_create_update_page', ['as' => 'dummy_create_update_page']);
            $routes->get('CreateUpdate/(:num)', 'AdminPageController::dummy_create_update_page/$1');
            $routes->post('View', 'AdminPageController::dummy_view_component', ['as' => 'dummy_view_component']);
        });
        $routes->group('StaffManagement', function ($routes) {
            $routes->group('Staff', function ($routes) {
                $routes->get('List', 'AdminPageController::super_admin_list_page', ['as' => 'super_admin_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::super_admin_create_update_page', ['as' => 'super_admin_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::super_admin_create_update_page/$1');
                $routes->post('View', 'AdminPageController::super_admin_view_component', ['as' => 'super_admin_view_component']);
            });
            $routes->group('SuperAdmin', function ($routes) {
                $routes->get('List', 'AdminPageController::super_admin_list_page', ['as' => 'super_admin_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::super_admin_create_update_page', ['as' => 'super_admin_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::super_admin_create_update_page/$1');
                $routes->post('View', 'AdminPageController::super_admin_view_component', ['as' => 'super_admin_view_component']);
            });
            $routes->group('Admin', function ($routes) {
                $routes->get('List', 'AdminPageController::admin_list_page', ['as' => 'admin_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::admin_create_update_page', ['as' => 'admin_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::admin_create_update_page/$1');
                $routes->post('View', 'AdminPageController::admin_view_component', ['as' => 'admin_view_component']);
            });
            $routes->group('SalesManager', function ($routes) {
                $routes->get('List', 'AdminPageController::sales_manager_list_page', ['as' => 'sales_manager_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::sales_manager_create_update_page', ['as' => 'sales_manager_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::sales_manager_create_update_page/$1');
                $routes->post('View', 'AdminPageController::sales_manager_view_component', ['as' => 'sales_manager_view_component']);
            });
            $routes->group('SalesExecutive', function ($routes) {
                $routes->get('List', 'AdminPageController::sales_executive_list_page', ['as' => 'sales_executive_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::sales_executive_create_update_page', ['as' => 'sales_executive_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::sales_executive_create_update_page/$1');
                $routes->post('View', 'AdminPageController::sales_executive_view_component', ['as' => 'sales_executive_view_component']);
            });
            $routes->group('Purchase', function ($routes) {
                $routes->get('List', 'AdminPageController::purchase_list_page', ['as' => 'purchase_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::purchase_create_update_page', ['as' => 'purchase_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::purchase_create_update_page/$1');
                $routes->post('View', 'AdminPageController::purchase_view_component', ['as' => 'purchase_view_component']);
            });
            $routes->group('Finance', function ($routes) {
                $routes->get('List', 'AdminPageController::finance_list_page', ['as' => 'finance_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::finance_create_update_page', ['as' => 'finance_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::finance_create_update_page/$1');
                $routes->post('View', 'AdminPageController::finance_view_component', ['as' => 'finance_view_component']);
            });
            $routes->group('CRM', function ($routes) {
                $routes->get('List', 'AdminPageController::crm_list_page', ['as' => 'crm_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::crm_create_update_page', ['as' => 'crm_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::crm_create_update_page/$1');
                $routes->post('View', 'AdminPageController::crm_view_component', ['as' => 'crm_view_component']);
            });
        });
        $routes->group('FileUpload', function ($routes) {
            $routes->post('ImageUpload', 'AdminApiController::ImageUpload', ['as' => 'file_upload_image_api']);
            $routes->post('ImageDelete', 'AdminApiController::deleteImage', ['as' => 'file_delete_image_api']);
        });
    });
    // Admin Page Controller End -----------------------------------------------------------------------------


    // Admin Api Controller Start -----------------------------------------------------------------------------
    $routes->group('AdminApi', function ($routes) {
        $routes->group('NoAuth', function ($routes) {
            $routes->post("login_api", "AdminApiController::login_api", ['as' => 'login_api']);
        });
        $routes->group('Auth', ['filter' => 'AdminApiAuth'], function ($routes) {
            $routes->group('country', function ($routes) {
                $routes->post("country_get_api", "AdminApiController::country_get_api", ['as' => 'country_get_api']);
                $routes->post("country_list_api", "AdminApiController::country_list_api", ['as' => 'country_list_api']);
                $routes->post("country_create_api", "AdminApiController::country_create_api", ['as' => 'country_create_api']);
                $routes->post("country_update_api", "AdminApiController::country_update_api", ['as' => 'country_update_api']);
                $routes->post("country_delete_api", "AdminApiController::country_delete_api", ['as' => 'country_delete_api']);
            });
            $routes->group('state', function ($routes) {
                $routes->post("state_get_api", "AdminApiController::state_get_api", ['as' => 'state_get_api']);
                $routes->post("state_list_api", "AdminApiController::state_list_api", ['as' => 'state_list_api']);
                $routes->post("state_create_api", "AdminApiController::state_create_api", ['as' => 'state_create_api']);
                $routes->post("state_update_api", "AdminApiController::state_update_api", ['as' => 'state_update_api']);
                $routes->post("state_delete_api", "AdminApiController::state_delete_api", ['as' => 'state_delete_api']);
            });
            $routes->group('city', function ($routes) {
                $routes->post("city_get_api", "AdminApiController::city_get_api", ['as' => 'city_get_api']);
                $routes->post("city_list_api", "AdminApiController::city_list_api", ['as' => 'city_list_api']);
                $routes->post("city_create_api", "AdminApiController::city_create_api", ['as' => 'city_create_api']);
                $routes->post("city_update_api", "AdminApiController::city_update_api", ['as' => 'city_update_api']);
                $routes->post("city_delete_api", "AdminApiController::city_delete_api", ['as' => 'city_delete_api']);
            });
            $routes->group('designation', function ($routes) {
                $routes->post("designation_get_api", "AdminApiController::designation_get_api", ['as' => 'designation_get_api']);
                $routes->post("designation_list_api", "AdminApiController::designation_list_api", ['as' => 'designation_list_api']);
                $routes->post("designation_create_api", "AdminApiController::designation_create_api", ['as' => 'designation_create_api']);
                $routes->post("designation_update_api", "AdminApiController::designation_update_api", ['as' => 'designation_update_api']);
                $routes->post("designation_delete_api", "AdminApiController::designation_delete_api", ['as' => 'designation_delete_api']);
            });
            $routes->group('user', function ($routes) {
                $routes->post("user_get_api", "AdminApiController::user_get_api", ['as' => 'user_get_api']);
                $routes->post("user_list_api", "AdminApiController::user_list_api", ['as' => 'user_list_api']);
                $routes->post("user_create_api", "AdminApiController::user_create_api", ['as' => 'user_create_api']);
                $routes->post("user_update_api", "AdminApiController::user_update_api", ['as' => 'user_update_api']);
                $routes->post("user_delete_api", "AdminApiController::user_delete_api", ['as' => 'user_delete_api']);
            });
        });
    });
    // Admin Api Controller End -----------------------------------------------------------------------------
}
