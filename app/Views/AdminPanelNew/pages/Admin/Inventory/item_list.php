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
                <?php endif; ?>
            </div>
            <div class="table-responsive">
                <table id="item" class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle"></table>
            </div>
        </div>
    </div>
</div>

<script>
    var datatable_export = '<?= (check_menu_access('ITEM', 'export')) ?>';
    var datatable_print = '<?= (check_menu_access('ITEM', 'print')) ?>';
    var print_allowed = '<?= (check_menu_access('ITEM', 'print')) ?>';

    function item_delete(item_id) {
        deleteRow({
                "item_id": item_id
            }).then((response) => {
                fetchData()
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
            placeholder: "Select sub_group"
        }, apiUrl = "<?= base_url(route_to('item_sub_group_list_api')) ?>", $sub_group_parameter, "item_sub_group_id", "item_sub_group_name", "", "item_group_name")
        hsn_parameter = {
            '_select': '*,CONCAT(item_hsn_code," (",item_hsn_gst,"%)") as hsn_code_with_gst',
        }
        initializeSelectize('item_hsn_id', {
            placeholder: "Select HSN / SAC"
        }, apiUrl = "<?= base_url(route_to('item_hsn_list_api')) ?>", hsn_parameter, "item_hsn_id", "hsn_code_with_gst", "")
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
            },
            {
                title: 'item_image',
                data: 'item_image',
                visible: true,
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
                                <button type="button" onclick="item_create_update('${row.item_id}')" class="text-white btn btn-sm btn-success">
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
    $(document).ready(function() {
        fetchTableData();
    });
</script>
<!-- --------------main page end----------- -->