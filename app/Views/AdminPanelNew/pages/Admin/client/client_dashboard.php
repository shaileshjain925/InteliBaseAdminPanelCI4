<!-- jquery.vectormap css -->
<link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
    type="text/css" />


<div class="">
    <div class="my-3 ps-3 table_btn_div text-end">
        <a href="<?php echo base_url(route_to('client_create_update_page'))?>">
            <button class="add_form_btn"><i class="bx bx-plus me-2"></i>Add Client</button>
        </a>
        <a href="<?php echo base_url(route_to('client_list_page'))?>">
            <button class="add_form_btn"><i class="bx bx-plus me-2"></i>All Client</button>
        </a>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="avatar-sm font-size-20 me-3">
                                    <span class="avatar-title bg-soft-primary text-primary rounded">
                                        <i class="mdi mdi-tag-plus-outline"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <div class="font-size-16 mt-2">Total Clients</div>
                                </div>
                            </div>
                            <h4 class="mt-4">1000</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="avatar-sm font-size-20 me-3">
                                    <span class="avatar-title bg-soft-primary text-primary rounded">
                                        <i class="mdi mdi-tag-plus-outline"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <div class="font-size-16">Outstanding Payment</div>
                                </div>
                            </div>
                            <h4 class="mt-4">500</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="avatar-sm font-size-20 me-3">
                                    <span class="avatar-title bg-soft-primary text-primary rounded">
                                        <i class="mdi mdi-tag-plus-outline"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <div class="font-size-16 mt-2">Total Pyament Receive</div>
                                </div>
                            </div>
                            <h4 class="mt-4">5,00,000</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="avatar-sm font-size-20 me-3">
                                    <span class="avatar-title bg-soft-primary text-primary rounded">
                                        <i class="mdi mdi-tag-plus-outline"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <div class="font-size-16 mt-2">Total Pyament Due</div>
                                </div>
                            </div>
                            <h4 class="mt-4">2,00,000</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Monthly Revenue</h4>
                    <div id="Monthly-revenue-chart" class="apex-charts"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Profitable Clients</h4>
                    <!-- latest only 5 leads show -->
                    <div class="table-responsive">
                        <table class="table table-centered">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col" colspan="2">Business</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>15/01/2020</td>
                                    <td>Alok Tripathi</td>
                                    <td>alok@gmail.com</td>
                                    <td>123456789</td>
                                    <td><span class="profit">5,00,000</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>15/01/2020</td>
                                    <td>Alok Tripathi</td>
                                    <td>alok@gmail.com</td>
                                    <td>123456789</td>
                                    <td><span class="profit">5,00,000</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>15/01/2020</td>
                                    <td>Alok Tripathi</td>
                                    <td>alok@gmail.com</td>
                                    <td>123456789</td>
                                    <td><span class="profit">5,00,000</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>15/01/2020</td>
                                    <td>Alok Tripathi</td>
                                    <td>alok@gmail.com</td>
                                    <td>123456789</td>
                                    <td><span class="profit">5,00,000</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>15/01/2020</td>
                                    <td>Alok Tripathi</td>
                                    <td>alok@gmail.com</td>
                                    <td>123456789</td>
                                    <td><span class="profit">5,00,000</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        <ul class="pagination pagination-rounded justify-content-center mb-0">
                            <li class="page-item">
                                <a class="page-link" href="javascript: void(0);">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">1</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

</div>
<!-- End Page-content -->
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
        height: 270,
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

var chart = new ApexCharts(document.querySelector("#Monthly-revenue-chart"), options);
chart.render();
</script>