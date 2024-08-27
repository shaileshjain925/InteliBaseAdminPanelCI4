<?php

namespace App\Controllers;

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

            $session_data = $user_data['data'];
            $session_data['logged_in'] = true;
            // Session
            $session = \Config\Services::session();
            $session->set($session_data);
        }
        return redirect()->route('default_dashboard_page');
    }

    public function designation_list_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Designation List';
        $theme_data['_page_title'] = 'Designation List';
        $theme_data['_breadcrumb1'] = 'Dashboard';
        $theme_data['_breadcrumb2'] = 'Designation List';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/one_time_setting/designation_list';
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
                        "url" => "",
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Role",
                        "url" => "",
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
