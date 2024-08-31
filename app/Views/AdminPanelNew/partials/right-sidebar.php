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
                    <?php if (check_module_access('ONE_TIME_SETUP')): ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button theme_color fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#one_time_setting_div" aria-expanded="true" aria-controls="one_time_setting_div">
                                    One Time Setting
                                </button>
                            </h2>
                            <div id="one_time_setting_div" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body py-0">
                                    <?php if (check_menu_access('LOG', 'view')): ?>
                                        <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                            <li class="mb-0"><a class=" waves-effect" href="<?= base_url(route_to('log_list_page')) ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>Log</span></a></li>
                                        </ul>
                                    <?php endif; ?>
                                    <?php if (check_menu_access('COUNTRIES', 'view')): ?>
                                        <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                            <li class="mb-0"><a class=" waves-effect" href="<?= base_url(route_to('country_list_page')) ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>Countries</span></a></li>
                                        </ul>
                                    <?php endif; ?>
                                    <?php if (check_menu_access('STATES', 'view')): ?>
                                        <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                            <li class="mb-0"><a class=" waves-effect" href="<?= base_url(route_to('state_list_page')) ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>States</span></a></li>
                                        </ul>
                                    <?php endif; ?>
                                    <?php if (check_menu_access('CITIES', 'view')): ?>
                                        <ul class="right_sidebar_ul px-0 mt-2 m-0">
                                            <li class="mb-0"><a class=" waves-effect" href="<?= base_url(route_to('city_list_page')) ?>"> <i class="icon_theme_color_1 bx bx-grid-small"></i> <span>Cities</span></a></li>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>