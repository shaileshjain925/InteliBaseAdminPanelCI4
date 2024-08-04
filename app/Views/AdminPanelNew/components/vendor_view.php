<div class="offcanvas-header pb-0">
    <div class="">
        <h5 id="Add_New_clientLabel">View Vendor</h5>
        <p class="new_form_p">View Vendor Profile</p>
    </div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body p-3">
    <div class="row w-100">
        <h3>Vendor Details</h3>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Vendor Id</label>
                <span class="ms-3"><?= $party_id ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Vendor Name</label>
                <span class="ms-3"><?= $firm_name ?></span>
            </div>
        </div>

        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Vendor Email</label>
                <span class="ms-3"><?= $firm_email ?></span>
            </div>
        </div>

        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Vendor Mobile</label>
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
                <label class="form-label text-capitalize">Vendor Type.</label>
                <span class="ms-3"><?= $vendor_type ?></span>
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
                <label class="form-label text-capitalize">Firm GST No.</label>
                <span class="ms-3"><?= $firm_gst_no ?></span>
            </div>
        </div>
        
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Contact Name</label>
                <span class="ms-3"><?= $contact_person_name ?></span>  
                
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Contact Email</label>
                <span class="ms-3"><?= $contact_person_email ?></span>  
                
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Contact Phone</label>
                <span class="ms-3"><?= $contact_person_mobile?></span>  
            </div>
        </div>

        <h3>Bank Details</h3>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Bank Name</label>
                <span class="ms-3"><?= $bank_name ?></span>         </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">IFSC Code</label>
                <span class="ms-3"><?= $ifsc_code ?></span>  
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Account Type</label>
                <span class="ms-3"><?= $account_type?></span>  
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Account Number</label>
                <span class="ms-3"><?= $account_no ?></span>  
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">PAN Card</label>
                <span class="ms-3"><?= $firm_pan_no ?></span>   
                       </div>
        </div>
        
        
    </div>
</div>