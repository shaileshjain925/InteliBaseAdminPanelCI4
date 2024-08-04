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
            <div class="table-responsive">
                <table id="table"
                    class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Invoice Number</th>
                            <th>Invoice Date</th>
                            <th>Campaign Name</th>
                            <th>Client Name</th>
                            <th>Media QTY</th>
                            <th>Payable Amt.</th>
                            <th>Receive Amt.</th>
                            <th>Due Amt.</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>123456</td>
                            <td>12-042024</td>
                            <td>Holiday Travel Special 2024 </td>
                            <td>Rajiv Sharma</td>
                            <td>5</td>
                            <td>80,000</td>
                            <td>40,000</td>
                            <td>40,000</td>
                            <td>
                                <a href="<?= base_url(route_to('campaign_payment_list_page'))?>"
                                    class="btn edit_btn edit" title="View Invoice Payment">
                                    <img src="<?php echo base_url('AdminPanelNew/assets/images/payment.png')?>" height="30">
                                </a>
                                <a class="mx-2" title="Payment Detail"
                                    href="<?= base_url(route_to('campaign_invoice_page'))?>">
                                    <img src="<?php echo base_url('AdminPanelNew/assets/images/invoice.jpg')?>" height="25">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>123456</td>
                            <td>12-042024</td>
                            <td>Holiday Travel Special 2024 </td>
                            <td>Rajiv Sharma</td>
                            <td>5</td>
                            <td>80,000</td>
                            <td>40,000</td>
                            <td>40,000</td>
                            <td>
                                <a href="<?= base_url(route_to('campaign_payment_list_page'))?>"
                                    class="btn edit_btn edit" title="View Invoice Payment">
                                    <img src="<?php echo base_url('AdminPanelNew/assets/images/payment.png')?>" height="30">
                                </a>
                                <a class="mx-2" title="Payment Detail"
                                    href="<?= base_url(route_to('campaign_invoice_page'))?>">
                                    <img src="<?php echo base_url('AdminPanelNew/assets/images/invoice.jpg')?>" height="25">
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

<!-- --------------main page end----------- -->