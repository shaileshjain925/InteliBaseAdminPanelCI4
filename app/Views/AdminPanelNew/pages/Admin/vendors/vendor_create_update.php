<div class="p-3 form_bg">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel"><?= (isset($party_id) && !empty($party_id)) ? "Update" : "Create" ?> Vendor</h5>
            <p class="new_form_p">Please fill the form to <?= (isset($party_id) && !empty($party_id)) ? "Update" : "Create" ?> Vendor</p>
        </div>
    </div>
    <div class="offcanvas-body overflow-visible mt-2">
          <div class="error-message-box d-none">
              <p id="error-message"></p>
          </div>
          <div class="success-message-box d-none">
              <p id="success-message"></p>
          </div>
    <div class="offcanvas-body">
        <form id="form" method="post" enctype="multipart/form-data" class="custom-validation"action="<?= (isset($party_id) && !empty($party_id)) ? base_url(route_to('vendor_update_api')) : base_url(route_to('vendor_create_api')) ?>">
        <input type="hidden" id="party_id" name="party_id" value="<?= @$party_id ?>">
        <input type="hidden" id="party_type" name="party_type" value="vendor">   
        <div class="row">
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Name</label>
                    <p class="new_form_p">Please add a Vendor/Firm Name</p>
                    <div>
                    <input type="text" id="firm_name" name="firm_name" class="form-control" value="<?= @$firm_name ?>" />
                    <span class="error-message" id="error-firm_name"></span>
                    </div>
</div>

                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Email</label>
                    <p class="new_form_p">Please add a Vendor/Firm Email</p>
                    <div>
                    <input type="text" id="firm_email" name="firm_email" class="form-control" value="<?= @$firm_email ?>" />
                    <span class="error-message" id="error-firm_email"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Phone</label>
                    <p class="new_form_p">Please add a Vendor/Firm Phone</p>
                    <div>
                    <input type="number" id="firm_mobile" name="firm_mobile" class="form-control" value="<?= @$firm_mobile ?>" />
                    <span class="error-message" id="error-firm_mobile"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Country</label>
                    <p class="new_form_p">Please add a Client Country</p>
                    <div>
                    <select class="form-select" aria-label="Default select example" id="firm_country_id" name="firm_country_id"></select>
                    <span class="error-message" id="error-firm_country_id"></span>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">State</label>
                    <p class="new_form_p">Please add a Client State</p>
                    <div>
                    <select class="form-select" aria-label="Default select example" id="firm_state_id" name="firm_state_id"></select>    
                    <span class="error-message" id="error-firm_state_id"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">City</label>
                    <p class="new_form_p">Please add a Client City</p>
                    <div>
                    <select class="form-select" aria-label="Default select example" id="firm_city_id" name="firm_city_id"></select>
                    <span class="error-message" id="error-firm_city_id"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Address</label>
                    <p class="new_form_p">Please add a Vendor/Firm Address</p>
                    <div>
                    <input type="text" id="firm_address" name="firm_address" class="form-control" value="<?= @$firm_address ?>" />
                    <span class="error-message" id="error-firm_address"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">GSTN</label>
                    <p class="new_form_p">Please add a Vendor GSTN</p>
                    <div>
                    <input type="text" id="firm_gst_no" name="firm_gst_no" class="form-control" value="<?= @$firm_gst_no ?>" />
                    <span class="error-message" id="error-firm_gst_no"></span>
                    </div>
                </div>
                   
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Contact Name</label>
                    <p class="new_form_p">Please add a Contact Person Name</p>
                    <div>
                    <input type="text" id="contact_person_name" name="contact_person_name" class="form-control" value="<?= @$contact_person_name ?>" />
                    <span class="error-message" id="error-contact_person_name"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Contact Email</label>
                    <p class="new_form_p">Please add a Contact Person Email</p>
                    <div>
                    <input type="text" id="contact_person_email" name="contact_person_email" class="form-control" value="<?= @$contact_person_email ?>" />
                    <span class="error-message" id="error-contact_person_email"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Contact Phone</label>
                    <p class="new_form_p">Please add a Contact Person Phone</p>
                    <div>
                    <input type="number" id="contact_person_mobile" name="contact_person_mobile" class="form-control" value="<?= @$contact_person_mobile ?>" />
                    <span class="error-message" id="error-contact_person_mobile"></span>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Vendor Type</label>
                    <p class="new_form_p">Please Select Vendor Type</p>
                    <div>
                        <select id="vendor_type" name="vendor_type">
                          
                              <option value="none" <?= (isset($vendor_type) && $vendor_type == "none") ? "selected" : "" ?>>None
                              </option>
                              <option value="agency" <?= (isset($vendor_type) && $vendor_type == "agency") ? "selected" : "" ?>>Agency
                              </option>
                              <option value="landlord" <?= (isset($vendor_type) && $vendor_type == "landlord") ? "selected" : "" ?>>Landlord
                              </option>
                              <option value="government" <?= (isset($vendor_type) && $vendor_type == "government") ? "selected" : "" ?>>Government
                              </option>
                          </select>
                          <span class="error-message" id="error-vendor_type"></span>
                    </div>
                </div>
                   

                <div class="offcanvas-header">
                    <div class="">
                        <h5 id="Add_outdoor_mediaLabel">Add Vendor bank Details</h5>
                        <p class="new_form_p">Please fill the form to add Vendor bank Details</p>
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Account Type</label>
                    <p class="new_form_p">Please Select Bank Account Type</p>
                    <div>
                        <select id="account_type" name="account_type">
                              <option disable>Select Account Type</option>
                              <option value="saving" <?= (isset($account_type) && $account_type == "saving") ? "selected" : "" ?>>saving
                              </option>
                              <option value="current" <?= (isset($account_type) && $account_type == "current") ? "selected" : "" ?>>current
                              </option>
                          </select>
                          <span class="error-message" id="error-account_type"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Bank Name</label>
                    <p class="new_form_p">Please add Bank Name</p>
                    <div>
                    <input type="text" id="bank_name" name="bank_name" class="form-control" value="<?= @$bank_name ?>" />
                    <span class="error-message" id="error-bank_name"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">IFSC</label>
                    <p class="new_form_p">Please add a IFSC Code</p>
                    <div>
                    <input type="text" id="ifsc_code" name="ifsc_code" class="form-control" value="<?= @$ifsc_code ?>" />
                    <span class="error-message" id="error-ifsc_code"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Bank Account Number</label>
                    <p class="new_form_p">Please add a Bank Account Number</p>
                    <div>
                    <input type="number" id="account_no" name="account_no" class="form-control" value="<?= @$account_no ?>" />
                    <span class="error-message" id="error-account_no"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">PAN Card</label>
                    <p class="new_form_p">Please add a PAN Card</p>
                    <div>
                    <input type="text" id="firm_pan_no" name="firm_pan_no" class="form-control" value="<?= @$firm_pan_no ?>" />
                    <span class="error-message" id="error-firm_pan_no"></span>
                    </div>
                </div>

                <div class="form_submit_div text-center">
                <button type="button" class="submit_btn waves-effect waves-light me-1" onclick="submitFormWithAjax('form',true,true,successCallback,errorCallback)">
                          Submit
                      </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
   
    function successCallback(response) {
        console.log(response);
        if (response.status == 201 || response.status == 200) {
            setTimeout(() => {
                window.location.href = "<?= base_url(route_to('vendor_list_page')) ?>";
            }, 2000);
        }
    }

    function errorCallback(response) {
        console.log(response);
    }
    var selected_firm_country_id = "<?= @$firm_country_id ?>";
var selected_firm_state_id = "<?= @$firm_state_id ?>";
var selected_firm_city_id = "<?= @$firm_city_id ?>";

$(document).ready(function() {
    $("#firm_state_id").selectize({
        placeholder: "Select State"
    });
    $("#firm_city_id").selectize({
        placeholder: "Select City"
    });
    initializeSelectize('firm_country_id', {
            placeholder: "Select Country"
        }, "<?= base_url(route_to('country_list_api')) ?>", {}, "country_id", "country_name",
        selected_firm_country_id).onchange(function(country_id) {
        initializeSelectize('firm_state_id').clearOptions().then(function() {
            // Initialize state selectize dropdown
            if (country_id != '') {
                initializeSelectize('firm_state_id', {
                    placeholder: "Select State"
                }, "<?= base_url(route_to('state_list_api')) ?>", {
                    country_id: country_id
                }, 'state_id', 'state_name', selected_firm_state_id).onchange(function(
                    state_id) {
                    initializeSelectize('firm_city_id').clearOptions().then(
                        function() {
                            // Initialize state selectize dropdown
                            if (state_id != '') {
                                debugger;
                                initializeSelectize('firm_city_id', {
                                        placeholder: "Select City"
                                    },
                                    "<?= base_url(route_to('city_list_api')) ?>", {
                                        state_id: state_id
                                    }, 'city_id', 'city_name',
                                    selected_firm_city_id)
                            }
                        });

                });
            }
        });

    });
});
$(document).ready(function() {
          $("#account_type").selectize({});
          $("#vendor_type").selectize({});
      });
</script>