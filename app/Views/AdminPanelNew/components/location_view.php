<div class="offcanvas-header pb-0">
    <div class="">
        <h5 id="Add_New_clientLabel">View Location</h5>
        <p class="new_form_p">Please fill the form to View Location</p>
    </div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body p-3">
    <div class="row w-100">
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Location Type</label>
                <span class="ms-3"><?= @$location_type_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Location Name</label>
                <span class="ms-3"><?= @$location_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Country</label>
                <span class="ms-3"><?= @$location_country_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">State</label>
                <span class="ms-3"><?= @$location_state_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">City</label>
                <span class="ms-3"><?= @$location_city_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Pincode</label>
                <span class="ms-3"><?= @$pincode ?></span>
            </div>
        </div>
        <div class="mb-3 col-12">
            <div class="view_div">
                <label class="form-label text-capitalize">Address</label>
                <span class="ms-3"><?= @$address ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">latitude</label>
                <span class="ms-3"><?= @$latitude ?> </span>
            </div>

        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">longitude</label>
                <span class="ms-3"><?= @$longitude ?></span>
            </div>
        </div>

        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Google Maps URL</label>
                <span class="ms-3">
                    <?php if (!empty($google_map_link)) : ?>
                        <a href="<?= htmlspecialchars($google_map_link) ?>" target="_blank"><?= htmlspecialchars($google_map_link) ?></a>
                    <?php else : ?>
                        No Google Maps URL provided
                    <?php endif; ?>
                </span>

            </div>
        </div>

    </div>
</div>