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
                <?php if (check_menu_access('BUSINESSTYPE', 'create')): ?>
                    <button onclick="OpenCreateUpdateBusinessTypesInSweetAlert('', onSuccess, onFail)" class="btn add_form_btn"><i class="bx bx-plus me-2"></i>Add Business Type</button>
                <?php endif; ?>
            </div>
            <div class="table-responsive">
                <table id="business_table" class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle">

                </table>
            </div>
        </div>
    </div>
</div>
<script>
     var datatable_export = '<?= (check_menu_access('BUSINESSTYPE', 'export')) ?>';
    var datatable_print = '<?= (check_menu_access('BUSINESSTYPE', 'print')) ?>';
    var print_allowed = '<?= (check_menu_access('BUSINESSTYPE', 'print')) ?>';
    var DeleteApiUrl = "<?= base_url(route_to('business_types_delete_api')) ?>"

    function OpenCreateUpdateBusinessTypesInSweetAlert(business_type_name = '', onSuccess, onFail, business_type_id = '') {
        Swal.fire({
            title: business_type_id ? 'Update Business Type' : 'Create Business Type',
            html: `
            <form id="business_typesForm" class="mb-3">
                <div class="mb-3">
                    <label for="business_type_name" class="form-label">Business Type Name</label>
                    <input type="text" class="form-control" id="business_type_name" value="${business_type_name}" required>
                </div>
                <input type="hidden" id="business_type_id" value="${business_type_id}">
            </form>
        `,
            showCancelButton: true,
            confirmButtonText: business_type_id ? 'Update' : 'Create',
            preConfirm: () => {
                const business_type_name = document.getElementById('business_type_name').value;
                if (!business_type_name) return Swal.showValidationMessage('Enter business_types name');
                return {
                    business_type_name,
                    business_type_id: document.getElementById('business_type_id').value
                };
            }
        }).then((result) => {
            if (result.isConfirmed) onSuccess(result.value);
            else if (result.dismiss === Swal.DismissReason.cancel) onFail();
        });
    }

    function business_types_delete(business_type_id) {
        deleteRow({
                "business_type_id": business_type_id
            }).then((response) => {
                fetchData()
            })
            .catch((error) => {
                console.error("Deletion failed or cancelled:", error);
            });
    }


    function dataTableSuccessCallBack(response) {
        var columns = [{
                title: "Business Type Id",
                data: "business_type_id",
                visible: true,
            },
            {
                title: "Business Types name",
                data: "business_type_name",
                visible: true,
            },
            {
                "title": "Actions",
                "data": null,
                "render": function(data, type, row) {
                    return `
                    
                        <?php if (check_menu_access('BUSINESSTYPE', 'edit')): ?>
                            <button class="text-white btn btn-sm btn-success" onclick="OpenCreateUpdateBusinessTypesInSweetAlert('${row.business_type_name}', onSuccess, onFail, '${row.business_type_id}')">
                                <i class="bx bx-edit-alt"></i>
                            </button>
                         <?php endif; ?>
                         <?php if (check_menu_access('BUSINESSTYPE', 'delete')): ?>
                            <button class="text-white btn btn-sm btn-danger" onclick="business_types_delete(${row.business_type_id})">
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
        DataTableInitialized('business_table', '<?= base_url(route_to('business_types_list_api')) ?>', "POST", filter, dataTableSuccessCallBack, {})
    }

    function onSuccess(data) {
        var business_types_create_update_api_url = data.business_type_id ?
            "<?= base_url(route_to('business_types_update_api')) ?>" :
            "<?= base_url(route_to('business_types_create_api')) ?>";

        if (!data.business_type_id) {
            data = {
                "business_type_name": data.business_type_name
            };
        }

        $.ajax({
            type: "POST",
            url: business_types_create_update_api_url,
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