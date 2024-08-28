<!-- Right Sidebar -->
<div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body rightbar">
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title px-3 py-4">
                    <a href="javascript:void(0);" class="right-bar-toggle float-end" data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <div class="accordion right_sidebar_accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button theme_color fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#one_time_setting_div" aria-expanded="true" aria-controls="one_time_setting_div">
                                One Time Setting
                            </button>
                        </h2>
                        <div id="one_time_setting_div" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body py-0">
                            <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url(route_to('log_list_page')) ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>Log</span></a></li>
                                </ul>
                                <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url() ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>Designation</span></a></li>
                                </ul>
                                <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url() ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>Unit of Measurement (UMO)</span></a></li>
                                </ul>
                                <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url(route_to('country_list_page')) ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>Country</span></a></li>
                                </ul>
                                <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url(route_to('state_list_page')) ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>State</span></a></li>
                                </ul>
                                <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url(route_to('city_list_page')) ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>City</span></a></li>
                                </ul>
                                <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url() ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>Business Sector</span></a></li>
                                </ul>
                                <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url() ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>Delivery Terms</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button theme_color fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#company-setup" aria-expanded="true" aria-controls="company-setup">
                                Company Setup
                            </button>
                        </h2>
                        <div id="company-setup" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body py-0">
                                <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url() ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>Company Details</span></a></li>
                                </ul>
                                <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url() ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>Sales Setup</span></a></li>
                                </ul>
                                <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url() ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>Purchase Setup</span></a></li>
                                </ul>
                                <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url() ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>Inventory Setup</span></a></li>
                                </ul>
                                <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url() ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>Finance Setup</span></a></li>
                                </ul>
                                <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url() ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>CRM Setup</span></a></li>
                                </ul>
                                <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url() ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>Voucher Setup</span></a></li>
                                </ul>
                                <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url() ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>Email Integration</span></a></li>
                                </ul>
                                <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url() ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>Sms Integration</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button theme_color fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#website-setup" aria-expanded="true" aria-controls="website-setup">
                                Website Setup
                            </button>
                        </h2>
                        <div id="website-setup" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body py-0">
                                <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url() ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>Header Footer</span></a></li>
                                </ul>
                                <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url() ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>Home Page</span></a></li>
                                </ul>
                                <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url() ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>Contact Us Page</span></a></li>
                                </ul>
                                <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                    <li class="mb-0"><a class=" waves-effect" href="<?= base_url() ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>About Page</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>