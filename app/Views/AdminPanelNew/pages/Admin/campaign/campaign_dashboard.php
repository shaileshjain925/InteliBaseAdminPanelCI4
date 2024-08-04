<head>

    <!-- jquery.vectormap css -->
    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
        type="text/css" />
    <div class="">

        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0 ps-3">Camapaign (FY 23-24)</h5>
            <div class="my-3 ps-3 table_btn_div">
                <a href="<?php echo base_url(route_to('campaign_create_update_page'))?>">
                    <button class="add_form_btn"><i class="bx bx-plus me-2"></i>Add Campaign</button>
                </a>
                <a href="<?php echo base_url(route_to('campaign_list_page'))?>">
                    <button class="add_form_btn">All Campaign</button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Yearly Overview</h4>
                        <div>
                            <div class="pb-3 border-bottom">
                                <div class="row align-items-center">
                                    <p class="mb-2">Campaign</p>
                                    <h4 class="mb-0">1524</h4>
                                </div>
                            </div>
                            <div class="py-2 border-bottom">
                                <div class="row align-items-center">
                                    <p class="mb-2">Total Revenue</p>
                                    <h4 class="mb-0">15,00,000</h4>
                                </div>
                            </div>
                            <div class="py-3 border-bottom">
                                <div class="row align-items-center">
                                    <p class="mb-2">Received Pyament</p>
                                    <h4 class="mb-0">5,00,000</h4>
                                </div>
                            </div>
                            <div class="pt-2 pb-3">
                                <div class="row align-items-center">
                                    <p class="mb-2">Due Payment </p>
                                    <h4 class="mb-0">10,00,000</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Monthly Overview</h4>
                        <div>
                            <div class="pb-3 border-bottom">
                                <div class="row align-items-center">
                                    <p class="mb-2">Campaign</p>
                                    <h4 class="mb-0">524</h4>
                                </div>
                            </div>
                            <div class="py-2 border-bottom">
                                <div class="row align-items-center">
                                    <p class="mb-2">Total Revenue</p>
                                    <h4 class="mb-0">5,00,000</h4>
                                </div>
                            </div>
                            <div class="py-3 border-bottom">
                                <div class="row align-items-center">
                                    <p class="mb-2">Received Pyament</p>
                                    <h4 class="mb-0">5,00,000</h4>
                                </div>
                            </div>
                            <div class="pt-2 pb-3">
                                <div class="row align-items-center">
                                    <p class="mb-2">Due Payment </p>
                                    <h4 class="mb-0">1,00,000</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Monthly Campaign</h4>
                        <div id="Monthly-campaign-chart" class="apex-charts"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="" style="    background: #fafbff; margin-top: 50px;">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 ps-3">Quotation</h5>
                <div class="my-3 ps-3 table_btn_div">
                    <a href="<?php echo base_url(route_to('quotation_create_update_page'))?>">
                        <button class="add_form_btn"><i class="bx bx-plus me-2"></i>Add Quotation</button>
                    </a>
                    <a href="<?php echo base_url(route_to('quotation_list_page'))?>">
                        <button class="add_form_btn"><i class="bx bx-plus me-2"></i>All Quotation</button>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Yearly Overview</h4>
                            <div>
                                <div class="pb-3 border-bottom">
                                    <div class="row align-items-center">
                                        <p class="mb-2">All Quotation</p>
                                        <h4 class="mb-0">1524</h4>
                                    </div>
                                </div>
                                <div class="py-3 border-bottom">
                                    <div class="row align-items-center">
                                        <p class="mb-2">Converted Quotation</p>
                                        <h4 class="mb-0">1000</h4>
                                    </div>
                                </div>
                                <div class="pt-4 pb-3">
                                    <div class="row align-items-center">
                                        <p class="mb-2">Lost Quotation</p>
                                        <h4 class="mb-0">524</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Monthly Overview</h4>
                            <div>
                                <div class="pb-3 border-bottom">
                                    <div class="row align-items-center">
                                        <p class="mb-2">All Quotation</p>
                                        <h4 class="mb-0">1524</h4>
                                    </div>
                                </div>
                                <div class="py-3 border-bottom">
                                    <div class="row align-items-center">
                                        <p class="mb-2">Converted Quotation</p>
                                        <h4 class="mb-0">1000</h4>
                                    </div>
                                </div>
                                <div class="pt-4 pb-3">
                                    <div class="row align-items-center">
                                        <p class="mb-2">Lost Quotation</p>
                                        <h4 class="mb-0">524</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Monthly Quotation</h4>
                            <div id="Monthly-quotation-chart" class="apex-charts"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page-content -->


    <!-- end container-fluid -->


    <!-- JAVASCRIPT -->

    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- jquery.vectormap map -->
    <script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

    <script src="assets/js/pages/dashboard.init.js"></script>

    <script src="assets/js/app.js"></script>
    <script>
    // line chart
    var options = {
        series: [{
                name: "2018",
                type: 'line',
                data: [20, 34, 27, 59, 37, 26, 38, 25, 25, 20, 40, 50],
            },
            {
                name: "2019",
                data: [10, 24, 17, 49, 27, 16, 28, 15, 25, 20, 40, 50],
                type: 'area',
            }
        ],
        chart: {
            height: 260,
            type: 'line',

            toolbar: {
                show: false
            },
            zoom: {
                enabled: false
            }
        },
        colors: ['#45cb85', '#3b5de7'],
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: 'smooth',
            width: '3',
            dashArray: [4, 0],
        },

        markers: {
            size: 3
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            title: {
                text: 'Month'
            }
        },

        fill: {
            type: 'solid',
            opacity: [1, 0.1],
        },

        legend: {
            position: 'top',
            horizontalAlign: 'right',
        }
    };

    var chart = new ApexCharts(document.querySelector("#Monthly-campaign-chart"), options);
    chart.render();
    </script>
    <script>
    // line chart
    var options = {
        series: [{
                name: "2018",
                type: 'line',
                data: [20, 34, 27, 59, 37, 26, 38, 25, 25, 20, 40, 50],
            },
            {
                name: "2019",
                data: [10, 24, 17, 49, 27, 16, 28, 15, 25, 20, 40, 50],
                type: 'area',
            }
        ],
        chart: {
            height: 260,
            type: 'line',

            toolbar: {
                show: false
            },
            zoom: {
                enabled: false
            }
        },
        colors: ['#45cb85', '#3b5de7'],
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: 'smooth',
            width: '3',
            dashArray: [4, 0],
        },

        markers: {
            size: 3
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            title: {
                text: 'Month'
            }
        },

        fill: {
            type: 'solid',
            opacity: [1, 0.1],
        },

        legend: {
            position: 'top',
            horizontalAlign: 'right',
        }
    };

    var chart = new ApexCharts(document.querySelector("#Monthly-quotation-chart"), options);
    chart.render();
    </script>
    </body>

    </html>