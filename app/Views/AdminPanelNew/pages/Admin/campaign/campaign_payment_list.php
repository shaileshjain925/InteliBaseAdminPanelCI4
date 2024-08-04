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
            </div>
            <div class="d-flex justify-content-between">
                <div class="ps-2">
                    <label>Total Amount</label>
                    <span class="fw-bold"> ₹ 50,000</span>
                </div>
                <div class="d-flex">
                    <div type="button" class="btn export_btn me-2">Remind Client</div>
                    <div type="button" class="add_form_btn" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="table"
                    class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Receive Amount</th>
                            <th>Receive Date</th>
                            <th>Payment Entry Date</th>
                            <th>Payment Mode</th>
                            <th>Due</th>
                            <th>Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>20,000</td>
                            <td>12-04-2024</td>
                            <td>12-04-2024</td>
                            <td>Cash</td>
                            <td>30,000</td>
                            <td>Advance</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>20,000</td>
                            <td>15-04-2024</td>
                            <td>15-04-2024</td>
                            <td>Cash</td>
                            <td>10,000</td>
                            <td>First Installment</td>
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
        url: "<?= base_url(route_to('campaign_view_component')) ?>",
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
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="mb-3 col-md-6">
                        <label class="form-label">Receive Amount</label>
                        <p class="new_form_p">Please Add Receive Amount</p>
                        <input type="text" class="form-control" required placeholder="" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Receive Date</label>
                        <p class="new_form_p">Please Add Receive Date</p>
                        <input type="date" class="form-control" required placeholder="" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Remark</label>
                        <p class="new_form_p">Please Add Payment Remark</p>
                        <input type="text" class="form-control" required placeholder="" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label text-capitalize">Payment Mode</label>
                        <p class="new_form_p">Please Select Payment Mode</p>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Cash</option>
                            <option>Cheque</option>
                            <option>Online Payment</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button type="button" class="submit_btn">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- --------------main page end----------- -->