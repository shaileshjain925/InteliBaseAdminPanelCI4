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
                <button onclick="OpenCreateUpdateRoleInSweetAlert('', onSuccess, onFail)" class="btn add_form_btn"><i class="bx bx-plus me-2"></i>Add Role</button>
            </div>
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle"></table>
            </div>
        </div>
    </div>
</div>
<script>
    var DeleteApiUrl = "<?= base_url(route_to('role_delete_api')) ?>"

    function OpenCreateUpdateRoleInSweetAlert(role_name = '', onSuccess, onFail, role_id = '') {
        Swal.fire({
            title: role_id ? 'Update Role' : 'Create Role',
            html: `
            <form id="roleForm">
                <label>Role Name</label>
                <input type="text" id="role_name" value="${role_name}" required>
                <input type="hidden" id="role_id" value="${role_id}">
            </form>
        `,
            showCancelButton: true,
            confirmButtonText: role_id ? 'Update' : 'Create',
            preConfirm: () => {
                const role_name = document.getElementById('role_name').value;
                if (!role_name) return Swal.showValidationMessage('Enter role name');
                return {
                    role_name,
                    role_id: document.getElementById('role_id').value
                };
            }
        }).then((result) => {
            if (result.isConfirmed) onSuccess(result.value);
            else if (result.dismiss === Swal.DismissReason.cancel) onFail();
        });
    }

    function role_delete(role_id) {
        deleteRow({
                "role_id": role_id
            }).then((response) => {
                fetchData()
            })
            .catch((error) => {
                console.error("Deletion failed or cancelled:", error);
            });
    }


    function dataTableSuccessCallBack(response) {
        var columns = [{
                title: "Role name",
                data: "role_name",
                visible: true,
            },
            {
                "title": "Rights",
                "data": null,
                "render": function(data, type, row) {
                    return `
                            <a href="<?=base_url(route_to('role_module_menus',''))?>${row.role_id}" class="text-white btn btn-sm btn-info">Role Module & Menu Access Rights</a>
                        `;
                }
            },
            {
                "title": "Actions",
                "data": null,
                "render": function(data, type, row) {
                    return `
                            <button class="text-white btn btn-sm btn-success" onclick="OpenCreateUpdateRoleInSweetAlert('${row.role_name}', onSuccess, onFail, '${row.role_id}')">
                                <i class="bx bx-edit-alt"></i>
                            </button>
                            <button class="text-white btn btn-sm btn-danger" onclick="role_delete(${row.role_id})">
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
    var filter = {}
    filter._autojoin = "Y";
    filter._select = "*";

    function fetchData() {
        DataTableInitialized('table', '<?= base_url(route_to('role_list_api')) ?>', "POST", filter, dataTableSuccessCallBack, {})
    }

    function onSuccess(data) {
        var role_create_update_api_url = data.role_id ?
            "<?= base_url(route_to('role_update_api')) ?>" :
            "<?= base_url(route_to('role_create_api')) ?>";
        debugger;
        if (!data.role_id) {
            data = {
                "role_name": data.role_name
            };
        }

        $.ajax({
            type: "POST",
            url: role_create_update_api_url,
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