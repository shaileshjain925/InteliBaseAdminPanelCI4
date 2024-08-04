<!-- -----------main page start----------- -->
<div class="offcanvas offcanvas-end  vendor-offcanvas" tabindex="-1" id="right_floting_div">
</div>

<div class="row new_table_div col-md-12">
    <div class="card">
        <div class="card-body p-2">
            <div class="d-flex justify-content-end align-items-center mb-2">
                <a href="<?= base_url(route_to('admin_dashboard_page')) ?>"><i class="fas fa-home home_icn me-3"></i></a>
                <img onclick="fetchTableData()" src="<?= base_url($_assets_path . 'assets/images/refresh.png') ?>" height="20" class="me-3">
                <a href="<?= @$_previous_path ?>">
                    <button class="btn export_btn me-3" type="button"><i class="fas fa-backward"></i></button>
                </a>
                <a href="<?= base_url(route_to('lead_create_update_page')) ?>">
                    <button class="btn add_form_btn"><i class="bx bx-plus me-2"></i>Add Lead</button>
                </a>
            </div>
            <div class="table-responsive">
                <table id="table_list" class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle">

                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var DeleteApiUrl = "<?= base_url(route_to('lead_delete_api')) ?>"

    function deleteRecord(party_id) {
        deleteRow({
            party_id: party_id
        }).then((response) => {
            fetchTableData();
        }).catch((error) => {
            console.log(error);
        });
    }

    function view(party_id) {
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to('lead_view_component')) ?>",
            data: {
                party_id: party_id
            },
            success: function(response) {
                $("#right_floting_div").html("");
                $("#right_floting_div").html(response);
            }
        });
    }

    function successDataTableCallbackFunction(response) {
        var columns = [{
                title: "ID",
                data: "party_id",
                visible: true
            },
            {
                title: "Date",
                data: "lead_date",
                visible: true

            },
            {
                title: "Name",
                data: "contact_person_name",
                visible: true

            },
            {
                title: "Email",
                data: "contact_person_email",
                visible: true

            },
            {
                title: "Mobile",
                data: "contact_person_mobile",
                visible: true

            },
            {
                title: "Status",
                data: "lead_status",
                visible: true

            },
            {
                title: "Lead Status",
                data: "lead_status",
                render: function(data, type, row) {
                    var options = `
                  <option ${row.lead_status == 'Hot' ? 'selected' : ''} value="Hot">Hot</option>
                  <option ${row.lead_status == 'Cold' ? 'selected' : ''} value="Cold">Cold</option>
                  <option ${row.lead_status == 'Warm' ? 'selected' : ''} value="Warm">Warm</option>
                  <option ${row.lead_status == 'Win' ? 'selected' : ''} value="Win">Win</option>
                  <option ${row.lead_status == 'Lost' ? 'selected' : ''} value="Lost">Lost</option>`;
                    return `
                  <select class="form-select" id="lead_status_${row.party_id}" name="lead_status" onchange="update_lead_status(${row.party_id})">
                    <option disabled>Select Status</option>
                    ${options}
                  </select>`;
                }
            },

            {
                "title": "Actions",
                "data": null,
                "render": function(data, type, row) {
                    return `
                    <?php if (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) : ?>
                        <a href="<?= base_url(route_to('lead_create_update_page')) ?>/${row.party_id}" class="btn edit_btn edit" title="Profile Edit">
                        <i class="bx bx-edit-alt"></i>
                        </a>
                              <?php endif; ?>
                               <?php if (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin')) : ?>
                        <button onclick="deleteRecord(${row.party_id})" class="btn del_btn" title="Delete">
                        <i class="bx bx-trash-alt"></i>
                        </button>
                     <?php endif; ?>
                        <button onclick="view(${row.party_id})" class="btn view_btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#right_floting_div" aria-controls="AddVendor"><i class="far fa-eye"></i></button>

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

    function fetchTableData(parameter = {}) {
        parameter._autojoin = 'Y';
        parameter._select = '*';
        parameter['party-party_type'] = 'lead';
        DataTableInitialized(
            'table_list', // table_id
            "<?= base_url(route_to('lead_list_api')) ?>", // url
            'POST', // method
            parameter, // parameter
            successDataTableCallbackFunction // dataTableSuccessCallBack
        );
    }
    $(document).ready(function() {
        fetchTableData();
        $("#lead_status").selectize({
            placeholder: "Select State"
        });
    });


    function update_lead_status(party_id) {
        var lead_status = $(`#lead_status_${party_id}`).val();
        // Proceed with the AJAX call
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to('lead_update_api')) ?>",
            data: {
                party_id: party_id,
                lead_status: lead_status
            },
            success: function(response) {
                // Handle the response from the server
                switch (response.status) {
                    case 200:
                        toastr.success(response.message || 'Lead Status Updated Successfully');
                        fetchTableData();
                        break;
                    case 400:
                        toastr.error(response.message || 'Bad Request');
                        break;
                    case 422:
                        toastr.error(response.message || 'Validation Failed');
                        break;
                    default:
                        toastr.error('An unknown error occurred');
                }
            },
            error: function(error) {
                toastr.error('There was an error updating the status.');
            }
        });
    }
</script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Lead Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="lead_status_change">
                            <input class="me-2" type="radio" name="LeadStatus">
                            <label class="fw-bold mb-0">Hot</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="lead_status_change">
                            <input class="me-2" type="radio" name="LeadStatus">
                            <label class="fw-bold mb-0">Cold</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="lead_status_change">
                            <input class="me-2" type="radio" name="LeadStatus">
                            <label class="fw-bold mb-0">Warm</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="lead_status_change">
                            <input class="me-2" type="radio" name="LeadStatus">
                            <label class="fw-bold mb-0">Win</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="lead_status_change">
                            <input class="me-2" type="radio" name="LeadStatus">
                            <label class="fw-bold mb-0">Lost</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="submit_btn" data-bs-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>