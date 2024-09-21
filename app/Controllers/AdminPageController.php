<?php

namespace App\Controllers;

use ApiResponseStatusCode;
use App\Controllers\BaseController;
use App\Database\Seeds\AllInOneSeeder;
use App\Traits\CommonTraits;
use Config\Database;

class AdminPageController extends BaseController
{
    use CommonTraits;

    public function default_dashboard_page()
    {
        if ($_SESSION['user_type'] == 'super_admin' || $_SESSION['user_type'] == 'admin') {
            return $this->overview_dashboard_page();
        } else {
            $primary_dashboard_module_code = null;
            if (isset($_SESSION['_access_rights']['modules'])) {
                foreach ($_SESSION['_access_rights']['modules'] as $module) {
                    if ($module['is_primary_dashboard']) {
                        $primary_dashboard_module_code = $module['module_code'];
                    }
                }
            }

            switch ($primary_dashboard_module_code) {
                case 'STAFF_MANAGEMENT':
                    return $this->staff_management_dashboard_page();
                    break;
                case 'INVENTORY':
                    return $this->inventory_dashboard_page();
                    break;
                default:
                    return $this->starter_dashboard_page();
                    break;
            }
        }
    }
    public function overview_dashboard_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Overview Dashboard';
        $theme_data['_page_title'] = 'Overview Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Dashboard/overview_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    // Staff Management Dashboard
    public function staff_management_dashboard_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Staff Management Dashboard';
        $theme_data['_page_title'] = 'Staff Management Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Dashboard/staff_management_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    // Inventory Dashboard
    public function inventory_dashboard_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Inventory Dashboard';
        $theme_data['_page_title'] = 'Inventory Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Dashboard/inventory_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    // Blank dashboard
    public function starter_dashboard_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Super Admin Dashboard';
        $theme_data['_page_title'] = 'Super Admin Admin Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Dashboard/starter_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
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
        if (isset($_SESSION['ref_user_type']) && $_SESSION['ref_user_type'] == "super_admin") {
            $user_data['data'] = $this->get_users_model(false)->find($user_id);
            $user_data['data']['ref_user_type'] = "super_admin";
            $user_data['data']['_access_rights'] = $this->get_users_model(false)->getUserLoginSessionAccessRights($user_data['data']);
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
    public function business_types_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Business Types List';
        $theme_data['_page_title'] = 'Business Types List';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Business Types List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/OneTimeSetting/business_types_list';
        $theme_data['_previous_path'] = base_url(route_to('default_dashboard_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function business_types_create_update_page($user_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Business Types ' . CreateUpdateAlias($user_id);
        $theme_data['_page_title'] = 'Business Types ' . CreateUpdateAlias($user_id);
        $theme_data['_breadcrumb1'] = 'Business Types List';
        $theme_data['_breadcrumb2'] = 'Business Types ' . CreateUpdateAlias($user_id);
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/OneTimeSetting/business_types_create_update';
        if (!empty($user_id)) {
            $theme_data = array_merge($theme_data, ['user_id' => $user_id]);
        }
        $theme_data['user_type'] = "super_admin";
        $theme_data['_form_type'] = 'component';
        $theme_data['_previous_path'] = base_url(route_to($theme_data['user_type'] . '_list_page'));
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
        $theme_data['user_type'] = "super_admin";
        $theme_data['_form_type'] = 'component';
        $theme_data['_previous_path'] = base_url(route_to($theme_data['user_type'] . '_list_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function item_brand_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Item Brand List';
        $theme_data['_page_title'] = 'Item Brand List';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Item Brand List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Inventory/item_brand_list';
        $theme_data['_previous_path'] = base_url(route_to('default_dashboard_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function item_brand_create_update_page($item_brand_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Item Brand ' . CreateUpdateAlias($item_brand_id);
        $theme_data['_page_title'] = 'Item Brand ' . CreateUpdateAlias($item_brand_id);
        $theme_data['_breadcrumb1'] = 'Item Brand List';
        $theme_data['_breadcrumb2'] = 'Item Brand ' . CreateUpdateAlias($item_brand_id);
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Inventory/item_brand_create_update';
        if (!empty($item_brand_id)) {
            $theme_data = array_merge($theme_data, $this->get_item_brand_model()->find($item_brand_id) ?? []);
        }
        $theme_data['_previous_path'] = base_url(route_to('item_brand_list_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function item_brand_view_component()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $filter = [
            '_autojoin' => "F",
            '_select' => "*",
            'item_brand_id' => $data['item_brand_id'],
        ];
        $item_brand_data = $this->get_item_brand_model()->RecordList($filter);
        if ($item_brand_data['status'] == ApiResponseStatusCode::OK && !empty($item_brand_data['data'])) {
            return view('AdminPanelNew/components/item_brand_view', $item_brand_data['data'][0]);
        }
        return "<h1>Item Brand Record Not Found</h1>";
    }
    public function item_category_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Item Category List';
        $theme_data['_page_title'] = 'Item Category List';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Item Category List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Inventory/item_category_list';
        $theme_data['_previous_path'] = base_url(route_to('default_dashboard_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }

    public function item_group_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Item Group List';
        $theme_data['_page_title'] = 'Item Group List';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Item Group List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Inventory/item_group_list';
        $theme_data['_previous_path'] = base_url(route_to('default_dashboard_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function item_group_create_update_page($item_group_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Item Group ' . CreateUpdateAlias($item_group_id);
        $theme_data['_page_title'] = 'Item Group ' . CreateUpdateAlias($item_group_id);
        $theme_data['_breadcrumb1'] = 'Item Group List';
        $theme_data['_breadcrumb2'] = 'Item Group ' . CreateUpdateAlias($item_group_id);
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Inventory/item_group_create_update';
        if (!empty($item_group_id)) {
            $theme_data = array_merge($theme_data, $this->get_item_group_model()->find($item_group_id) ?? []);
        }
        $theme_data['_previous_path'] = base_url(route_to('item_group_list_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function item_group_view_component()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $filter = [
            '_autojoin' => "F",
            '_select' => "*",
            'item_group_id' => $data['item_group_id'],
        ];
        $item_group_data = $this->get_item_group_model()->RecordList($filter);
        if ($item_group_data['status'] == ApiResponseStatusCode::OK && !empty($item_group_data['data'])) {
            return view('AdminPanelNew/components/item_group_view', $item_group_data['data'][0]);
        }
        return "<h1>Item Group Record Not Found</h1>";
    }
    public function item_sub_group_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Item Sub Group List';
        $theme_data['_page_title'] = 'Item Sub Group List';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Item Sub Group List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Inventory/item_sub_group_list';
        $theme_data['_previous_path'] = base_url(route_to('default_dashboard_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function item_sub_group_create_update_page($item_sub_group_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Item Sub Group ' . CreateUpdateAlias($item_sub_group_id);
        $theme_data['_page_title'] = 'Item Sub Group ' . CreateUpdateAlias($item_sub_group_id);
        $theme_data['_breadcrumb1'] = 'Item Sub Group List';
        $theme_data['_breadcrumb2'] = 'Item Sub Group ' . CreateUpdateAlias($item_sub_group_id);
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Inventory/item_sub_group_create_update';
        if (!empty($item_sub_group_id)) {
            $theme_data = array_merge($theme_data, $this->get_item_sub_group_model()->find($item_sub_group_id) ?? []);
        }
        $theme_data['_previous_path'] = base_url(route_to('item_sub_group_list_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function item_sub_group_view_component()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $filter = [
            '_autojoin' => "F",
            '_select' => "*",
            'item_sub_group_id' => $data['item_sub_group_id'],
        ];
        $item_sub_group_data = $this->get_item_sub_group_model()->RecordList($filter);
        if ($item_sub_group_data['status'] == ApiResponseStatusCode::OK && !empty($item_sub_group_data['data'])) {
            return view('AdminPanelNew/components/item_sub_group_view', $item_sub_group_data['data'][0]);
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
        $theme_data['user_type'] = "super_admin";
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
    public function item_uqc_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Item UQC List';
        $theme_data['_page_title'] = 'Item UQC List';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Item UQC List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/OneTimeSetting/item_uqc_list';
        $theme_data['_previous_path'] = base_url(route_to('default_dashboard_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function item_hsn_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Item HSN List';
        $theme_data['_page_title'] = 'Item HSN List';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Item HSN List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Inventory/item_hsn_list';
        $theme_data['_previous_path'] = base_url(route_to('default_dashboard_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function item_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Item List';
        $theme_data['_page_title'] = 'Item List';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Item List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/Inventory/item_list';
        $theme_data['_previous_path'] = base_url(route_to('default_dashboard_page'));
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function item_view_component() {}
    public function item_create_update_component()
    {
        $data = getRequestData($this->request, 'ARRAY') ?? [];
        $item_data = [];
        if (!empty($data) && isset($data['item_id'])) {
            $item_data = $this->get_item_model()->find($data['item_id']);
        }
        return view('AdminPanelNew/components/inventory/item_create_update', $item_data);
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
        $is_dashboard_access = false;
        $primary_dashboard_module_id = $data['primary_dashboard'] ?? null;
        foreach ($data['modules'] as $module) {
            if (count($module) >= 3) {
                $modules[] = $module;
            }
            if (isset($module['dashboard'])) {
                $is_dashboard_access = true;
            }
        }
        if ($is_dashboard_access && empty($primary_dashboard_module_id)) {
            return formatApiResponse($this->request, $this->response, ApiResponseStatusCode::BAD_REQUEST, 'Please Select Primary Dashboard');
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
            if (count($role_modules) >= 3) {
                if (isset($data['primary_dashboard']) && $role_modules['module_id'] == $data['primary_dashboard']) {
                    $role_modules['is_primary_dashboard'] = 1;
                }
                $r2 = $this->get_role_modules_model(false)->RecordCreate($role_modules);
            }
        }
        $r3 = $this->get_role_module_menus_model(false)->where('role_id', $data['role_id'])->delete();
        foreach ($data['module_menus'] as $key => $role_module_menus) {
            if (count($role_module_menus) >= 5) {
                $r4 = $this->get_role_module_menus_model(false)->RecordCreate($role_module_menus);
            }
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
                        "title" => "Overview",
                        "url" => base_url(route_to('overview_dashboard_page')),
                        "badge_count" => 0,
                        "visibility" => check_dashboard_access(),
                    ],
                    [
                        "title" => "Staff Management",
                        "url" => base_url(route_to('staff_management_dashboard_page')),
                        "badge_count" => 0,
                        "visibility" => check_dashboard_access('STAFF_MANAGEMENT'),
                    ],
                    [
                        "title" => "Inventory",
                        "url" => base_url(route_to('inventory_dashboard_page')),
                        "badge_count" => 0,
                        "visibility" => check_dashboard_access('INVENTORY'),
                    ],
                    [
                        "title" => "Starter",
                        "url" => base_url(route_to('starter_dashboard_page')),
                        "badge_count" => 0,
                        "visibility" => check_dashboard_access('starter'),
                    ],
                ]
            ],
            [
                "module_title" => "Staff Management",
                "module_name" => "Staff Management",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => check_module_access('STAFF_MANAGEMENT'),
                "menus" => [
                    [
                        "title" => "Designation",
                        "url" => base_url(route_to('designation_list_page')),
                        "badge_count" => 0,
                        "visibility" => check_menu_access('DESIGNATIONS', 'view'),
                    ],
                    [
                        "title" => "Role",
                        "url" => base_url(route_to('role_list_page')),
                        "badge_count" => 0,
                        "visibility" => check_menu_access('ROLES', 'view'),
                    ],
                    [
                        "title" => "Staff",
                        "url" => base_url(route_to('staff_list_page')),
                        "badge_count" => 0,
                        "visibility" => check_menu_access('STAFF', 'view'),
                    ],
                ]
            ],
            [
                "module_title" => "Sales",
                "module_name" => "Sales",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => check_module_access('SALES'),
                "menus" => [],
            ],
            [
                "module_title" => "Purchase",
                "module_name" => "Purchase",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => check_module_access('PURCHASE'),
                "menus" => []
            ],
            [
                "module_title" => "Inventory",
                "module_name" => "Inventory",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => check_module_access('INVENTORY'),
                "menus" => [
                    [
                        "title" => "Item Brand",
                        "url" => base_url(route_to('item_brand_list_page')),
                        "badge_count" => 0,
                        "visibility" => check_menu_access('ITEM_BRAND', 'view'),
                    ],
                    [
                        "title" => "Item Group",
                        "url" => base_url(route_to('item_group_list_page')),
                        "badge_count" => 0,
                        "visibility" => check_menu_access('ITEM_GROUP', 'view'),
                    ],
                    [
                        "title" => "Item Sub Group",
                        "url" => base_url(route_to('item_sub_group_list_page')),
                        "badge_count" => 0,
                        "visibility" => check_menu_access('ITEM_SUB_GROUP', 'view'),
                    ],
                    [
                        "title" => "Item Category",
                        "url" => base_url(route_to('item_category_list_page')),
                        "badge_count" => 0,
                        "visibility" => check_menu_access('ITEM_CATEGORY', 'view'),
                    ],
                    [
                        "title" => "Item HSN",
                        "url" => base_url(route_to('item_hsn_list_page')),
                        "badge_count" => 0,
                        "visibility" => check_menu_access('ITEM_HSN', 'view'),
                    ],
                    [
                        "title" => "Item",
                        "url" => base_url(route_to('item_list_page')),
                        "badge_count" => 0,
                        "visibility" => check_menu_access('ITEM', 'view'),
                    ],
                ]
            ],
            [
                "module_title" => "Finance",
                "module_name" => "Finance",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => check_module_access('FINANCE'),
                "menus" => [],
            ],
            [
                "module_title" => "CRM",
                "module_name" => "CRM",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => check_module_access('CRM'),
                "menus" => [],
            ],
            [
                "module_title" => "Part Maintenance",
                "module_name" => "Part Maintenance",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => check_module_access('PART_MAINTENANCE'),
                "menus" => [],
            ],
            [
                "module_title" => "HR",
                "module_name" => "HR",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => check_module_access('HR'),
                "menus" => [],
            ],
            [
                "module_title" => "SCM",
                "module_name" => "SCM",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => check_module_access('SCM'),
                "menus" => [],
            ],
            [
                "module_title" => "Warehouse",
                "module_name" => "Warehouse",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => check_module_access('WH'),
                "menus" => [],
            ],
            [
                "module_title" => "Logistics",
                "module_name" => "Logistics",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => check_module_access('LOGISTICS'),
                "menus" => [],
            ],
        ];
        return $menuArray;
    }
}
