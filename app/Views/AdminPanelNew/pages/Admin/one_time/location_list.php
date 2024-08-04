<!-- -----------main page start----------- -->
<div class="offcanvas offcanvas-end  vendor-offcanvas" tabindex="-1" id="right_floting_div">
</div>

<div class="row new_table_div col-md-12">
    <div class="card">
        <div class="card-body p-2">
            <div class="d-flex justify-content-end align-items-center mb-2">
                <a href="<?= base_url(route_to('admin_dashboard_page')) ?>"><i class="fas fa-home home_icn me-3"></i></a>


                <img onclick="fetchTableData()" src="<?php echo base_url('AdminPanelNew/assets/images/refresh.png') ?>" height="20" class="me-3">
                <a href="<?= @$_previous_path ?>">
                    <button class="btn export_btn me-3" type="button"><i class="fas fa-backward"></i></button>
                </a>
                <a href="<?= base_url(route_to('location_create_update_page')) ?>">
                    <button class="btn add_form_btn"><i class="bx bx-plus me-2"></i>Add Location</button>
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
    function view(location_id) {
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to('location_view_component')) ?>",
            data: {
                location_id: location_id
            },
            success: function(response) {
                $("#right_floting_div").html("");
                $("#right_floting_div").html(response);
            }
        });
    }
    var DeleteApiUrl = "<?= base_url(route_to('location_delete_api')) ?>"

    function deleteRecord(location_id) {
        deleteRow({
            location_id: location_id
        }).then((response) => {
            fetchTableData();
        }).catch((error) => {
            console.log(error);
        });
    }


    function successCallback(response) {
        if (response.status == 200 || response.status == 201) {
            $(".offcanvas button[data-bs-dismiss='offcanvas']").click();
            fetchTableData();
        }
    }

    function errorCallback(response) {
        console.log(response);
    }

    function successDataTableCallbackFunction(response) {
        var columns = [{
                title: "ID",
                data: "location_id",
                visible: false
            },
            {
                title: "Location_Name",
                data: "location_name"
            },
            {
                title: "City",
                data: "location_city_name"
            },
            {
                title: "Address",
                data: "address"
            },
            {
                title: "Latitude",
                data: "latitude"
            },
            {
                title: "Longitude",
                data: "longitude"
            },
            {
                title: "Location",
                data: "location_type_name"
            },
            {
                title: "Google Maps URL ",
                data: "google_map_link",
                visible: false
            },
          
            {
                "title": "Actions",
                "data": null,
                "render": function(data, type, row) {
                    return `
                   <a href="<?= base_url(route_to('location_create_update_page')) ?>/${row.location_id}" class="btn edit_btn edit" title="Edit">
                   <i class="bx bx-edit-alt"></i>
                   </a>
                    <a onclick="view(${row.location_id})" class="btn edit_btn edit" title="View" type="button" data-bs-toggle="offcanvas" data-bs-target="#right_floting_div" aria-controls="right_floting_div">
                    <i class="far fa-eye"></i>
                    </a>

                    <button onclick="deleteRecord(${row.location_id})" class="btn del_btn" title="Delete"><i class="bx bx-trash-alt"></i></button>
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
        parameter._autojoin = 'F';
        parameter._select = '*';
        DataTableInitialized(
            'table_list', // table_id
            "<?= base_url(route_to('location_list_api')) ?>", // url
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