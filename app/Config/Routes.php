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
    $routes->get('/seeder_run', 'AdminPageController::seeder_run', ['as' => 'seeder_run']);
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
                $routes->get('List', 'AdminPageController::staff_list_page', ['as' => 'staff_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::staff_create_update_page', ['as' => 'staff_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::staff_create_update_page/$1');
                $routes->post('View', 'AdminPageController::staff_view_component', ['as' => 'staff_view_component']);
            });
            $routes->group('Designation', function ($routes) {
                $routes->get('List', 'AdminPageController::designation_list_page', ['as' => 'designation_list_page']);
            });
            $routes->group('Role', function ($routes) {
                $routes->get('List', 'AdminPageController::role_list_page', ['as' => 'role_list_page']);
                $routes->get('RoleModuleMenus/(:any)', 'AdminPageController::role_module_menus/$1', ['as' => 'role_module_menus']);
                $routes->post('role_module_menus_component', 'AdminPageController::role_module_menus_component', ['as' => 'role_module_menus_component']);
                $routes->post('role_module_menus_create_update', 'AdminPageController::role_module_menus_create_update', ['as' => 'role_module_menus_create_update']);
            });
            $routes->group('Module', function ($routes) {
                $routes->post('View', 'AdminPageController::module_view_component', ['as' => 'module_view_component']);
            });
            $routes->group('ModuleMenu', function ($routes) {
                $routes->post('View', 'AdminPageController::module_menu_view_component', ['as' => 'module_menu_view_component']);
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
            $routes->group('role', function ($routes) {
                $routes->post("role_get_api", "AdminApiController::role_get_api", ['as' => 'role_get_api']);
                $routes->post("role_list_api", "AdminApiController::role_list_api", ['as' => 'role_list_api']);
                $routes->post("role_create_api", "AdminApiController::role_create_api", ['as' => 'role_create_api']);
                $routes->post("role_update_api", "AdminApiController::role_update_api", ['as' => 'role_update_api']);
                $routes->post("role_delete_api", "AdminApiController::role_delete_api", ['as' => 'role_delete_api']);
            });
            $routes->group('role_module', function ($routes) {
                $routes->post("role_module_get_api", "AdminApiController::role_module_get_api", ['as' => 'role_module_get_api']);
                $routes->post("role_module_list_api", "AdminApiController::role_module_list_api", ['as' => 'role_module_list_api']);
                $routes->post("role_module_create_api", "AdminApiController::role_module_create_api", ['as' => 'role_module_create_api']);
                $routes->post("role_module_update_api", "AdminApiController::role_module_update_api", ['as' => 'role_module_update_api']);
                $routes->post("role_module_delete_api", "AdminApiController::role_module_delete_api", ['as' => 'role_module_delete_api']);
            });
            $routes->group('role_module_menu', function ($routes) {
                $routes->post("role_module_menu_get_api", "AdminApiController::role_module_menu_get_api", ['as' => 'role_module_menu_get_api']);
                $routes->post("role_module_menu_list_api", "AdminApiController::role_module_menu_list_api", ['as' => 'role_module_menu_list_api']);
                $routes->post("role_module_menu_create_api", "AdminApiController::role_module_menu_create_api", ['as' => 'role_module_menu_create_api']);
                $routes->post("role_module_menu_update_api", "AdminApiController::role_module_menu_update_api", ['as' => 'role_module_menu_update_api']);
                $routes->post("role_module_menu_delete_api", "AdminApiController::role_module_menu_delete_api", ['as' => 'role_module_menu_delete_api']);
            });
            $routes->group('module', function ($routes) {
                $routes->post("module_get_api", "AdminApiController::module_get_api", ['as' => 'module_get_api']);
                $routes->post("module_list_api", "AdminApiController::module_list_api", ['as' => 'module_list_api']);
                $routes->post("module_create_api", "AdminApiController::module_create_api", ['as' => 'module_create_api']);
                $routes->post("module_update_api", "AdminApiController::module_update_api", ['as' => 'module_update_api']);
                $routes->post("module_delete_api", "AdminApiController::module_delete_api", ['as' => 'module_delete_api']);
            });
            $routes->group('module_menu', function ($routes) {
                $routes->post("module_menu_get_api", "AdminApiController::module_menu_get_api", ['as' => 'module_menu_get_api']);
                $routes->post("module_menu_list_api", "AdminApiController::module_menu_list_api", ['as' => 'module_menu_list_api']);
                $routes->post("module_menu_create_api", "AdminApiController::module_menu_create_api", ['as' => 'module_menu_create_api']);
                $routes->post("module_menu_update_api", "AdminApiController::module_menu_update_api", ['as' => 'module_menu_update_api']);
                $routes->post("module_menu_delete_api", "AdminApiController::module_menu_delete_api", ['as' => 'module_menu_delete_api']);
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
