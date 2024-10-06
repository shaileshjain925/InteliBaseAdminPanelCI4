<!-- -----------main page start----------- -->
<div class="offcanvas offcanvas-end  vendor-offcanvas" style="overflow: scroll; width:850px!important" tabindex="-1" id="right_floating_div">
</div>

<div class="row new_table_div col-md-12">
    <div class="card">
        <div class="card-body p-2">
            <div class="d-flex justify-content-end align-items-center mb-2">
                <a href="<?= base_url(route_to('default_dashboard_page')) ?>"><i class="fas fa-home home_icn me-3"></i></a>
                <img onclick="fetchTableData()" src="<?php echo base_url('AdminPanelNew/assets/images/refresh.png') ?>" height="20" class="me-3">
                <a href="<?= @$_previous_path ?>">
                    <button class="btn export_btn me-3" type="button"><i class="fas fa-backward"></i></button>
                </a>
                <?php if (check_menu_access($menu_code, 'create')): ?>
                    <button onclick="party_address_create_update()" class="btn add_form_btn" data-bs-toggle="offcanvas" data-bs-target="#right_floating_div" aria-controls="right_floating_div"><i class="bx bx-plus me-2"></i>Add <?= $party_type ?> Address</button>
                <?php endif; ?>
            </div>
            <div class="table-responsive">
                <table id="party_address_table" class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle w-100"></table>
            </div>
        </div>
    </div>
</div>

<script>
    var datatable_export = '<?= (check_menu_access($menu_code, 'export')) ?>';
    var datatable_print = '<?= (check_menu_access($menu_code, 'print')) ?>';
    var print_allowed = '<?= (check_menu_access($menu_code, 'print')) ?>';
    var DeleteApiUrl = "<?= base_url(route_to('party_address_delete_api')) ?>";
    var parameter = {};
    parameter._autojoin = 'F';
    parameter._select = '*';
    parameter['party_address-party_id'] = '<?= $party_id ?>';

    function party_address_delete(address_id) {
        deleteRow({
                "address_id": address_id
            }).then((response) => {
                fetchTableData()
            })
            .catch((error) => {
                console.error("Deletion failed or cancelled:", error);
            });
    }

    function party_address_view(address_id) {
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to('party_address_view_component')) ?>",
            data: {
                address_id: address_id
            },
            success: function(response) {
                $("#right_floating_div").html("");
                $("#right_floating_div").html(response);
            }
        });
    }

    function party_address_create_update(address_id = '') {
        var data = {};
        data.party_id = '<?= $party_id ?>';
        data.party_name = '<?= $party_name ?>';
        if (address_id != '') {
            data.address_id = address_id
        }
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to('party_address_create_update_component')) ?>",
            data: data,
            success: function(response) {
                $("#right_floating_div").html("");
                $("#right_floating_div").html(response);
                initializeSelectFields();
            }
        });
    }


    function initializeSelectFields() {
        initializeSelectize('address_type', {
            placeholder: "Address Type"
        })
        initializeSelectize('party_state_id', {
            placeholder: "Select State"
        })
        initializeSelectize('party_city_id', {
            placeholder: "Select City"
        })
        initializeSelectize('party_country_id', {
                placeholder: "Select Country"
            }, apiUrl = "<?= base_url(route_to('country_list_api')) ?>", {}, "country_id", "country_name")
            .onchange(function(
                country_id) {
                initializeSelectize('party_state_id').clearOptions().then(function() {
                    // Initialize state selectize dropdown
                    if (country_id != '') {
                        initializeSelectize('party_state_id', {
                            placeholder: "Select State"
                        }, "<?= base_url(route_to('state_list_api')) ?>", {
                            country_id: country_id
                        }, 'state_id', 'state_name').onchange(function(
                            state_id) {
                            initializeSelectize('party_city_id').clearOptions().then(function() {
                                // Initialize state selectize dropdown
                                if (state_id != '') {
                                    initializeSelectize('party_city_id', {
                                        placeholder: "Select City"
                                    }, "<?= base_url(route_to('city_list_api')) ?>", {
                                        state_id: state_id
                                    }, 'city_id', 'city_name')
                                }
                            });
                        });
                    }
                });
            });
    }

    function partyAddressFormSuccessCallback(response) {
        if (response.status == 200 || response.status == 201) {
            $(".offcanvas button[data-bs-dismiss='offcanvas']").click();
            fetchTableData();
        }
    }

    function partyAddressFormErrorCallback(response) {
        console.log(response);
    }

    function successDataTableCallbackFunction(response) {
        var columns = [{
                title: "ID",
                data: "address_id",
                visible: true
            },
            {
                title: "Address Alias",
                data: "address_short_name",
                visible: true
            },
            {
                title: "Firm Name",
                data: "firm_name",
                visible: true
            },
            {
                title: "GST",
                data: "firm_gst",
                visible: true
            },
            {
                title: "Country",
                data: "party_country_name",
                visible: true
            },
            {
                title: "State",
                data: "party_state_name",
                visible: true
            },
            {
                title: "City",
                data: "party_city_name",
                visible: true
            },
            {
                title: "Pincode",
                data: "party_pincode",
                visible: true
            },
            {
                title: "Address",
                data: "party_addresses",
                visible: true
            },
            {
                title: "Person Name",
                data: "address_person_name",
                visible: true
            },
            {
                title: "Mobile",
                data: "address_person_mobile",
                visible: true
            },
            {
                title: "Email",
                data: "address_person_email",
                visible: true
            },
            {
                title: "Address Type",
                data: "address_type",
                visible: true
            },
            {
                title: "Actions",
                data: null,
                render: function(data, type, row) {
                    return `
                <button class="text-white btn btn-sm btn-info" onclick="party_address_view(${row.address_id})" data-bs-toggle="offcanvas" data-bs-target="#right_floating_div" aria-controls="right_floating_div">
                    <i class="fa fa-eye"></i>
                </button>
                <?php if (check_menu_access($menu_code, 'edit')): ?>
                    <button type="button" onclick="party_address_create_update('${row.address_id}')" data-bs-toggle="offcanvas" data-bs-target="#right_floating_div" aria-controls="right_floating_div" class="text-white btn btn-sm btn-success">
                        <i class="bx bx-edit-alt"></i>
                    </button>
                <?php endif; ?>
                <?php if (check_menu_access($menu_code, 'delete')): ?>
                    <button class="text-white btn btn-sm btn-danger" onclick="party_address_delete(${row.address_id})">
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

    function fetchTableData() {
        DataTableInitialized(
            'party_address_table', // table_id
            "<?= base_url(route_to('party_address_list_api')) ?>", // url
            'POST', // method
            parameter, // parameter
            successDataTableCallbackFunction // dataTableSuccessCallBack
        );
    }
    $(document).ready(function() {
        fetchTableData();
    });
</script>
<!-- --------------main page end----------- -->