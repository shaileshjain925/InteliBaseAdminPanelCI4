<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;
use MenuActionType as MAT;
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
    $routes->get('setSession/(:any)', 'AdminPageController::setSession/$1');
    $routes->get('logout', 'AdminPageController::logout', ['as' => 'logout']);
    $routes->group('Admin', function ($routes) {
        $routes->get('', 'AdminPageController::default_dashboard', ['as' => 'default_dashboard']);
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
            $routes->post('View', 'AdminPageController::dummy_view_component', ['as' => 'dummy_view_component']);
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
        });
        $routes->group('Auth', function ($routes) {
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
        });
    });
    // Admin Api Controller End -----------------------------------------------------------------------------

}
