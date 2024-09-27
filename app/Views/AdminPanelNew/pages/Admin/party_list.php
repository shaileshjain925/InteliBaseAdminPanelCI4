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
                    <button onclick="party_create_update()" class="btn add_form_btn" data-bs-toggle="offcanvas" data-bs-target="#right_floating_div" aria-controls="right_floating_div"><i class="bx bx-plus me-2"></i>Add <?= $party_type ?></button>
                <?php endif; ?>
            </div>
            <div class="table-responsive">
                <table id="party_table" class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle"></table>
            </div>
        </div>
    </div>
</div>

<script>
    var datatable_export = '<?= (check_menu_access($menu_code, 'export')) ?>';
    var datatable_print = '<?= (check_menu_access($menu_code, 'print')) ?>';
    var print_allowed = '<?= (check_menu_access($menu_code, 'print')) ?>';
    var DeleteApiUrl = "<?= base_url(route_to('party_delete_api')) ?>";
    var parameter = {};
    parameter._autojoin = 'F';
    parameter._select = '*';
    parameter._selectOther = `(SELECT COALESCE(COUNT(address_id), 0) FROM party_address WHERE party_address.party_id = party.party_id) AS address_count`;
    parameter['party-party_type'] = '<?= $party_type ?>';

    function party_delete(party_id) {
        deleteRow({
                "party_id": party_id
            }).then((response) => {
                fetchTableData()
            })
            .catch((error) => {
                console.error("Deletion failed or cancelled:", error);
            });
    }

    function party_view(party_id) {
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to(strtolower($party_type) . '_view_component')) ?>",
            data: {
                party_id: party_id
            },
            success: function(response) {
                $("#right_floating_div").html("");
                $("#right_floating_div").html(response);
            }
        });
    }

    function party_create_update(party_id = '') {
        var data = {};
        if (party_id != '') {
            data.party_id = party_id
        }
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to(strtolower($party_type) . '_create_update_component')) ?>",
            data: data,
            success: function(response) {
                $("#right_floating_div").html("");
                $("#right_floating_div").html(response);
                initializeSelectFields();
            }
        });
    }

    function viewContacts(contact_person_json_data) {
        if (contact_person_json_data && contact_person_json_data.trim() !== '') {
            try {
                // Parse JSON data
                let data = JSON.parse(decodeURIComponent(contact_person_json_data));

                // Check if the data is an array
                if (Array.isArray(data)) {
                    // Prepare table structure for multiple contacts
                    let table = `
                        <div class="table-responsive" style="width: 100%;">
                            <table class="table table-bordered table-striped" style="font-size: 0.875rem; width: 100%;"> <!-- font-size reduced to 0.875rem (~14px) -->
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Person Name</th>
                                        <th>Designation</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>`;

                    data.forEach(contact => {
                        table += `
                        <tr>
                            <td>${contact.person_name || ''}</td>
                            <td>${contact.person_designation || ''}</td>
                            <td>${contact.person_mobile || ''}</td>
                            <td>${contact.person_email || ''}</td>
                        </tr>`;
                    });

                    table += '</tbody></table></div>';


                    // Display table in SweetAlert modal
                    Swal.fire({
                        title: 'Contact Person(s)',
                        html: table, // Insert the table here
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText: 'Close',
                        width: '80%'
                    });
                } else {
                    Swal.fire('Error', 'Invalid data format', 'error');
                }
            } catch (e) {
                Swal.fire('Error', 'Failed to parse JSON data', 'error');
            }
        } else {
            Swal.fire('No Contacts', 'No contact person data available.', 'info');
        }
    }


    function initializeSelectFields() {
        initializeSelectize('firm_type', {
            placeholder: "Select Firm Type"
        });
        initializeSelectize('business_nature_code', {
            placeholder: "Select Business Nature"
        });
        initializeSelectize('packaging_type', {
            placeholder: "Select Packaging Type"
        });
        initializeSelectize('is_active');
        initializeSelectize('business_type_id', {
            placeholder: "Select Business Type"
        }, apiUrl = "<?= base_url(route_to('business_types_list_api')) ?>", {}, "business_type_id", "business_type_name")
        initializeSelectize('payment_term_id', {
            placeholder: "Select Payment Terms"
        }, apiUrl = "<?= base_url(route_to('payment_terms_list_api')) ?>", {}, "payment_term_id", "payment_term_code")
        initializeSelectize('delivery_term_id', {
            placeholder: "Select Delivery Terms"
        }, apiUrl = "<?= base_url(route_to('delivery_terms_list_api')) ?>", {}, "delivery_term_id", "delivery_term_code")
        initializeSelectize('default_billing_address_id', {
            placeholder: "Select Billing Address"
        }, apiUrl = "<?= base_url(route_to('party_address_list_api')) ?>", {}, "address_id", "address_short_name")
        initializeSelectize('default_shipping_address_id', {
            placeholder: "Select Shipping Address"
        }, apiUrl = "<?= base_url(route_to('party_address_list_api')) ?>", {}, "address_id", "address_short_name")
    }

    function addContactRow() {
        var index = $("#contact_person_div").length;
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to('add_row_contact_details')) ?>",
            data: {
                index: index
            },
            success: function(response) {
                $("#contact_person_div").append(response);
            }
        });
    }

    function partyFormSuccessCallback(response) {
        if (response.status == 200 || response.status == 201) {
            $(".offcanvas button[data-bs-dismiss='offcanvas']").click();
            fetchTableData();
        }
    }

    function partyFormErrorCallback(response) {
        console.log(response);
    }

    function successDataTableCallbackFunction(response) {
        var columns = [{
                title: "ID",
                data: "party_id",
                visible: true
            },
            {
                title: "<?= $party_type ?> Name",
                data: "party_name",
                visible: true
            },
            {
                title: "Party Code",
                data: "party_code",
                visible: true
            },
            {
                title: "Address",
                data: "address_count",
                visible: true,
                render: function(data, type, row) {
                    return `<a href="<?= base_url(route_to('party_address_list_page')) ?>?party_id=${row.party_id}" class="btn btn-sm btn-info">View(${data})</a>`;
                }
            },
            {
                title: "Contact Person Data",
                data: "contact_person_json_data",
                visible: true,
                render: function(data, type, row) {
                    return `<button class="btn btn-info" onclick="viewContacts('${encodeURIComponent(row.contact_person_json_data)}')">Contact Person(s)</button>`;
                }
            },
            {
                title: "Email",
                data: "party_email",
                visible: true
            },
            {
                title: "Contact Number",
                data: "party_number",
                visible: true
            },
            {
                title: "PAN No",
                data: "pan_no",
                visible: true
            },
            {
                title: "Firm Type",
                data: "firm_type",
                visible: true
            },
            {
                title: "Business Type",
                data: "business_type_name",
                visible: true
            },
            {
                title: "Business Nature Code",
                data: "business_nature_code",
                visible: true
            },
            {
                title: "Payment Term Code",
                data: "payment_term_code",
                visible: true
            },
            {
                title: "Due Days",
                data: "due_days",
                visible: true
            },
            {
                title: "Interest %",
                data: "post_due_interest_rate",
                visible: true
            },
            {
                title: "Delivery Term",
                data: "delivery_term_code",
                visible: true
            },
            {
                title: "Estimated Delivery Days",
                data: "estimated_days_to_deliver",
                visible: true
            },
            {
                title: "Packaging Type",
                data: "packaging_type",
                visible: true
            },
            {
                title: "Bank Name",
                data: "bank_name",
                visible: true
            },
            {
                title: "Bank Account No",
                data: "bank_no",
                visible: true
            },
            {
                title: "IFSC Code",
                data: "bank_ifsc",
                visible: true
            },
            {
                title: "Bank Holder Name",
                data: "bank_holder_name",
                visible: true
            },
            {
                title: "Notes",
                data: "notes",
                visible: true
            },
            {
                title: "Website",
                data: "website",
                visible: true
            },
            {
                title: "Is Active",
                data: "is_active",
                visible: true
            },
            {
                title: "Default Billing Address ID",
                data: "default_billing_address_id",
                visible: false
            },
            {
                title: "Default Shipping Address ID",
                data: "default_shipping_address_id",
                visible: false
            },
            {
                title: "Actions",
                data: null,
                render: function(data, type, row) {
                    return `
                <button class="text-white btn btn-sm btn-info" onclick="party_view(${row.party_id})" data-bs-toggle="offcanvas" data-bs-target="#right_floating_div" aria-controls="right_floating_div">
                    <i class="fa fa-eye"></i>
                </button>
                <?php if (check_menu_access($menu_code, 'edit')): ?>
                    <button type="button" onclick="party_create_update('${row.party_id}')" data-bs-toggle="offcanvas" data-bs-target="#right_floating_div" aria-controls="right_floating_div" class="text-white btn btn-sm btn-success">
                        <i class="bx bx-edit-alt"></i>
                    </button>
                <?php endif; ?>
                <?php if (check_menu_access($menu_code, 'delete')): ?>
                    <button class="text-white btn btn-sm btn-danger" onclick="party_delete(${row.party_id})">
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
            'party_table', // table_id
            "<?= base_url(route_to('party_list_api')) ?>", // url
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