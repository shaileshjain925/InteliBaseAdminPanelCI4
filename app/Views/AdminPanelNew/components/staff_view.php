<div class="offcanvas-header pb-0">
    <div class="">
        <h5 id="Add_New_clientLabel">View Staff Deatil</h5>
        <p class="new_form_p">Please fill the form to View Staff Deatil</p>
    </div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body p-3">
    <div class="row w-100">
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Role</label>
                <span class="ms-3"><?= @$user_type ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Name</label>
                <span class="ms-3"><?= @$user_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Email</label>
                <span class="ms-3"><?= @$user_email ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Mobile</label>
                <span class="ms-3"><?= @$user_mobile ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">City</label>
                <span class="ms-3"><?= @$user_city_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Pincode</label>
                <span class="ms-3"><?= @$user_pincode ?></span>
            </div>
        </div>
        <div class="mb-3 col-12">
            <div class="view_div">
                <label class="form-label text-capitalize">Address</label>
                <span class="ms-3"><?= @$user_address ?></span>
            </div>
        </div>
        <div class="mb-3 col-12">
            <div class="view_div">
                <label class="form-label text-capitalize">Aadhar Card Number</label>
                <span class="ms-3"><?= @$user_aadhar_card ?></span>
            </div>
        </div>
    </div>
</div>