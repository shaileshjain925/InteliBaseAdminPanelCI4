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
            <div class="">
                <table id="table"
                    class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Campaign Name</th>
                            <th>Total</th>
                            <th>Receive Amount</th>
                            <th>Due Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Holiday Travel Special 2024</td>
                            <td>40,000</td>
                            <td>20,000</td>
                            <td>20,000</td>
                            <td>
                                <a type="button" class="btn edit_btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" title="Edit">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a class="mx-2" title="Campaign Invoice"
                                    href="<?= base_url(route_to('campaign_invoice_page')) ?>">
                                    <img src="<?php echo base_url('AdminPanelNew/assets/images/invoice.jpg')?>"
                                        height="25">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>School Admission Special 2024</td>
                            <td>40,000</td>
                            <td>20,000</td>
                            <td>20,000</td>
                            <td>
                                <a type="button" class="btn edit_btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" title="Edit">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a class="mx-2" title="Campaign Invoice"
                                    href="<?= base_url(route_to('campaign_invoice_page')) ?>">
                                    <img src="<?php echo base_url('AdminPanelNew/assets/images/invoice.jpg')?>"
                                        height="25">
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Holiday Travel Special 2024 Payment Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle">
                    <thead>
                        <tr>
                            <th>Amount Receive</th>
                            <th>Receive Date</th>
                            <th>Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>50,000</td>
                            <td>12-04-2024</td>
                            <td>FIrst Installment</td>
                        </tr>
                        <tr>
                            <td>50,000</td>
                            <td>12-04-2024</td>
                            <td>FIrst Installment</td>
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
        url: "<?= base_url(route_to('client_view_component')) ?>",
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