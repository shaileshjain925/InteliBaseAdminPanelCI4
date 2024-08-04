<style>
.table-striped>tbody>tr:nth-of-type(odd)>* {
    box-shadow: inset 0 0 0 9999px rgb(252 255 245);
}

.agency-service-content .btn-group,
.agency-service-content .dataTables_info,
.agency-service-content .dataTables_paginate,
.agency-service-content .dataTables_filter {
    display: none;
}
</style>
<div class="d-flex justify-content-end align-items-center mb-2">
    <a href="<?= base_url(route_to('admin_dashboard_page')) ?>"><i class="fas fa-home home_icn me-3"></i></a>
    <a href="<?= @$_previous_path ?>">
        <button class="btn export_btn me-3" type="button"><i class="fas fa-backward"></i></button>
    </a>
</div>
<div class="invoice_wrap ageuuncy1" id="table-product-list">
    <div class="invoice-container p-0">
        <div class="invoice-content-wrap" id="download_section">
            <div class="row new_quotation">
                <div class="row  mt-2">
                    <div class="col-md-1"><img src="<?php echo base_url('AdminPanelNew/assets/images/logo2.jpg') ?>"
                            height="20">
                    </div>
                    <div class="col-md-10">
                        <h2 class="text-center my-3">Holiday Travel Special 2024 Invoice</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="newQuotation_info">
                        <p>To,</p>
                        <p class="fw-bold">THE ULTRA OUTDOOR PRIVATE LIMITED</p>
                        <p>Address: 1st floor, 18, Shanku Marg, above SBI Bank SME Branch, Freeganj,
                            Madhav Nagar, Ujjain, Madhya Pradesh 456010</p>
                        <p>Mobile: 123456789</p>
                        <p>Email: outdoor@gmail.com</p>
                    </div>
                </div>
                <div class="col-md-6 newQuotationOther_infor minus_mt">
                    <div class="row">
                        <div class="col-1 p-0">Date</div>
                        <div class="col-3 fw-bold">: 21-04-2024</div>
                        <div class="col-3">Invoice No</div>
                        <div class="col-5 fw-bold">: DCA/OH/07-23/P15963</div>
                    </div>
                    <div class="invoice_border_left mt-2">
                        <div class="newQuotation_info ps-2">
                            <h5>Client Details</h5>
                            <p>To,</p>
                            <p class="fw-bold">THE CLIENT FIRM PRIVATE LIMITED</p>
                            <p>Address: 1st floor, 18, Shanku Marg, above SBI Bank SME Branch, Freeganj,
                                Madhav Nagar, Ujjain, Madhya Pradesh 456010</p>
                            <p>Mobile: 123456789</p>
                            <p>Email: client@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--Header end Here -->
            <!--Invoice content start here -->
            <section class="agency-service-content" id="agency_service">
                <div class="container">
                    <!--Invoice table data start here -->
                    <div class="table-responsive pt-32">
                        <table id="datatable-buttons"
                            class="table table-striped table-bordered nowrap  table-nowrap align-middle  dt-responsive">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Code</th>
                                    <th>State</th>
                                    <th>District</th>
                                    <th>City</th>
                                    <th>Media</th>
                                    <th>Illumination</th>
                                    <th class="max_width_50">Media Name</th>
                                    <th>Size</th>
                                    <th>Days</th>
                                    <th>Rental</th>
                                    <th>Mounting</th>
                                    <th>Printing</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Out123</td>
                                    <td>M.P.</td>
                                    <td>Indore</td>
                                    <td>Indore</td>
                                    <td>Billboard</td>
                                    <td>Backlit</td>
                                    <td class="max_width_50">Near Bus Stand</td>
                                    <td>40x40</td>
                                    <td>30</td>
                                    <td>1000</td>
                                    <td>1000</td>
                                    <td>1000</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Out123</td>
                                    <td>M.P.</td>
                                    <td>Ujjain</td>
                                    <td>Ujjain</td>
                                    <td>Billboard</td>
                                    <td>Backlit</td>
                                    <td class="max_width_50">Sati Gate</td>
                                    <td>40x40</td>
                                    <td>30</td>
                                    <td>1000</td>
                                    <td>1000</td>
                                    <td>1000</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Out123</td>
                                    <td>M.P.</td>
                                    <td>Nagda</td>
                                    <td>Nagda</td>
                                    <td>Billboard</td>
                                    <td>Backlit</td>
                                    <td class="max_width_50">Chamunda Mata Temple Square</td>
                                    <td>40x40</td>
                                    <td>30</td>
                                    <td>1000</td>
                                    <td>1000</td>
                                    <td>1000</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Out123</td>
                                    <td>M.P.</td>
                                    <td>Nagda</td>
                                    <td>Nagda</td>
                                    <td>Billboard</td>
                                    <td>Backlit</td>
                                    <td class="max_width_50">Chamunda Mata Temple Square</td>
                                    <td>40x40</td>
                                    <td>30</td>
                                    <td>1000</td>
                                    <td>1000</td>
                                    <td>1000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--Invoice additional info start here -->
                    <div class="invo-addition-wrap pt-20">
                        <div class="invo-add-info-content">
                            <div class="newQuotation_TAC">
                                <h4>Terms And Conditioon :</h4>
                                <ul class="p-0">
                                    <li>1 All the above mentioned sites are subject to
                                        availability at the time of
                                        final
                                        booking/written confirmation.</li>
                                    <li>2 Formal Release order to be drawn in favor of
                                        ""Dreams Creation
                                        Advertising"".</li>
                                    <li>3 No mid term cancellation will be accepted.</li>
                                    <li>4 Flex displayed during the contractual period is
                                        entirely at your risk, no
                                        claim for loss or theft of the flex will be entertained by
                                        ""Dreams Creation
                                        Advertising"".</li>
                                    <li>5 Additional taxes shall be charged if levied by
                                        the govt. during the
                                        contractual period.</li>
                                    <li>6 GST On Display @ 18.00 % on Total Billing.</li>
                                    <li> 7 Display Artwork will be provided by the client.
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="invo-bill-total width-30">
                            <table class="invo-total-table">
                                <tbody>
                                    <tr>
                                        <td class="font-md color-light-black ">Sub Total:</td>
                                        <td class="font-md-grey color-grey text-right pr-10 "> ₹ 4000.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-md color-light-black ">Discount:</td>
                                        <td class="font-md-grey color-grey text-right pr-10 "> ₹ 900.00
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-md color-light-black ">Tax <span class="color-grey">(18%)</span>
                                        </td>
                                        <td class="font-md-grey color-grey text-right pr-10 "> ₹ 100.60
                                        </td>
                                    </tr>
                                    <tr class="invo-grand-total mt-3">
                                        <td class="font-18-700">Grand Total:</td>
                                        <td class="font-18-500 text-right pr-10 ">₹ 3000.60</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--Invoice additional info end here -->
                </div>
            </section>
            <!--Invoice content end here -->
        </div>
        <!--Bottom content start here -->
        <section class="agency-bottom-content d-print-none" id="agency_bottom">
            <!--Print-download content start here -->
            <div class="invo-buttons-wrap">
                <div class="invo-print-btn invo-btns">
                    <a href="javascript:window.print()" class="print-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_10_61)">
                                <path
                                    d="M17 17H19C19.5304 17 20.0391 16.7893 20.4142 16.4142C20.7893 16.0391 21 15.5304 21 15V11C21 10.4696 20.7893 9.96086 20.4142 9.58579C20.0391 9.21071 19.5304 9 19 9H5C4.46957 9 3.96086 9.21071 3.58579 9.58579C3.21071 9.96086 3 10.4696 3 11V15C3 15.5304 3.21071 16.0391 3.58579 16.4142C3.96086 16.7893 4.46957 17 5 17H7"
                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M17 9V5C17 4.46957 16.7893 3.96086 16.4142 3.58579C16.0391 3.21071 15.5304 3 15 3H9C8.46957 3 7.96086 3.21071 7.58579 3.58579C7.21071 3.96086 7 4.46957 7 5V9"
                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M7 15C7 14.4696 7.21071 13.9609 7.58579 13.5858C7.96086 13.2107 8.46957 13 9 13H15C15.5304 13 16.0391 13.2107 16.4142 13.5858C16.7893 13.9609 17 14.4696 17 15V19C17 19.5304 16.7893 20.0391 16.4142 20.4142C16.0391 20.7893 15.5304 21 15 21H9C8.46957 21 7.96086 20.7893 7.58579 20.4142C7.21071 20.0391 7 19.5304 7 19V15Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_10_61">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="inter-700 medium-font">Print</span>
                    </a>
                </div>
                <div class="invo-down-btn invo-btns">
                    <a class="download-btn" id="generatePDF">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_5_246)">
                                <path
                                    d="M4 17V19C4 19.5304 4.21071 20.0391 4.58579 20.4142C4.96086 20.7893 5.46957 21 6 21H18C18.5304 21 19.0391 20.7893 19.4142 20.4142C19.7893 20.0391 20 19.5304 20 19V17"
                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7 11L12 16L17 11" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M12 4V16" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_5_246">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="inter-700 medium-font">Download</span>
                    </a>
                </div>
            </div>
            <!--Print-download content end here -->
            <!--Note content start -->

            <!--Note content end -->
        </section>
        <!--Bottom content end here -->
    </div>
</div>

<script>
(function($) {
    'use strict';

    /*--------------------------------------------------------------
    ## Down Load Button Function
    ----------------------------------------------------------------*/
    $('#generatePDF').on('click', function() {
        var downloadSection = $('#download_section');
        var cWidth = downloadSection.width();
        var cHeight = downloadSection.height();
        var topLeftMargin = 0;
        var pdfWidth = cWidth + topLeftMargin * 2;
        var pdfHeight = pdfWidth * 1.5 + topLeftMargin * 2;
        var canvasImageWidth = cWidth;
        var canvasImageHeight = cHeight;
        var totalPDFPages = Math.ceil(cHeight / pdfHeight) - 1;

        html2canvas(downloadSection[0], {
            allowTaint: true
        }).then(function(
            canvas
        ) {
            canvas.getContext('2d');
            var imgData = canvas.toDataURL('image/jpeg', 1.0);
            var pdf = new jsPDF('p', 'pt', [pdfWidth, pdfHeight]);
            pdf.addImage(
                imgData,
                'JPG',
                topLeftMargin,
                topLeftMargin,
                canvasImageWidth,
                canvasImageHeight
            );
            for (var i = 1; i <= totalPDFPages; i++) {
                pdf.addPage(pdfWidth, pdfHeight);
                pdf.addImage(
                    imgData,
                    'JPG',
                    topLeftMargin,
                    -(pdfHeight * i) + topLeftMargin * 0,
                    canvasImageWidth,
                    canvasImageHeight
                );
            }
            pdf.save('digital-invoico.pdf');
        });
    });
})(jQuery); // End of use strict
</script>