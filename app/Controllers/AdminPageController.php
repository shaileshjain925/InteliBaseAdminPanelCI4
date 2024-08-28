<?php

namespace App\Controllers;

use ApiResponseStatusCode;
use App\Controllers\BaseController;
use App\Database\Seeds\AllInOneSeeder;
use App\Traits\CommonTraits;
use Config\Database;
use UserType;

class AdminPageController extends BaseController
{
    use CommonTraits;

    public function default_dashboard_page()
    {
        return $this->super_admin_dashboard_page();
        // switch (getUserType()) {
        //     case UserType::SuperAdmin->value:
        //         return $this->super_admin_dashboard_page();
        //         break;
        //     case UserType::Admin->value:
        //         return $this->admin_dashboard_page();
        //         break;
        //     case UserType::SalesManager->value:
        //         return $this->sales_dashboard_page();
        //         break;
        //     case UserType::SalesExecutive->value:
        //         return $this->sales_dashboard_page();
        //         break;
        //     case UserType::Purchase->value:
        //         return $this->purchase_dashboard_page();
        //         break;
        //     case UserType::Finance->value:
        //         return $this->finance_dashboard_page();
        //         break;
        //     case UserType::CRM->value:
        //         return $this->crm_dashboard_page();
        //         break;
        // }
    }
    public function seeder_run()
    {
        $db = new Database();
        $seeder = new AllInOneSeeder($db);
        $seeder->run();
    }
    public function login_page()
    {
        // go to dashboard if session have logged_in
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
            return redirect()->route('default_dashboard_page');
        }
        return view('AdminPanelNew/pages/login');
    }
    public function logout()
    {
        // session Destroy
        session_destroy();
        return redirect()->route('login_page')->with('success', 'Logout Successfully');
    }
    public function LoginByOther($user_id)
    {
        if (isset($_SESSION['ref_user_type']) && $_SESSION['ref_user_type'] == UserType::SuperAdmin->value) {
            $user_data['data'] = $this->get_users_model()->find($user_id);
            $user_data['data']['ref_user_type'] = UserType::SuperAdmin->value;
            $user_data['data']['user_ids'] = $this->get_users_model()->getHierarchyUserIds($user_id);
            $session_data = $user_data['data'];
            $session_data['logged_in'] = true;
            // Session
            $session = \Config\Services::session();
            $session->set($session_data);
        }
        return redirect()->route('default_dashboard_page');
    }
    public function country_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Country List';
        $theme_data['_page_title'] = 'Country List';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Country List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/OneTimeSetting/country_list';
        $theme_data['_previous_path'] = base_url(route_to('default_dashboard_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function country_create_update_page($country_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'country ' . CreateUpdateAlias($country_id);
        $theme_data['_page_title'] = 'country ' . CreateUpdateAlias($country_id);
        $theme_data['_breadcrumb1'] = 'country List';
        $theme_data['_breadcrumb2'] = 'country ' . CreateUpdateAlias($country_id);
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/OneTimeSetting/country_create_update';
        if (!empty($country_id)) {
            $theme_data = array_merge($theme_data, $this->get_countries_model()->find($country_id) ?? []);
        }
        $theme_data['_previous_path'] = base_url(route_to('country_list_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function country_view_component()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $filter = [
            '_autojoin' => "F",
            '_select' => "*",
            'country_id' => $data['country_id'],
        ];
        $country_data = $this->get_countries_model()->RecordList($filter);
        if ($country_data['status'] == ApiResponseStatusCode::OK && !empty($country_data['data'])) {
            return view('AdminPanelNew/components/country_view', $country_data['data'][0]);
        }
        return "<h1>Country Record Not Found</h1>";
    
    }
    public function state_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'State List';
        $theme_data['_page_title'] = 'State List';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'State List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/OneTimeSetting/state_list';
        $theme_data['_previous_path'] = base_url(route_to('default_dashboard_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function state_create_update_page($state_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'State ' . CreateUpdateAlias($state_id);
        $theme_data['_page_title'] = 'State ' . CreateUpdateAlias($state_id);
        $theme_data['_breadcrumb1'] = 'State List';
        $theme_data['_breadcrumb2'] = 'State ' . CreateUpdateAlias($state_id);
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/OneTimeSetting/state_create_update';
        
    if (!empty($state_id)) {
        $state_data = $this->get_states_model()->find($state_id) ?? [];
        $theme_data = array_merge($theme_data, $state_data);

    }
        
        $theme_data['_previous_path'] = base_url(route_to('state_list_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function state_view_component()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $filter = [
            '_autojoin' => "F",
            '_select' => "*",
            'state_id' => $data['state_id'],
        ];
        $state_data = $this->get_states_model()->RecordList($filter);
        if ($state_data['status'] == ApiResponseStatusCode::OK && !empty($state_data['data'])) {
            return view('AdminPanelNew/components/state_view', $state_data['data'][0]);
        }
        return "<h1>State Record Not Found</h1>";
    
    }
    public function city_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'City List';
        $theme_data['_page_title'] = 'City List';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'City List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/OneTimeSetting/city_list';
        $theme_data['_previous_path'] = base_url(route_to('default_dashboard_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function city_create_update_page($city_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'City ' . CreateUpdateAlias($city_id);
        $theme_data['_page_title'] = 'City ' . CreateUpdateAlias($city_id);
        $theme_data['_breadcrumb1'] = 'City List';
        $theme_data['_breadcrumb2'] = 'City ' . CreateUpdateAlias($city_id);
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/OneTimeSetting/city_create_update';
        if (!empty($city_id)) {
            $theme_data = array_merge($theme_data, $this->get_cities_model()->find($city_id) ?? []);
        }
        $theme_data['_previous_path'] = base_url(route_to('city_list_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function city_view_component()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $filter = [
            '_autojoin' => "F",
            '_select' => "*",
            'city_id' => $data['city_id'],
        ];
        $city_data = $this->get_cities_model()->RecordList($filter);
        if ($city_data['status'] == ApiResponseStatusCode::OK && !empty($city_data['data'])) {
            return view('AdminPanelNew/components/city_view', $city_data['data'][0]);
        }
        return "<h1>City Record Not Found</h1>";
    
    }
    public function log_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Log List';
        $theme_data['_page_title'] = 'Log List';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Log List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/OneTimeSetting/log_list';
        $theme_data['_previous_path'] = base_url(route_to('default_dashboard_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
   
    public function designation_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Designation List';
        $theme_data['_page_title'] = 'Designation List';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Designation List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/staff_management/designation_list';
        $theme_data['_previous_path'] = base_url(route_to('default_dashboard_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function designation_create_update_page($user_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Designation ' . CreateUpdateAlias($user_id);
        $theme_data['_page_title'] = 'Designation ' . CreateUpdateAlias($user_id);
        $theme_data['_breadcrumb1'] = 'Designation List';
        $theme_data['_breadcrumb2'] = 'Designation ' . CreateUpdateAlias($user_id);
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/one_time_setting/designation_create_update';
        if (!empty($user_id)) {
            $theme_data = array_merge($theme_data, ['user_id' => $user_id]);
        }
        $theme_data['user_type'] = UserType::SuperAdmin->value;
        $theme_data['_form_type'] = 'component';
        $theme_data['_previous_path'] = base_url(route_to($theme_data['user_type'] . '_list_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }

    public function super_admin_dashboard_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Super Admin Dashboard';
        $theme_data['_page_title'] = 'Super Admin Admin Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Dashboard/super_admin_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function admin_dashboard_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Admin Dashboard';
        $theme_data['_page_title'] = 'Admin Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Dashboard/admin_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function sales_dashboard_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Sales Dashboard';
        $theme_data['_page_title'] = 'Sales Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Dashboard/sales_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function purchase_dashboard_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Purchase Dashboard';
        $theme_data['_page_title'] = 'Purchase Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Dashboard/purchase_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function finance_dashboard_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Finance Dashboard';
        $theme_data['_page_title'] = 'Finance Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Dashboard/finance_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function crm_dashboard_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'CRM Dashboard';
        $theme_data['_page_title'] = 'CRM Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Dashboard/crm_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function staff_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Staff List';
        $theme_data['_page_title'] = 'Staff List';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Staff List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/staff_management/user_list';
        $theme_data['_previous_path'] = base_url(route_to('default_dashboard_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function staff_create_update_page($user_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Staff ' . CreateUpdateAlias($user_id);
        $theme_data['_page_title'] = 'Staff ' . CreateUpdateAlias($user_id);
        $theme_data['_breadcrumb1'] = 'Staff List';
        $theme_data['_breadcrumb2'] = 'Staff ' . CreateUpdateAlias($user_id);
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/staff_management/user_create_update';
        if (!empty($user_id)) {
            $theme_data = array_merge($theme_data, $this->get_users_model()->find($user_id) ?? []);
        }
        $theme_data['_previous_path'] = base_url(route_to('staff_list_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function staff_view_component()
    {
        $theme_data['user_type'] = UserType::SuperAdmin->value;
        $data = getRequestData($this->request, 'ARRAY');
        $theme_data = array_merge($theme_data, $this->get_users_model()->autoJoin()->select("users.*")->find($data['user_id']));
        return view('AdminPanelNew/components/staff_management/user_view', $theme_data);
    }
    public function role_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Role List';
        $theme_data['_page_title'] = 'Role List';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Role List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/staff_management/role_list';
        $theme_data['_previous_path'] = base_url(route_to('default_dashboard_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function role_module_menus($role_id)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['role_name'] = $this->get_roles_model()->find($role_id)['role_name'];
        $theme_data['role_id'] = $role_id;
        $theme_data['modules'] = $this->role_modules_data($role_id);
        $theme_data['_meta_title'] = 'Role Module & Menu Access Rights';
        $theme_data['_page_title'] = 'Role Module & Menu Access Rights';
        $theme_data['_breadcrumb1'] = 'Role List';
        $theme_data['_breadcrumb2'] = 'Role Module & Menu Access Rights';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/staff_management/role_module_menu_create_update';
        $theme_data['_previous_path'] = base_url(route_to('role_list_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    protected function role_modules_data($role_id)
    {
        $m = $this->get_modules_model();
        $m->select('
            modules.module_id,
            modules.module_name,
            IFNULL(role_modules.dashboard, 0) as dashboard,
            IFNULL(role_modules.master_view, 0) as master_view,
            IFNULL(role_modules.master_create, 0) as master_create,
            IFNULL(role_modules.master_edit, 0) as master_edit,
            IFNULL(role_modules.master_approval, 0) as master_approval,
            IFNULL(role_modules.master_delete, 0) as master_delete,
            IFNULL(role_modules.master_print, 0) as master_print,
            IFNULL(role_modules.master_export, 0) as master_export,
            IFNULL(role_modules.master_bulk_delete, 0) as master_bulk_delete,
            IFNULL(role_modules.transaction_view, 0) as transaction_view,
            IFNULL(role_modules.transaction_create, 0) as transaction_create,
            IFNULL(role_modules.transaction_edit, 0) as transaction_edit,
            IFNULL(role_modules.transaction_approval, 0) as transaction_approval,
            IFNULL(role_modules.transaction_delete, 0) as transaction_delete,
            IFNULL(role_modules.transaction_print, 0) as transaction_print,
            IFNULL(role_modules.transaction_export, 0) as transaction_export,
            IFNULL(role_modules.transaction_bulk_delete, 0) as transaction_bulk_delete,
            IFNULL(role_modules.report_view, 0) as report_view,
            IFNULL(role_modules.report_print, 0) as report_print,
            IFNULL(role_modules.report_export, 0) as report_export,
            IFNULL(role_modules.config_view, 0) as config_view
        ');
        $m->join("role_modules", "role_modules.module_id = modules.module_id AND role_modules.role_id = $role_id", "left");
        $modules_menus_ids = array_column($this->get_module_menus_model(false)->distinct()->select('module_id')->findAll() ?? [], 'module_id');
        $m->whereIn('modules.module_id', $modules_menus_ids);
        return $m->findAll() ?? [];
    }
    public function role_module_menus_component()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $noModuleRightsSelected = true; // Assume true initially

        foreach ($data['modules'] as $module) {
            if (count($module) >= 3) {
                // If any module array has 2 or more elements, set to false and break the loop
                $noModuleRightsSelected = false;
                break;
            }
        }
        if ($noModuleRightsSelected) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, "Please Select Any Module's Permission First");
        }
        $role_module_menus_data = [];
        $return_data = [];
        $return_data['html'] = view('AdminPanelNew/components/staff_management/role_module_menus_component', $role_module_menus_data);
        return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, "Modules Permission Setup Finished", $return_data);
    }
    protected function role_module_menus_data($role_id) {}
    protected function admin_panel_common_data(): array
    {
        $theme_data = [];
        $theme_data['_assets_path'] = 'AdminPanelNew/';
        $theme_data['_theme_path'] = 'AdminPanelNew/';
        $theme_data['_partials_path'] = $theme_data['_theme_path'] . 'partials/';
        $theme_data['_meta_title'] = '';
        $theme_data['_page_title'] = '';
        $theme_data['_breadcrumb1'] = '';
        $theme_data['_breadcrumb2'] = '';
        // Css
        $theme_data['_head_css_code'] = "";
        $theme_data['_head_css_files'][] = $theme_data['_assets_path'] . 'assets/css/style.css';
        // Pre Script
        $theme_data['_head_js_code'] = "const base_url = '" . base_url() . "'";
        $theme_data['_head_js_files'][] = $theme_data['_assets_path'] . 'assets/js/pre-script.js';
        // Post Script
        $theme_data['_script_files'][] = $theme_data['_assets_path'] . 'assets/js/script.js';
        $theme_data['_script_files'][] = $theme_data['_assets_path'] . 'assets/js/common.js';
        $theme_data['_script_js_code'] = "";
        $theme_data['_view_files'] = [];

        // Sidebar
        $user_name = $_SESSION['user_name'];
        $user_id = $_SESSION['user_id'];
        $user_type = $_SESSION['user_type'];
        $user_image = "";
        $theme_data['_user_name'] = $user_name;
        $theme_data['_user_id'] = $user_id;
        $theme_data['_user_image_url'] = $user_image;
        $theme_data['_role_name'] = ucfirst($user_type);
        $theme_data['_role_id'] = $user_type;
        $theme_data['_menus'] = $this->getSiteBarMenus();
        return $theme_data;
    }
    protected function getSiteBarMenus()
    {
        $menuArray = [
            [
                "module_title" => "Dashboards",
                "module_name" => "Dashboards",
                "module_icon" => "mdi mdi-airplay",
                "visibility" => true,
                "menus" => [
                    [
                        "title" => "Super Admin",
                        "url" => base_url(route_to('super_admin_dashboard_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Admin",
                        "url" => base_url(route_to('admin_dashboard_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Sales",
                        "url" => base_url(route_to('sales_dashboard_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Purchase",
                        "url" => base_url(route_to('purchase_dashboard_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Finance",
                        "url" => base_url(route_to('finance_dashboard_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "CRM",
                        "url" => base_url(route_to('crm_dashboard_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                ]
            ],
            [
                "module_title" => "Staff Management",
                "module_name" => "Staff Management",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => true,
                "menus" => [
                    [
                        "title" => "Designation",
                        "url" => base_url(route_to('designation_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Role",
                        "url" => base_url(route_to('role_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Staff",
                        "url" => base_url(route_to('staff_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                ]
            ],
            [
                "module_title" => "Sales",
                "module_name" => "Sales",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => true,
                "menus" => [
                    [
                        "title" => "Customer",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Sales Enquiry",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Sales Quotation",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Sales Order",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                ]
            ],
            [
                "module_title" => "Purchase",
                "module_name" => "Purchase",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => true,
                "menus" => [
                    [
                        "title" => "Vendor",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Purchase Enquiry",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Purchase Quotation",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                ]
            ],
            [
                "module_title" => "Inventory",
                "module_name" => "Inventory",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => true,
                "menus" => [
                    [
                        "title" => "Category",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Group",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Brand",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "HSN",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Product",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Price List",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                ]
            ],
        ];
        return $menuArray;
    }
}
