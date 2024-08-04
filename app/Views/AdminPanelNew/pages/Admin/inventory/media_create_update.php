<div class="offcanvas offcanvas-end  vendor-offcanvas" tabindex="-1" id="right_floting_div_location">
</div>

<div class="offcanvas offcanvas-end  vendor-offcanvas" tabindex="-1" id="right_floting_div_vendor">
</div>
<div class="p-3 form_bg offcanvas-body">
    <div class="error-message-box d-none">
        <p id="error-message"></p>
    </div>
    <div class="success-message-box d-none">
        <p id="success-message"></p>
    </div>
    <form id="form" method="post" enctype="multipart/form-data" class="custom-validation" action="<?= (isset($media_id) && !empty($media_id)) ? base_url(route_to('media_update_api')) : base_url(route_to('media_create_api')) ?>">
        <input type="hidden" id="media_id" name="media_id" value="<?= @$media_id ?>">
        <div class="offcanvas-header my-3">
            <div class="">
                <h5 id="Add_outdoor_mediaLabel">Basic Details</h5>
                <p class="new_form_p">Please fill the form to Basic Details</p>
            </div>
        </div>
        <div class="row ">

            <div class="mb-3 col-md-4">
                <label class="form-label">Media Name <span class="red_color">*</span></label>
                <p class="new_form_p">Please add Media Name</p>
                <input type="text" class="form-control" id="media_name" name="media_name"  value="<?= @$media_name ?>" placeholder="" />
                <span class="error-message" id="error-media_name"></span>
            </div>

            <div class="mb-3 col-md-4">
                <label class="form-label">Media Type <span class="red_color">*</span></label>
                <p class="new_form_p">Please Select Media Type</p>
                <div class="">
                    <select class="" aria-label="Default select example" id="media_type_id" name="media_type_id">
                    </select>
                    <span class="error-message" id="error-media_type_id"></span>
                </div>
            </div>

            <div class="mb-3 col-md-4">
                <label class="form-label">Illumination Type <span class="red_color">*</span></label>
                <p class="new_form_p">Please Select Illumination Type</p>
                <div class="">
                    <select class="" aria-label="Default select example" id="illumination_id" name="illumination_id">

                    </select>
                    <span class="error-message" id="error-illumination_id"></span>
                </div>
            </div>
            <div class="mb-3 col-md-4">
                <label class="form-label">Width <span class="red_color">*</span></label>
                <p class="new_form_p">Please add a Media Width</p>
                <input type="number" class="form-control" id="width" name="width"  value="<?= @$width ?>" placeholder="" />
                <span class="error-message" id="error-width"></span>
            </div>
            <div class="mb-3 col-md-4">
                <label class="form-label">Height <span class="red_color">*</span></label>
                <p class="new_form_p">Please add a Media Height</p>
                <input type="number" class="form-control" id="height" name="height"  value="<?= @$height ?>" placeholder="" />
                <span class="error-message" id="error-height"></span>
            </div>
            <div class="mb-3 col-md-4">
                <label class="form-label">Total Square Ft.<span class="red_color">*</span> </label>
                <p class="new_form_p">Automatically Appear</p>
                <input type="number" class="form-control" id="total_square_ft" name="total_square_ft"  value="<?= @$total_square_ft ?>"  placeholder="" />
                <span class="error-message" id="error-total_square_ft"></span>
            </div>


        </div>
        <div class="offcanvas-header my-3">
            <div>
                <h5 id="Add_outdoor_mediaLabel">Location Details</h5>
                <p class="new_form_p">Please fill the form to Location Details</p>
            </div>
        </div>
        <div class="row ps-3">
            <div class="mb-3 col-md-4">
                <label class="form-label">Location Name <span class="red_color">*</span></label>
                <p class="new_form_p">Please Select Location Name</p>
                <div class="">
                    <select class="" aria-label="Default select example" id="location_id" name="location_id" onchange="location_view(this.value)">
                    </select>
                    <span class="error-message" id="error-location_id"></span>

                </div>
            </div>
            <div class="mb-3 col-md-4">
                <button onclick="location_view ($('#location_id').val())" class="btn view_btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#right_floting_div_location" aria-controls="Location"><i class="far fa-eye"></i></button>
            </div>
        </div>
        <div class="offcanvas-header my-3">
            <div>
                <h5 id="Add_outdoor_mediaLabel">Vendor Details</h5>
                <p class="new_form_p">Please fill the form to Vendor Details</p>
            </div>
        </div>
        <div class="row ps-3">
            <div class="mb-3 col-md-6">
                <label class="form-label text-capitalize">Vendor</label>
                <p class="new_form_p">Please Select Vendor</p>
                <div class="">
                    <select class="" aria-label="Default select example" id="party_id" name="party_id" onchange="vendor_view(this.value)">
                    </select>
                    <span class="error-message" id="error-party_id"></span>
                </div>
            </div>
            <div class="mb-3 col-md-4">
                <button onclick="vendor_view($('#party_id').val())" class="btn view_btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#right_floting_div_vendor" aria-controls="Location"><i class="far fa-eye"></i></button>
            </div>

            <div class="mb-3 col-md-4">
                <label class="form-label">Contract From Date</label>
                <p class="new_form_p">Please add Contract From Date</p>
                <input type="date" class="form-control" id="contract_from_date" name="contract_from_date"  value="<?= @$contract_from_date ?>"  placeholder="" />
                <span class="error-message" id="error-contract_from_date"></span>
            </div>
            <div class="mb-3 col-md-4">
                <label class="form-label">Contract To Date</label>
                <p class="new_form_p">Please add Contract To Date</p>
                <input type="date" class="form-control" id="contract_to_date" name="contract_to_date"  value="<?= @$contract_to_date ?>" placeholder="" />
                <span class="error-message" id="error-contract_to_date"></span>
            </div>


            <div class="mb-3 col-md-4">
                <label class="form-label">Purchase Amount</label>
                <p class="new_form_p">Please add a Purchase Amount</p>
                <input type="number" class="form-control" id="purchase_amount" name="purchase_amount"  value="<?= @$purchase_amount ?>" placeholder="" />
                <span class="error-message" id="error-purchase_amount"></span>
            </div>
            <div class="mb-3 col-md-4">
                <label class="form-label">GST Amount</label>
                <p class="new_form_p">Please add a GST Amount</p>
                <input type="number" class="form-control" id="gst_amount" name="gst_amount"  value="<?= @$gst_amount ?>" placeholder="" />
                <span class="error-message" id="error-gst_amount"></span>
            </div>
            <div class="mb-3 col-md-4">
                <label class="form-label">Total</label>
                <p class="new_form_p">Automatically Appear</p>
                <input type="number" class="form-control" id="total" name="total"  value="<?= @$total ?>" placeholder="" readonly />
                <span class="error-message" id="error-total"></span>
            </div>

            <div class="offcanvas-header my-3">
                <div>
                    <h5 id="Add_outdoor_mediaLabel">Selling Details</h5>
                    <p class="new_form_p">Please fill the form to Selling Details</p>
                </div>
            </div>
            <div class="row ps-3">

                <div class="mb-3 col-md-4">
                    <label class="form-label">Minimum Rent Days</label>
                    <p class="new_form_p">minimum_rent_days</p>
                    <input type="number" class="form-control" id="minimum_rent_days" name="minimum_rent_days"  value="<?= @$minimum_rent_days ?>" placeholder="" />
                    <span class="error-message" id="error-minimum_rent_days"></span>
                </div>

                <div class="mb-3 col-md-4">
                    <label class="form-label">Rent Rate/Day <span class="red_color">*</span></label>
                    <p class="new_form_p">rent_rate_per_day</p>
                    <input type="number" class="form-control" id="rent_rate_per_day" name="rent_rate_per_day"  value="<?= @$rent_rate_per_day ?>"  placeholder="" />
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label">Monthly Media Charges</label>
                    <p class="new_form_p">Automatically Appear</p>
                    <input type="number" class="form-control" id="media_charge" name="media_charge"  value="<?= @$media_charge ?>" placeholder="" />
                    <span class="error-message" id="error-media_charge"></span>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label">Printing Charges <span class="red_color">*</span></label>
                    <p class="new_form_p">Please add a Printing Charges</p>
                    <input type="number" class="form-control" id="printing_charge" name="printing_charge"  value="<?= @$printing_charge ?>" placeholder="" />
                    <span class="error-message" id="error-printing_charge"></span>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label">Mounting Charges/Square Ft. <span class="red_color">*</span></label>
                    <p class="new_form_p">Please add a Mounting Charges/Square Ft.</p>
                    <input type="number" class="form-control" id="mounting_charge" name="mounting_charge"  value="<?= @$mounting_charge ?>" placeholder="" />
                    <span class="error-message" id="error-mounting_charge"></span>
                </div>


                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Select Image 1</label>
                    <p class="new_form_p">Please Select Image 1</p>
                    <input type="hidden" id="media_image_1" name="media_image_1" value="<?= @$media_image_1 ?>">
                    <div class="d-flex">
                    <input type="file" id="file" name="file" class="form-control" onchange="uploadImage('file', 'media', 'media_image_1', 'media_image_1_display')" />
                        <button type="button" class="btn del_btn ms-2" onclick="deleteImage('media_image_1', 'media_image_1_display')"><i class="bx bx-trash-alt"></i></button>
                    </div>
                    <span class="error-message" id="error-media_image_1"></span>
                </div>

                <div class="col-md-3 mb-3">
                    <img id="media_image_1_display" name="media_image_1_display" onclick="enlargeImage(event)" src="<?= (isset($media_image_1)) ? base_url($media_image_1) : "" ?>" height="80">
                </div>

                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Select Image 2</label>
                    <p class="new_form_p">Please Select Image 2</p>
                    <input type="hidden" id="media_image_2" name="media_image_2" value="<?= @$media_image_2 ?>">
                    <div class="d-flex">
                    <input type="file" id="file2" name="file2" class="form-control" onchange="uploadImage('file2', 'media', 'media_image_2', 'media_image_2_display')" />
                        <button type="button" class="btn del_btn ms-2" onclick="deleteImage('media_image_2', 'media_image_2_display')"><i class="bx bx-trash-alt"></i></button>
                    </div>
                    <span class="error-message" id="error-media_image_2"></span>
                </div>

                <div class="col-md-3 mb-3">
                    <img id="media_image_2_display" name="media_image_2_display" onclick="enlargeImage(event)" src="<?= (isset($media_image_2)) ? base_url($media_image_2) : "" ?>" height="80">
                </div>

                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Select Image 3</label>
                    <p class="new_form_p">Please Select Image 3</p>
                    <input type="hidden" id="media_image_3" name="media_image_3" value="<?= @$media_image_3 ?>">
                    <div class="d-flex">
                    <input type="file" id="file3" name="file3" class="form-control" onchange="uploadImage('file3', 'media', 'media_image_3', 'media_image_3_display')" />
                        <button type="button" class="btn del_btn ms-2" onclick="deleteImage('media_image_3', 'media_image_3_display')"><i class="bx bx-trash-alt"></i></button>
                    </div>
                    <span class="error-message" id="error-media_image_3"></span>
                </div>

                <div class="col-md-3 mb-3">
                    <img id="media_image_3_display" name="media_image_3_display" onclick="enlargeImage(event)" src="<?= (isset($media_image_3)) ? base_url($media_image_3) : "" ?>" height="80">
                </div>


                <div class="text-center">
                    <button type="button" class="submit_btn waves-effect waves-light me-1" onclick="submitFormWithAjax('form',true,true,successCallback,errorCallback)">
                        Submit
                    </button>
                </div>
            </div>
    </form>
</div>
<script>
    function location_view(location_id) {
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to('location_view_component')) ?>",
            data: {
                location_id: location_id
            },
            success: function(response) {
                $("#right_floting_div_location").html("");
                $("#right_floting_div_location").html(response);
            }
        });
    }

    function vendor_view(party_id) {
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to('vendor_view_component')) ?>",
            data: {
                party_id: party_id
            },
            success: function(response) {
                $("#right_floting_div_vendor").html("");
                $("#right_floting_div_vendor").html(response);
            }
        });
    }
    var selected_media_type_id = "<?= @$media_type_id ?>";
    var selected_illumination_id = "<?= @$illumination_id ?>";
    var selected_party_id = "<?= @$party_id ?>";
    var selected_location_id = "<?= @$location_id ?>";



    $(document).ready(function() {
        initializeSelectize('media_type_id', {
                placeholder: "Select Media Type"
            }, "<?= base_url(route_to('media_type_list_api')) ?>", {}, "media_type_id", "media_type_name",
            selected_media_type_id
        );
        initializeSelectize('illumination_id', {
                placeholder: "Select illumination Type"
            }, "<?= base_url(route_to('illumination_list_api')) ?>", {}, "illumination_id", "illumination_name",
            selected_illumination_id
        );
        initializeSelectize('party_id', {
                placeholder: "Select Vendor Type"
            }, "<?= base_url(route_to('party_list_api')) ?>", {
                party_type: "vendor"
            }, "party_id", "firm_name",
            selected_party_id
        );
        initializeSelectize('location_id', {
                placeholder: "Select Location"
            }, "<?= base_url(route_to('location_list_api')) ?>", {}, "location_id", "location_name",
            selected_location_id
        );

    });

    $(document).ready(function() {
    let isUserEditing = false;

    function calculateTotalSquareFt() {
        if (isUserEditing) return;

        let width = parseFloat($('#width').val()) || 0;
        let height = parseFloat($('#height').val()) || 0;
        let totalSquareFt = width * height;
        $('#total_square_ft').val(totalSquareFt.toFixed(2));
    }

    function onUserEdit() {
        isUserEditing = true;
    }

    function onUserEditEnd() {
        isUserEditing = false;
    }

    // Event listeners for width and height input changes
    $('#width').on('input', calculateTotalSquareFt);
    $('#height').on('input', calculateTotalSquareFt);

    // Event listeners for total square ft input
    $('#total_square_ft').on('input', onUserEdit);
    $('#total_square_ft').on('blur', onUserEditEnd);
    $('#total_square_ft').on('change', onUserEditEnd);

    function calculateTotal() {
        let purchaseAmount = parseFloat($('#purchase_amount').val()) || 0;
        let gstAmount = parseFloat($('#gst_amount').val()) || 0;
        let total = purchaseAmount + gstAmount;
        $('#total').val(total.toFixed(2));
    }

    // Event listeners for purchase amount and GST amount input changes
    $('#purchase_amount').on('input', calculateTotal);
    $('#gst_amount').on('input', calculateTotal);
});


   

    function successCallback(response) {
        console.log(response);
        if (response.status == 201 || response.status == 200) {
            setTimeout(() => {
                window.location.href = "<?= base_url(route_to('media_list_page')) ?>";
            }, 2000);
        }
    }

    function errorCallback(response) {
        console.log(response);
    }
</script>