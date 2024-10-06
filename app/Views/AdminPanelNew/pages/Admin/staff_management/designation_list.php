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
                <?php if (check_menu_access('DESIGNATIONS', 'create')): ?>
                    <button onclick="OpenCreateUpdateDesignationInSweetAlert('', onSuccess, onFail)" class="btn add_form_btn"><i class="bx bx-plus me-2"></i>Add Designation</button>
                <?php endif; ?>
            </div>
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle w-100"></table>
            </div>
        </div>
    </div>
</div>
<script>
    var datatable_export = '<?= (check_menu_access('DESIGNATIONS', 'export')) ?>';
    var datatable_print = '<?= (check_menu_access('DESIGNATIONS', 'print')) ?>';
    var print_allowed = '<?= (check_menu_access('DESIGNATIONS', 'print')) ?>';
    var DeleteApiUrl = "<?= base_url(route_to('designation_delete_api')) ?>"

    function OpenCreateUpdateDesignationInSweetAlert(designation_name = '', onSuccess, onFail, designation_id = '') {
        Swal.fire({
            title: designation_id ? 'Update Designation' : 'Create Designation',
            html: `
            <form id="designationForm" class="mb-3">
                <div class="mb-3">
                    <label for="designation_name" class="form-label">Designation Name</label>
                    <input type="text" class="form-control" id="designation_name" value="${designation_name}" required>
                </div>
                <input type="hidden" id="designation_id" value="${designation_id}">
            </form>
        `,
            showCancelButton: true,
            confirmButtonText: designation_id ? 'Update' : 'Create',
            preConfirm: () => {
                const designation_name = document.getElementById('designation_name').value;
                if (!designation_name) return Swal.showValidationMessage('Enter designation name');
                return {
                    designation_name,
                    designation_id: document.getElementById('designation_id').value
                };
            }
        }).then((result) => {
            if (result.isConfirmed) onSuccess(result.value);
            else if (result.dismiss === Swal.DismissReason.cancel) onFail();
        });
    }

    function designation_delete(designation_id) {
        deleteRow({
                "designation_id": designation_id
            }).then((response) => {
                fetchData()
            })
            .catch((error) => {
                console.error("Deletion failed or cancelled:", error);
            });
    }


    function dataTableSuccessCallBack(response) {
        var columns = [{
                title: "Designation name",
                data: "designation_name",
                visible: true,
            },
            {
                "title": "Actions",
                "data": null,
                "render": function(data, type, row) {
                    return `
                    
                        <?php if (check_menu_access('DESIGNATIONS', 'edit')): ?>
                            <button class="text-white btn btn-sm btn-success" onclick="OpenCreateUpdateDesignationInSweetAlert('${row.designation_name}', onSuccess, onFail, '${row.designation_id}')">
                                <i class="bx bx-edit-alt"></i>
                            </button>
                        <?php endif; ?>
                        <?php if (check_menu_access('DESIGNATIONS', 'delete')): ?>
                            <button class="text-white btn btn-sm btn-danger" onclick="designation_delete(${row.designation_id})">
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

    function fetchData() {
        DataTableInitialized('table', '<?= base_url(route_to('designation_list_api')) ?>', "POST", filter, dataTableSuccessCallBack, {})
    }

    function onSuccess(data) {
        var designation_create_update_api_url = data.designation_id ?
            "<?= base_url(route_to('designation_update_api')) ?>" :
            "<?= base_url(route_to('designation_create_api')) ?>";
        debugger;
        if (!data.designation_id) {
            data = {
                "designation_name": data.designation_name
            };
        }

        $.ajax({
            type: "POST",
            url: designation_create_update_api_url,
            data: data, // Assuming data is a plain object, jQuery will handle serialization
            success: function(response) {
                if (response.status === 200 || response.status === 201) {
                    toastr.success(response.message);
                } else {
                    if (response.status == 422) {
                        $.each(response.errors, function(key, value) {
                            toastr.error(value);
                        });
                    } else {
                        toastr.error(response.message);
                    }
                }
                fetchData();
            },
            error: function(xhr, status, error) {
                toastr.error("An error occurred: " + error);
            }
        });
    }


    function onFail(data) {
        console.log(data);
    }
    $(document).ready(function() {
        fetchData()
    });
</script>
<!-- --------------main page end----------- -->