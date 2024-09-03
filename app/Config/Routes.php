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
            $routes->get('Overview', 'AdminPageController::overview_dashboard_page', ['as' => 'overview_dashboard_page']);
            $routes->get('StaffManagement', 'AdminPageController::staff_management_dashboard_page', ['as' => 'staff_management_dashboard_page']);
            $routes->get('Inventory', 'AdminPageController::inventory_dashboard_page', ['as' => 'inventory_dashboard_page']);
            $routes->get('Starter', 'AdminPageController::starter_dashboard_page', ['as' => 'starter_dashboard_page']);
        });
        $routes->group('StaffManagement', function ($routes) {
            $routes->group('Staff', function ($routes) {
                $routes->get('List', 'AdminPageController::staff_list_page', ['as' => 'staff_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::staff_create_update_page', ['as' => 'staff_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::staff_create_update_page/$1');
                $routes->post('View', 'AdminPageController::staff_view_component', ['as' => 'staff_view_component']);
                $routes->get('user_data_access_create_update/(:num)/(:any)', 'AdminPageController::user_data_access_create_update/$1/$2');
            });
            $routes->group('Designation', function ($routes) {
                $routes->get('List', 'AdminPageController::designation_list_page', ['as' => 'designation_list_page']);
            });
            $routes->group('Category', function ($routes) {
                $routes->get('List', 'AdminPageController::category_list_page', ['as' => 'category_list_page']);
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
        $routes->group('Log', function ($routes) {
            $routes->get('List', 'AdminPageController::log_list_page', ['as' => 'log_list_page']);
        });
        $routes->group('country', function ($routes) {
            $routes->get('List', 'AdminPageController::country_list_page', ['as' => 'country_list_page']);
            $routes->get('CreateUpdate', 'AdminPageController::country_create_update_page', ['as' => 'country_create_update_page']);
            $routes->get('CreateUpdate/(:num)', 'AdminPageController::country_create_update_page/$1');
            $routes->post('View', 'AdminPageController::country_view_component', ['as' => 'country_view_component']);
        });
        $routes->group('state', function ($routes) {
            $routes->get('List', 'AdminPageController::state_list_page', ['as' => 'state_list_page']);
            $routes->get('CreateUpdate', 'AdminPageController::state_create_update_page', ['as' => 'state_create_update_page']);
            $routes->get('CreateUpdate/(:num)', 'AdminPageController::state_create_update_page/$1');
            $routes->post('View', 'AdminPageController::state_view_component', ['as' => 'state_view_component']);
        });
        $routes->group('city', function ($routes) {
            $routes->get('List', 'AdminPageController::city_list_page', ['as' => 'city_list_page']);
            $routes->get('CreateUpdate', 'AdminPageController::city_create_update_page', ['as' => 'city_create_update_page']);
            $routes->get('CreateUpdate/(:num)', 'AdminPageController::city_create_update_page/$1');
            $routes->post('View', 'AdminPageController::city_view_component', ['as' => 'city_view_component']);
        });
        $routes->group('GroupType', function ($routes) {
            $routes->get('List', 'AdminPageController::group_type_list_page', ['as' => 'group_type_list_page']);
            $routes->get('CreateUpdate', 'AdminPageController::group_type_create_update_page', ['as' => 'group_type_create_update_page']);
            $routes->get('CreateUpdate/(:num)', 'AdminPageController::group_type_create_update_page/$1');
            $routes->post('View', 'AdminPageController::group_type_view_component', ['as' => 'group_type_view_component']);
        });
        $routes->group('Group', function ($routes) {
            $routes->get('List', 'AdminPageController::group_list_page', ['as' => 'group_list_page']);
            $routes->get('CreateUpdate', 'AdminPageController::group_create_update_page', ['as' => 'group_create_update_page']);
            $routes->get('CreateUpdate/(:num)', 'AdminPageController::group_create_update_page/$1');
            $routes->post('View', 'AdminPageController::group_view_component', ['as' => 'group_view_component']);
        });
        $routes->group('BusinessType', function ($routes) {
            $routes->get('List', 'AdminPageController::business_types_list_page', ['as' => 'business_types_list_page']);
            $routes->get('CreateUpdate', 'AdminPageController::business_types_create_update_page', ['as' => 'business_types_create_update_page']);
            $routes->get('CreateUpdate/(:num)', 'AdminPageController::business_types_create_update_page/$1');
            $routes->post('View', 'AdminPageController::business_types_view_component', ['as' => 'business_types_view_component']);
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
            $routes->group('log', function ($routes) {
                $routes->post("log_get_api", "AdminApiController::log_get_api", ['as' => 'log_get_api']);
                $routes->post("log_list_api", "AdminApiController::log_list_api", ['as' => 'log_list_api']);
            });
            $routes->group('category', function ($routes) {
                $routes->post("category_get_api", "AdminApiController::category_get_api", ['as' => 'category_get_api']);
                $routes->post("category_list_api", "AdminApiController::category_list_api", ['as' => 'category_list_api']);
                $routes->post("category_create_api", "AdminApiController::category_create_api", ['as' => 'category_create_api']);
                $routes->post("category_update_api", "AdminApiController::category_update_api", ['as' => 'category_update_api']);
                $routes->post("category_delete_api", "AdminApiController::category_delete_api", ['as' => 'category_delete_api']);
            });

            $routes->group('group_type', function ($routes) {
                $routes->post("group_type_get_api", "AdminApiController::group_type_get_api", ['as' => 'group_type_get_api']);
                $routes->post("group_type_list_api", "AdminApiController::group_type_list_api", ['as' => 'group_type_list_api']);
                $routes->post("group_type_create_api", "AdminApiController::group_type_create_api", ['as' => 'group_type_create_api']);
                $routes->post("group_type_update_api", "AdminApiController::group_type_update_api", ['as' => 'group_type_update_api']);
                $routes->post("group_type_delete_api", "AdminApiController::group_type_delete_api", ['as' => 'group_type_delete_api']);
            });
            $routes->group('group', function ($routes) {
                $routes->post("group_get_api", "AdminApiController::group_get_api", ['as' => 'group_get_api']);
                $routes->post("group_list_api", "AdminApiController::group_list_api", ['as' => 'group_list_api']);
                $routes->post("group_create_api", "AdminApiController::group_create_api", ['as' => 'group_create_api']);
                $routes->post("group_update_api", "AdminApiController::group_update_api", ['as' => 'group_update_api']);
                $routes->post("group_delete_api", "AdminApiController::group_delete_api", ['as' => 'group_delete_api']);
            });
            $routes->group('business_types', function ($routes) {
                $routes->post("business_types_get_api", "AdminApiController::business_types_get_api", ['as' => 'business_types_get_api']);
                $routes->post("business_types_list_api", "AdminApiController::business_types_list_api", ['as' => 'business_types_list_api']);
                $routes->post("business_types_create_api", "AdminApiController::business_types_create_api", ['as' => 'business_types_create_api']);
                $routes->post("business_types_update_api", "AdminApiController::business_types_update_api", ['as' => 'business_types_update_api']);
                $routes->post("business_types_delete_api", "AdminApiController::business_types_delete_api", ['as' => 'business_types_delete_api']);
            });
            $routes->group('user_data_access', function ($routes) {
                $routes->post("user_data_access_get_api", "AdminApiController::user_data_access_get_api", ['as' => 'user_data_access_get_api']);
                $routes->post("user_data_access_list_api", "AdminApiController::user_data_access_list_api", ['as' => 'user_data_access_list_api']);
                $routes->post("user_data_access_create_api", "AdminApiController::user_data_access_create_api", ['as' => 'user_data_access_create_api']);
                $routes->post("user_data_access_update_api", "AdminApiController::user_data_access_update_api", ['as' => 'user_data_access_update_api']);
                $routes->post("user_data_access_delete_api", "AdminApiController::user_data_access_delete_api", ['as' => 'user_data_access_delete_api']);
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
