<!-- -----------main page start----------- -->
<div class="offcanvas offcanvas-end  vendor-offcanvas extra_lg_form_width" tabindex="-1" id="right_floting_div">
</div>

<div class="row new_table_div col-md-12">
    <div class="card">
        <div class="card-body p-2">
            <div class="d-flex justify-content-end align-items-center mb-2">
                <a href="<?= base_url(route_to('admin_dashboard_page')) ?>"><i class="fas fa-home home_icn me-3"></i></a>
                <img onclick="fetchTableData()"  src="<?php echo base_url('AdminPanelNew/assets/images/refresh.png') ?>" height="20" class="me-3">
                <a href="<?= @$_previous_path ?>">
                    <button class="btn export_btn me-3" type="button"><i class="fas fa-backward"></i></button>
                </a>
                <a href="<?= base_url(route_to('client_create_update_page')) ?>">
                    <button class="btn add_form_btn"><i class="bx bx-plus me-2"></i>Add Client</button>
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
   
    var DeleteApiUrl = "<?= base_url(route_to('client_delete_api')) ?>"
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
            url: "<?= base_url(route_to('client_view_component')) ?>",
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
                title: "Firm Name",
                data: "firm_name",
                visible: true

            },
            {
                title: "Firm Email",
                data: "firm_email",
                visible: true

            },
            {
                title: "Firm Mobile",
                data: "firm_mobile",
                visible: true

            },
            {
            title: "Country",
            data: "firm_country_name",
            visible: true
        },
        {
            title: "State",
            data: "firm_state_name",
            visible: true
        },
        {
            title: "City",
            data: "firm_city_name",
            visible: true
        },
        {
            title: "GST NO",
            data: "firm_gst_no",
            visible: true
        },
        {
            title: "PAN NO",
            data: "firm_pan_no",
            visible: true
        },
        {
            title: "Pincode",
            data: "firm_pincode",
            visible: true
        },
        {
            title: "Address",
            data: "firm_address",
            visible: true
        },
        {
            title: "Date of Birth",
            data: "dob",
            visible: true
        },
        {
            title: "Firm Of Anniversary",
            data: "doa",
            visible: true
        },

        {
            title: "Contact Name",
            data: "contact_person_name",
            visible: true

        },
        {
            title: "Contact Email",
            data: "contact_person_email",
            visible: true

        },
        {
            title: "Contact Mobile",
            data: "contact_person_mobile",
            visible: true

        },
            
    
            {
                "title": "Actions",
                "data": null,
                "render": function(data, type, row) {
                    return `
                    <?php if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')): ?>
                       <a href="<?= base_url(route_to('client_all_quotation_list_page')) ?>"
                                class="btn edit_btn edit" title="View Quotation">
                                <img src="<?php echo base_url('AdminPanelNew/assets/images/quotation.jpg') ?>"
                                    height="40">
                            </a>
                            <a class="mx-2" title="Payment Detail"
                                href="<?= base_url(route_to('client_payment_history_page')) ?>">
                                <img src="<?php echo base_url('AdminPanelNew/assets/images/payment.png') ?>"
                                    height="25">
                            </a>
                             <a href="<?= base_url(route_to('client_create_update_page')) ?>/${row.party_id}" class="btn edit_btn edit" title="Profile Edit">
                    <i class="bx bx-edit-alt"></i>
                    </a>
                            <?php endif; ?>
                             <button onclick="view(${row.party_id})" class="btn view_btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#right_floting_div" aria-controls="AddVendor"><i class="far fa-eye"></i></button>
                            <?php if (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin')) : ?>
                           <button onclick="deleteRecord(${row.party_id})" class="btn del_btn" title="Delete">
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

    function fetchTableData(parameter = {}) {
        parameter._autojoin = 'Y';
        parameter._select = '*';
        parameter['party-party_type'] = 'client';
        DataTableInitialized(
            'table_list', // table_id
            "<?= base_url(route_to('client_list_api')) ?>", // url
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