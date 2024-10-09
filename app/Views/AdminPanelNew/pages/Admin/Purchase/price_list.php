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
                <button class="btn btn-secondary text-white" type="button" data-bs-toggle="modal" data-bs-target="#importPriceList">
                    <i class="bx bx-import"></i> Import Price List
                </button>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <label for="item_brand_id">Brand</label>
                    <select name="item_brand_id" id="item_brand_id" multiple></select>
                </div>
            </div>
            <div class="table-responsive">
                <table id="item" class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle w-100"></table>
            </div>
        </div>
    </div>
</div>
<!-- Import Product Modal -->
<div class="modal fade" id="importPriceList" tabindex="-1" aria-labelledby="importPriceListLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPriceListLabel">Import Price List</h5>
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

<script>
    var sub_group_ids = JSON.parse('<?= get_user_data_access('item_sub_groups', true) ?>');
    var datatable_export = '<?= (check_menu_access('PRICE_LIST', 'export')) ?>';
    var datatable_print = '<?= (check_menu_access('PRICE_LIST', 'print')) ?>';
    var print_allowed = '<?= (check_menu_access('PRICE_LIST', 'print')) ?>';
    var parameter = {};
    parameter._autojoin = 'F';
    parameter._select = '*';
    parameter['_whereIn'] = [{
        "fieldname": "item_groups-item_group_id",
        "value": sub_group_ids
    }]

    function itemFormSuccessCallback(response) {
        if (response.status == 200 || response.status == 201) {
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
                title: "Item Name",
                data: "item_name",
                visible: true
            },
            {
                title: 'Brand',
                data: 'item_brand_name',
                visible: true,
            },
            {
                title: 'MOQ',
                data: 'item_min_order_qty',
                visible: true,
                exportable: false
            },
            {
                title: 'MPQ',
                data: 'item_min_order_pack_qty',
                visible: true,
                exportable: false,
            },
            {
                title: 'Uploader Name',
                data: 'price_list_upload_user_name',
                visible: true,
                exportable: false
            },
            {
                title: 'Uploaded Date',
                data: 'price_list_uploaded_date',
                visible: true,
                exportable: false
            },
            {
                title: 'PL Date',
                data: 'price_list_date',
                visible: true,
            },
            {
                title: 'PL Name',
                data: 'price_list_name',
                visible: true,
            },
            {
                title: 'PL Item Group',
                data: 'price_list_item_group',
                visible: true,
            },
            {
                title: 'PL Rate',
                data: 'price_list_rate',
                visible: true,
            },
            {
                title: 'PL MOQ',
                data: 'price_list_min_order_qty',
                visible: true,
            },
            {
                title: 'PL MPQ',
                data: 'price_list_min_order_pack_qty',
                visible: true,
            },
            {
                title: 'PL Supp Comments',
                data: 'price_list_supplier_comment',
                visible: true,
            },
            {
                title: 'PL Co Comments',
                data: 'price_list_comment',
                visible: true,
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

    function fetchTableData() {
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
            url: '<?= route_to('ImportPriceListByExcel') ?>',
            type: "POST",
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false,
            success: function(response) {
                fetchTableData();
                if (response.status === 200) {
                    toastr.success(response.message);
                    $('#md-close').click();
                } else if (response.status === 422) {
                    toastr.error(response.message);
                    $.each(response.errors[0], function(key, value) {
                        toastr.error(value);
                    });
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr, status, error) {
                toastr.error('An error occurred while importing the product.');
            }
        });
    });
    $(document).ready(function() {
        fetchTableData();
        initializeSelectize('item_brand_id', {
            placeholder: "Select Brand"
        }, apiUrl = "<?= base_url(route_to('item_brand_list_api')) ?>", {}, "item_brand_id", "item_brand_name").onchange(function(selected_brands) {
            parameter['_whereIn'] = parameter['_whereIn'].filter(function(condition) {
                return condition.fieldname !== "item_brands-item_brand_id";
            });
            parameter['_whereIn'] = [{
                "fieldname": "item_brands-item_brand_id",
                "value": selected_brands
            }]
            fetchTableData();
        })
    });
</script>
<!-- --------------main page end----------- -->