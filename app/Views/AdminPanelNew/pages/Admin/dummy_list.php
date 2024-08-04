<!-- -----------main page start----------- -->
<div class="offcanvas offcanvas-end  vendor-offcanvas" tabindex="-1" id="right_floting_div">
</div>

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
                <a href="<?= base_url(route_to('dummy_create_update_page')) ?>">
                    <button class="btn add_form_btn"><i class="bx bx-plus me-2"></i>Add Data</button>
                </a>
            </div>
            <div class="table-responsive">
                <table id="table"
                    class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle">
                    <thead>
                        <tr>
                            <th>SN.</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>12-04-2024</td>
                            <td>Aditya</td>
                            <td>adithya@gmail.com</td>
                            <td>123456789</td>
                            <td>Hot</td>
                            <td>
                                <a href="<?= base_url(route_to('dummy_create_update_page')) ?>"
                                    class="btn edit_btn edit" title="Edit">
                                    <i class="bx bx-edit-alt"></i>
                                </a>
                                <a onclick="view()" class="btn edit_btn edit" title="View" type="button"
                                    data-bs-toggle="offcanvas" data-bs-target="#right_floting_div"
                                    aria-controls="right_floting_div">
                                    <i class="far fa-eye"></i>
                                </a>
                                <button class="btn del_btn">
                                    <i class="bx bx-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
function view() {
    $.ajax({
        type: "post",
        url: "<?= base_url(route_to('dummy_view_component')) ?>",
        data: {},
        success: function(response) {
            $("#right_floting_div").html("");
            $("#right_floting_div").html(response);
        }
    });
}
// Document Ready
$(document).ready(function() {
    DataTableInitialized('table');
});
</script>
<!-- --------------main page end----------- -->