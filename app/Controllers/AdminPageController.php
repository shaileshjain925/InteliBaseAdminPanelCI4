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
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function dummy_dashboard_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Dummy Dashboard';
        $theme_data['_page_title'] = 'Dummy Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/dummy_dashboard';
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
        $user_name = "Shailesh Jain";
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
                "module_icon" => "mdi mdi-airplay",
                "visibility" => true,
                "menus" => [
                    [
                        "title" => "Admin",
                        "url" => base_url(route_to('admin_dashboard_page')),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Lead",
                        "url" => base_url(),
                        "badge_count" => 0,
                        "visibility" => true,
                    ],
                ]
            ],
            [
                "module_title" => "Module 1",
                "module_name" => "Module 1",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => true,
                "menus" => [
                    [
                        "title" => "Dummy List",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 122,
                        "visibility" => true,
                    ],
                    [
                        "title" => "Menu 2",
                        "visibility" => true,
                        "badge_count" => 0,
                        "sub_menus" => [
                            [
                                "title" => "Sub Menu 1",
                                "url" => base_url(),
                                "badge_count" => 0,
                                "visibility" => true,
                            ],
                            [
                                "title" => "Sub Menu 2",
                                "url" => base_url(),
                                "badge_count" => 0,
                                "visibility" => true,
                            ],
                        ]
                    ],
                ]
            ],
        ];
        return $menuArray;
    }
}
