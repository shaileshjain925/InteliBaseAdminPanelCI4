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
                <?php if (check_menu_access('ITEM_SUB_GROUP', 'create')): ?>
                    <a href="<?= base_url(route_to('item_sub_group_create_update_page')) ?>">
                        <button class="btn add_form_btn"><i class="bx bx-plus me-2"></i>Add Sub Group</button>
                    </a>
                <?php endif; ?>
            </div>
            <div class="table-responsive">
                <table id="group_table" class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle w-100"></table>
            </div>
        </div>
    </div>
</div>

<script>
    var datatable_export = '<?= (check_menu_access('ITEM_SUB_GROUP', 'export')) ?>';
    var datatable_print = '<?= (check_menu_access('ITEM_SUB_GROUP', 'print')) ?>';
    var print_allowed = '<?= (check_menu_access('ITEM_SUB_GROUP', 'print')) ?>';
    var DeleteApiUrl = "<?= base_url(route_to('item_sub_group_delete_api')) ?>"
    var group_ids = JSON.parse('<?= get_user_data_access('groups', true) ?>');

    function item_sub_group_delete(item_sub_group_id) {
        deleteRow({
                "item_sub_group_id": item_sub_group_id
            }).then((response) => {
                fetchTableData()
            })
            .catch((error) => {
                console.error("Deletion failed or cancelled:", error);
            });
    }

    function item_sub_group_view(item_sub_group_id) {
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to('item_sub_group_view_component')) ?>",
            data: {
                item_sub_group_id: item_sub_group_id
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
                data: "item_sub_group_id",

            },
            {
                title: "Sub Group Name",
                data: "item_sub_group_name"
            },
            {
                title: "Sub Group Code",
                data: "item_sub_group_code",
            },
            {
                title: "Group Description",
                data: "item_sub_group_description"
            },
            {
                title: "Image",
                data: "item_sub_group_image",
                "render": function(data, type, row) {
                    return `
                            <img id="item_sub_group_image_display" name="item_sub_group_image_display" onclick="enlargeImage(event)"
                                src="<?= base_url() ?>${data}" height="80">
                        `;
                }
            },
            {
                title: "Group Name",
                data: "item_group_name"
            },
            {
                title: "Group Code",
                data: "item_group_code",
                visible: false
            },
            {
                title: "<span title='Listed Overhead Percentage'>LOP</span>",
                data: "listed_overhead_percentage",
                visible: true,
                "render": function(data, type, row) {
                    return `${data}%`
                }
            },
            {
                title: "<span title='Listed Margin Percentage'>LMP</span>",
                data: "listed_margin_percentage",
                visible: true,
                "render": function(data, type, row) {
                    return `${data}%`
                }
            },
            {
                title: "<span title='NonListed Overhead Percentage'>NLOP</span>",
                data: "nonlisted_overhead_percentage",
                visible: true,
                "render": function(data, type, row) {
                    return `${data}%`
                }
            },
            {
                title: "<span title='NonListed Margin Percentage'>NLMP</span>",
                data: "nonlisted_margin_percentage",
                visible: true,
                "render": function(data, type, row) {
                    return `${data}%`
                }
            },
            {
                "title": "Actions",
                "data": null,
                "render": function(data, type, row) {
                    return `
                            <button class="text-white btn btn-sm btn-info" onclick="item_sub_group_view(${row.item_sub_group_id})" data-bs-toggle="offcanvas" data-bs-target="#right_floating_div" aria-controls="right_floating_div">
                                <i class="fa fa-eye"></i>
                            </button>
                            <?php if (check_menu_access('ITEM_SUB_GROUP', 'edit')): ?>
                                <a href="<?= base_url(route_to('item_sub_group_create_update_page')) ?>/${row.item_sub_group_id}" class="text-white btn btn-sm btn-success">
                                <i class="bx bx-edit-alt"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (check_menu_access('ITEM_SUB_GROUP', 'delete')): ?>
                                <button class="text-white btn btn-sm btn-danger" onclick="item_sub_group_delete(${row.item_sub_group_id})">
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
    filter._autojoin = "F";
    filter._select = "*";
    filter['_whereIn'] = [{
        "fieldname": "item_groups-item_group_id",
        "value": group_ids
    }]

    function fetchTableData() {
        DataTableInitialized(
            'group_table', // table_id
            "<?= base_url(route_to('item_sub_group_list_api')) ?>", // url
            'POST', // method
            filter, // parameter
            successDataTableCallbackFunction // dataTableSuccessCallBack
        );
    }
    $(document).ready(function() {
        fetchTableData();
    });
</script>
<!-- --------------main page end----------- -->