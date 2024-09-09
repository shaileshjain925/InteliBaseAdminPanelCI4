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
                <?php if (check_menu_access('ITEM_CATEGORY', 'create')): ?>
                    <button onclick="OpenCreateUpdateItemCategoryInSweetAlert('', onSuccess, onFail)" class="btn add_form_btn"><i class="bx bx-plus me-2"></i>Add Item Category</button>
                <?php endif; ?>
            </div>
            <div class="table-responsive">
                <table id="table" class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle"></table>
            </div>
        </div>
    </div>
</div>
<script>
    var datatable_export = '<?= (check_menu_access('ITEM_CATEGORY', 'export')) ?>';
    var datatable_print = '<?= (check_menu_access('ITEM_CATEGORY', 'print')) ?>';
    var print_allowed = '<?= (check_menu_access('ITEM_CATEGORY', 'print')) ?>';
    var DeleteApiUrl = "<?= base_url(route_to('item_category_delete_api')) ?>";

    function OpenCreateUpdateItemCategoryInSweetAlert(item_category_name = '', onSuccess, onFail, item_category_id = '') {
        Swal.fire({
            title: item_category_id ? 'Update item_category' : 'Create item_category',
            html: `
            <form id="item_categoryForm" class="mb-3">
                <div class="mb-3">
                    <label for="item_category_name" class="form-label">Item Category Name</label>
                    <input type="text" class="form-control" id="item_category_name" value="${item_category_name}" required>
                </div>
                <input type="hidden" id="item_category_id" value="${item_category_id}">
            </form>
        `,
            showCancelButton: true,
            confirmButtonText: item_category_id ? 'Update' : 'Create',
            preConfirm: () => {
                const item_category_name = document.getElementById('item_category_name').value;
                if (!item_category_name) return Swal.showValidationMessage('Enter item_category name');
                return {
                    item_category_name,
                    item_category_id: document.getElementById('item_category_id').value
                };
            }
        }).then((result) => {
            if (result.isConfirmed) onSuccess(result.value);
            else if (result.dismiss === Swal.DismissReason.cancel) onFail();
        });
    }

    function item_category_delete(item_category_id) {
        deleteRow({
                "item_category_id": item_category_id
            }).then((response) => {
                fetchData()
            })
            .catch((error) => {
                console.error("Deletion failed or cancelled:", error);
            });
    }


    function dataTableSuccessCallBack(response) {
        var columns = [{
                title: "Item Category name",
                data: "item_category_name",
                visible: true,
            },
            {
                "title": "Actions",
                "data": null,
                "render": function(data, type, row) {
                    return `
                    <?php if (check_menu_access('ITEM_CATEGORY', 'edit')): ?>
                            <button class="text-white btn btn-sm btn-success" onclick="OpenCreateUpdateItemCategoryInSweetAlert('${row.item_category_name}', onSuccess, onFail, '${row.item_category_id}')">
                                <i class="bx bx-edit-alt"></i>
                            </button>
                    <?php endif; ?>
                    <?php if (check_menu_access('ITEM_CATEGORY', 'delete')): ?>
                            <button class="text-white btn btn-sm btn-danger" onclick="item_category_delete(${row.item_category_id})">
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
        DataTableInitialized('table', '<?= base_url(route_to('item_category_list_api')) ?>', "POST", filter, dataTableSuccessCallBack, {})
    }

    function onSuccess(data) {
        var item_category_create_update_api_url = data.item_category_id ?
            "<?= base_url(route_to('item_category_update_api')) ?>" :
            "<?= base_url(route_to('item_category_create_api')) ?>";
        debugger;
        if (!data.item_category_id) {
            data = {
                "item_category_name": data.item_category_name
            };
        }

        $.ajax({
            type: "POST",
            url: item_category_create_update_api_url,
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