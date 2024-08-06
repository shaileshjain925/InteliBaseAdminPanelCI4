<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Traits\CommonTraits;
use UserType;

class AdminPageController extends BaseController
{
    use CommonTraits;

    public function setSession($user_type = 'super_admin')
    {
        session()->set('user_type', $user_type);
        return redirect()->route('default_dashboard');
    }
    protected function checkUserType($user_type = null): bool
    {
        if (!empty($user_type)) {
            $result = (isset($_SESSION['user_type']) && $_SESSION['user_type'] == $user_type) ? true : false;
        } else {
            $result =  (isset($_SESSION['user_type']) && !empty($_SESSION['user_type'])) ? true : false;
        }
        return $result;
    }
    protected function getUserType(): string|null
    {
        $result = (isset($_SESSION['user_type']) && !empty($_SESSION['user_type'])) ? $_SESSION['user_type'] : null;
        return $result;
    }
    protected function UserTypeInList($user_type_array)
    {
        return in_array($this->getUserType(), $user_type_array);
    }
    public function default_dashboard()
    {
        if (!$this->checkUserType()) {
            $this->setSession();
        }
        switch ($this->getUserType()) {
            case UserType::SuperAdmin->value:
                return $this->super_admin_dashboard_page();
                break;
            case UserType::Admin->value:
                return $this->admin_dashboard_page();
                break;
            case UserType::SalesManager->value:
                return $this->sales_dashboard_page();
                break;
            case UserType::SalesExecutive->value:
                return $this->sales_dashboard_page();
                break;
            case UserType::Purchase->value:
                return $this->purchase_dashboard_page();
                break;
            case UserType::Finance->value:
                return $this->finance_dashboard_page();
                break;
            case UserType::CRM->value:
                return $this->crm_dashboard_page();
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

    public function super_admin_dashboard_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Super Admin Dashboard';
        $theme_data['_page_title'] = 'Super Admin Admin Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/admin_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function admin_dashboard_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Admin Dashboard';
        $theme_data['_page_title'] = 'Admin Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/admin_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function sales_dashboard_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Sales Dashboard';
        $theme_data['_page_title'] = 'Sales Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/admin_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function purchase_dashboard_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Purchase Dashboard';
        $theme_data['_page_title'] = 'Purchase Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/admin_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function finance_dashboard_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'Finance Dashboard';
        $theme_data['_page_title'] = 'Finance Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/admin_dashboard';
        return view('AdminPanelNew/partials/main', $theme_data);
    }
    public function crm_dashboard_page()
    {
        $theme_data = $this->admin_panel_common_data();
        $theme_data['_meta_title'] = 'CRM Dashboard';
        $theme_data['_page_title'] = 'CRM Dashboard';
        $theme_data['_view_files'][] = 'AdminPanelNew/pages/Admin/admin_dashboard';
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
                        "title" => "Super Admin",
                        "url" => base_url(route_to('super_admin_dashboard_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value
                            ]
                        ),
                    ],
                    [
                        "title" => "Admin",
                        "url" => base_url(route_to('admin_dashboard_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                            ]
                        ),
                    ],
                    [
                        "title" => "Sales",
                        "url" => base_url(route_to('sales_dashboard_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                                UserType::SalesManager->value,
                                UserType::SalesExecutive->value,
                            ]
                        ),
                    ],
                    [
                        "title" => "Purchase",
                        "url" => base_url(route_to('purchase_dashboard_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                                UserType::Purchase->value
                            ]
                        ),
                    ],
                    [
                        "title" => "Finance",
                        "url" => base_url(route_to('finance_dashboard_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                                UserType::Finance->value
                            ]
                        ),
                    ],
                    [
                        "title" => "CRM",
                        "url" => base_url(route_to('crm_dashboard_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                                UserType::CRM->value
                            ]
                        ),
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
                        "badge_count" => 0,
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
            [
                "module_title" => "Staff Management",
                "module_name" => "Staff Management",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => $this->UserTypeInList(
                    [
                        UserType::SuperAdmin->value,
                        UserType::Admin->value,
                        UserType::SalesManager->value,
                    ]
                ),
                "menus" => [
                    [
                        "title" => "Super Admin",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                            ]
                        ),
                    ],
                    [
                        "title" => "Admin",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                            ]
                        ),
                    ],
                    [
                        "title" => "Sales Manager",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                            ]
                        ),
                    ],
                    [
                        "title" => "Sales Executive",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                                UserType::SalesManager->value,
                            ]
                        ),
                    ],
                    [
                        "title" => "Purchase",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                            ]
                        ),
                    ],
                    [
                        "title" => "Finance",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                            ]
                        ),
                    ],
                    [
                        "title" => "CRM",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                            ]
                        ),
                    ],
                ]
            ],
            [
                "module_title" => "Sales",
                "module_name" => "Sales",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => $this->UserTypeInList(
                    [
                        UserType::SuperAdmin->value,
                        UserType::Admin->value,
                        UserType::SalesManager->value,
                        UserType::SalesExecutive->value,
                        UserType::Purchase->value,
                        UserType::CRM->value,
                    ]
                ),
                "menus" => [
                    [
                        "title" => "Customer",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                                UserType::SalesManager->value,
                                UserType::SalesExecutive->value,
                                UserType::CRM->value,
                            ]
                        ),
                    ],
                    [
                        "title" => "Sales Enquiry",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                                UserType::SalesManager->value,
                                UserType::SalesExecutive->value,
                                UserType::Purchase->value,
                            ]
                        ),
                    ],
                    [
                        "title" => "Sales Quotation",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                                UserType::SalesManager->value,
                                UserType::SalesExecutive->value,
                            ]
                        ),
                    ],
                    [
                        "title" => "Sales Order",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                                UserType::SalesManager->value,
                                UserType::SalesExecutive->value,
                                UserType::CRM->value,
                            ]
                        ),
                    ],
                ]
            ],
            [
                "module_title" => "Purchase",
                "module_name" => "Purchase",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => $this->UserTypeInList(
                    [
                        UserType::SuperAdmin->value,
                        UserType::Admin->value,
                        UserType::Purchase->value,
                    ]
                ),
                "menus" => [
                    [
                        "title" => "Vendor",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                                UserType::Purchase->value,
                            ]
                        ),
                    ],
                    [
                        "title" => "Purchase Enquiry",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                                UserType::Purchase->value,
                            ]
                        ),
                    ],
                    [
                        "title" => "Purchase Quotation",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                                UserType::Purchase->value,
                            ]
                        ),
                    ],
                ]
            ],
            [
                "module_title" => "Inventory",
                "module_name" => "Inventory",
                "module_icon" => "mdi mdi-account-supervisor-outline",
                "visibility" => $this->UserTypeInList(
                    [
                        UserType::SuperAdmin->value,
                        UserType::Admin->value,
                        UserType::Purchase->value,
                    ]
                ),
                "menus" => [
                    [
                        "title" => "Category",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                                UserType::Purchase->value,
                            ]
                        ),
                    ],
                    [
                        "title" => "Group",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                                UserType::Purchase->value,
                            ]
                        ),
                    ],
                    [
                        "title" => "Brand",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                                UserType::Purchase->value,
                            ]
                        ),
                    ],
                    [
                        "title" => "HSN",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                                UserType::Purchase->value,
                            ]
                        ),
                    ],
                    [
                        "title" => "Product",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                                UserType::Purchase->value,
                            ]
                        ),
                    ],
                    [
                        "title" => "Price List",
                        "url" => base_url(route_to('dummy_list_page')),
                        "badge_count" => 0,
                        "visibility" => $this->UserTypeInList(
                            [
                                UserType::SuperAdmin->value,
                                UserType::Admin->value,
                                UserType::Purchase->value,
                            ]
                        ),
                    ],
                ]
            ],
        ];
        return $menuArray;
    }
}
