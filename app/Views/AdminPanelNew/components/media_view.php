<div class="offcanvas-header">
    <div class="">
        <h5 id="Add_outdoor_mediaLabel">View Media</h5>
    </div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <div class="row w-100">
        <h5 class="mt-3 fw-bold">Basic Details</h5>
        <div class="mb-3">
            <a>
                <img onclick="enlargeImage(event)" src="<?= (isset($media_image_1)) ? base_url($media_image_1) : "" ?>" height="80">
            </a>
            <a>
                <img onclick="enlargeImage(event)" src="<?= (isset($media_image_2)) ? base_url($media_image_2) : "" ?>" height="80">
            </a>
            <a >
                <img onclick="enlargeImage(event)" src="<?= (isset($media_image_3)) ? base_url($media_image_3) : "" ?>" height="80">
            </a>
            <!-- Add more images as needed -->
        </div>
        <div class="mb-3 col-md-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Media Id</label>
                <span class="ms-3"><?= @$media_id ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Media Name</label>
                <span class="ms-3"><?= @$media_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Media Type</label>
                <span class="ms-3"><?= @$media_type_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Illumination Type</label>
                <span class="ms-3"><?= @$illumination_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Width</label>
                <span class="ms-3"><?= @$width ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Height</label>
                <span class="ms-3"><?= @$height ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Total Sq. Ft.</label>
                <span class="ms-3"><?= @$total_square_ft ?></span>
            </div>
        </div>
        <h5 class="mt-3  fw-bold">Location Details</h5>
        <div class="mb-3 col-md-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Location Name</label>
                <span class="ms-3"><?= @$location_name ?></span>
            </div>
        </div>

        <div class="mb-3 col-md-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Location Type Name</label>
                <span class="ms-3"><?= @$location_type_name ?></span>
            </div>
        </div>

        <div class="mb-3 col-md-4">
            <div class="view_div">
                <label class="form-label text-capitalize">State</label>
                <span class="ms-3"><?= @$location_state_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-4">
            <div class="view_div">
                <label class="form-label text-capitalize">District</label>
                <span class="ms-3"><?= @$location_city_name ?></span>
            </div>
        </div>

        <h5 class="mt-3  fw-bold">Vendor Details</h5>
        <div class="mb-3 col-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Vendor Type</label>
                <span class="ms-3"><?= @$vendor_type ?></span>
            </div>
        </div>
        <div class="mb-3 col-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Vendor Name</label>
                <span class="ms-3"><?= @$contact_person_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Vendor Email</label>
                <span class="ms-3"><?= @$contact_person_email ?></span>
            </div>
        </div>
        <div class="mb-3 col-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Vendor Mobile</label>
                <span class="ms-3"><?= @$contact_person_mobile ?></span>
            </div>
        </div>
        <div class="mb-3 col-12">
            <div class="view_div">
                <label class="form-label text-capitalize">Vendor Address</label>
                <span class="ms-3"><?= @$firm_address ?></span>
            </div>
        </div>

        <div class="mb-3 col-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Contract From</label>
                <span class="ms-3"><?= @$contract_from_date ?></span>
            </div>
        </div>
        <div class="mb-3 col-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Contract To</label>
                <span class="ms-3"><?= @$contract_to_date ?></span>
            </div>
        </div>

        <div class="mb-3 col-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Purchase Amount</label>
                <span class="ms-3"><?= @$purchase_amount ?></span>
            </div>
        </div>
        <div class="mb-3 col-4">
            <div class="view_div">
                <label class="form-label text-capitalize">GST Amount</label>
                <span class="ms-3"><?= @$gst_amount ?></span>
            </div>
        </div>
        <div class="mb-3 col-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Total Amount</label>
                <span class="ms-3"><?= @$total ?></span>
            </div>
        </div>
        <h5 class="mt-3  fw-bold">Selling Details</h5>
        <div class="mb-3 col-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Minimum Rent Days</label>
                <span class="ms-3"><?= @$minimum_rent_days ?></span>
            </div>
        </div>
        <div class="mb-3 col-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Rent Rate/Day</label>
                <span class="ms-3"><?= @$rent_rate_per_day ?></span>
            </div>
        </div>
        <div class="mb-3 col-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Monthly Media Charges</label>
                <span class="ms-3"><?= @$media_charge ?></span>
            </div>
        </div>
        <div class="mb-3 col-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Printing Charges</label>
                <span class="ms-3"><?= @$printing_charge ?></span>
            </div>
        </div>
        <div class="mb-3 col-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Mounting Charges </label>
                <span class="ms-3"><?= @$mounting_charge ?></span>
            </div>
        </div>

    </div>
</div>