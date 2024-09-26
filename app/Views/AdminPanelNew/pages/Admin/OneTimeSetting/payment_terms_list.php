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
                <?php if (check_menu_access('PAYMENT_TERMS', 'create')): ?>
                    <button onclick="payment_terms_create_update()" class="btn add_form_btn" data-bs-toggle="offcanvas" data-bs-target="#right_floating_div" aria-controls="right_floating_div"><i class="bx bx-plus me-2"></i>Add Item</button>
                <?php endif; ?>
            </div>
            <div class="table-responsive">
                <table id="payment_terms" class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle"></table>
            </div>
        </div>
    </div>
</div>

<script>
    var datatable_export = '<?= (check_menu_access('PAYMENT_TERMS', 'export')) ?>';
    var datatable_print = '<?= (check_menu_access('PAYMENT_TERMS', 'print')) ?>';
    var print_allowed = '<?= (check_menu_access('PAYMENT_TERMS', 'print')) ?>';
    var DeleteApiUrl = "<?= base_url(route_to('payment_terms_delete_api')) ?>";

    function payment_term_delete(payment_term_id) {
        deleteRow({
                "payment_term_id": payment_term_id
            }).then((response) => {
                fetchTableData()
            })
            .catch((error) => {
                console.error("Deletion failed or cancelled:", error);
            });
    }

    function payment_term_view(payment_term_id) {
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to('payment_term_view_component')) ?>",
            data: {
                payment_term_id: payment_term_id
            },
            success: function(response) {
                $("#right_floating_div").html("");
                $("#right_floating_div").html(response);
            }
        });
    }

    function payment_term_create_update(payment_term_id = '') {
        var data = {};
        if (payment_term_id != '') {
            data.payment_term_id = payment_term_id
        }
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to('payment_term_create_update_component')) ?>",
            data: data,
            success: function(response) {
                $("#right_floating_div").html("");
                $("#right_floating_div").html(response);
            }
        });
    }

    function payment_termFormSuccessCallback(response) {
        if (response.status == 200 || response.status == 201) {
            $(".offcanvas button[data-bs-dismiss='offcanvas']").click();
            fetchTableData();
        }
    }

    function payment_termFormErrorCallback(response) {
        console.log(response);
    }

    function successDataTableCallbackFunction(response) {
        var columns = [{
                title: "ID",
                data: "payment_terms_id",
                visible: true
            },
            {
                title: "PAYMENT_TERMS CODE",
                data: "payment_terms_code",
                visible: true
            },
            {
                title: "PAYMENT_TERMS NAME",
                data: "payment_terms_name",
                visible: true
            },
            {
                title: 'PART NUMBER',
                data: 'payment_term_code',
                visible: true,
            },
            {
                title: 'Brand',
                data: 'payment_term_brand_name',
                visible: true,
            },
            {
                title: 'Category',
                data: 'payment_term_category_name',
                visible: true,
            },
            {
                title: 'Group',
                data: 'payment_term_group_name',
                visible: true,
            },
            {
                title: 'Sub Group',
                data: 'payment_term_sub_group_name',
                visible: true,
            },
            {
                title: 'HSN',
                data: 'payment_term_hsn_code',
                visible: true,
            },
            {
                title: 'GST %',
                data: 'payment_term_hsn_gst',
                visible: true,
            },
            {
                title: 'Description',
                data: 'payment_term_description',
                visible: true,
            },
            {
                title: 'Supplier Description',
                data: 'payment_term_supplier_description',
                visible: true,
            },
            {
                title: 'Nature',
                data: 'payment_term_nature',
                visible: true,
            },
            {
                title: 'mfg Type',
                data: 'payment_term_manufacturing_type',
                visible: true,
            },
            {
                title: 'Is Spare Part',
                data: 'payment_term_is_spare_part',
                visible: true,
            },
            {
                title: 'Is Expire',
                data: 'payment_term_is_expire',
                visible: true,
            },
            {
                title: 'MOQ',
                data: 'payment_term_min_order_qty',
                visible: true,
            },
            {
                title: 'MPQ',
                data: 'payment_term_min_order_pack_qty',
                visible: true,
            },
            {
                title: 'Length',
                data: 'payment_term_length_cms',
                visible: true,
            },
            {
                title: 'Width',
                data: 'payment_term_width_cms',
                visible: true,
            },
            {
                title: 'Height',
                data: 'payment_term_height_cms',
                visible: true,
            },
            {
                title: 'Weight',
                data: 'payment_term_weight_kg',
                visible: true,
            },
            {
                title: 'Drawing No',
                data: 'payment_term_drawing_no',
                visible: true,
            },
            {
                title: 'Remark',
                data: 'payment_term_remark',
                visible: true,
            },
            {
                title: 'UOM',
                data: 'payment_term_uqc_id',
                visible: true,
            },
            {
                title: 'PACK UOM',
                data: 'payment_term_pack_uqc_id',
                visible: true,
            },
            {
                title: 'PCK CVR',
                data: 'payment_term_pack_conversion',
                visible: true,
            },
            {
                title: 'Created By',
                data: 'user_name',
                visible: true,
            },
            {
                title: 'payment_term_box_image',
                data: 'payment_term_box_image',
                visible: true,
                render: function(data, type, row) {
                    return `<img src="<?= base_url() ?>${data}" style="height:50px;width:auto;" onclick="enlargeImage(event)">`;
                }
            },
            {
                title: 'payment_term_image',
                data: 'payment_term_image',
                visible: true,
                render: function(data, type, row) {
                    return `<img src="<?= base_url() ?>${data}" style="height:50px;width:auto;" onclick="enlargeImage(event)">`;
                }
            },
            {
                title: 'Is Active',
                data: 'payment_term_is_active',
                visible: true,
            },
            {
                title: 'QC Link',
                data: 'payment_term_quality_check_link',
                visible: true,
            },
            {
                title: 'Inspection Required',
                data: 'payment_term_inspection_required',
                visible: true,
            },
            {
                "title": "Actions",
                "data": null,
                "render": function(data, type, row) {
                    return `
                            <button class="text-white btn btn-sm btn-info" onclick="payment_terms_view(${row.payment_term_id})" data-bs-toggle="offcanvas" data-bs-target="#right_floating_div" aria-controls="right_floating_div">
                                <i class="fa fa-eye"></i>
                            </button>
                            <?php if (check_menu_access('PAYMENT_TERMS', 'edit')): ?>
                                <button type="button" onclick="payment_terms_create_update('${row.payment_term_id}')" data-bs-toggle="offcanvas" data-bs-target="#right_floating_div" aria-controls="right_floating_div" class="text-white btn btn-sm btn-success">
                                    <i class="bx bx-edit-alt"></i>
                                </button>
                            <?php endif; ?>
                            <?php if (check_menu_access('PAYMENT_TERMS', 'delete')): ?>
                                <button class="text-white btn btn-sm btn-danger" onclick="payment_terms_delete(${row.payment_term_id})">
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
            'payment_term', // table_id
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