<!-- jquery.vectormap css -->
<link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
    type="text/css" />

<div class="d-flex justify-content-between align-items-center">
    <h5 class="mb-0 ps-3">Inventory</h5>
    <div class="my-3 mt-1 ps-3 table_btn_div">
        <a href="<?php echo base_url(route_to('media_create_update_page'))?>">
            <button class="add_form_btn"><i class="bx bx-plus me-2"></i>Add Media</button>
        </a>
        <a href="<?php echo base_url(route_to('media_list_page'))?>">
            <button class="add_form_btn">All Media</button>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Overview</h4>

                <div>
                    <div class="pb-3 border-bottom">
                        <div class="row align-items-center">
                            <p class="mb-2">Total Media</p>
                            <h4 class="mb-0">1524</h4>
                        </div>
                    </div>
                    <div class="py-3 border-bottom">
                        <div class="row align-items-center">
                            <p class="mb-2">Available Media</p>
                            <h4 class="mb-0">24</h4>
                        </div>
                    </div>
                    <div class="py-3 border-bottom">
                        <div class="row align-items-center">
                            <p class="mb-2">Booked Media</p>
                            <h4 class="mb-0">1500</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Top Profitable Media</h4>
                <div id="media-profit-chart" class="apex-charts"></div>
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
        data: [10, 24, 17, 49, 27, 16, 28, 15, 25, 20, 40, 50],
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
        categories: ['media1', 'media2', 'media3', 'media4', 'Sati Gate', 'Clear Channel', 'Front Gate', 'media5',
            'media6', 'media7', 'media8', 'media9'
        ],
        title: {
            text: 'Media'
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

var chart = new ApexCharts(document.querySelector("#media-profit-chart"), options);
chart.render();
</script>
