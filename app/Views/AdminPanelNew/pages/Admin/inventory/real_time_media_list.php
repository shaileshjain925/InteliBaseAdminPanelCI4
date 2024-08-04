<!-- -----------main page start----------- -->
<div class="offcanvas offcanvas-end  vendor-offcanvas extra_lg_form_width" tabindex="-1" id="right_floting_div">
</div>

<div class="row new_table_div col-md-12">
    <div class="card">
        <div class="card-body p-2">
            <div class="d-flex justify-content-between mb-2">
                <div class="offcanvas-body">
                    <div class="row align-items-center">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">From Date</label>
                            <p class="new_form_p">Please Select Date</p>
                            <input type="date" class="form-control" placeholder="" value="Prime" />
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">To Date </label>
                            <p class="new_form_p">Please Select Date</p>
                            <input type="date" class="form-control" placeholder="" value="Madhya Pradesh" />
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Status <span class="red_color">*</span></label>
                            <p class="new_form_p">Please Select Media Status</p>
                            <div class="">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Available</option>
                                    <option>Booked</option>
                                    <option>Block Media</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <a href="<?= base_url(route_to('admin_dashboard_page')) ?>"><i
                            class="fas fa-home home_icn me-3"></i></a>
                    <img onclick="()" src="<?php echo base_url('AdminPanelNew/assets/images/refresh.png') ?>"
                        height="20" class="me-3">
                    <a href="<?= @$_previous_path ?>">
                        <button class="btn export_btn me-3" type="button"><i class="fas fa-backward"></i></button>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="table"
                    class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Campaign Name</th>
                            <th>Media Type</th>
                            <th>Media Name</th>
                            <th>From Date</th>
                            <th>To Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Holiday Travel</td>
                            <td>Billboard</td>
                            <td>Clear Channel Outdoor</td>
                            <td>12-04-2024</td>
                            <td>12-05-2024</td>
                            <td>
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
        url: "<?= base_url(route_to('media_view_component')) ?>",
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script>
lightbox.option({
    'resizeDuration': 200,
    'wrapAround': true,
    'albumLabel': "Image %1 of %2"
})
</script>
<!-- --------------main page end----------- -->