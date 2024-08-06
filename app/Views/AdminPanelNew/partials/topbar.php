<header id="page-topbar">
    <div class="navbar-header">
        <div class="container-fluid">
            <div class="float-end">

                <div class="dropdown d-inline-block d-lg-none ms-2">
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0 d-none" aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="<?= lang('Files.Search') ?>" aria-label="Recipient's username">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>



                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                        <i class="mdi mdi-fullscreen"></i>
                    </button>
                </div>

                <div class="dropdown d-inline-block d-none">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="badge rounded-pill bg-danger ">3</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0"> <?= lang('Files.Notifications') ?> </h6>
                                </div>
                                <div class="col-auto">
                                    <a href="#!" class="small"> <?= lang('Files.View_All') ?></a>
                                </div>
                            </div>
                        </div>
                        <div data-simplebar style="max-height: 230px;">
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex align-items-start">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title bg-primary rounded-circle font-size-16">
                                            <i class="bx bx-cart"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mt-0 mb-1"><?= lang('Files.Your_order_is_placed') ?></h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1">
                                                <?= lang('Files.If_several_languages_coalesce_the_grammar') ?></p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i>
                                                <?= lang('Files.min_ago') ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex align-items-start">
                                    <img src="<?= base_url($_assets_path . 'assets/images/users/avatar-3.jpg') ?>" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                    <div class="flex-1">
                                        <h6 class="mt-0 mb-1">James Lemire</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1"><?= lang('Files.It_will_seem_like_simplified_English') ?>
                                            </p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i>
                                                <?= lang('Files.hours_ago') ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="" class="text-reset notification-item">
                                <div class="d-flex align-items-start">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title bg-success rounded-circle font-size-16">
                                            <i class="bx bx-badge-check"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1">
                                        <h6 class="mt-0 mb-1"><?= lang('Files.Your_item_is_shipped') ?></h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1">
                                                <?= lang('Files.If_several_languages_coalesce_the_grammar') ?></p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i>
                                                <?= lang('Files.min_ago') ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a href="" class="text-reset notification-item">
                                <div class="d-flex align-items-start">
                                    <img src="<?= base_url($_assets_path . 'assets/images/users/avatar-4.jpg') ?>" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                    <div class="flex-1">
                                        <h6 class="mt-0 mb-1">Salena Layfield</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1">
                                                <?= lang('Files.As_a_skeptical_Cambridge_friend_of_mine_occidental') ?>
                                            </p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i>
                                                <?= lang('Files.hours_ago') ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="p-2 border-top d-grid">
                            <a class="btn btn-sm btn-link font-size-14 " href="javascript:void(0)">
                                <i class="mdi mdi-arrow-right-circle me-3"></i><?= lang('Files.View_More') ?></a>
                        </div>
                    </div>
                </div>
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="<?= (isset($_user_image_url) && !empty($_user_image_url)) ? base_url($_user_image_url) : ""; ?>">
                        <span class="d-none d-xl-inline-block ms-1"><?= @$_user_name ?></span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->

                        <i class="bx bx-user font-size-16 align-middle me-1"></i>
                        <?= $_user_name ?> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="<?= base_url(route_to('logout')) ?>"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                            <?= lang('Files.Logout') ?>
                        </a>
                    </div>
                </div>

                <div class="dropdown d-inline-block">

                    <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="mdi mdi-settings-outline"></i>
                    </button>
                </div>

            </div>
            <div>
                <!-- LOGO -->


                <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>


            </div>
        </div>
    </div>
</header>