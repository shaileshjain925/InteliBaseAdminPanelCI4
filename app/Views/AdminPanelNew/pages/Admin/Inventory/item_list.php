<style>
    .modal-fullsize {
        width: 100vw;
        /* Full viewport width */
        max-width: 100vw;
        /* No restriction on width */
        height: 100vh;
        /* Full viewport height */
        max-height: 100vh;
        /* No restriction on height */
        margin: 0;
        /* Remove default margins */
        padding: 0;
        /* Remove default padding */
    }

    .modal-fullsize>.modal-content {
        height: 100vh;
        /* Ensure the modal content fills the height */
        border-radius: 0;
        /* Remove rounded corners */
    }
</style>
<!-- -----------main page start----------- -->
<div class="offcanvas offcanvas-end  vendor-offcanvas" style="overflow: scroll; width:850px!important" tabindex="-1" id="right_floating_div">
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
                <?php if (check_menu_access('ITEM', 'create')): ?>
                    <button onclick="item_create_update()" class="btn add_form_btn" data-bs-toggle="offcanvas" data-bs-target="#right_floating_div" aria-controls="right_floating_div"><i class="bx bx-plus me-2"></i>Add Item</button>
                    <a href="<?= base_url(route_to('export_item_import_template')) ?>" class="btn btn-success"><i class="bx bx-plus me-2"></i>Export Item Import Template</a>
                    <button class="btn btn-secondary text-white" type="button" data-bs-toggle="modal" data-bs-target="#importItemList">
                        <i class="bx bx-import"></i> Import Product List
                    </button>
                    <button class="d-none" id="item_import_response_table_show_btn" type="button" data-bs-toggle="modal" data-bs-target="#importItemTableList"></button>
                <?php endif; ?>
            </div>
            <div class="table-responsive">
                <table id="item" class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle w-100"></table>
            </div>
        </div>
    </div>
</div>

<!-- Import Product Modal -->
<div class="modal fade" id="importItemList" tabindex="-1" aria-labelledby="importItemListLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importItemListLabel">Import Item</h5>
                <button id='md-close' type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id='enquiryImportCsv' name='importfile'>
                    <div class="mb-3">
                        <label for="productFile" class="form-label">Upload File</label>
                        <input class="form-control" type='file' name="csv" id="csvImportFile" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Import</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Item Import Response -->
<div class="modal fade" id="importItemTableList" tabindex="-1" aria-labelledby="importItemTableListLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullsize">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importItemTableListLabel">Item Import Response</h5>
                <button id='imm-close' type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="item_import_response_table" class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle w-100"></table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var datatable_export = '<?= (check_menu_access('ITEM', 'export')) ?>';
    var datatable_print = '<?= (check_menu_access('ITEM', 'print')) ?>';
    var print_allowed = '<?= (check_menu_access('ITEM', 'print')) ?>';
    var DeleteApiUrl = "<?= base_url(route_to('item_delete_api')) ?>";

    function item_delete(item_id) {
        deleteRow({
                "item_id": item_id
            }).then((response) => {
                fetchTableData()
            })
            .catch((error) => {
                console.error("Deletion failed or cancelled:", error);
            });
    }

    function item_view(item_id) {
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to('item_view_component')) ?>",
            data: {
                item_id: item_id
            },
            success: function(response) {
                $("#right_floating_div").html("");
                $("#right_floating_div").html(response);
            }
        });
    }

    function item_create_update(item_id = '') {
        var data = {};
        if (item_id != '') {
            data.item_id = item_id
        }
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to('item_create_update_component')) ?>",
            data: data,
            success: function(response) {
                $("#right_floating_div").html("");
                $("#right_floating_div").html(response);
                initializeSelectFields();
            }
        });
    }

    function initializeSelectFields() {
        initializeSelectize('item_uqc_id', {
            placeholder: "Select Base Unit"
        }, apiUrl = "<?= base_url(route_to('item_uqc_list_api')) ?>", {}, "item_uqc_id", "item_uqc_name")
        initializeSelectize('item_pack_uqc_id', {
            placeholder: "Select Pack Unit"
        }, apiUrl = "<?= base_url(route_to('item_uqc_list_api')) ?>", {}, "item_uqc_id", "item_uqc_name")
        initializeSelectize('item_brand_id', {
            placeholder: "Select Brand"
        }, apiUrl = "<?= base_url(route_to('item_brand_list_api')) ?>", {}, "item_brand_id", "item_brand_name")
        initializeSelectize('item_category_id', {
            placeholder: "Select Category"
        }, apiUrl = "<?= base_url(route_to('item_category_list_api')) ?>", {}, "item_category_id", "item_category_name")
        $sub_group_parameter = {
            '_autojoin': 'y',
            '_select': '*',
        };
        initializeSelectize('item_sub_group_id', {
            placeholder: "Select Sub Group"
        }, apiUrl = "<?= base_url(route_to('item_sub_group_list_api')) ?>", $sub_group_parameter, "item_sub_group_id", "item_sub_group_name", null, "item_group_name")
        hsn_parameter = {
            '_select': '*,CONCAT(item_hsn_code," (",item_hsn_gst,"%)") as hsn_code_with_gst',
        }
        initializeSelectize('item_hsn_id', {
            placeholder: "Select HSN / SAC"
        }, apiUrl = "<?= base_url(route_to('item_hsn_list_api')) ?>", hsn_parameter, "item_hsn_id", "hsn_code_with_gst")
        initializeSelectize('item_class', {
            placeholder: "Select Item Class"
        })
        initializeSelectize('item_nature', {
            placeholder: "Select Item Nature"
        })
        initializeSelectize('item_manufacturing_type', {
            placeholder: "Select Manufacturing Type"
        })
    }

    function itemFormSuccessCallback(response) {
        if (response.status == 200 || response.status == 201) {
            $(".offcanvas button[data-bs-dismiss='offcanvas']").click();
            fetchTableData();
        }
    }

    function itemFormErrorCallback(response) {
        console.log(response);
    }

    function successDataTableCallbackFunction(response) {
        var columns = [{
                title: "ID",
                data: "item_id",
                visible: true
            },
            {
                title: "ITEM NAME",
                data: "item_name",
                visible: true
            },
            {
                title: 'CLASS',
                data: 'item_class',
                visible: true,
            },
            {
                title: 'PART NUMBER',
                data: 'item_code',
                visible: true,
            },
            {
                title: 'Brand',
                data: 'item_brand_name',
                visible: true,
            },
            {
                title: 'Category',
                data: 'item_category_name',
                visible: true,
            },
            {
                title: 'Group',
                data: 'item_group_name',
                visible: true,
            },
            {
                title: 'Sub Group',
                data: 'item_sub_group_name',
                visible: true,
            },
            {
                title: 'HSN',
                data: 'item_hsn_code',
                visible: true,
            },
            {
                title: 'GST %',
                data: 'item_hsn_gst',
                visible: true,
            },
            {
                title: 'Description',
                data: 'item_description',
                visible: true,
            },
            {
                title: 'Supplier Description',
                data: 'item_supplier_description',
                visible: true,
            },
            {
                title: 'Nature',
                data: 'item_nature',
                visible: true,
            },
            {
                title: 'mfg Type',
                data: 'item_manufacturing_type',
                visible: true,
            },
            {
                title: 'Is Spare Part',
                data: 'item_is_spare_part',
                visible: true,
            },
            {
                title: 'Is Expire',
                data: 'item_is_expire',
                visible: true,
            },
            {
                title: 'MOQ',
                data: 'item_min_order_qty',
                visible: true,
            },
            {
                title: 'MPQ',
                data: 'item_min_order_pack_qty',
                visible: true,
            },
            {
                title: 'Length',
                data: 'item_length_cms',
                visible: true,
            },
            {
                title: 'Width',
                data: 'item_width_cms',
                visible: true,
            },
            {
                title: 'Height',
                data: 'item_height_cms',
                visible: true,
            },
            {
                title: 'Weight',
                data: 'item_weight_kg',
                visible: true,
            },
            {
                title: 'Drawing No',
                data: 'item_drawing_no',
                visible: true,
            },
            {
                title: 'Remark',
                data: 'item_remark',
                visible: true,
            },
            {
                title: 'UOM',
                data: 'item_uqc_id',
                visible: true,
            },
            {
                title: 'PACK UOM',
                data: 'item_pack_uqc_id',
                visible: true,
            },
            {
                title: 'PCK CVR',
                data: 'item_pack_conversion',
                visible: true,
            },
            {
                title: 'Created By',
                data: 'user_name',
                visible: true,
            },
            {
                title: 'item_box_image',
                data: 'item_box_image',
                visible: true,
                render: function(data, type, row) {
                    return `<img src="<?= base_url() ?>${data}" style="height:50px;width:auto;" onclick="enlargeImage(event)">`;
                }
            },
            {
                title: 'item_image',
                data: 'item_image',
                visible: true,
                render: function(data, type, row) {
                    return `<img src="<?= base_url() ?>${data}" style="height:50px;width:auto;" onclick="enlargeImage(event)">`;
                }
            },
            {
                title: 'Is Active',
                data: 'item_is_active',
                visible: true,
            },
            {
                title: 'QC Link',
                data: 'item_quality_check_link',
                visible: true,
            },
            {
                title: 'Inspection Required',
                data: 'item_inspection_required',
                visible: true,
            },
            {
                "title": "Actions",
                "data": null,
                "render": function(data, type, row) {
                    return `
                            <button class="text-white btn btn-sm btn-info" onclick="item_view(${row.item_id})" data-bs-toggle="offcanvas" data-bs-target="#right_floating_div" aria-controls="right_floating_div">
                                <i class="fa fa-eye"></i>
                            </button>
                            <?php if (check_menu_access('ITEM', 'edit')): ?>
                                <button type="button" onclick="item_create_update('${row.item_id}')" data-bs-toggle="offcanvas" data-bs-target="#right_floating_div" aria-controls="right_floating_div" class="text-white btn btn-sm btn-success">
                                    <i class="bx bx-edit-alt"></i>
                                </button>
                            <?php endif; ?>
                            <?php if (check_menu_access('ITEM', 'delete')): ?>
                                <button class="text-white btn btn-sm btn-danger" onclick="item_delete(${row.item_id})">
                                    <i class="bx bx-trash-alt"></i>
                                </button>
                            <?php endif; ?>
                        `;
                }
            }
        ];
        console.log(JSON.parse(response.data));
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
            'item', // table_id
            "<?= base_url(route_to('item_list_api')) ?>", // url
            'POST', // method
            parameter, // parameter
            successDataTableCallbackFunction // dataTableSuccessCallBack
        );
    }
    $("form[name='importfile']").on("submit", function(ev) {
        ev.preventDefault(); // Prevent the default form submission

        var formData = new FormData(this); // Create FormData from the form

        $.ajax({
            url: '<?= route_to('ImportItemListByExcel') ?>', // Your route to import items
            type: "POST",
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(response) {
                fetchTableData(); // Assuming this reloads the main table or does necessary post-import actions
                if (response.status === 200) {
                    toastr.success(response.message); // Show success notification
                } else {
                    toastr.error(response.message); // Show success notification
                }
                debugger;
                $('#md-close').click(); // Close the modal
                $('#item_import_response_table_show_btn').click(); // Show response table

                var item_import_response_table_columns = [{
                        title: "Row Number",
                        data: "row_number",
                        visible: true
                    },
                    {
                        title: "Item Name",
                        data: "item_name",
                        visible: true
                    },
                    {
                        title: "Response Message",
                        data: "response",
                        render: function(data, type, row) {
                            var temp_data = JSON.parse(data);
                            var response_message = temp_data.message;
                            return `${response_message}`;
                        }
                    },
                    {
                        title: "Response Errors",
                        data: "response",
                        render: function(data, type, row) {
                            // Parse the JSON string into an object
                            var temp_data = JSON.parse(data);
                            var response_errors = temp_data.errors; // Object {field_name: "error_message"}

                            // Check if response_errors is not empty
                            if (response_errors && Object.keys(response_errors).length > 0) {
                                // Create an array to hold error messages
                                var errorMessages = [];

                                // Loop through each error and format it
                                for (var field in response_errors) {
                                    if (response_errors.hasOwnProperty(field)) {
                                        errorMessages.push(`${field}: ${response_errors[field]}`);
                                    }
                                }

                                // Join the messages into a string with line breaks for better display
                                return errorMessages.join('<br>'); // Use <br> for line breaks in HTML
                            } else {
                                // Return a message indicating no errors
                                return 'No errors';
                            }
                        }
                    }
                ];

                // If response.data is already an object, no need to parse it
                var response_data = Array.isArray(response.data) ? response.data : JSON.parse(response.data);
                console.log(response_data)
                // Destroy existing DataTable if initialized, then reinitialize
                if ($.fn.DataTable.isDataTable('#item_import_response_table')) {
                    $('#item_import_response_table').DataTable().clear().destroy(); // Destroy if table is already initialized
                }
                var buttonsArray = ["colvis", "csv", "pdf", "print"];
                buttonsArray.push({
                    extend: "excel",
                    exportOptions: {
                        columns: function(idx, data, node) {
                            // Check if exportable key exists and if it's false
                            var columnSettings = dataTable.settings().init().columns[idx];
                            return (
                                !("exportable" in columnSettings) || columnSettings.exportable !== false
                            );
                        }
                    }
                });
                var dataTable = $("#item_import_response_table").DataTable({
                    data: response_data,
                    columns: item_import_response_table_columns,
                    dom: "Bfrtip",
                    buttons: buttonsArray,
                    initComplete: function() {
                        if (typeof afterTableViewCallbackFunction === "function") {
                            afterTableViewCallbackFunction(data);
                        }
                    },
                });
            },
            error: function(xhr, status, error) {
                toastr.error('An error occurred while importing the product.');
            }
        });

    });
    $(document).ready(function() {
        fetchTableData();
    });
</script>
<!-- --------------main page end----------- -->