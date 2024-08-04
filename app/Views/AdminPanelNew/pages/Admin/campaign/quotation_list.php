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
                <a href="<?= base_url(route_to('quotation_create_update_page')) ?>">
                    <button class="btn add_form_btn"><i class="bx bx-plus me-2"></i>Add Quotation</button>
                </a>
            </div>
            <div class="table-responsive">
                <table id="table"
                    class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>ID</th>
                            <th>Client Name</th>
                            <th>Media</th>
                            <th>QTY</th>
                            <th>Quotation Date</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>QT123</td>
                            <td>Rajiv Sharma</td>
                            <td>Billboard</td>
                            <td>5</td>
                            <td>12-04-2024</td>
                            <td>4000</td>
                            <td>Accepted</td>
                            <td>
                                <a title="PDF" href="<?= base_url(route_to('quotation_view_page')) ?>">
                                    <button class="btn edit_btn edit"><i class="fas fa-file-pdf"></i></button>
                                </a>
                                <a title="PPT" href="<?= base_url(route_to('quotation_ppt_page')) ?>">
                                    <button class="btn edit_btn edit"> <i class="fas fa-file-powerpoint"></i></button>
                                </a>
                                <a title="Excel" href="<?= base_url(route_to('quotation_excel_page')) ?>">
                                    <button class="btn edit_btn edit"> <i class="fas fa-file-excel"></i></button>
                                </a>
                                <?php if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')): ?>
                                <a class="btn edit_btn" title="Edit"
                                    href="<?= base_url(route_to('quotation_create_update_page')) ?>">
                                    <i class="bx bx-edit-alt"></i>
                                </a>
                                <?php endif; ?>
                                <?php if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin')): ?>
                                <button class="btn del_btn">
                                    <i class="bx bx-trash-alt"></i>
                                </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>QT123</td>
                            <td>Rajiv Sharma</td>
                            <td>Billboard</td>
                            <td>5</td>
                            <td>12-04-2024</td>
                            <td>4000</td>
                            <td>Cancelled</td>
                            <td>
                                <a title="PDF" href="<?= base_url(route_to('quotation_view_page')) ?>">
                                    <button class="btn edit_btn edit"><i class="fas fa-file-pdf"></i></button>
                                </a>
                                <a title="PPT" href="<?= base_url(route_to('quotation_ppt_page')) ?>">
                                    <button class="btn edit_btn edit"> <i class="fas fa-file-powerpoint"></i></button>
                                </a>
                                <a title="Excel" href="<?= base_url(route_to('quotation_excel_page')) ?>">
                                    <button class="btn edit_btn edit"> <i class="fas fa-file-excel"></i></button>
                                </a>
                                <?php if(isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')): ?>
                                <a class="btn edit_btn" title="Edit"
                                    href="<?= base_url(route_to('quotation_create_update_page')) ?>">
                                    <i class="bx bx-edit-alt"></i>
                                </a>
                                <?php endif; ?>
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
// Document Ready
$(document).ready(function() {
    DataTableInitialized('table');
});
</script>

<!-- --------------main page end----------- -->