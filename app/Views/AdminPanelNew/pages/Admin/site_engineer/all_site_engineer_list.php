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
                <a href="<?= base_url(route_to('staff_create_update_page')) ?>">
                    <button class="btn add_form_btn"><i class="bx bx-plus me-2"></i>Add Site Engineer</button>
                </a>
            </div>
            <div class="table-responsive">
                <table id="table"
                    class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>City</th>
                            <th>Pincode</th>
                            <th>All Task</th>
                            <th>Pending Task</th>
                            <th>Completed Task</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Alok Tripathi</td>
                            <td>123456789</td>
                            <td>Ujjain</td>
                            <td>4560010</td>
                            <td>40</td>
                            <td class="pending_text">10</td>
                            <td class="complete_text">10</td>
                            <td>
                                <a href="<?= base_url(route_to('for_site_engineer_list_page')) ?>">
                                    <button type="button" class="btn">
                                        <img src="<?php echo base_url('AdminPanelNew/assets/images/working.png')?>"
                                            height="40">
                                    </button>
                                </a>
                                <a onclick="view()" class="btn edit_btn edit" title="View" type="button"
                                    data-bs-toggle="offcanvas" data-bs-target="#right_floting_div"
                                    aria-controls="right_floting_div">
                                    <i class="far fa-eye"></i>
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
function view() {
    $.ajax({
        type: "post",
        url: "<?= base_url(route_to('site_engineer_view_component')) ?>",
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
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alok Tripathi Work Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row align-items-center">
                    <div class="mb-3 col-md-3">
                        <p class="new_form_p">Please add a From Date</p>
                        <input type="date" class="form-control" required placeholder="" />
                    </div>
                    <div class="mb-3 col-md-3">
                        <p class="new_form_p">Please add a To Date</p>
                        <input type="date" class="form-control" required placeholder="" />
                    </div>
                </div>
                <table class="table  table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Campaign Name</th>
                            <th>Outdoor Media ID</th>
                            <th>Media Name</th>
                            <th>Location Name</th>
                            <th>Hoarding No.</th>
                            <th>Assign Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Campaign Name</td>
                            <td><a href="<?= base_url(route_to('media_list_page'))?>" target="_blank">OT123</a></td>
                            <td>Billboard</td>
                            <td>Chamunda Mata Temple Square</td>
                            <td>1</td>
                            <td>12-04-2024</td>
                            <td>
                                <p class="pending_text">Pending </p>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Campaign Name</td>
                            <td><a href="<?= base_url(route_to('media_list_page'))?>" target="_blank">OT123</a></td>
                            <td>Billboard</td>
                            <td>Chamunda Mata Temple Square</td>
                            <td>2</td>
                            <td>12-04-2024</td>
                            <td>
                                <p class="complete_text">Completed </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- --------------main page end----------- -->