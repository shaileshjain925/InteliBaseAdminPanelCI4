<!-- -----------main page start----------- -->
<div class="offcanvas offcanvas-end  vendor-offcanvas" tabindex="-1" id="right_floting_div">
</div>

<div class="row new_table_div col-md-12">
    <div class="card">
        <div class="card-body p-2">
            <div class="d-flex justify-content-end align-items-center mb-2">
                <div>
                    <a href="<?= base_url(route_to('admin_dashboard_page')) ?>"><i
                            class="fas fa-home home_icn me-3"></i></a>
                            <img onclick="fetchTableData()" src="<?= base_url($_assets_path . 'assets/images/refresh.png') ?>" height="20" class="me-3">
                            <a href="<?= @$_previous_path ?>">
                        <button class="btn export_btn me-3" type="button"><i class="fas fa-backward"></i></button>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="table_list"
                    class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle">
                    <thead>
                        <!-- <tr>
                            <th>SN</th>
                            <th>Lead Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Sales Executive</th>
                        </tr> -->
                    </thead>
                    <!-- <tbody>
                        <tr>
                            <td>1</td>
                            <td>Rahul Vyas</td>
                            <td>rahul@gmail.com</td>
                            <td>123456789</td>
                            <td>Ujjain</td>
                            <td>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Alok Tripathi</option>
                                    <option>Rajiv Sharma</option>
                                    <option>Aanand</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Rahul Vyas</td>
                            <td>rahul@gmail.com</td>
                            <td>123456789</td>
                            <td>Ujjain</td>
                            <td>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Alok Tripathi</option>
                                    <option>Rajiv Sharma</option>
                                    <option>Aanand</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Rahul Vyas</td>
                            <td>rahul@gmail.com</td>
                            <td>123456789</td>
                            <td>Ujjain</td>
                            <td>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Alok Tripathi</option>
                                    <option>Rajiv Sharma</option>
                                    <option>Aanand</option>
                                </select>
                            </td>
                        </tr>
                    </tbody> -->
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var selected_user_id = "<?= @$user_id ?>";

function view() {
    $.ajax({
        type: "post",
        url: "<?= base_url(route_to('site_view_component')) ?>",
        data: {},
        success: function(response) {
            $("#right_floting_div").html("");
            $("#right_floting_div").html(response);
        }
    });
}

function successDataTableCallbackFunction(response) {
        var columns = [{
                title: "SN",
                data: "party_id",
                visible: true
            },
          
            {
                title: "Lead Name",
                data: "contact_person_name",
                visible: true

            },
            {
                title: "Email",
                data: "contact_person_email",
                visible: true

            },
            {
                title: "Phone",
                data: "contact_person_mobile",
                visible: true

            },
            {
                title: "City",
                data: "firm_city_id",
                visible: true

            },
            {
                title: "Sales Executive",
                data: "lead_status",
                render: function(data, type, row) {
                    return `
                  <select class="form-select" id="user_id", name="user_id" onchange="assign_lead(${row.party_id})">
                  </select>`;
                }
            },

            
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
// Document Ready
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
        initializeSelectize('user_id', {
                placeholder: "Select Sales Executive"
            }, "<?= base_url(route_to('user_list_api')) ?>", {user_type:'sales_executive'}, "user_id", "user_name"
        );
    });
</script>

<!-- --------------main page end----------- -->