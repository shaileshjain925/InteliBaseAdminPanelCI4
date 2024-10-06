<!-- -----------main page start----------- -->
<div class="offcanvas offcanvas-end  vendor-offcanvas" tabindex="-1" id="right_floating_div">
</div>

<div class="row new_table_div col-md-12">
    <div class="card">
        <div class="card-body p-2">
            <div class="d-flex justify-content-end align-items-center mb-2">
                <a href="<?= base_url(route_to('default_dashboard_page')) ?>"><i class="fas fa-home home_icn me-3"></i></a>
                <img onclick="fetchTableData()" src="<?php echo base_url('AdminPanelNew/assets/images/refresh.png') ?>" height="20" class="me-3">
                <a href="<?= @$_previous_path ?>">
                    <button class="btn export_btn me-3" type="button"><i class="fas fa-backward"></i></button>
                </a>
                <?php if (check_menu_access('ITEM_GROUP', 'create')): ?>
                    <a href="<?= base_url(route_to('item_brand_create_update_page')) ?>">
                        <button class="btn add_form_btn"><i class="bx bx-plus me-2"></i>Add Item Brands</button>
                    </a>
                <?php endif; ?>
            </div>
            <div class="table-responsive">
                <table id="item_brand_table" class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle w-100"></table>
            </div>
        </div>
    </div>
</div>

<script>
    var datatable_export = '<?= (check_menu_access('ITEM_GROUP', 'export')) ?>';
    var datatable_print = '<?= (check_menu_access('ITEM_GROUP', 'print')) ?>';
    var print_allowed = '<?= (check_menu_access('ITEM_GROUP', 'print')) ?>';
    var DeleteApiUrl = "<?= base_url(route_to('item_brand_delete_api')) ?>";

    function item_brand_delete(item_brand_id) {
        deleteRow({
                "item_brand_id": item_brand_id
            }).then((response) => {
                fetchTableData()
            })
            .catch((error) => {
                console.error("Deletion failed or cancelled:", error);
            });
    }

    function item_brand_view(item_brand_id) {
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to('item_brand_view_component')) ?>",
            data: {
                item_brand_id: item_brand_id
            },
            success: function(response) {
                $("#right_floating_div").html("");
                $("#right_floating_div").html(response);
            }
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
                data: "item_brand_id",

            },
            {
                title: "Item Brand Name",
                data: "item_brand_name"
            },
            {
                title: "Description",
                data: "item_brand_description"
            },
            {
                title: "Image",
                data: "item_brand_image",
                "render": function(data, type, row) {
                    return `
                            <img id="item_brand_image_display" name="item_brand_image_display" onclick="enlargeImage(event)"
                                src="<?= base_url() ?>${data}" height="80">
                        `;
                }
            },
            {
                "title": "Actions",
                "data": null,
                "render": function(data, type, row) {
                    return `
                            <button class="text-white btn btn-sm btn-info" onclick="item_brand_view(${row.item_brand_id})" data-bs-toggle="offcanvas" data-bs-target="#right_floating_div" aria-controls="right_floating_div">
                                <i class="fa fa-eye"></i>
                            </button>
                            <?php if (check_menu_access('ITEM_GROUP', 'edit')): ?>
                                <a href="<?= base_url(route_to('item_brand_create_update_page')) ?>/${row.item_brand_id}" class="text-white btn btn-sm btn-success">
                                    <i class="bx bx-edit-alt"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (check_menu_access('ITEM_GROUP', 'delete')): ?>
                                <button class="text-white btn btn-sm btn-danger" onclick="item_brand_delete(${row.item_brand_id})">
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
        parameter._autojoin = 'F';
        parameter._select = '*';
        DataTableInitialized(
            'item_brand_table', // table_id
            "<?= base_url(route_to('item_brand_list_api')) ?>", // url
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