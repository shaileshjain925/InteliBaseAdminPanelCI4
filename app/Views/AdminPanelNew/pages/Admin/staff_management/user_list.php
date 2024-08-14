<!-- -----------main page start----------- -->
<div class="offcanvas offcanvas-end  vendor-offcanvas" tabindex="-1" id="right_floating_div">
</div>

<div class="row new_table_div col-md-12">
    <div class="card">
        <div class="card-body p-2">
            <div class="d-flex justify-content-end align-items-center mb-2">
                <a href="<?= base_url(route_to('default_dashboard_page')) ?>"><i class="fas fa-home home_icn me-3"></i></a>
                <img onclick="fetchData()" src="<?php echo base_url('AdminPanelNew/assets/images/refresh.png') ?>" height="20" class="me-3">
                <a href="<?= @$_previous_path ?>">
                    <button class="btn export_btn me-3" type="button"><i class="fas fa-backward"></i></button>
                </a>
                <?php if (in_array($_SESSION['user_type'], [UserType::SuperAdmin->value, UserType::Admin->value])) : ?>
                    <a href="<?= base_url(route_to($user_type . '_create_update_page')) ?>">
                        <button class="btn add_form_btn"><i class="bx bx-plus me-2"></i>Add <?= UserType::from($user_type)->name ?></button>
                    </a>
                <?php endif; ?>
            </div>
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle"></table>
            </div>
        </div>
    </div>
</div>
<script>
    var DeleteApiUrl = "<?= base_url(route_to('user_delete_api')) ?>"

    function user_delete(user_id) {
        deleteRow({
                "user_id": user_id
            }).then((response) => {
                fetchData()
            })
            .catch((error) => {
                console.error("Deletion failed or cancelled:", error);
            });
    }

    function user_view(user_id) {
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to($user_type . '_view_component')) ?>",
            data: {
                user_id: user_id
            },
            success: function(response) {
                $("#right_floating_div").html("");
                $("#right_floating_div").html(response);
            }
        });
    }

    function change_is_active(event, user_id) {

        var isChecked = event.target.checked; // Determine if the checkbox is checked or unchecked

        // Toggle the checked state based on the isChecked variable
        $('#isActiveSwitch_' + user_id).prop('checked', isChecked);

        var is_active = isChecked ? 1 : 0; // Set is_active to 1 if checked, 0 if unchecked

        $.ajax({
            type: "POST",
            url: "<?= base_url(route_to('user_update_api')) ?>",
            data: {
                user_id: user_id,
                is_active: is_active,
            },
            success: function(response) {
                if (response.status == 200) {
                    toastr.success("Changed Successfully");
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX request error:", error);
            }
        });
    }
    // Document Ready
    function afterTableViewCallbackFunction(response) {

    }

    function dataTableSuccessCallBack(response) {
        var columns = [{
                title: "user_id",
                data: "user_id",
                visible: false,
            },
            {
                title: "Staff Code",
                data: "user_code",
                visible: true,
            },
            {
                title: "Image",
                data: "user_image",
                visible: false,
                render: function(data, type, row) {
                    return `<img class="image-fluid" style="height:auto; width:100px" onclick="enlargeImage(event)" src="<?= base_url() ?>${row.user_image}">`;
                }
            },
            {
                title: "User Name",
                data: "user_name",
                visible: true,
            },
            {
                title: "Email",
                data: "user_email",
                visible: true,
            },
            {
                title: "Mobile",
                data: "user_mobile",
                visible: true,
            },
            <?php if ($user_type == UserType::SalesExecutive->value) : ?> {
                    title: "Reporting To",
                    data: "reporting_to_user_name",
                    visible: true,
                },
            <?php endif; ?>
            <?php if (in_array($_SESSION['user_type'], [UserType::SuperAdmin->value, UserType::Admin->value])) : ?> {
                    title: "Active",
                    data: "is_active",
                    render: function(data, type, row) {
                        var checked = data == 1 ? 'checked' : '';
                        return `
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="isActiveSwitch_${row.user_id}" ${checked} onchange="change_is_active(event, ${row.user_id})">
            </div>`;
                    }
                },
            <?php endif; ?> {
                title: "Address",
                data: "user_address",
                visible: false,
            },
            {
                title: "Country",
                data: "user_country_name",
                visible: false,
            },
            {
                title: "State",
                data: "user_state_name",
                visible: false,
            },
            {
                title: "City",
                data: "user_city_name",
                visible: false,
            },
            {
                title: "Pincode",
                data: "user_pincode",
                visible: false,
            },
            <?php if (in_array($_SESSION['user_type'], [UserType::SuperAdmin->value, UserType::Admin->value])) : ?> {
                    title: "Aadhaar Card No",
                    data: "user_aadhaar_card",
                    visible: false,
                },
                {
                    title: "Aadhaar Card Image",
                    data: "user_aadhaar_card_image",
                    visible: false,
                    render: function(data, type, row) {
                        return `<img class="image-fluid" style="height:auto; width:100px" onclick="enlargeImage(event)" src="<?= base_url() ?>${row.user_aadhaar_card_image}">`;
                    }
                },
            <?php endif; ?> {
                "title": "Actions",
                "data": null,
                "render": function(data, type, row) {
                    return `
                            <?php if (isset($_SESSION['ref_user_type']) && $_SESSION['ref_user_type'] == UserType::SuperAdmin->value) : ?>
                                <a href="<?= base_url(route_to('LoginByOther', '')) ?>/${row.user_id}" class="text-white btn btn-sm btn-warning">
                                    Login
                                </a>
                            <?php endif; ?>
                            <?php if (in_array($_SESSION['user_type'], [UserType::SuperAdmin->value, UserType::Admin->value])) : ?> 
                            <button class="text-white btn btn-sm btn-info" onclick="user_view(${row.user_id})" data-bs-toggle="offcanvas" data-bs-target="#right_floating_div" aria-controls="right_floating_div">
                                <i class="fa fa-eye"></i>
                            </button>
                            
                            <a href="<?= base_url(route_to($user_type . '_create_update_page')) ?>/${row.user_id}" class="text-white btn btn-sm btn-success">
                                <i class="bx bx-edit-alt"></i>
                            </a>
                            <button class="text-white btn btn-sm btn-danger" onclick="user_delete(${row.user_id})">
                                <i class="bx bx-trash-alt"></i>
                            </button>
                            <?php endif; ?> 
                        `;
                }
            }
        ];

        if (response.status == 200) {
            return {
                "status": response.status,
                "columns": columns,
                "data": JSON.parse(response.data)
            };
        } else {
            return {
                "status": response.status,
                "columns": columns,
                "data": {}
            };
        }
    }
    var filter = {}
    filter._autojoin = "Y";
    filter._select = "*";
    filter['user-user_type'] = '<?= $user_type ?>';
    <?php if (getUserType() == UserType::SalesManager): ?>
        filter['user-reporting_to_user_id'] = '<?= $_SESSION['user_id'] ?>';
    <?php endif; ?>

    function fetchData() {
        DataTableInitialized('table', '<?= base_url(route_to('user_list_api')) ?>', "POST", filter, dataTableSuccessCallBack, {}, afterTableViewCallbackFunction)
    }
    $(document).ready(function() {
        fetchData()
    });
</script>
<!-- --------------main page end----------- -->