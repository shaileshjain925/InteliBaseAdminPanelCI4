<!-- -----------main page start----------- -->
<div class="row new_table_div col-md-12">
    <div class="card">
        <div class="card-body p-2">
            <div class="d-flex justify-content-end align-items-center mb-2">
                <a href="<?= base_url(route_to('admin_dashboard_page')) ?>"><i
                        class="fas fa-home home_icn me-3"></i></a>
                        
                        <img onclick="fetchTableData()" src="<?php echo base_url('AdminPanelNew/assets/images/refresh.png') ?>" height="20" class="me-3">
                        <a href="<?= @$_previous_path ?>">
                    
                    <button class="btn export_btn me-3" type="button"><i class="fas fa-backward"></i></button>
                </a>
                <a href="<?= base_url(route_to('terms_create_update_page')) ?>">
                    <button class="btn add_form_btn"><i class="bx bx-plus me-2"></i>Add Terms</button>
                </a>
            </div>
            <div class="table-responsive">
                <table id="table_list"
                    class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle">
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var DeleteApiUrl = "<?= base_url(route_to('vouchar_terms_and_condition_delete_api')) ?>"

function errorCallback(response) {
    console.log(response);
}

function deleteCoupon(terms_condition_id) {
    deleteRow({
            "terms_condition_id": terms_condition_id
        }).then((response) => {
            fetchTableData({});
        })
        .catch((error) => {
            console.error("Deletion failed or cancelled:", error);
        });
}

function deleteRecord(terms_condition_id) {
        deleteRow({
            terms_condition_id: terms_condition_id
        }).then((response) => {
            fetchTableData();
        }).catch((error) => {
            console.log(error);
        });
    }

function successDataTableCallbackFunction(response) {
    var columns = [
        {
            title: "ID",
            data: "terms_condition_id",
            visible: true
        },
        {
            title: "Terms Type",
            data: "v_type",
            visible: true
        },
        {
            title: "Content",
            data: "terms_condition",
            "render": function(data, type, row) {
                return `
                        <pre>${data}</pre>
                `;
            }
        },
        {
            "title": "Actions",
            "data": null,
            "render": function(data, type, row) {
                return `
                        <a href="<?= base_url(route_to('terms_create_update_page')) ?>/${row.terms_condition_id}" class="btn btn-sm btn-info">
                            <i class="bx bx-edit-alt"></i>
                        </a>
                        <button class="btn btn-sm btn-danger" onclick="deleteRecord(${row.terms_condition_id })">
                            <i class="bx bx-trash-alt"></i>
                        </button>
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
        DataTableInitialized(
            'table_list', // table_id
            "<?= base_url(route_to('vouchar_terms_and_condition_list_api')) ?>", // url
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


