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
                <a href="<?= base_url(route_to('campaign_create_update_page')) ?>">
                    <button class="btn add_form_btn"><i class="bx bx-plus me-2"></i>Add Campaign</button>
                </a>
            </div>
            <div class="table-responsive">
                <table id="table"
                    class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle">
                    <thead>
                        <tr>
                            <th>Campaign ID</th>
                            <th>Campaign Name</th>
                            <th>Quotation Id</th>
                            <th>Client Name</th>
                            <th>Media QTY</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1223</td>
                            <td>Holiday Travel Special 2024</td>
                            <td>QU123</td>
                            <td>Rajiv Sharma</td>
                            <td>5</td>
                            <td>50,000</td>
                            <td>
                                <?php if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')): ?>
                                <a class="btn edit_btn" title="Edit"
                                    href="<?= base_url(route_to('campaign_create_update_page')) ?>">
                                    <i class="bx bx-edit-alt"></i>
                                </a>
                                <a class="mx-2" title="Payment Detail"
                                    href="<?= base_url(route_to('campaign_payment_list_page')) ?>">
                                    <img src="<?php echo base_url('AdminPanelNew/assets/images/payment.png')?>"
                                        height="25">
                                </a>
                                <a class="mx-2" title="Campaign Invoice"
                                    href="<?= base_url(route_to('campaign_invoice_page')) ?>">
                                    <img src="<?php echo base_url('AdminPanelNew/assets/images/invoice.jpg')?>"
                                        height="25">
                                </a>
                                <?php endif; ?>
                                <a title="PPT" href="<?= base_url(route_to('campaign_ppt_page')) ?>">
                                    <button class="btn edit_btn edit"> <i class="fas fa-file-powerpoint"></i></button>
                                </a>
                                <a title="Excel" href="<?= base_url(route_to('quotation_excel_page')) ?>">
                                    <button class="btn edit_btn edit"> <i class="fas fa-file-excel"></i></button>
                                </a>
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