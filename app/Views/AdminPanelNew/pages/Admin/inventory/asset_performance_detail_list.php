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
                            <th>ID</th>
                            <th>Client Name</th>
                            <th>Campaign Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Client Payment</th>
                            <th>Media Charges</th>
                            <th>Printing Charges</th>
                            <th>Mounting Charges</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Rajiv Sharma</td>
                            <td>Holiday Travel Special 2024</td>
                            <td>12-04-2024</td>
                            <td>12-05-2024</td>
                            <td>80,000</td>
                            <td>10,000</td>
                            <td>10,000</td>
                            <td>10,000</td>
                        <tr>
                            <td>2</td>
                            <td>Rajiv Sharma</td>
                            <td>School Admission 2024</td>
                            <td>13-05-2024</td>
                            <td>13-06-2024</td>
                            <td>80,000</td>
                            <td>10,000</td>
                            <td>10,000</td>
                            <td>10,000</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Rajiv Sharma</td>
                            <td>School Admission 2024</td>
                            <td>14-06-2024</td>
                            <td>14-07-2024</td>
                            <td>80,000</td>
                            <td>10,000</td>
                            <td>10,000</td>
                            <td>10,000</td>
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