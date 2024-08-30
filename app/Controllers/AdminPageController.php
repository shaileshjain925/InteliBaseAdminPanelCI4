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
            $user_data['data'] = $this->get_users_model(false)->find($user_id);
            $user_data['data']['ref_user_type'] = UserType::SuperAdmin->value;
            $user_data['data']['_access_rights'] = $this->get_users_model(false)->getUserLoginSessionAccessRights($user_data);
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
    public function group_type_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Group Type List';
        $theme_data['_page_title'] = 'Group Type List';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Group Type List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Inventory/group_type_list';
        $theme_data['_previous_path'] = base_url(route_to('default_dashboard_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function group_type_create_update_page($group_type_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Group Type ' . CreateUpdateAlias($group_type_id);
        $theme_data['_page_title'] = 'Group Type ' . CreateUpdateAlias($group_type_id);
        $theme_data['_breadcrumb1'] = 'Group Type List';
        $theme_data['_breadcrumb2'] = 'Group Type ' . CreateUpdateAlias($group_type_id);
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Inventory/group_type_create_update';
        if (!empty($group_type_id)) {
            $theme_data = array_merge($theme_data, $this->get_group_type_model()->find($group_type_id) ?? []);
        }
        $theme_data['_previous_path'] = base_url(route_to('group_type_list_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function group_type_view_component()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $filter = [
            '_autojoin' => "F",
            '_select' => "*",
            'group_type_id' => $data['group_type_id'],
        ];
        $group_type_data = $this->get_group_type_model()->RecordList($filter);
        if ($group_type_data['status'] == ApiResponseStatusCode::OK && !empty($group_type_data['data'])) {
            return view('AdminPanelNew/components/group_type_view', $group_type_data['data'][0]);
        }
        return "<h1>Group Type Record Not Found</h1>";
    }
    public function group_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Group List';
        $theme_data['_page_title'] = 'Group List';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Group List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Inventory/group_list';
        $theme_data['_previous_path'] = base_url(route_to('default_dashboard_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function group_create_update_page($group_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Group ' . CreateUpdateAlias($group_id);
        $theme_data['_page_title'] = 'Group ' . CreateUpdateAlias($group_id);
        $theme_data['_breadcrumb1'] = 'Group List';
        $theme_data['_breadcrumb2'] = 'Group ' . CreateUpdateAlias($group_id);
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Inventory/group_create_update';
        if (!empty($group_id)) {
            $theme_data = array_merge($theme_data, $this->get_group_model()->find($group_id) ?? []);
        }
        $theme_data['_previous_path'] = base_url(route_to('group_list_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function group_view_component()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $filter = [
            '_autojoin' => "F",
            '_select' => "*",
            'group_id' => $data['group_id'],
        ];
        $group_data = $this->get_group_model()->RecordList($filter);
        if ($group_data['status'] == ApiResponseStatusCode::OK && !empty($group_data['data'])) {
            return view('AdminPanelNew/components/group_view', $group_data['data'][0]);
        }
        return "<h1>Group Record Not Found</h1>";
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
    public function user_data_access_create_update($user_id, $user_name)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'User Data Access Create';
        $theme_data['_page_title'] = 'User Data Access Create';
        $theme_data['_breadcrumb1'] = 'Staff List ';
        $theme_data['_breadcrumb2'] = 'User Data Access Create';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/staff_management/user_data_access_create_update';
        if (!empty($user_data_access_id)) {
            $theme_data = array_merge($theme_data, $this->get_user_data_access_model()->find($user_data_access_id) ?? []);
        }
        $theme_data['user_id'] = $user_id;
        $theme_data['user_name'] = $user_name;
        $theme_data['_previous_path'] = base_url(route_to('staff_list_page'));

        $user_access_data = $this->get_user_data_access_model()->where('user_id', $user_id)->findAll();
        $type_wise_user_access_data = TransformMultiRowArray($user_access_data, 'user_data_access_type', 'record_id');
        $theme_data = array_merge($theme_data, $type_wise_user_access_data);
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
        $theme_data['modules'] = $this->get_modules_model()->role_modules_data($role_id);
        $theme_data['_meta_title'] = 'Role Module & Menu Access Rights';
        $theme_data['_page_title'] = 'Role Module & Menu Access Rights';
        $theme_data['_breadcrumb1'] = 'Role List';
        $theme_data['_breadcrumb2'] = 'Role Module & Menu Access Rights';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/staff_management/role_module_menu_create_update';
        $theme_data['_previous_path'] = base_url(route_to('role_list_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }

    public function role_module_menus_component()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $return_data = [];
        $return_data['noModuleRightsSelected'] = true;
        // noModuleRightsSelected
        foreach ($data['modules'] as $module) {
            if (count($module) >= 3) {
                // If any module array has 2 or more elements, set to false and break the loop
                $return_data['noModuleRightsSelected'] = false;
                break;
            }
        }


        if ($return_data['noModuleRightsSelected']) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, "Please Select Any Module's Permission First");
        }
        $modules = [];
        foreach ($data['modules'] as $module) {
            if (count($module) >= 3) {
                $modules[] = $module;
            }
        }
        unset($return_data['noModuleRightsSelected']);
        $return_data['module_menus'] = $this->get_module_menus_model()->role_module_menus_data($data['role_id'], array_column($modules, 'module_id'));
        foreach ($return_data['module_menus'] as $item) {
            $return_data['modules'][$item['module_name']][$item['menu_type']][] = $item;
        }
        $return_data['access_modules'] = $data['modules'];
        $return_data['role_id'] = $data['role_id'];
        $return_data['html'] = view('AdminPanelNew/components/staff_management/role_module_menus_component', $return_data);
        return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, "Modules Permission Setup Finished", $return_data);
    }
    public function role_module_menus_create_update()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $r1 = $this->get_role_modules_model(false)->where('role_id', $data['role_id'])->delete();
        foreach ($data['modules'] as $key => $role_modules) {
            $r2 = $this->get_role_modules_model(false)->RecordCreate($role_modules);
        }
        $r3 = $this->get_role_module_menus_model(false)->where('role_id', $data['role_id'])->delete();
        foreach ($data['module_menus'] as $key => $role_module_menus) {
            $r4 = $this->get_role_module_menus_model(false)->RecordCreate($role_module_menus);
        }
        return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::OK, 'Role Modules & Menus Right Setup Successfull');
    }
    function checkKeyStartsWith(array $data, string $prefix): bool
    {
        foreach ($data as $module) {
            foreach (array_keys($module) as $key) {
                if (strpos($key, $prefix) === 0) {
                    return true;
                }
            }
        }
        return false;
    }

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
                        "title" => "Group Type",
                        "url" => base_url(route_to('group_type_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Group",
                        "url" => base_url(route_to('group_list_page')),
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
