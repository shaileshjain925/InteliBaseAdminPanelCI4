<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Traits\CommonTraits;
use ApiResponseStatusCode;

class AdminPageController extends BaseController
{
    use CommonTraits;

    public function default_dashboard()
    {
        $user_role = 'admin';
        switch ($user_role) {
            case 'admin':
                return $this->admin_dashboard_page();
                break;
            case 'dummy':
                return $this->dummy_dashboard_page();
                break;
        }
    }
    public function login_page()
    {
        // go to dashboard if session have logged_in
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
            return redirect()->route('default_dashboard');
        }
        return view('AdminPanelNew/pages/login');
    }
    public function logout()
    {
        // session Destroy
        session_destroy();
        return redirect()->route('login_page')->with('success', 'Logout Successfully');
    }

    public function admin_dashboard_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Admin Dashboard';
        $theme_data['_page_title'] = 'Admin Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/admin_dashboard';
        $theme_data['_head_js_files'][] = $theme_data['_assets_path'] . 'assets/libs/apexcharts/apexcharts.min.js';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    // ==================Dummy=========
    public function dummy_dashboard_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Dummy Dashboard';
        $theme_data['_page_title'] = 'Dummy Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/dummy_dashboard';
        $theme_data['_head_js_files'][] = $theme_data['_assets_path'] . 'assets/libs/apexcharts/apexcharts.min.js';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function dummy_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Dummy List';
        $theme_data['_page_title'] = 'Dummy List';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Dummy List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/dummy_list';

        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function dummy_create_update_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Dummy Create';
        $theme_data['_page_title'] = 'Dummy Create';
        $theme_data['_breadcrumb1'] = 'Dummy List';
        $theme_data['_breadcrumb2'] = 'Dummy Create';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/dummy_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function dummy_view_component()
    {
        return view('AdminPanelNew/components/dummy_view');
    }

    // =====================One Time Setting =============
    public function media_type_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Media Type List';
        $theme_data['_page_title'] = 'Media Type List';
        $theme_data['_breadcrumb1'] = 'One Time Setting';
        $theme_data['_breadcrumb2'] = 'Media Type List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/one_time/media_type_list';

        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function media_type_create_update_page($media_type_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Media Type Create';
        $theme_data['_page_title'] = 'Media Type Create';
        $theme_data['_breadcrumb1'] = 'One Time Setting';
        $theme_data['_breadcrumb2'] = 'Media Type Create';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/one_time/media_type_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        if (!empty($media_type_id)) {
            $theme_data = array_merge($theme_data, $this->get_media_type_model()->find($media_type_id));
        }
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function media_type_view_component()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $filter = [
            // '_autojoin' => "Y",
            // '_select' => "*",
            'media_type_id' => $data['media_type_id'],
        ];
        $media_type_data = $this->get_media_type_model()->RecordList($filter);
        if ($media_type_data['status'] == ApiResponseStatusCode::OK && !empty($media_type_data['data'])) {
            return view('AdminPanelNew/components/media_type_view', $media_type_data['data'][0]);
        }
        return "<h1>Center Record Not Found</h1>";
    }
    public function location_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Location List';
        $theme_data['_page_title'] = 'Location List';
        $theme_data['_breadcrumb1'] = 'One Time Setting';
        $theme_data['_breadcrumb2'] = 'Location List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/one_time/location_list';

        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function location_create_update_page($location_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Location Create';
        $theme_data['_page_title'] = 'Location Create';
        $theme_data['_breadcrumb1'] = 'One Time Setting';
        $theme_data['_breadcrumb2'] = 'Location Create';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/one_time/location_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        if (!empty($location_id)) {
            $theme_data = array_merge($theme_data, $this->get_location_model()->find($location_id));
        }
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function location_view_component()
    {

        $data = getRequestData($this->request, 'ARRAY');
        $filter = [
            '_autojoin' => "Y",
            '_select' => "*",
            'location_id' => $data['location_id'],
        ];
        $location_data = $this->get_location_model()->RecordList($filter);
        if ($location_data['status'] == ApiResponseStatusCode::OK && !empty($location_data['data'])) {
            return view('AdminPanelNew/components/location_view', $location_data['data'][0]);
        }
        return "<h1>Center Record Not Found</h1>";
    }
    public function illumination_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Illumination List';
        $theme_data['_page_title'] = 'Illumination List';
        $theme_data['_breadcrumb1'] = 'One Time Setting';
        $theme_data['_breadcrumb2'] = 'Illumination List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/one_time/illumination_list';

        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function illumination_create_update_page($illumination_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $Crud_Status = (!empty($illumination_id)) ? "Update" : "Create";
        $theme_data['_meta_title'] = 'Illumination ' . $Crud_Status;
        $theme_data['_page_title'] = 'Illumination ' .  $Crud_Status;
        $theme_data['_breadcrumb1'] = 'One Time Setting';
        $theme_data['_breadcrumb2'] = 'Illumination ' . $Crud_Status;
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/one_time/illumination_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        if (!empty($illumination_id)) {
            $theme_data = array_merge($theme_data, $this->get_illumination_model()->find($illumination_id));
        }
        return view('AdminPanelNew/partials/main', $theme_data);
    }





    public function terms_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Terms And Conditions List';
        $theme_data['_page_title'] = 'Terms And Conditions List';
        $theme_data['_breadcrumb1'] = 'One Time Setting';
        $theme_data['_breadcrumb2'] = 'Terms And Conditions List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/one_time/terms_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }



    public function terms_create_update_page($terms_condition_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Terms And Conditions Create';
        $theme_data['_page_title'] = 'Terms And Conditions Create';
        $theme_data['_breadcrumb1'] = 'One Time Setting';
        $theme_data['_breadcrumb2'] = 'Terms And Conditions Create';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/one_time/terms_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        if (!empty($terms_condition_id)) {
            $theme_data = array_merge($theme_data, $this->get_vouchar_terms_and_condition_model()->find($terms_condition_id));
        }
        return view('AdminPanelNew/partials/main', $theme_data);
    }

    public function staff_view_component()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $filter = [
            '_autojoin' => "Y",
            '_select' => "*",
            'user_id' => $data['user_id'],
        ];
        $user_data = $this->get_user_model()->RecordList($filter);
        if ($user_data['status'] == ApiResponseStatusCode::OK && !empty($user_data['data'])) {
            return view('AdminPanelNew/components/staff_view', $user_data['data'][0]);
        }
        return "<h1>Center Record Not Found</h1>";
    }
    // =====================Admin Management =============
    public function admin_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Admin List';
        $theme_data['_page_title'] = 'Admin List';
        $theme_data['_breadcrumb1'] = 'Admin Management';
        $theme_data['_breadcrumb2'] = 'Admin List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/staff/all_staff_list';
        $theme_data['_previous_path'] = $this->previous_path();
        $theme_data['user_type'] = 'admin';
        $theme_data['create_update_url'] = base_url(route_to('admin_create_update_page'));
        $theme_data['role_list'] = $this->role_list_array();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function admin_create_update_page($user_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Admin ' . (!empty($user_id)) ? "Update" : "Create";
        $theme_data['_page_title'] = 'Admin ' . (!empty($user_id)) ? "Update" : "Create";
        $theme_data['_breadcrumb1'] = 'Admin Management';
        $theme_data['_breadcrumb2'] = 'Admin ' . (!empty($user_id)) ? "Update" : "Create";
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/staff/staff_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        if (!empty($user_id)) {
            $theme_data = array_merge($theme_data, $this->get_user_model()->find($user_id));
        }
        $theme_data['user_type'] = 'admin';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    // =====================Staff Management =============
    public function manager_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Manager List';
        $theme_data['_page_title'] = 'Manager List';
        $theme_data['_breadcrumb1'] = 'Manager Management';
        $theme_data['_breadcrumb2'] = 'Manager List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/staff/all_staff_list';
        $theme_data['_previous_path'] = $this->previous_path();
        $theme_data['user_type'] = 'manager';
        $theme_data['create_update_url'] = base_url(route_to('manager_create_update_page'));
        $theme_data['role_list'] = $this->role_list_array();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function manager_create_update_page($user_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Manager ' . (!empty($user_id)) ? "Update" : "Create";
        $theme_data['_page_title'] = 'Manager ' . (!empty($user_id)) ? "Update" : "Create";
        $theme_data['_breadcrumb1'] = 'Manager Management';
        $theme_data['_breadcrumb2'] = 'Manager ' . (!empty($user_id)) ? "Update" : "Create";
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/staff/staff_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        if (!empty($user_id)) {
            $theme_data = array_merge($theme_data, $this->get_user_model()->find($user_id));
        }
        $theme_data['user_type'] = 'manager';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    // =====================Staff Management =============
    public function sales_executive_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Sales Executive List';
        $theme_data['_page_title'] = 'Sales Executive List';
        $theme_data['_breadcrumb1'] = 'Sales Executive Management';
        $theme_data['_breadcrumb2'] = 'Sales Executive List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/staff/all_staff_list';
        $theme_data['_previous_path'] = $this->previous_path();
        $theme_data['user_type'] = 'sales_executive';
        $theme_data['create_update_url'] = base_url(route_to('sales_executive_create_update_page'));
        $theme_data['role_list'] = $this->role_list_array();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function sales_executive_create_update_page($user_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Sales Executive ' . (!empty($user_id)) ? "Update" : "Create";
        $theme_data['_page_title'] = 'Sales Executive ' . (!empty($user_id)) ? "Update" : "Create";
        $theme_data['_breadcrumb1'] = 'Sales Executive Management';
        $theme_data['_breadcrumb2'] = 'Sales Executive ' . (!empty($user_id)) ? "Update" : "Create";
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/staff/staff_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        if (!empty($user_id)) {
            $theme_data = array_merge($theme_data, $this->get_user_model()->find($user_id));
        }
        $theme_data['user_type'] = 'sales_executive';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    // =====================Staff Management =============
    public function site_engineer_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Site Engineer List';
        $theme_data['_page_title'] = 'Site Engineer List';
        $theme_data['_breadcrumb1'] = 'Site Engineer Management';
        $theme_data['_breadcrumb2'] = 'Site Engineer List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/staff/all_staff_list';
        $theme_data['_previous_path'] = $this->previous_path();
        $theme_data['user_type'] = 'site_engineer';
        $theme_data['create_update_url'] = base_url(route_to('site_engineer_create_update_page'));
        $theme_data['role_list'] = $this->role_list_array();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function site_engineer_create_update_page($user_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Site Engineer ' . (!empty($user_id)) ? "Update" : "Create";
        $theme_data['_page_title'] = 'Site Engineer ' . (!empty($user_id)) ? "Update" : "Create";
        $theme_data['_breadcrumb1'] = 'Site Engineer Management';
        $theme_data['_breadcrumb2'] = 'Site Engineer ' . (!empty($user_id)) ? "Update" : "Create";
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/staff/staff_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        if (!empty($user_id)) {
            $theme_data = array_merge($theme_data, $this->get_user_model()->find($user_id));
        }
        $theme_data['user_type'] = 'site_engineer';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    protected function role_list_array()
    {
        return [
            'admin' => 'Admin',
            'manager' => 'Manager',
            'sales_executive' => 'Sales Executive',
            'site_engineer' => 'Site Engineer',
        ];
    }
    //   sales executive
    public function assign_lead_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Assign Leads';
        $theme_data['_page_title'] = 'Assign Leads';
        $theme_data['_breadcrumb1'] = 'Staff Management';
        $theme_data['_breadcrumb2'] = 'Assign Leads';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/sales_executive/assign_lead_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function for_sales_excecutive_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Aditya Thakur';
        $theme_data['_page_title'] = 'Sales Executive : Aditya Thakur';
        $theme_data['_breadcrumb1'] = 'Staff Management';
        $theme_data['_breadcrumb2'] = 'Sales Executive';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/sales_executive/for_sales_excecutive_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function win_leads_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Aditya Thakur ';
        $theme_data['_page_title'] = 'Sales Executive : Aditya Thakur Win Leads';
        $theme_data['_breadcrumb1'] = 'Staff Management';
        $theme_data['_breadcrumb2'] = 'Sales Executive';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/sales_executive/win_leads_list_page';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    //   site engineer
    public function unassigned_site_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Unassigned Site';
        $theme_data['_page_title'] = 'Unassigned Site';
        $theme_data['_breadcrumb1'] = 'Staff Management';
        $theme_data['_breadcrumb2'] = 'Unassigned Site';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/site_engineer/unassigned_site';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function assign_site_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Assign Site';
        $theme_data['_page_title'] = 'Media: Clear Channel Door';
        $theme_data['_breadcrumb1'] = 'Staff Management';
        $theme_data['_breadcrumb2'] = 'Clear Channel Door';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/site_engineer/assign_site_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }

    public function for_site_engineer_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Arpit Thakur';
        $theme_data['_page_title'] = 'Site Enginner : Arpit Thakur';
        $theme_data['_breadcrumb1'] = 'Staff Management';
        $theme_data['_breadcrumb2'] = 'Site Enginner';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/site_engineer/for_site_engineer_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function complete_site_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Completed List';
        $theme_data['_page_title'] = 'Completed List';
        $theme_data['_breadcrumb1'] = 'Site Engineer Management';
        $theme_data['_breadcrumb2'] = 'Completed List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/site_engineer/complete_pending_site_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function Pending_site_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Pending List';
        $theme_data['_page_title'] = 'Pending List';
        $theme_data['_breadcrumb1'] = 'Site Engineer Management';
        $theme_data['_breadcrumb2'] = 'Pending List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/site_engineer/complete_pending_site_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function site_view_component()
    {
        return view('AdminPanelNew/components/site_view');
    }
    public function site_complete_photo()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Alok Tripathi site Engineer';
        $theme_data['_page_title'] = 'Media Name : Clear Channel Outdoor';
        $theme_data['_breadcrumb1'] = 'Site Engineer Management';
        $theme_data['_breadcrumb2'] = 'Alok Tripathi site Engineer';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/site_engineer/site_complete_photo';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    // =====================Lead =============
    public function lead_dashboard()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Lead Dashboard';
        $theme_data['_page_title'] = 'Lead Dashboard';
        $theme_data['_breadcrumb1'] = 'Lead Management';
        $theme_data['_breadcrumb2'] = 'Lead Dashboard';
        $theme_data['_head_js_files'][] = $theme_data['_assets_path'] . 'assets/libs/apexcharts/apexcharts.min.js';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/lead/lead_dashboard';

        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function lead_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Lead List';
        $theme_data['_page_title'] = 'Lead List';
        $theme_data['_breadcrumb1'] = 'Lead Management';
        $theme_data['_breadcrumb2'] = 'Lead List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/lead/lead_list';

        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function lead_create_update_page($party_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $Crud_Status = (!empty($party_id)) ? "Update" : "Create";
        $theme_data['_meta_title'] = 'Lead ' . $Crud_Status;
        $theme_data['_page_title'] = 'Lead ' . $Crud_Status;
        $theme_data['_breadcrumb1'] = 'Lead Management';
        $theme_data['_breadcrumb2'] = 'Lead ' . $Crud_Status;
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/lead/lead_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        if (!empty($party_id)) {
            $theme_data = array_merge($theme_data, $this->get_lead_model()->find($party_id));
        }
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function lead_view_component()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $filter = [
            '_autojoin' => "Y",
            '_select' => "*",
            'party_id' => $data['party_id'],
        ];
        $lead_data = $this->get_lead_model()->RecordList($filter);
        if ($lead_data['status'] == ApiResponseStatusCode::OK && !empty($lead_data['data'])) {
            return view("AdminPanelNew/components/lead_view", $lead_data['data'][0]);
        }
        return "<h1>Lead Record Not Found</h1>";
    }


    // =====================Client =============
    public function client_dashboard()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Client Dashboard';
        $theme_data['_page_title'] = 'Client Dashboard';
        $theme_data['_breadcrumb1'] = 'Client Management';
        $theme_data['_breadcrumb2'] = 'Client Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/client/client_dashboard';
        $theme_data['_head_js_files'][] = $theme_data['_assets_path'] . 'assets/libs/apexcharts/apexcharts.min.js';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function client_create_update_page($party_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $Crud_Status = (!empty($party_id)) ? "Update" : "Create";
        $theme_data['_meta_title'] = 'Client ' . $Crud_Status;
        $theme_data['_page_title'] = 'Client ' . $Crud_Status;
        $theme_data['_breadcrumb1'] = 'Client Management';
        $theme_data['_breadcrumb2'] = 'Client ' . $Crud_Status;
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/client/client_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        if (!empty($party_id)) {
            $theme_data = array_merge($theme_data, $this->get_client_model()->find($party_id));
        }
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function client_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Client List';
        $theme_data['_page_title'] = 'Client List';
        $theme_data['_breadcrumb1'] = 'Client Management';
        $theme_data['_breadcrumb2'] = 'Client List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/client/client_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function client_view_component()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $filter = [
            '_autojoin' => "Y",
            '_select' => "*",
            'party_id' => $data['party_id'],
        ];
        $client_data = $this->get_client_model()->RecordList($filter);
        if ($client_data['status'] == ApiResponseStatusCode::OK && !empty($client_data['data'])) {
            return view("AdminPanelNew/components/client_view", $client_data['data'][0]);
        }
        return "<h1>Client Record Not Found</h1>";
    }
    public function client_all_quotation_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Client All Quotation';
        $theme_data['_page_title'] = 'Client All Quotation';
        $theme_data['_breadcrumb1'] = 'Client Management';
        $theme_data['_breadcrumb2'] = 'Client All Quotation';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/client/client_all_quotation_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function client_payment_history_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Client Payment History';
        $theme_data['_page_title'] = 'Client Payment History';
        $theme_data['_breadcrumb1'] = 'Client Management';
        $theme_data['_breadcrumb2'] = 'Client Payment History';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/client/client_payment_history_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    // =====================Vendor =============
    public function vendor_dashboard()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'vendor Dashboard';
        $theme_data['_page_title'] = 'vendor Dashboard';
        $theme_data['_breadcrumb1'] = 'vendor Management';
        $theme_data['_breadcrumb2'] = 'vendor Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/vendors/vendor_dashboard';
        $theme_data['_head_js_files'][] = $theme_data['_assets_path'] . 'assets/libs/apexcharts/apexcharts.min.js';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function vendor_create_update_page($party_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $Crud_Status = (!empty($party_id)) ? "Update" : "Create";
        $theme_data['_meta_title'] = 'Vendor ' . $Crud_Status;
        $theme_data['_page_title'] = 'Vendor ' .  $Crud_Status;
        $theme_data['_breadcrumb1'] = 'Vendor Management';
        $theme_data['_breadcrumb2'] = 'Vendor ' . $Crud_Status;
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/vendors/vendor_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        if (!empty($party_id)) {
            $theme_data = array_merge($theme_data, $this->get_vendor_model()->find($party_id));
        }
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function vendor_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Vendor List';
        $theme_data['_page_title'] = 'Vendor List';
        $theme_data['_breadcrumb1'] = 'Vendor Management';
        $theme_data['_breadcrumb2'] = 'Vendor List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/vendors/vendor_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function vendor_view_component()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $filter = [
            '_autojoin' => "Y",
            '_select' => "*",
            'party_id' => $data['party_id'],
        ];
        $vendor_data = $this->get_vendor_model()->RecordList($filter);
        if ($vendor_data['status'] == ApiResponseStatusCode::OK && !empty($vendor_data['data'])) {
            return view("AdminPanelNew/components/vendor_view", $vendor_data['data'][0]);
        }
        return "<h1>Vendor Record Not Found</h1>";
    }
    // =====================Inventory =============
    public function inventory_dashboard()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Inventory Dashboard';
        $theme_data['_page_title'] = 'Inventory Dashboard';
        $theme_data['_breadcrumb1'] = 'Inventory Management';
        $theme_data['_breadcrumb2'] = 'Inventory Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/inventory/inventory_dashboard';
        $theme_data['_head_js_files'][] = $theme_data['_assets_path'] . 'assets/libs/apexcharts/apexcharts.min.js';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }

   
    public function media_create_update_page($media_id = null)
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Media Create';
        $theme_data['_page_title'] = 'Media Create';
        $theme_data['_breadcrumb1'] = 'Inventory Management';
        $theme_data['_breadcrumb2'] = 'Media Create';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/inventory/media_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        if (!empty($media_id)) {
            $theme_data = array_merge($theme_data, $this->get_media_model()->find($media_id));
        }
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function media_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Media List';
        $theme_data['_page_title'] = 'Media List';
        $theme_data['_breadcrumb1'] = 'Inventory Management';
        $theme_data['_breadcrumb2'] = 'Media List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/inventory/media_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }

    public function media_view_component()
    {

        $data = getRequestData($this->request, 'ARRAY');
        $filter = [
            '_autojoin' => "F",
            '_select' => "*",
            'media_id' => $data['media_id'],
        ];
        $media_data = $this->get_media_model()->RecordList($filter);
        if ($media_data['status'] == ApiResponseStatusCode::OK && !empty($media_data['data'])) {
            return view('AdminPanelNew/components/media_view', $media_data['data'][0]);
        }
        return "<h1>Media Record Not Found</h1>";
    }
    public function asset_performance_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Asset Performance List';
        $theme_data['_page_title'] = 'Asset Performance List';
        $theme_data['_breadcrumb1'] = 'Inventory Management';
        $theme_data['_breadcrumb2'] = 'Asset Performance List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/inventory/asset_performance_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function asset_performance_detail_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Asset Performance Detail List';
        $theme_data['_page_title'] = 'Asset Performance Detail List';
        $theme_data['_breadcrumb1'] = 'Inventory Management';
        $theme_data['_breadcrumb2'] = 'Asset Performance Detail List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/inventory/asset_performance_detail_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function real_time_media_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Real Time Media List';
        $theme_data['_page_title'] = 'Real Time Media List';
        $theme_data['_breadcrumb1'] = 'Inventory Management';
        $theme_data['_breadcrumb2'] = 'Real Time Media List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/inventory/real_time_media_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }

    // =====================Campaign  =============
    public function campaign_dashboard()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Campaign Dashboard';
        $theme_data['_page_title'] = 'Campaign Dashboard';
        $theme_data['_breadcrumb1'] = 'Campaign Management';
        $theme_data['_breadcrumb2'] = 'Campaign Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/campaign/campaign_dashboard';
        $theme_data['_head_js_files'][] = $theme_data['_assets_path'] . 'assets/libs/apexcharts/apexcharts.min.js';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function campaign_create_update_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Campaign Create';
        $theme_data['_page_title'] = 'Campaign Create';
        $theme_data['_breadcrumb1'] = 'Campaign Management';
        $theme_data['_breadcrumb2'] = 'Campaign Create';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/campaign/campaign_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function campaign_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Campaign List';
        $theme_data['_page_title'] = 'Campaign List';
        $theme_data['_breadcrumb1'] = 'Campaign Management';
        $theme_data['_breadcrumb2'] = 'Campaign List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/campaign/campaign_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function campaign_view_component()
    {
        return view('AdminPanelNew/components/campaign_view');
    }
    public function campaign_payment_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Campaign Payment List';
        $theme_data['_page_title'] = 'Campaign Payment List';
        $theme_data['_breadcrumb1'] = 'Campaign Management';
        $theme_data['_breadcrumb2'] = 'Campaign Payment List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/campaign/campaign_payment_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function campaign_invoice_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Campaign Invoice';
        $theme_data['_page_title'] = 'Campaign Invoice';
        $theme_data['_breadcrumb1'] = 'Campaign Management';
        $theme_data['_breadcrumb2'] = 'Campaign Invoice';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/campaign/campaign_invoice';
        $theme_data['_head_js_files'][] = $theme_data['_assets_path'] . 'assets/js/jspdf.umd.min.js';
        $theme_data['_head_js_files'][] = $theme_data['_assets_path'] . 'assets/js/html2canvas.min.js';
        $theme_data['_head_css_files'][] = $theme_data['_assets_path'] . 'assets/css/invoice.css';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function campaign_ppt_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Campaign PPT';
        $theme_data['_page_title'] = 'Campaign PPT';
        $theme_data['_breadcrumb1'] = 'Campaign Management';
        $theme_data['_breadcrumb2'] = 'Campaign PPT';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/campaign/campaign_ppt';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function quotation_create_update_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Quotation Create';
        $theme_data['_page_title'] = 'Quotation Create';
        $theme_data['_breadcrumb1'] = 'Campaign Management';
        $theme_data['_breadcrumb2'] = 'Quotation Create';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/campaign/quotation_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function quotation_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Quotation List';
        $theme_data['_page_title'] = 'Quotation List';
        $theme_data['_breadcrumb1'] = 'Campaign Management';
        $theme_data['_breadcrumb2'] = 'Quotation List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/campaign/quotation_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function quotation_view_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Quotation View';
        $theme_data['_page_title'] = 'Quotation View';
        $theme_data['_breadcrumb1'] = 'Campaign Management';
        $theme_data['_breadcrumb2'] = 'Quotation View';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/campaign/quotation_view';
        $theme_data['_head_js_files'][] = $theme_data['_assets_path'] . 'assets/js/jspdf.umd.min.js';
        $theme_data['_head_js_files'][] = $theme_data['_assets_path'] . 'assets/js/html2canvas.min.js';
        $theme_data['_head_css_files'][] = $theme_data['_assets_path'] . 'assets/css/invoice.css';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function quotation_ppt_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Quotation PPT';
        $theme_data['_page_title'] = 'Quotation PPT';
        $theme_data['_breadcrumb1'] = 'Campaign Management';
        $theme_data['_breadcrumb2'] = 'Quotation PPT';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/campaign/quotation_ppt';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function quotation_excel_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Quotation Excel';
        $theme_data['_page_title'] = 'Quotation Excel';
        $theme_data['_breadcrumb1'] = 'Campaign Management';
        $theme_data['_breadcrumb2'] = 'Quotation Excel';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/campaign/quotation_excel';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }

    // =====================Finance =============
    public function finance_dashboard()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Finance Dashboard';
        $theme_data['_page_title'] = 'Finance Dashboard';
        $theme_data['_breadcrumb1'] = 'Finance Management';
        $theme_data['_breadcrumb2'] = 'Finance Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/finance/finance_dashboard';
        $theme_data['_head_js_files'][] = $theme_data['_assets_path'] . 'assets/libs/apexcharts/apexcharts.min.js';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function invoice_create_update_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Invoice Create';
        $theme_data['_page_title'] = 'Invoice Create';
        $theme_data['_breadcrumb1'] = 'Finance Management';
        $theme_data['_breadcrumb2'] = 'Invoice Create';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/finance/invoice_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function top_profitable_media_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Top Profitable Media List';
        $theme_data['_page_title'] = 'Top Profitable Media List';
        $theme_data['_breadcrumb1'] = 'Finance Management';
        $theme_data['_breadcrumb2'] = 'Top Profitable Media List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/finance/top_profitable_media_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function payment_tracking_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Payment Tracking List';
        $theme_data['_page_title'] = 'Payment Tracking List';
        $theme_data['_breadcrumb1'] = 'Finance Management';
        $theme_data['_breadcrumb2'] = 'Payment Tracking List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/finance/payment_tracking_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    // =====================Website Setup =============
    public function blog_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Blog List';
        $theme_data['_page_title'] = 'Blog List';
        $theme_data['_breadcrumb1'] = 'Website Setup';
        $theme_data['_breadcrumb2'] = 'Blog List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/website/blog_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function blog_view_component()
    {
        $data = getRequestData($this->request, 'ARRAY');
        $filter = [
            '_autojoin' => "Y",
            '_select' => "*",
            'blog_id' => $data['blog_id'],
        ];
        $blog_data = $this->get_blog_post_model()->RecordList($filter);
        if ($blog_data['status'] == ApiResponseStatusCode::OK && !empty($blog_data['data'])) {
            return view("AdminPanelNew/components/blog_view", $blog_data['data'][0]);
        }
        return "<h1>Blog Record Not Found</h1>";
    }
    public function blog_create_update_page($blog_id=null)
    {
        $theme_data = $this->admin_panel_common_data();
        $Crud_Status = (!empty($blog_id)) ? "Update" : "Create";
        $theme_data['_meta_title'] = 'Blog'. $Crud_Status;
        $theme_data['_page_title'] = 'Blog'. $Crud_Status;
        $theme_data['_breadcrumb1'] = 'Website Setup';
        $theme_data['_breadcrumb2'] = 'Blog'. $Crud_Status;
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/website/blog_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        if (!empty($blog_id)) {
            $theme_data = array_merge($theme_data, $this->get_blog_post_model()->find($blog_id));
        }
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function company_detail_create_update_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Company Detail Create';
        $theme_data['_page_title'] = 'Company Detail Create';
        $theme_data['_breadcrumb1'] = 'Website Setup';
        $theme_data['_breadcrumb2'] = 'Company Detail Create';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/website/company_detail_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        $outdoor_website_data = $this->get_outdor_website_profile_model()->first();
        if (!empty($outdoor_website_data)) {
            $theme_data = array_merge($theme_data, $outdoor_website_data);
        }

        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function contact_info_create_update_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Contact Information Create';
        $theme_data['_page_title'] = 'Contact Information Create';
        $theme_data['_breadcrumb1'] = 'Website Setup';
        $theme_data['_breadcrumb2'] = 'Contact Information Create';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/website/contact_info_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        $outdoor_website_data = $this->get_outdor_website_profile_model()->first();
        if (!empty($outdoor_website_data)) {
            $theme_data = array_merge($theme_data, $outdoor_website_data);
        }
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function email_integration_create_update_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Email Integration Create';
        $theme_data['_page_title'] = 'Email Integration Create';
        $theme_data['_breadcrumb1'] = 'Website Setup';
        $theme_data['_breadcrumb2'] = 'Email Integration Create';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/website/email_integration_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        $outdoor_website_data = $this->get_outdor_website_profile_model()->first();

        if (!empty($outdoor_website_data)) {
            $theme_data = array_merge($theme_data, $outdoor_website_data);
        }
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function mode_of_payment_create_update_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Mode Of Payment Create';
        $theme_data['_page_title'] = 'Mode Of Payment Create';
        $theme_data['_breadcrumb1'] = 'Website Setup';
        $theme_data['_breadcrumb2'] = 'Mode Of Payment Create';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/website/mode_of_payment_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        $outdoor_website_data = $this->get_outdor_website_profile_model()->first();

        if (!empty($outdoor_website_data)) {
            $theme_data = array_merge($theme_data, $outdoor_website_data);
        }
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function social_media_url_create_update_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Social Media Url Create';
        $theme_data['_page_title'] = 'Social Media Url Create';
        $theme_data['_breadcrumb1'] = 'Website Setup';
        $theme_data['_breadcrumb2'] = 'Social Media Url Create';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/website/social_media_url_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        $outdoor_website_data = $this->get_outdor_website_profile_model()->first();

        if (!empty($outdoor_website_data)) {
            $theme_data = array_merge($theme_data, $outdoor_website_data);
        }
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function website_info_create_update_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Website Information Create';
        $theme_data['_page_title'] = 'Website Information Create';
        $theme_data['_breadcrumb1'] = 'Website Setup';
        $theme_data['_breadcrumb2'] = 'Website Information Create';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/website/website_info_create_update';
        $theme_data['_previous_path'] = $this->previous_path();
        $outdoor_website_data = $this->get_outdor_website_profile_model()->first();
        if (!empty($outdoor_website_data)) {
            $theme_data = array_merge($theme_data, $outdoor_website_data);
        }
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function subscribers_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Subscribers List';
        $theme_data['_page_title'] = 'Subscribers List';
        $theme_data['_breadcrumb1'] = 'Website Setup';
        $theme_data['_breadcrumb2'] = 'Subscribers List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/website/subscribers_list';
        $theme_data['_previous_path'] = $this->previous_path();
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    //===========================Blog===============================
    
    // ==================================common Function===================
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
        $user_name = "Brillsense User";
        $user_id = $_SESSION['user_id'] ?? '1';
        $user_type = $_SESSION['user_type'] ?? 'Admin';
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
                "module_icon" => "mdi mdi-airplay icon_themme_color",
                "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager' || $_SESSION['user_type'] == 'sales_executive')) ? true : false,
                "menus" => [
                    [
                        "title" => "Admin Dashboard",
                        "url" => base_url(route_to('admin_dashboard_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                    [
                        "title" => "Lead Dashboard",
                        "url" => base_url(route_to('lead_dashboard')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                    [
                        "title" => "Campaign Dashboard",
                        "url" => base_url(route_to('campaign_dashboard')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                    [
                        "title" => "Inventory Dashboard",
                        "url" => base_url(route_to('inventory_dashboard')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager' || $_SESSION['user_type'] == 'sales_executive')) ? true : false,
                    ],
                    [
                        "title" => "Finance Dashboard",
                        "url" => base_url(route_to('finance_dashboard')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin')) ? true : false,
                    ],
                ]
            ],

            [
                "module_title" => "Staff Management",
                "module_name" => "Staff Management",
                "module_icon" => "bx bx-grid-small icon_themme_color",
                "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin')) ? true : false,
                "menus" => [
                    [
                        "title" => "Admin List",
                        "url" => base_url(route_to('admin_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Manager List",
                        "url" => base_url(route_to('manager_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Sales Executive List",
                        "url" => base_url(route_to('sales_executive_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Site Engineer List",
                        "url" => base_url(route_to('site_engineer_list_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],

                ]
            ],

            [
                "module_title" => "Site Engineer",
                "module_name" => "Site Engineer",
                "module_icon" => "bx bx-grid-small icon_themme_color",
                "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                "menus" => [
                    [
                        "title" => "Unassigned Site List",
                        "url" => base_url(route_to('unassigned_site_list_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin')) ? true : false,
                    ],
                    [
                        "title" => "Assigned Site List",
                        "url" => base_url(route_to('unassigned_site_list_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin')) ? true : false,
                    ],

                    [
                        "title" => "Task List",
                        "url" => base_url(route_to('for_site_engineer_list_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager' || $_SESSION['user_type'] == 'site_engineer')) ? true : false,
                    ],
                    [
                        "title" => "Pending Task",
                        "url" => base_url(route_to('Pending_site_list_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager' || $_SESSION['user_type'] == 'site_engineer')) ? true : false,
                    ],
                    [
                        "title" => "Completed Task",
                        "url" => base_url(route_to('complete_site_list_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager' || $_SESSION['user_type'] == 'site_engineer')) ? true : false,
                    ],
                ]
            ],
            [
                "module_title" => "Lead Management",
                "module_name" => "Lead Management",
                "module_icon" => "bx bx-grid-small icon_themme_color",
                "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                "menus" => [
                    [
                        "title" => "Add Lead",
                        "url" => base_url(route_to('lead_create_update_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                    [
                        "title" => "All Lead",
                        "url" => base_url(route_to('lead_list_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                ]
            ],
            [
                "module_title" => "Client Management",
                "module_name" => "Client Management",
                "module_icon" => "bx bx-grid-small icon_themme_color",
                "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager' || $_SESSION['user_type'] == 'sales_executive')) ? true : false,
                "menus" => [
                    [
                        "title" => "Add Client",
                        "url" => base_url(route_to('client_create_update_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                    [
                        "title" => "All Clients",
                        "url" => base_url(route_to('client_list_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager' || $_SESSION['user_type'] == 'sales_executive')) ? true : false,
                    ],
                ]
            ],
            [
                "module_title" => "Vendor Management",
                "module_name" => "Vendor Management",
                "module_icon" => "bx bx-grid-small icon_themme_color",
                "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager' || $_SESSION['user_type'] == 'sales_executive')) ? true : false,
                "menus" => [
                    [
                        "title" => "Add Vendor",
                        "url" => base_url(route_to('vendor_create_update_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                    [
                        "title" => "All Vendors",
                        "url" => base_url(route_to('vendor_list_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager' || $_SESSION['user_type'] == 'sales_executive')) ? true : false,
                    ],
                ]
            ],
            [
                "module_title" => "Inventory Management",
                "module_name" => "Inventory Management",
                "module_icon" => "bx bx-grid-small icon_themme_color",
                "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager' || $_SESSION['user_type'] == 'sales_executive')) ? true : false,
                "menus" => [
                    [
                        "title" => "Add Media",
                        "url" => base_url(route_to('media_create_update_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                    [
                        "title" => "All Media",
                        "url" => base_url(route_to('media_list_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager' || $_SESSION['user_type'] == 'sales_executive')) ? true : false,
                    ],
                    [
                        "title" => "Asset Performance (AP)",
                        "url" => base_url(route_to('asset_performance_list_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                    [
                        "title" => "Real Time Media (RTMA)",
                        "url" => base_url(route_to('real_time_media_list_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager' || $_SESSION['user_type'] == 'sales_executive')) ? true : false,
                    ],
                ]
            ],
            [
                "module_title" => "Campaign Management",
                "module_name" => "Campaign Management",
                "module_icon" => "bx bx-grid-small icon_themme_color",
                "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager' || $_SESSION['user_type'] == 'sales_executive')) ? true : false,
                "menus" => [
                    [
                        "title" => "Add Quotation",
                        "url" => base_url(route_to('quotation_create_update_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager' || $_SESSION['user_type'] == 'sales_executive')) ? true : false,
                    ],
                    [
                        "title" => "All Quotation",
                        "url" => base_url(route_to('quotation_list_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager' || $_SESSION['user_type'] == 'sales_executive')) ? true : false,
                    ],
                    [
                        "title" => "Add Campaign",
                        "url" => base_url(route_to('campaign_create_update_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager' || $_SESSION['user_type'] == 'sales_executive')) ? true : false,
                    ],
                    [
                        "title" => "All Campaign",
                        "url" => base_url(route_to('campaign_list_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager' || $_SESSION['user_type'] == 'sales_executive')) ? true : false,
                    ],
                ]
            ],
            [
                "module_title" => "Finance",
                "module_name" => "Finance",
                "module_icon" => "bx bx-grid-small icon_themme_color",
                "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                "menus" => [
                    [
                        "title" => "Top Profitable Location (TPL)",
                        "url" => base_url(route_to('top_profitable_media_list_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                    [
                        "title" => "Generate Invoice",
                        "url" => base_url(route_to('invoice_create_update_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                    [
                        "title" => "Payment Tracking",
                        "url" => base_url(route_to('payment_tracking_list_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                ]
            ],
            [
                "module_title" => "Website Setup",
                "module_name" => "Website Setup",
                "module_icon" => "bx bx-grid-small icon_themme_color",
                "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                "menus" => [
                    [
                        "title" => "Company Details",
                        "url" => base_url(route_to('company_detail_create_update_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                    [
                        "title" => "Contact Information",
                        "url" => base_url(route_to('contact_info_create_update_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                    [
                        "title" => "Social Media And URLs",
                        "url" => base_url(route_to('social_media_url_create_update_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                    [
                        "title" => "Email Integration",
                        "url" => base_url(route_to('email_integration_create_update_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                    [
                        "title" => "Mode Of Payment",
                        "url" => base_url(route_to('mode_of_payment_create_update_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                    [
                        "title" => "Subscribers List",
                        "url" => base_url(route_to('subscribers_list_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                    [
                        "title" => "Add Blogs",
                        "url" => base_url(route_to('blog_create_update_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                    [
                        "title" => "All Blogs",
                        "url" => base_url(route_to('blog_list_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                    [
                        "title" => "Website Information",
                        "url" => base_url(route_to('website_info_create_update_page')),
                        "badge_count" => 0,
                        "visibility" => (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) ? true : false,
                    ],
                ]
            ],
        ];
        return $menuArray;
    }

    public function setSession($user_type)
    {
        // Set Session
        session()->set('user_type', $user_type);
        session()->set('user_id', 1);
    }
}
