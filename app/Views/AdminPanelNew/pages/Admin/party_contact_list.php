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
            </div>
            <div class="table-responsive">
                <table id="party_table" class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle w-100"></table>
            </div>
        </div>
    </div>
</div>

<script>
    var datatable_export = '<?= (check_menu_access('PARTY_CONTACT', 'export')) ?>';
    var datatable_print = '<?= (check_menu_access('PARTY_CONTACT', 'print')) ?>';
    var print_allowed = '<?= (check_menu_access('PARTY_CONTACT', 'print')) ?>';
    var parameter = {};
    parameter._autojoin = 'F';
    parameter._select = '*';
    <?php if (isset($party_id)): ?>
        parameter['party_contact-party_id'] = '<?= $party_id ?>';
    <?php endif; ?>

    function successDataTableCallbackFunction(response) {
        var columns = [{
                title: "Party Type",
                data: "party_type",
                visible: true
            },
            {
                title: "Party ID",
                data: "party_id",
                visible: true
            },
            {
                title: "Party Name",
                data: "party_name",
                visible: true
            },
            {
                title: 'Person Name',
                data: 'person_name',
                visible: true,
            },
            {
                title: 'Designation',
                data: 'person_designation',
                visible: true,
            },
            {
                title: 'Department',
                data: 'person_department',
                visible: true,
            },
            {
                title: 'ISD',
                data: 'person_isd',
                visible: true,
            },
            {
                title: 'Mobile Number',
                data: 'person_mobile_number',
                visible: true,
            },
            {
                title: 'Telephone Number',
                data: 'person_telephone_number',
                visible: true,
            },
            {
                title: 'Email',
                data: 'person_email_id',
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
            'party_table', // table_id
            "<?= base_url(route_to('party_contact_list_api')) ?>", // url
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