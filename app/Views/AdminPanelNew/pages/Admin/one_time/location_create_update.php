<div class="p-3 form_bg">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="AddVendorLabel">Add New Location</h5>
            <p class="new_form_p">Please fill the form to add New Location</p>
        </div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="error-message-box d-none">
            <p id="error-message"></p>
        </div>
        <div class="success-message-box d-none">
            <p id="success-message"></p>
        </div>
        <form id="form" method="post" enctype="multipart/form-data" class="custom-validation" action="<?= (isset($location_id) && !empty($location_id)) ? base_url(route_to('location_update_api')) : base_url(route_to('location_create_api')) ?>">
            <input type="hidden" id="location_id" name="location_id" value="<?= @$location_id ?>">
            <div class="row">
                <!-- <div class="mb-3 col-md-4">
                    <label class="form-label">Location Id </label>
                    <p class="new_form_p">Automatically Appear</p>
                    <input type="text" class="form-control" required placeholder="" />
                </div> -->
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Location Type <span class="red_color">*</span></label>
                    <div>
                        <select class="form-select" aria-label="Default select example" id="location_type_id" name="location_type_id" value="<?= @$location_type_id ?>">
                        </select>
                        <span class="error-message" id="error-location_type_id"></span>

                    </div>
                </div>
                <p class="new_form_p">Please Select Location</p>

                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Location name <span class="red_color">*</span></label>
                    <p class="new_form_p">Please add a Location Name</p>
                    <input type="text" class="form-control" id="location_name" name="location_name" value="<?= @$location_name ?>" required placeholder="" />
                    <span class="error-message" id="error-location_name"></span>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Country<span class="red_color">*</span></label>
                    <p class="new_form_p">Please Select Country</p>
                    <div>
                        <select class="form-select" aria-label="Default select example" id="location_country_id" name="location_country_id">

                        </select>
                        <span class="error-message" id="error-location_country_id"></span>

                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">State<span class="red_color">*</span></label>
                    <p class="new_form_p">Please Select State</p>
                    <div>
                        <select class="form-select" aria-label="Default select example" id="location_state_id" name="location_state_id">

                        </select>
                        <span class="error-message" id="error-location_state_id"></span>

                    </div>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">City<span class="red_color">*</span></label>
                    <p class="new_form_p">Please Select City</p>
                    <div>
                        <select class="form-select" aria-label="Default select example" id="location_city_id" name="location_city_id">

                        </select>
                        <span class="error-message" id="error-location_city_id"></span>

                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Pincode</label>
                    <p class="new_form_p">Please add a Pincode</p>
                    <div>
                        <input type="text" id="pincode" name="pincode" class="form-control" value="<?= @$pincode ?>" required placeholder="" />
                        <span class="error-message" id="error-pincode"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label text-capitalize">Address</label>
                    <p class="new_form_p">Please add a Address</p>
                    <div>
                        <textarea id="address" name="address" class="form-control"><?= @$address ?></textarea>
                        <span class="error-message" id="error-address"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">latitude</label>
                    <p class="new_form_p">Please add latitude</p>
                    <div>
                        <input type="text" id="latitude" name="latitude" class="form-control" value="<?= @$latitude ?>" placeholder="" />
                        <span class="error-message" id="error-latitude"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">longitude</label>
                    <p class="new_form_p">Please add longitude</p>
                    <div>
                        <input type="text" id="longitude" name="longitude" class="form-control" value="<?= @$longitude ?>" placeholder="" />
                        <span class="error-message" id="error-longitude"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Google Maps URL</label>
                    <p class="new_form_p">Please add google maps URL</p>
                    <div>
                        <input type="text" id="google_map_link" name="google_map_link" class="form-control" value="<?= @$google_map_link ?>" placeholder="" />
                        <span class="error-message" id="error-google_map_link"></span>
                    </div>
                </div>
                <div class="text-center">
                    <button type="button" class="submit_btn waves-effect waves-light me-1" onclick="submitFormWithAjax('form',true,true,successCallback,errorCallback)">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    var selected_location_type_id = "<?= @$location_type_id ?>";
    var selected_location_country_id = "<?= @$location_country_id ?>";
    var selected_location_state_id = "<?= @$location_state_id ?>";
    var selected_location_city_id = "<?= @$location_city_id ?>";
    $(document).ready(function() {
        initializeSelectize('location_type_id', {
                placeholder: "Select Location Type"
            }, "<?= base_url(route_to('location_type_list_api')) ?>", {}, "location_type_id", "location_type_name",
            selected_location_type_id
        );

        $("#location_state_id").selectize({
            placeholder: "Select State"
        });
        $("#location_city_id").selectize({
            placeholder: "Select City"
        });

        initializeSelectize('location_country_id', {
                placeholder: "Select Country"
            }, "<?= base_url(route_to('country_list_api')) ?>", {}, "country_id", "country_name",
            selected_location_country_id).onchange(function(country_id) {
            initializeSelectize('location_state_id').clearOptions().then(function() {
                // Initialize state selectize dropdown
                if (country_id != '') {
                    initializeSelectize('location_state_id', {
                        placeholder: "Select State"
                    }, "<?= base_url(route_to('state_list_api')) ?>", {
                        country_id: country_id
                    }, 'state_id', 'state_name', selected_location_state_id).onchange(function(
                        state_id) {
                        initializeSelectize('location_city_id').clearOptions().then(
                            function() {
                                // Initialize state selectize dropdown
                                if (state_id != '') {
                                    debugger;
                                    initializeSelectize('location_city_id', {
                                            placeholder: "Select City"
                                        },
                                        "<?= base_url(route_to('city_list_api')) ?>", {
                                            state_id: state_id
                                        }, 'city_id', 'city_name',
                                        selected_location_city_id)
                                }
                            });

                    });
                }
            });

        });
    });

    function successCallback(response) {
        console.log(response);
        if (response.status == 201 || response.status == 200) {
            setTimeout(() => {
                window.location.href = "<?= base_url(route_to('location_list_page')) ?>";
            }, 2000);
        }
    }

    function errorCallback(response) {
        console.log(response);
    }
</script>