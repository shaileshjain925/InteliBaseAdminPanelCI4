<!doctype html>
<html lang="<?php
            $session = \Config\Services::session();
            $lang = $session->get('lang');
            echo $lang;
            ?>">

<head>

    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Css -->
    <link href="AdminPanelNew/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="AdminPanelNew/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="AdminPanelNew/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- custom  css-->
    <link href="AdminPanelNew/assets/css/custom.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="AdminPanelNew/assets/css/login.css" id="app-style" rel="stylesheet" type="text/css" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css' integrity='sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==' crossorigin='anonymous' />

</head>
<style>
    .bg-login {
        background: url('<?= base_url('AdminPanelNew/assets/images/crop2.jpg') ?>');
    }
</style>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-login text-center">
                            <div class="bg-login-overlay"></div>
                            <div class="position-relative">
                                <h5 class="font-size-20">Welcome Back !</h5>
                                <p class="mb-0">Sign in to continue to The HUB Services</p>
                                <a href="/" class="logo logo-admin mt-4">
                                    <img src="<?= base_url('AdminPanelNew/assets/images/logo.png') ?>" alt="logo-sm-dark">
                                </a>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <div class="p-2">
                                <div class="error-message-box d-none">
                                    <p id="error-message"></p>
                                </div>
                                <div class="success-message-box d-none">
                                    <p id="success-message"></p>
                                </div>
                                <form id="form" enctype="multipart/form-data" class="form-horizontal" action="<?= base_url(route_to('login_api')) ?>" method="post">
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                                        <label class="form-check-label" for="customControlInline">Remember
                                            me</label>
                                    </div>

                                    <div class="mt-3">
                                        <button onclick="submitFormWithAjax('form', true, true, successCallback, errorCallback)" class="btn login_btn waves-effect waves-light" type="button">Log In</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="AdminPanelNew/assets/libs/jquery/jquery.min.js"></script>
    <script src="AdminPanelNew/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="AdminPanelNew/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="AdminPanelNew/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="AdminPanelNew/assets/libs/node-waves/waves.min.js"></script>
    <script src="AdminPanelNew/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="AdminPanelNew/assets/js/app.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js' integrity='sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==' crossorigin='anonymous'></script>
    <script src="AdminPanelNew/assets/js/common.js"></script>

    <script>
        function successCallback(response) {
            if (response.status == 201 || response.status == 200) {
                setTimeout(() => {
                    // Dashboard Url
                    window.location.href = "<?= base_url(route_to('default_dashboard_page')) ?>";
                }, 2000);
            }
        }

        function errorCallback(response) {
            console.log(response);
        }
    </script>

</body>

</html>