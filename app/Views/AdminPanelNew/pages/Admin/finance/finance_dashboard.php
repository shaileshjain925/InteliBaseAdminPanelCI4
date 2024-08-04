<!-- jquery.vectormap css -->
<link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
    type="text/css" />

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
                                <div class="" style="font-size:15px">All Campaign <br>(FY 23-24)</div>
                            </div>
                        </div>
                        <h4 class="mt-3">1200</h4>
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
                                <div class="font-size-16 mt-2">Client</div>
                            </div>
                        </div>
                        <h4 class="mt-3">500</h4>
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
                                <div class="font-size-16 mt-2">Vendor</div>
                            </div>
                        </div>
                        <h4 class="mt-3">100</h4>
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
                                <div class="font-size-16 mt-2">Revenue</div>
                            </div>
                        </div>
                        <h4 class="mt-3">20,00,000</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Percentage</h4>
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div id="finance-chart" class="apex-charts"></div>
                    </div>
                    <div class="col-sm-6">
                        <div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="py-1">
                                        <p class="mb-1 text-truncate"><i class="mdi mdi-circle dark_pink me-1"></i>
                                            Receive
                                        </p>
                                        <h5> 2,652</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="py-1">
                                        <p class="mb-1 text-truncate"><i class="mdi mdi-circle yellow me-1"></i>
                                            Due</p>
                                        <h5>2,284</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Daily Sales</h4>
                <div id="Daily-sales-chart" class="apex-charts"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-4">Today Sales (23-07-2024)</h4>
                    <a href="<?php echo base_url(route_to('media_list_page'))?>">
                        <button class="btn add_form_btn">All Media</button>
                    </a>
                </div>
                <!-- latest only 5 leads show -->
                <div class="table-responsive">
                    <table class="table table-centered">
                        <thead>
                            <tr>
                                <th scope="col">Media Type</th>
                                <th scope="col">Media Name</th>
                                <th scope="col">Location</th>
                                <th scope="col">Illumination</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Billboard</td>
                                <td>Clear Channel Outdoor</td>
                                <td>Sati Gate</td>
                                <td>Ambient Lit</td>
                            </tr>
                            <tr>
                                <td>Billboard</td>
                                <td>Clear Channel Outdoor</td>
                                <td>Sati Gate</td>
                                <td>Ambient Lit</td>
                            </tr>
                            <tr>
                                <td>Billboard</td>
                                <td>Clear Channel Outdoor</td>
                                <td>Sati Gate</td>
                                <td>Ambient Lit</td>
                            </tr>
                            <tr>
                                <td>Billboard</td>
                                <td>Clear Channel Outdoor</td>
                                <td>Sati Gate</td>
                                <td>Ambient Lit</td>
                            </tr>
                            <tr>
                                <td>Billboard</td>
                                <td>Clear Channel Outdoor</td>
                                <td>Sati Gate</td>
                                <td>Ambient Lit</td>
                            </tr>
                            <tr>
                                <td>Billboard</td>
                                <td>Clear Channel Outdoor</td>
                                <td>Sati Gate</td>
                                <td>Ambient Lit</td>
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

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Yearly Sales</h4>
                <div id="yearly-revenue-chart" class="apex-charts"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Monthly Sales</h4>
                <div id="Monthly-sales-chart" class="apex-charts"></div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end row -->
<script>
// line chart
var options = {
    series: [{
        name: "2019",
        data: [10, 24, 17, 49, 27, 16, 28, 50],
        type: 'line',
    }],
    chart: {
        height: 320,
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
        categories: ['2020', '2021', '2022', '2023', '2024', '2025', '2026', '2027'],
        title: {
            text: 'Year'
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

var chart = new ApexCharts(document.querySelector("#yearly-revenue-chart"), options);
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
        height: 300,
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

var chart = new ApexCharts(document.querySelector("#Monthly-sales-chart"), options);
chart.render();
</script>
<script>
// line chart
var options = {
    series: [{
        name: "2018",
        type: 'line',
        data: [20, 34, 27, 59, 37, 26, 38, 25, 25, 20, 40, 50],
    }, ],
    chart: {
        height: 300,
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
        categories: ['11-jan', '12-jan', '13-jan', '14-jan', '15-jan', '16-jan', '17-jan', '18-jan', '19-jan',
            '20-jan', '21-jan', '22-jan'
        ],
        title: {
            text: 'Day'
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

var chart = new ApexCharts(document.querySelector("#Daily-sales-chart"), options);
chart.render();
</script>
<script>
// donut chart

var options = {
    series: [35, 15],
    chart: {
        height: 245,
        type: 'donut',
    },
    labels: ["Receive", "Due"],
    plotOptions: {
        pie: {
            donut: {
                size: '25%'
            }
        }
    },
    legend: {
        show: false,
    },
    colors: ['#e91e63', '#eeb902'],

};

var chart = new ApexCharts(document.querySelector("#finance-chart"), options);
chart.render();
</script>