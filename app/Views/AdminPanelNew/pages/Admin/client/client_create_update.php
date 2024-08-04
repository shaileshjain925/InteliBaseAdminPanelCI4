
<!-- -----------main page start----------- -->
<div class="p-3 form_bg">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel"><?= (isset($party_id) && !empty($party_id)) ? "Update" : "Create" ?> Client</h5>
            <p class="new_form_p">Please fill the form to <?= (isset($party_id) && !empty($party_id)) ? "Update" : "Create" ?>  Client</p>
        </div>
    </div>
    <div class="offcanvas-body overflow-visible mt-2">
      <div class="error-message-box d-none">
            <p id="error-message"></p>
        </div>
        <div class="success-message-box d-none">
            <p id="success-message"></p>
        </div>
        <form  id="form" method="post" enctype="multipart/form-data" class="custom-validation" action="<?= (isset($party_id) && !empty($party_id)) ? base_url(route_to('client_update_api')) : base_url(route_to('client_create_api')) ?>">
        <input type="hidden" id="party_id" name="party_id" value="<?= @$party_id ?>">
        <input type="hidden" id="party_type" name="party_type" value="client">
            <div class="row">
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Firm Name</label>
                    <p class="new_form_p">Please add a Firm Name</p>
                    <input type="text" id="firm_name" name="firm_name" class="form-control" value="<?= @$firm_name ?>" />
                      <span class="error-message" id="error-firm_name"></span>
                </div>
                <div class="mb-3 col-md-4">
                        <label class="form-label text-capitalize">Firm Email</label>
                        <p class="new_form_p">Please add a firm Email</p>
                        <div>
                        <input type="text" id="firm_email" name="firm_email" class="form-control" value="<?= @$firm_email ?>" />
                        <span class="error-message" id="error-firm_email"></span>
                        </div>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label text-capitalize">Firm Phone</label>
                        <p class="new_form_p">Please add a Firm Person Phone Number</p>
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
                <div class="mb-3 col-md-3">
                    <label class="form-label text-capitalize">Pincode</label>
                    <p class="new_form_p">Please add a Client Pincode</p>
                    <div>
                    <input type="text" id="firm_pincode" name="firm_pincode" class="form-control" value="<?= @$firm_pincode ?>" />
                    <span class="error-message" id="error-firm_pincode"></span>
                    </div>
</div>
                <div class="mb-3 col-md-9">
                    <label class="form-label text-capitalize">Address</label>
                    <p class="new_form_p">Please add Client Address</p>
                    <div>
                    <input type="text" id="firm_address" name="firm_address" class="form-control" value="<?= @$firm_address ?>" />
                    <span class="error-message" id="error-firm_address"></span>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">PAN Card</label>
                    <p class="new_form_p">Please add a Client PAN Card Number</p>
                    <input type="text" id="firm_pan_no" name="firm_pan_no" class="form-control" value="<?= @$firm_pan_no ?>" />
                    <span class="error-message" id="error-firm_pan_no"></span>
                </div>
            
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Firm GSTN</label>
                    <p class="new_form_p">Please add a Firm GSTN</p>
                    <div>
                    <input type="text" id="firm_gst_no" name="firm_gst_no" class="form-control" value="<?= @$firm_gst_no ?>" />
                    <span class="error-message" id="error-firm_gst_no"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label">Client Birthday</label>
                    <p class="new_form_p">Please add a Client Birthday</p>
                    <div class="input-group" id="Client_birthday">
                    <input type="date" id="dob" name="dob" class="form-control" value="<?= @$dob ?>" />
                    <span class="error-message" id="error-dob"></span>
                    </div>
              </div>
              </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label">Firm Anniversary</label>
                    <p class="new_form_p">Please add a Firm Anniversary</p>
                    <div class="input-group" id="Firm_Anniversary">
                    <input type="date" id="doa" name="doa" class="form-control" value="<?= @$doa ?>" />
                    <span class="error-message" id="error-doa"></span>
                    </div>
                </div>
            </div>

                
               
               
            <div class="row">
                <div class="offcanvas-header mb-3">
                    <div class="">
                        <h5 id="Add_outdoor_mediaLabel">Add Client Contact Person</h5>
                        <p class="new_form_p">Please fill the form to add Client Contact Person</p>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label text-capitalize">Contact Name</label>
                        <p class="new_form_p">Please add a Contact Name</p>
                        <div>
                        <input type="text" id="contact_person_name" name="contact_person_name" class="form-control" value="<?= @$contact_person_name ?>" />
                        <span class="error-message" id="error-contact_person_name"></span>
                        </div>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label text-capitalize">Contact Email</label>
                        <p class="new_form_p">Please add a Contact Email</p>
                        <div>
                        <input type="text" id="contact_person_email" name="contact_person_email" class="form-control" value="<?= @$contact_person_email ?>" />
                        <span class="error-message" id="error-contact_person_email"></span>
                        </div>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label text-capitalize">Contact Phone</label>
                        <p class="new_form_p">Please add a Contact Person Phone Number</p>
                        <div>
                        <input type="number" id="contact_person_mobile" name="contact_person_mobile" class="form-control" value="<?= @$contact_person_mobile ?>" />
                        <span class="error-message" id="error-contact_person_mobile"></span>
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


<!-- --------------main page end----------- -->
<script>
    function successCallback(response) {
        console.log(response);
        if (response.status == 201 || response.status == 200) {
            setTimeout(() => {
                window.location.href = "<?= base_url(route_to('client_list_page')) ?>";
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
</script>