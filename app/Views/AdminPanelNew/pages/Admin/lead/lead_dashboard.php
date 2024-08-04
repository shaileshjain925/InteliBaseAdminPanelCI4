<link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
    type="text/css" />

<div class="my-3 mt-1 ps-3 table_btn_div text-end">
    <a href="<?php echo base_url(route_to('lead_create_update_page'))?>">
        <button class="add_form_btn"><i class="bx bx-plus me-2"></i>Add Lead</button>
    </a>
    <a href="<?php echo base_url(route_to('lead_list_page'))?>">
        <button class="add_form_btn">All Leads</button>
    </a>
</div>
<div class="row">
    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="avatar-sm font-size-20 me-3">
                        <span class="avatar-title bg-soft-primary text-primary rounded">
                            <i class="mdi mdi-tag-plus-outline"></i>
                        </span>
                    </div>
                    <div class="flex-1">
                        <div class="font-size-16 mt-2">Total Leads</div>
                    </div>
                </div>
                <h4 class="mt-4">1000</h4>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar-sm font-size-20 me-3">
                        <span class="avatar-title bg-soft-primary text-primary rounded">
                            <i class="mdi mdi-account-multiple-outline"></i>
                        </span>
                    </div>
                    <div class="flex-1">
                        <div class="font-size-16 mt-2">Hot Leads</div>
                        <h4 class="mt-1">456</h4>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar-sm font-size-20 me-3">
                        <span class="avatar-title bg-soft-primary text-primary rounded">
                            <i class="mdi mdi-account-multiple-outline"></i>
                        </span>
                    </div>
                    <div class="flex-1">
                        <div class="font-size-16 mt-2">Cold Leads</div>
                        <h4 class="mt-1">456</h4>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar-sm font-size-20 me-3">
                        <span class="avatar-title bg-soft-primary text-primary rounded">
                            <i class="mdi mdi-account-multiple-outline"></i>
                        </span>
                    </div>
                    <div class="flex-1">
                        <div class="font-size-16 mt-2">Warm Leads</div>
                        <h4 class="mt-1">456</h4>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Lead Chart</h4>
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div id="lead-chart" class="apex-charts"></div>
                    </div>
                    <div class="col-sm-6">
                        <div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="py-1">
                                        <p class="mb-1 text-truncate"><i class="mdi mdi-circle dark_pink me-1"></i> Hot
                                        </p>
                                        <h5>$ 2,652</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="py-1">
                                        <p class="mb-1 text-truncate"><i class="mdi mdi-circle yellow me-1"></i>
                                            Cold</p>
                                        <h5>$ 2,284</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="py-1">
                                        <p class="mb-1 text-truncate"><i class="mdi mdi-circle light_green me-1"></i>
                                            Warm</p>
                                        <h5>$ 1,753</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="py-1">
                                        <p class="mb-1 text-truncate"><i class="mdi mdi-circle blue me-1"></i>
                                            Lost</p>
                                        <h5>$ 1,753</h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="py-1">
                                        <p class="mb-1 text-truncate"><i class="mdi mdi-circle purple me-1"></i>
                                            Win</p>
                                        <h5>$ 1,753</h5>
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
<!-- end row -->

<div class="row">
    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar-sm font-size-20 me-3">
                        <span class="avatar-title bg-soft-primary text-primary rounded">
                            <i class="mdi mdi-account-multiple-outline"></i>
                        </span>
                    </div>
                    <div class="flex-1">
                        <div class="font-size-16 mt-2">Lost Leads</div>
                        <h4 class="mt-1">456</h4>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="avatar-sm font-size-20 me-3">
                        <span class="avatar-title bg-soft-primary text-primary rounded">
                            <i class="mdi mdi-account-multiple-outline"></i>
                        </span>
                    </div>
                    <div class="flex-1">
                        <div class="font-size-16 mt-2">Win Leads</div>
                        <h4 class="mt-1">456</h4>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-9">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mb-4">Latest Leads</h4>
                    <a href="<?php echo base_url(route_to('lead_list_page'))?>">
                        <button class="btn add_form_btn">All Leads</button>
                    </a>
                </div>
                <!-- latest only 5 leads show -->
                <div class="table-responsive">
                    <table class="table table-centered">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col" colspan="2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>15/01/2020</td>
                                <td>Alok Tripathi</td>
                                <td>alok@gmail.com</td>
                                <td>123456789</td>
                                <td><span class="badge badge-soft-success font-size-12">Hot</span>
                                </td>
                            </tr>
                            <tr>
                                <td>15/01/2020</td>
                                <td>Alok Tripathi</td>
                                <td>alok@gmail.com</td>
                                <td>123456789</td>
                                <td><span class="badge bg-danger-subtle text-danger font-size-12">Lost</span>
                                </td>
                            </tr>
                            <tr>
                                <td>15/01/2020</td>
                                <td>Alok Tripathi</td>
                                <td>alok@gmail.com</td>
                                <td>123456789</td>
                                <td><span class="badge badge-soft-success font-size-12">Hot</span>
                                </td>
                            </tr>
                            <tr>
                                <td>15/01/2020</td>
                                <td>Alok Tripathi</td>
                                <td>alok@gmail.com</td>
                                <td>123456789</td>
                                <td><span class="badge bg-warning-subtle text-warning font-size-12">Warm</span>
                                </td>
                            </tr>
                            <tr>
                                <td>15/01/2020</td>
                                <td>Alok Tripathi</td>
                                <td>alok@gmail.com</td>
                                <td>123456789</td>
                                <td><span class="badge badge-cold font-size-12">Cold</span>
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

<script>
// donut chart

var options = {
    series: [25, 15, 10, 35, 15],
    chart: {
        height: 245,
        type: 'donut',
    },
    labels: ["Hot", "Cold", "Warm", "Lost", "Win"],
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
    colors: ['#3b5de7', '#45cb85', '#eeb902', '#e91e63', '#673ab7'],

};

var chart = new ApexCharts(document.querySelector("#lead-chart"), options);
chart.render();
</script>