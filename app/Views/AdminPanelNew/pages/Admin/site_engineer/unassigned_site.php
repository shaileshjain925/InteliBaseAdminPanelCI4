<!-- -----------main page start----------- -->


<div class="row new_table_div col-md-12">
    <div class="card">
        <div class="card-body p-2">
            <div class="d-flex justify-content-end align-items-center mb-2">
                <a href="<?= base_url(route_to('admin_dashboard_page')) ?>"><i
                        class="fas fa-home home_icn me-3"></i></a>
                <img onclick="()" src="<?php echo base_url('AdminPanelNew/assets/images/refresh.png') ?>" height="20"
                    class="me-3">
                <a href="<?= @$_previous_path ?>">
                    <button class="btn export_btn me-3" type="button"><i class="fas fa-backward"></i></button>
                </a>
            </div>
            <div class="table-responsive">
                <table id="table"
                    class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Media Name</th>
                            <th>Work Date</th>
                            <th>Work Time</th>
                            <th>Purpose</th>
                            <th>Assign</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Clear Channel Door</td>
                            <td>12-04-2023</td>
                            <td>05:00 AM</td>
                            <td>Mounting</td>
                            <td>
                                <a href="<?= base_url(route_to('assign_site_list_page')) ?>">
                                    <button class="btn add_form_btn"><i class="bx bx-plus me-2"></i>Assign Site</button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
// Document Ready
$(document).ready(function() {
    DataTableInitialized('table');
});
</script>

<!-- --------------main page end----------- -->