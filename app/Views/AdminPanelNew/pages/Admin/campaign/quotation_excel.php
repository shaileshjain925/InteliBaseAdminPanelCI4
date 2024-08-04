<!--Invoice table data start here -->
<div class="row new_quotation">
    <div class="row  mt-2">
        <div class="col-md-10">
            <h2 class="text-center my-3">Holiday Travel Special 2024 Invoice</h2>
        </div>
    </div>

</div>
<div class="table-responsive pt-32">
    <table id="table" class="table table-striped table-bordered nowrap  table-nowrap align-middle  dt-responsive">
        <!-- <table class="table"> -->
        <thead>
            <tr>
                <th>SN</th>
                <th>Code</th>
                <th>State</th>
                <th>District</th>
                <th>City</th>
                <th>Location Name</th>
                <th>Media Type</th>
                <th class="max_width_50">Media Name</th>
                <th>Illumination</th>
                <th>Width</th>
                <th>Height</th>
                <th>Total Sq. Ft.</th>
                <th>Rental</th>
                <th>Mounting</th>
                <th>Printing</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Out123</td>
                <td>M.P.</td>
                <td>Ujjain</td>
                <td>Ujjain</td>
                <td>Chamunda Mata Mandir Square</td>
                <td>Billboard</td>
                <td>Clear Channel Outdoor</td>
                <td>Backlit</td>
                <td>400</td>
                <td>400</td>
                <td>1600</td>
                <td>1000</td>
                <td>1000</td>
                <td>1000</td>
                <td>4000</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Out123</td>
                <td>M.P.</td>
                <td>Ujjain</td>
                <td>Ujjain</td>
                <td>Chamunda Mata Mandir Square</td>
                <td>Billboard</td>
                <td>Clear Channel Outdoor</td>
                <td>Backlit</td>
                <td>400</td>
                <td>400</td>
                <td>1600</td>
                <td>1000</td>
                <td>1000</td>
                <td>1000</td>
                <td>4000</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Out123</td>
                <td>M.P.</td>
                <td>Ujjain</td>
                <td>Ujjain</td>
                <td>Chamunda Mata Mandir Square</td>
                <td>Billboard</td>
                <td>Clear Channel Outdoor</td>
                <td>Backlit</td>
                <td>400</td>
                <td>400</td>
                <td>1600</td>
                <td>1000</td>
                <td>1000</td>
                <td>1000</td>
                <td>4000</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Out123</td>
                <td>M.P.</td>
                <td>Ujjain</td>
                <td>Ujjain</td>
                <td>Chamunda Mata Mandir Square</td>
                <td>Billboard</td>
                <td>Clear Channel Outdoor</td>
                <td>Backlit</td>
                <td>400</td>
                <td>400</td>
                <td>1600</td>
                <td>1000</td>
                <td>1000</td>
                <td>1000</td>
                <td>4000</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td class="text-end" colspan="13">4000</td>
                <td>4000</td>
                <td>4000</td>
                <td>16000</td>
            </tr>
        </tfoot>
    </table>
</div>
<!--Invoice additional info start here -->
<!-- Plugins js -->
<script src="assets/libs/dropzone/min/dropzone.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>

<script>
// $(document).ready(function() {
//     $('#dwnldBtn').on('click', function() {
//         $("#datatable-buttons").table2excel({
//             filename: "employeeData.xls"
//         });
//     });
// });
// Document Ready
$(document).ready(function() {
    DataTableInitialized('table');
});
</script>