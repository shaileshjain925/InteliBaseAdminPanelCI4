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
                <?php if (check_menu_access('ITEM_HSN', 'create')): ?>
                    <button onclick="OpenCreateUpdateItemHsnInSweetAlert('','','','', onSuccess, onFail)" class="btn add_form_btn"><i class="bx bx-plus me-2"></i>Add Item HSN</button>
                <?php endif; ?>
            </div>
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle w-100"></table>
            </div>
        </div>
    </div>
</div>
<script>
    var datatable_export = '<?= (check_menu_access('ITEM_HSN', 'export')) ?>';
    var datatable_print = '<?= (check_menu_access('ITEM_HSN', 'print')) ?>';
    var print_allowed = '<?= (check_menu_access('ITEM_HSN', 'print')) ?>';
    var DeleteApiUrl = "<?= base_url(route_to('item_hsn_delete_api')) ?>";

    function OpenCreateUpdateItemHsnInSweetAlert(item_hsn_type = '', item_hsn_code = '', item_hsn_description = '', item_hsn_gst = '', onSuccess, onFail, item_hsn_id = '') {
        Swal.fire({
            title: item_hsn_id ? 'Update Item HSN' : 'Create Item HSN',
            html: `
            <form id="item_hsnForm" class="mb-3">
                <input type="hidden" id="item_hsn_id" value="${item_hsn_id}">
                <div class="row">
                    <div class="col-4 mb-3">
                        <label for="item_hsn_type" class="form-label">HSN Type</label>
                        <select class="form-select" id="item_hsn_type" name="item_hsn_type" required>
                            <option value="" disabled ${!item_hsn_type ? 'selected' : '' }>Select HSN Type</option>
                            <option value="HSN" ${item_hsn_type==='HSN' ? 'selected' : '' }>HSN</option>
                            <option value="SAC" ${item_hsn_type==='SAC' ? 'selected' : '' }>SAC</option>
                        </select>
                    </div>
                    <div class="col-4 mb-3">
                        <label for="item_hsn_code" class="form-label">HSN Code</label>
                        <input type="text" class="form-control" id="item_hsn_code" value="${item_hsn_code}" required>
                    </div>
                    <div class="col-4 mb-3">
                        <label for="item_hsn_gst" class="form-label">GST %</label>
                        <select class="form-select" id="item_hsn_gst" name="item_hsn_gst" required>
                            <option value="" disabled ${!item_hsn_gst ? 'selected' : '' }>Select GST %</option>
                            <option value="0.00" ${item_hsn_gst==='0.00' ? 'selected' : '' }>0.00 %</option>
                            <option value="0.10" ${item_hsn_gst==='0.10' ? 'selected' : '' }>0.10 %</option>
                            <option value="0.25" ${item_hsn_gst==='0.25' ? 'selected' : '' }>0.25 %</option>
                            <option value="1.00" ${item_hsn_gst==='1.00' ? 'selected' : '' }>1.00 %</option>
                            <option value="1.50" ${item_hsn_gst==='1.50' ? 'selected' : '' }>1.50 %</option>
                            <option value="3.00" ${item_hsn_gst==='3.00' ? 'selected' : '' }>3.00 %</option>
                            <option value="5.00" ${item_hsn_gst==='5.00' ? 'selected' : '' }>5.00 %</option>
                            <option value="6.00" ${item_hsn_gst==='6.00' ? 'selected' : '' }>6.00 %</option>
                            <option value="7.50" ${item_hsn_gst==='7.50' ? 'selected' : '' }>7.50 %</option>
                            <option value="12.00" ${item_hsn_gst==='12.00' ? 'selected' : '' }>12.00 %</option>
                            <option value="18.00" ${item_hsn_gst==='18.00' ? 'selected' : '' }>18.00 %</option>
                            <option value="28.00" ${item_hsn_gst==='28.00' ? 'selected' : '' }>28.00 %</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="item_hsn_description" class="form-label">HSN Description</label>
                        <input type="text" class="form-control" id="item_hsn_description" value="${item_hsn_description}">
                    </div>
                </div>
            </form>
        `,
            showCancelButton: true,
            confirmButtonText: item_hsn_id ? 'Update' : 'Create',
            preConfirm: () => {
                const item_hsn_type = document.getElementById('item_hsn_type').value;
                const item_hsn_code = document.getElementById('item_hsn_code').value;
                const item_hsn_description = document.getElementById('item_hsn_description').value;
                const item_hsn_gst = document.getElementById('item_hsn_gst').value;
                const item_hsn_id = document.getElementById('item_hsn_id').value;

                // Validation
                if (!item_hsn_type) {
                    Swal.showValidationMessage('Select HSN Type');
                    return false;
                }
                if (!item_hsn_code) {
                    Swal.showValidationMessage('Enter HSN Code');
                    return false;
                }
                if (!item_hsn_gst) {
                    Swal.showValidationMessage('Select GST %');
                    return false;
                }

                // Return the form data as an object
                return {
                    item_hsn_id,
                    item_hsn_type,
                    item_hsn_code,
                    item_hsn_description,
                    item_hsn_gst
                };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                onSuccess(result.value);
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                onFail();
            }
        });
    }


    function item_hsn_delete(item_hsn_id) {
        deleteRow({
                "item_hsn_id": item_hsn_id
            }).then((response) => {
                fetchData()
            })
            .catch((error) => {
                console.error("Deletion failed or cancelled:", error);
            });
    }


    function dataTableSuccessCallBack(response) {
        var columns = [{
                title: "Type",
                data: "item_hsn_type",
                visible: true,
            },
            {
                title: "HSN Code",
                data: "item_hsn_code",
                visible: true,
            },
            {
                title: "Description",
                data: "item_hsn_description",
                visible: true,
            },
            {
                title: "GST %",
                data: "item_hsn_gst",
                visible: true,
            },
            {
                "title": "Actions",
                "data": null,
                "render": function(data, type, row) {
                    return `
                    <?php if (check_menu_access('ITEM_HSN', 'edit')): ?>
                            <button class="text-white btn btn-sm btn-success" onclick="OpenCreateUpdateItemHsnInSweetAlert('${row.item_hsn_type}','${row.item_hsn_code}','${row.item_hsn_description}','${row.item_hsn_gst}', onSuccess, onFail, '${row.item_hsn_id}')">
                                <i class="bx bx-edit-alt"></i>
                            </button>
                    <?php endif; ?>
                    <?php if (check_menu_access('ITEM_HSN', 'delete')): ?>
                            <button class="text-white btn btn-sm btn-danger" onclick="item_hsn_delete(${row.item_hsn_id})">
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
        DataTableInitialized('table', '<?= base_url(route_to('item_hsn_list_api')) ?>', "POST", filter, dataTableSuccessCallBack, {})
    }

    function onSuccess(data) {
        var item_hsn_create_update_api_url = data.item_hsn_id ?
            "<?= base_url(route_to('item_hsn_update_api')) ?>" :
            "<?= base_url(route_to('item_hsn_create_api')) ?>";
        // if (!data.item_hsn_id) {
        //     data = {
        //         "item_hsn_code": data.item_hsn_code
        //     };
        // }

        $.ajax({
            type: "POST",
            url: item_hsn_create_update_api_url,
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