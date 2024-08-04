<style>
    .client_contact_table td,
    .client_contact_table th {
        background: transparent;
    }
</style>
<div class="offcanvas-header pb-0">
    <div class="">
        <h5 id="Add_New_clientLabel">View Client</h5>
        <p class="new_form_p">View Client Profile</p>
    </div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body p-3">
    <div class="row w-100">
        <h3>Firm Details</h3>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Id</label>
                <span class="ms-3"><?= $party_id ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Firm Name</label>
                <span class="ms-3"><?= $firm_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Firm Email</label>
                <span class="ms-3"><?= $firm_email ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Firm Mobile</label>
                <span class="ms-3"><?= $firm_mobile ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Country</label>
                <span class="ms-3"><?= $firm_country_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">State</label>
                <span class="ms-3"><?= $firm_state_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">City</label>
                <span class="ms-3"><?= $firm_city_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Pincode</label>
                <span class="ms-3"><?= $firm_pincode ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-12">
            <div class="view_div">
                <label class="form-label text-capitalize">Address</label>
                <span class="ms-3"><?= $firm_address ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">PAN Card No.</label>
                <span class="ms-3"><?= $firm_pan_no ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Firm GST No.</label>
                <span class="ms-3"><?= $firm_gst_no ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Firm of Anniversary</label>
                <span class="ms-3"><?= date('d-m-Y',strtotime($doa)) ?></span>
            </div>
        </div>
        <h3>Client Details</h3>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Client Date of Birth</label>
                <span class="ms-3"><?= date('d-m-Y',strtotime($dob)) ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Client Name</label>
                <span class="ms-3"><?= $contact_person_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Client Email</label>
                <span class="ms-3"><?= $contact_person_email ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Client Mobile</label>
                <span class="ms-3"><?= $contact_person_mobile ?></span>
            </div>
        </div>

    </div>
</div>