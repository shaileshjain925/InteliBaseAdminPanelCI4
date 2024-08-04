<!-- jquery.vectormap css -->
<link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
    type="text/css" />


<div class="">


    <div class="my-3 ps-3 table_btn_div">
        <a href="<?php echo base_url('add-new-vendor')?>">
            <button class="add_form_btn"><i class="bx bx-plus me-2"></i>Add Vendor</button>
        </a>
        <a href="<?php echo base_url('new-vendor')?>">
            <button class="add_form_btn"><i class="bx bx-plus me-2"></i>All Vendor</button>
        </a>
    </div>
    <div class="row">
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <p class="mb-2">All vendor</p>
                        <h4 class="mb-0">100</h4>
                    </div>
                    <div class="py-3 border-bottom">
                        <div class="row align-items-center">
                            <p class="mb-2">Total Pyament Receive</p>
                            <h4 class="mb-0">5,00,000</h4>
                        </div>
                    </div>
                    <div class="pt-3">
                        <div class="row align-items-center">
                            <p class="mb-2">Total Payment Due</p>
                            <h4 class="mb-0">2,00,000</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-2">Overview</h4>
                <div>
                    <div class="pb-3 border-bottom">
                        <div class="row align-items-center">
                            <p class="mb-2">New Vendor</p>
                            <h4 class="mb-0">24</h4>
                        </div>
                    </div>
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

var chart = new ApexCharts(document.querySelector("#Monthly-revenue-chart"), options);
chart.render();
</script>

</body>

</html>