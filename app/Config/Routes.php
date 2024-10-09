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
    $routes->get('/exportEnquiryExcelTemplate', 'AdminPageController::exportEnquiryExcelTemplate', ['as' => 'exportEnquiryExcelTemplate']);
    $routes->get('/seeder_run', 'AdminPageController::seeder_run', ['as' => 'seeder_run']);
    $routes->get('logout', 'AdminPageController::logout', ['as' => 'logout']);
    $routes->group('Admin', ['filter' => 'AdminAuth'], function ($routes) {
        $routes->get('LoginByOther/(:any)', 'AdminPageController::LoginByOther/$1', ['as' => 'LoginByOther']);
        $routes->get('', 'AdminPageController::default_dashboard_page', ['as' => 'default_dashboard_page']);
        $routes->group('ONE_TIME_SETUP', function ($routes) {
            $routes->group('Log', function ($routes) {
                $routes->get('List', 'AdminPageController::log_list_page', ['as' => 'log_list_page']);
            });
            $routes->group('Country', function ($routes) {
                $routes->get('List', 'AdminPageController::country_list_page', ['as' => 'country_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::country_create_update_page', ['as' => 'country_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::country_create_update_page/$1');
                $routes->post('View', 'AdminPageController::country_view_component', ['as' => 'country_view_component']);
            });
            $routes->group('State', function ($routes) {
                $routes->get('List', 'AdminPageController::state_list_page', ['as' => 'state_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::state_create_update_page', ['as' => 'state_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::state_create_update_page/$1');
                $routes->post('View', 'AdminPageController::state_view_component', ['as' => 'state_view_component']);
            });
            $routes->group('City', function ($routes) {
                $routes->get('List', 'AdminPageController::city_list_page', ['as' => 'city_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::city_create_update_page', ['as' => 'city_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::city_create_update_page/$1');
                $routes->post('View', 'AdminPageController::city_view_component', ['as' => 'city_view_component']);
            });
            $routes->group('BusinessType', function ($routes) {
                $routes->get('List', 'AdminPageController::business_types_list_page', ['as' => 'business_types_list_page']);
                $routes->post('View', 'AdminPageController::business_types_view_component', ['as' => 'business_types_view_component']);
            });
            $routes->group('PaymentTerms', function ($routes) {
                $routes->get('List', 'AdminPageController::payment_terms_list_page', ['as' => 'payment_terms_list_page']);
                $routes->post('payment_terms_create_update_component', 'AdminPageController::payment_terms_create_update_component', ['as' => 'payment_terms_create_update_component']);
            });
            $routes->group('DeliveryTerms', function ($routes) {
                $routes->get('List', 'AdminPageController::delivery_terms_list_page', ['as' => 'delivery_terms_list_page']);
                $routes->post('delivery_terms_create_update_component', 'AdminPageController::delivery_terms_create_update_component', ['as' => 'delivery_terms_create_update_component']);
            });
            $routes->group('ItemUQC', function ($routes) {
                $routes->get('List', 'AdminPageController::item_uqc_list_page', ['as' => 'item_uqc_list_page']);
            });
        });
        $routes->group('Dashboard', function ($routes) {
            $routes->get('Overview', 'AdminPageController::overview_dashboard_page', ['as' => 'overview_dashboard_page']);
            $routes->get('StaffManagement', 'AdminPageController::staff_management_dashboard_page', ['as' => 'staff_management_dashboard_page']);
            $routes->get('Inventory', 'AdminPageController::inventory_dashboard_page', ['as' => 'inventory_dashboard_page']);
            $routes->get('Starter', 'AdminPageController::starter_dashboard_page', ['as' => 'starter_dashboard_page']);
        });
        $routes->group('StaffManagement', function ($routes) {
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
            $routes->group('Staff', function ($routes) {
                $routes->get('List', 'AdminPageController::staff_list_page', ['as' => 'staff_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::staff_create_update_page', ['as' => 'staff_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::staff_create_update_page/$1');
                $routes->post('View', 'AdminPageController::staff_view_component', ['as' => 'staff_view_component']);
                $routes->get('user_data_access_create_update/(:num)/(:any)', 'AdminPageController::user_data_access_create_update/$1/$2');
            });
        });
        $routes->group('Inventory', function ($routes) {
            $routes->group('ItemGroup', function ($routes) {
                $routes->get('List', 'AdminPageController::item_group_list_page', ['as' => 'item_group_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::item_group_create_update_page', ['as' => 'item_group_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::item_group_create_update_page/$1');
                $routes->post('View', 'AdminPageController::item_group_view_component', ['as' => 'item_group_view_component']);
            });
            $routes->group('ItemSubGroup', function ($routes) {
                $routes->get('List', 'AdminPageController::item_sub_group_list_page', ['as' => 'item_sub_group_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::item_sub_group_create_update_page', ['as' => 'item_sub_group_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::item_sub_group_create_update_page/$1');
                $routes->post('View', 'AdminPageController::item_sub_group_view_component', ['as' => 'item_sub_group_view_component']);
            });
            $routes->group('ItemBrand', function ($routes) {
                $routes->get('List', 'AdminPageController::item_brand_list_page', ['as' => 'item_brand_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::item_brand_create_update_page', ['as' => 'item_brand_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::item_brand_create_update_page/$1');
                $routes->post('View', 'AdminPageController::item_brand_view_component', ['as' => 'item_brand_view_component']);
            });
            $routes->group('ItemCategory', function ($routes) {
                $routes->get('List', 'AdminPageController::item_category_list_page', ['as' => 'item_category_list_page']);
            });
            $routes->group('ItemHsn', function ($routes) {
                $routes->get('List', 'AdminPageController::item_hsn_list_page', ['as' => 'item_hsn_list_page']);
            });
            $routes->group('Item', function ($routes) {
                $routes->get('List', 'AdminPageController::item_list_page', ['as' => 'item_list_page']);
                $routes->post('item_view_component', 'AdminPageController::item_view_component', ['as' => 'item_view_component']);
                $routes->post('item_create_update_component', 'AdminPageController::item_create_update_component', ['as' => 'item_create_update_component']);
            });
        });
        $routes->post('add_row_contact_details', 'AdminPageController::add_row_contact_details', ['as' => 'add_row_contact_details']);
        $routes->post('party_address_view_component', 'AdminPageController::party_address_view_component', ['as' => 'party_address_view_component']);
        $routes->post('party_address_create_update_component', 'AdminPageController::party_address_create_update_component', ['as' => 'party_address_create_update_component']);
        $routes->get('Party/Address', 'AdminPageController::party_address_list_page', ['as' => 'party_address_list_page']);
        $routes->get('Party/Contact', 'AdminPageController::party_contact_list_page', ['as' => 'party_contact_list_page']);

        $routes->group('Purchase', function ($routes) {
            $routes->group('Customer', function ($routes) {
                $routes->get('List', 'AdminPageController::party_list_page/Supplier', ['as' => 'supplier_list_page']);
                $routes->post('party_view_component', 'AdminPageController::party_view_component/Supplier', ['as' => 'supplier_view_component']);
                $routes->post('party_create_update_component', 'AdminPageController::party_create_update_component/Supplier', ['as' => 'supplier_create_update_component']);
            });
            $routes->get('PriceList', 'AdminPageController::price_list_page', ['as' => 'price_list_page']);
        });
        $routes->group('Sales', function ($routes) {
            $routes->group('Customer', function ($routes) {
                $routes->get('List', 'AdminPageController::party_list_page/Customer', ['as' => 'customer_list_page']);
                $routes->post('party_view_component', 'AdminPageController::party_view_component/Customer', ['as' => 'customer_view_component']);
                $routes->post('party_create_update_component', 'AdminPageController::party_create_update_component/Customer', ['as' => 'customer_create_update_component']);
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
            $routes->group('log', function ($routes) {
                $routes->post("log_get_api", "AdminApiController::log_get_api", ['as' => 'log_get_api']);
                $routes->post("log_list_api", "AdminApiController::log_list_api", ['as' => 'log_list_api']);
            });
            $routes->group('item_category', function ($routes) {
                $routes->post("item_category_get_api", "AdminApiController::item_category_get_api", ['as' => 'item_category_get_api']);
                $routes->post("item_category_list_api", "AdminApiController::item_category_list_api", ['as' => 'item_category_list_api']);
                $routes->post("item_category_create_api", "AdminApiController::item_category_create_api", ['as' => 'item_category_create_api']);
                $routes->post("item_category_update_api", "AdminApiController::item_category_update_api", ['as' => 'item_category_update_api']);
                $routes->post("item_category_delete_api", "AdminApiController::item_category_delete_api", ['as' => 'item_category_delete_api']);
            });
            $routes->group('item_brand', function ($routes) {
                $routes->post("item_brand_get_api", "AdminApiController::item_brand_get_api", ['as' => 'item_brand_get_api']);
                $routes->post("item_brand_list_api", "AdminApiController::item_brand_list_api", ['as' => 'item_brand_list_api']);
                $routes->post("item_brand_create_api", "AdminApiController::item_brand_create_api", ['as' => 'item_brand_create_api']);
                $routes->post("item_brand_update_api", "AdminApiController::item_brand_update_api", ['as' => 'item_brand_update_api']);
                $routes->post("item_brand_delete_api", "AdminApiController::item_brand_delete_api", ['as' => 'item_brand_delete_api']);
            });
            $routes->group('item_group', function ($routes) {
                $routes->post("item_group_get_api", "AdminApiController::item_group_get_api", ['as' => 'item_group_get_api']);
                $routes->post("item_group_list_api", "AdminApiController::item_group_list_api", ['as' => 'item_group_list_api']);
                $routes->post("item_group_create_api", "AdminApiController::item_group_create_api", ['as' => 'item_group_create_api']);
                $routes->post("item_group_update_api", "AdminApiController::item_group_update_api", ['as' => 'item_group_update_api']);
                $routes->post("item_group_delete_api", "AdminApiController::item_group_delete_api", ['as' => 'item_group_delete_api']);
            });
            $routes->group('item_sub_group', function ($routes) {
                $routes->post("item_sub_group_get_api", "AdminApiController::item_sub_group_get_api", ['as' => 'item_sub_group_get_api']);
                $routes->post("item_sub_group_list_api", "AdminApiController::item_sub_group_list_api", ['as' => 'item_sub_group_list_api']);
                $routes->post("item_sub_group_create_api", "AdminApiController::item_sub_group_create_api", ['as' => 'item_sub_group_create_api']);
                $routes->post("item_sub_group_update_api", "AdminApiController::item_sub_group_update_api", ['as' => 'item_sub_group_update_api']);
                $routes->post("item_sub_group_delete_api", "AdminApiController::item_sub_group_delete_api", ['as' => 'item_sub_group_delete_api']);
            });
            $routes->group('item_uqc', function ($routes) {
                $routes->post("item_uqc_get_api", "AdminApiController::item_uqc_get_api", ['as' => 'item_uqc_get_api']);
                $routes->post("item_uqc_list_api", "AdminApiController::item_uqc_list_api", ['as' => 'item_uqc_list_api']);
                $routes->post("item_uqc_create_api", "AdminApiController::item_uqc_create_api", ['as' => 'item_uqc_create_api']);
                $routes->post("item_uqc_update_api", "AdminApiController::item_uqc_update_api", ['as' => 'item_uqc_update_api']);
                $routes->post("item_uqc_delete_api", "AdminApiController::item_uqc_delete_api", ['as' => 'item_uqc_delete_api']);
            });
            $routes->group('item_hsn', function ($routes) {
                $routes->post("item_hsn_get_api", "AdminApiController::item_hsn_get_api", ['as' => 'item_hsn_get_api']);
                $routes->post("item_hsn_list_api", "AdminApiController::item_hsn_list_api", ['as' => 'item_hsn_list_api']);
                $routes->post("item_hsn_create_api", "AdminApiController::item_hsn_create_api", ['as' => 'item_hsn_create_api']);
                $routes->post("item_hsn_update_api", "AdminApiController::item_hsn_update_api", ['as' => 'item_hsn_update_api']);
                $routes->post("item_hsn_delete_api", "AdminApiController::item_hsn_delete_api", ['as' => 'item_hsn_delete_api']);
            });
            $routes->group('item', function ($routes) {
                $routes->post("item_get_api", "AdminApiController::item_get_api", ['as' => 'item_get_api']);
                $routes->post("item_list_api", "AdminApiController::item_list_api", ['as' => 'item_list_api']);
                $routes->post("item_create_api", "AdminApiController::item_create_api", ['as' => 'item_create_api']);
                $routes->post("item_update_api", "AdminApiController::item_update_api", ['as' => 'item_update_api']);
                $routes->post("item_delete_api", "AdminApiController::item_delete_api", ['as' => 'item_delete_api']);
                $routes->post("ImportPriceListByExcel", "AdminApiController::ImportPriceListByExcel", ['as' => 'ImportPriceListByExcel']);
            });
            $routes->group('business_types', function ($routes) {
                $routes->post("business_types_get_api", "AdminApiController::business_types_get_api", ['as' => 'business_types_get_api']);
                $routes->post("business_types_list_api", "AdminApiController::business_types_list_api", ['as' => 'business_types_list_api']);
                $routes->post("business_types_create_api", "AdminApiController::business_types_create_api", ['as' => 'business_types_create_api']);
                $routes->post("business_types_update_api", "AdminApiController::business_types_update_api", ['as' => 'business_types_update_api']);
                $routes->post("business_types_delete_api", "AdminApiController::business_types_delete_api", ['as' => 'business_types_delete_api']);
            });
            $routes->group('payment_terms', function ($routes) {
                $routes->post("payment_terms_get_api", "AdminApiController::payment_terms_get_api", ['as' => 'payment_terms_get_api']);
                $routes->post("payment_terms_list_api", "AdminApiController::payment_terms_list_api", ['as' => 'payment_terms_list_api']);
                $routes->post("payment_terms_create_api", "AdminApiController::payment_terms_create_api", ['as' => 'payment_terms_create_api']);
                $routes->post("payment_terms_update_api", "AdminApiController::payment_terms_update_api", ['as' => 'payment_terms_update_api']);
                $routes->post("payment_terms_delete_api", "AdminApiController::payment_terms_delete_api", ['as' => 'payment_terms_delete_api']);
            });
            $routes->group('delivery_terms', function ($routes) {
                $routes->post("delivery_terms_get_api", "AdminApiController::delivery_terms_get_api", ['as' => 'delivery_terms_get_api']);
                $routes->post("delivery_terms_list_api", "AdminApiController::delivery_terms_list_api", ['as' => 'delivery_terms_list_api']);
                $routes->post("delivery_terms_create_api", "AdminApiController::delivery_terms_create_api", ['as' => 'delivery_terms_create_api']);
                $routes->post("delivery_terms_update_api", "AdminApiController::delivery_terms_update_api", ['as' => 'delivery_terms_update_api']);
                $routes->post("delivery_terms_delete_api", "AdminApiController::delivery_terms_delete_api", ['as' => 'delivery_terms_delete_api']);
            });
            $routes->group('party_rating_credit', function ($routes) {
                $routes->post("party_rating_credit_get_api", "AdminApiController::party_rating_credit_get_api", ['as' => 'party_rating_credit_get_api']);
                $routes->post("party_rating_credit_list_api", "AdminApiController::party_rating_credit_list_api", ['as' => 'party_rating_credit_list_api']);
                $routes->post("party_rating_credit_create_api", "AdminApiController::party_rating_credit_create_api", ['as' => 'party_rating_credit_create_api']);
                $routes->post("party_rating_credit_update_api", "AdminApiController::party_rating_credit_update_api", ['as' => 'party_rating_credit_update_api']);
                $routes->post("party_rating_credit_delete_api", "AdminApiController::party_rating_credit_delete_api", ['as' => 'party_rating_credit_delete_api']);
            });
            $routes->group('party_rating_value', function ($routes) {
                $routes->post("party_rating_value_get_api", "AdminApiController::party_rating_value_get_api", ['as' => 'party_rating_value_get_api']);
                $routes->post("party_rating_value_list_api", "AdminApiController::party_rating_value_list_api", ['as' => 'party_rating_value_list_api']);
                $routes->post("party_rating_value_create_api", "AdminApiController::party_rating_value_create_api", ['as' => 'party_rating_value_create_api']);
                $routes->post("party_rating_value_update_api", "AdminApiController::party_rating_value_update_api", ['as' => 'party_rating_value_update_api']);
                $routes->post("party_rating_value_delete_api", "AdminApiController::party_rating_value_delete_api", ['as' => 'party_rating_value_delete_api']);
            });
            $routes->group('party', function ($routes) {
                $routes->post("party_get_api", "AdminApiController::party_get_api", ['as' => 'party_get_api']);
                $routes->post("party_list_api", "AdminApiController::party_list_api", ['as' => 'party_list_api']);
                $routes->post("party_create_api", "AdminApiController::party_create_api", ['as' => 'party_create_api']);
                $routes->post("party_update_api", "AdminApiController::party_update_api", ['as' => 'party_update_api']);
                $routes->post("party_delete_api", "AdminApiController::party_delete_api", ['as' => 'party_delete_api']);
            });
            $routes->group('party_contact', function ($routes) {
                $routes->post("party_contact_get_api", "AdminApiController::party_contact_get_api", ['as' => 'party_contact_get_api']);
                $routes->post("party_contact_list_api", "AdminApiController::party_contact_list_api", ['as' => 'party_contact_list_api']);
                $routes->post("party_contact_create_api", "AdminApiController::party_contact_create_api", ['as' => 'party_contact_create_api']);
                $routes->post("party_contact_update_api", "AdminApiController::party_contact_update_api", ['as' => 'party_contact_update_api']);
                $routes->post("party_contact_delete_api", "AdminApiController::party_contact_delete_api", ['as' => 'party_contact_delete_api']);
            });
            $routes->group('party_address', function ($routes) {
                $routes->post("party_address_get_api", "AdminApiController::party_address_get_api", ['as' => 'party_address_get_api']);
                $routes->post("party_address_list_api", "AdminApiController::party_address_list_api", ['as' => 'party_address_list_api']);
                $routes->post("party_address_create_api", "AdminApiController::party_address_create_api", ['as' => 'party_address_create_api']);
                $routes->post("party_address_update_api", "AdminApiController::party_address_update_api", ['as' => 'party_address_update_api']);
                $routes->post("party_address_delete_api", "AdminApiController::party_address_delete_api", ['as' => 'party_address_delete_api']);
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
