<!-- -----------main page start----------- -->
<div class="offcanvas offcanvas-end  vendor-offcanvas" tabindex="-1" id="right_floting_div">
</div>

<div class="row new_table_div col-md-12">
    <div class="card">
        <div class="card-body p-2">
            <div class="d-flex justify-content-end align-items-center mb-2">
                <a href="<?= base_url(route_to('admin_dashboard_page')) ?>"><i
                        class="fas fa-home home_icn me-3"></i></a>
                <img onclick="()" src="<?= base_url($_assets_path . 'assets/images/refresh.png') ?>" height="20"
                    class="me-3">
                <a href="<?= @$_previous_path ?>">
                    <button class="btn export_btn me-3" type="button"><i class="fas fa-backward"></i></button>
                </a>
                <a href="<?= base_url(route_to('staff_create_update_page')) ?>">
                    <button class="btn add_form_btn"><i class="bx bx-plus me-2"></i>Add Sales Executive</button>
                </a>
            </div>
            <div class="table-responsive">
                <table id="table"
                    class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle">
                    <thead>
                        <tr>
                            <th>SN.</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Total Leads</th>
                            <th>Win Leads</th>
                            <th>Hot Leads</th>
                            <th>Cold Leads</th>
                            <th>Warm Leads</th>
                            <th>Lost Leads</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Aditya</td>
                            <td>123456789</td>
                            <td>100</td>
                            <td>50</td>
                            <td>20</td>
                            <td>10</td>
                            <td>20</td>
                            <td>0</td>
                            <td>
                                <a href="<?= base_url(route_to('for_sales_excecutive_list_page')) ?>">
                                    <button type="button" class="btn">
                                        <img src="<?php echo base_url('AdminPanelNew/assets/images/working.png')?>"
                                            height="40">
                                    </button>
                                </a>
                                <?php if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')): ?>
                                <a href="<?= base_url(route_to('staff_create_update_page')) ?>"
                                    class="btn edit_btn edit" title="Edit">
                                    <i class="bx bx-edit-alt"></i>
                                </a>
                                <?php endif; ?>
                                <a onclick="view()" class="btn edit_btn edit" title="View" type="button"
                                    data-bs-toggle="offcanvas" data-bs-target="#right_floting_div"
                                    aria-controls="right_floting_div">
                                    <i class="far fa-eye"></i>
                                </a>
                                <?php if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin')): ?>
                                <button class="btn del_btn">
                                    <i class="bx bx-trash-alt"></i>
                                </button>
                                <?php endif; ?>
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
        url: "<?= base_url(route_to('staff_view_component')) ?>",
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Lead Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="lead_status_change">
                            <input class="me-2" type="radio" name="LeadStatus">
                            <label class="fw-bold mb-0">Hot</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="lead_status_change">
                            <input class="me-2" type="radio" name="LeadStatus">
                            <label class="fw-bold mb-0">Cold</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="lead_status_change">
                            <input class="me-2" type="radio" name="LeadStatus">
                            <label class="fw-bold mb-0">Warm</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="lead_status_change">
                            <input class="me-2" type="radio" name="LeadStatus">
                            <label class="fw-bold mb-0">Win</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="lead_status_change">
                            <input class="me-2" type="radio" name="LeadStatus">
                            <label class="fw-bold mb-0">Lost</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="submit_btn" data-bs-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- --------------main page end----------- -->