<div class="offcanvas-header pb-0">
    <div class="">
        <h5 id="Add_New_clientLabel">View <?= UserType::from($user_type)->name ?></h5>
        <p class="new_form_p">Please fill the form to View <?= UserType::from($user_type)->name ?></p>
    </div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body p-3">
    <div class="row w-100">
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Staff Name</label>
                <span class="ms-3"><?= $user_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Staff Image</label>
                <img class="image-fluid" style="height:auto; width:100px" id="user_image_display" onclick="enlargeImage(event)" src="<?= (isset($user_image) && !empty($user_image)) ? base_url($user_image) : "" ?>">
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Staff Email</label>
                <span class="ms-3"><?= $user_email ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Staff Mobile</label>
                <span class="ms-3"><?= $user_mobile ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Designation</label>
                <span class="ms-3"><?= $designation_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Reporting To</label>
                <span class="ms-3"><?= $reporting_to_user_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-12">
            <div class="view_div">
                <label class="form-label text-capitalize">Address</label>
                <pre class="ms-3"><?= $user_address ?></pre>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">County</label>
                <span class="ms-3"><?= $user_country_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">State</label>
                <span class="ms-3"><?= $user_state_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">City</label>
                <span class="ms-3"><?= $user_city_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Pincode</label>
                <span class="ms-3"><?= $user_pincode ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Aadhaar No.</label>
                <span class="ms-3"><?= $user_aadhaar_card ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Aadhaar Image</label>
                <img class="image-fluid" style="height:auto; width:100px" id="user_image_display" onclick="enlargeImage(event)" src="<?= (isset($user_aadhaar_card_image) && !empty($user_aadhaar_card_image)) ? base_url($user_aadhaar_card_image) : "" ?>">
            </div>
        </div>
    </div>
</div>