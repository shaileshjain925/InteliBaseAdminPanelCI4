<div class="p-3 form_bg">
    <div class="offcanvas-header mb-3">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel">Add Staff</h5>
            <p class="new_form_p">Please fill the form to add New Staff</p>
        </div>
    </div>
    <div class="offcanvas-body">
        <div class="error-message-box d-none">
            <p id="error-message"></p>
        </div>
        <div class="success-message-box d-none">
            <p id="success-message"></p>
        </div>
        <form id="form" method="post" enctype="multipart/form-data" class="custom-validation" action="<?= (isset($user_id) && !empty($user_id)) ? base_url(route_to('user_update_api')) : base_url(route_to('user_create_api')) ?>">
            <input type="hidden" id="user_id" name="user_id" value="<?= @$user_id ?>">
            <input type="hidden" id="user_type" name="user_type" value="<?= @$user_type ?>">
            <div class="row">

                <div class="mb-3 col-md-3">
                    <label class="form-lbel text-capitalize">Name</label>
                    <p class="new_form_p">Please add a Staff Name</p>
                    <input type="text" class="form-control" id="user_name" name="user_name" value="<?= @$user_name ?>" required placeholder="" />
                    <span class="error-message" id="error-user_name"></span>
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label text-capitalize"> Email</label>
                    <p class="new_form_p">Please add a Staff Email</p>
                    <div>
                        <input data-parsley-type="number" type="email" id="user_email" name="user_email" value="<?= @$user_email ?>" class="form-control" required placeholder="" />
                        <span class="error-message" id="error-user_email"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label text-capitalize">Mobile</label>
                    <p class="new_form_p">Please add a Staff Mobile Number</p>
                    <div>
                        <input data-parsley-type="number" type="number" class="form-control" id="user_mobile" name="user_mobile" value="<?= @$user_mobile ?>" required placeholder="" />
                        <span class="error-message" id="error-user_mobile"></span>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Country</label>
                    <p class="new_form_p">Please add a User Country</p>
                    <div>
                        <select class="form-select" aria-label="Default select example" id="user_country_id" name="user_country_id"></select>
                        <span class="error-message" id="error-user_country_id"></span>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">State</label>
                    <p class="new_form_p">Please add a User State</p>
                    <div>
                        <select class="form-select" aria-label="Default select example" id="user_state_id" name="user_state_id"></select>

                        <span class="error-message" id="error-user_state_id"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">City</label>
                    <p class="new_form_p">Please add a User City</p>
                    <div>
                        <select class="form-select" aria-label="Default select example" id="user_city_id" name="user_city_id"></select>
                        <span class="error-message" id="error-user_city_id"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Pincode</label>
                    <p class="new_form_p">Please add a Staff Pincode</p>
                    <div>
                        <input data-parsley-type="number" type="text" class="form-control" id="user_pincode" name="user_pincode" value="<?= @$user_pincode ?>" required placeholder="" />
                        <span class="error-message" id="error-user_pincode"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label text-capitalize">Address</label>
                    <p class="new_form_p">Please add Staff Address</p>
                    <div>
                        <input data-parsley-type="number" type="text" class="form-control" id="user_address" name="user_address" value="<?= @$user_address ?>" required placeholder="" />
                        <span class="error-message" id="error-user_address"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-5">
                    <label class="form-label text-capitalize">Aadhar Card Number</label>
                    <p class="new_form_p">Please add a Staff Aadhar Card Number</p>
                    <div>
                        <input data-parsley-type="number" type="number" class="form-control" required placeholder="" />
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Profile Photo</label>
                    <p class="new_form_p">Please add a Profile Photo</p>
                    <input type="hidden" id="user_image" name="user_image" value="<?= @$user_image ?>">
                    <div class="d-flex">
                        <input type="file" id="file" name="file" class="form-control" onchange="uploadImage('file', 'user', 'user_image', 'user_image_display')" />
                        <button type="button" class="btn del_btn ms-2" onclick="deleteImage('user_image', 'user_image_display')"><i class="bx bx-trash-alt"></i></button>
                    </div>
                    <span class="error-message" id="error-user_image"></span>
                </div>
                <div class="col-md-3 mb-3">
                    <img id="user_image_display" name="user_image_display" onclick="enlargeImage(event)" src="<?= (isset($user_image)) ? base_url($user_image) : "" ?>" height="80">
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
    var selected_user_country_id = "<?= @$user_country_id ?>";
    var selected_user_state_id = "<?= @$user_state_id ?>";
    var selected_user_city_id = "<?= @$user_city_id ?>";

    function successCallback(response) {
        console.log(response);
        if (response.status == 201 || response.status == 200) {
            setTimeout(() => {
                window.location.href = "<?= base_url(route_to($user_type . '_list_page')) ?>";
            }, 2000);
        }
    }

    function errorCallback(response) {
        console.log(response);
    }

    $(document).ready(function() {
        $("#user_state_id").selectize({
            placeholder: "Select State"
        });
        $("#user_city_id").selectize({
            placeholder: "Select City"
        });
        initializeSelectize('user_country_id', {
                placeholder: "Select Country"
            }, "<?= base_url(route_to('country_list_api')) ?>", {}, "country_id", "country_name",
            selected_user_country_id).onchange(function(country_id) {
            initializeSelectize('user_state_id').clearOptions().then(function() {
                // Initialize state selectize dropdown
                if (country_id != '') {
                    initializeSelectize('user_state_id', {
                        placeholder: "Select State"
                    }, "<?= base_url(route_to('state_list_api')) ?>", {
                        country_id: country_id
                    }, 'state_id', 'state_name', selected_user_state_id).onchange(function(
                        state_id) {
                        initializeSelectize('user_city_id').clearOptions().then(
                            function() {
                                // Initialize state selectize dropdown
                                if (state_id != '') {
                                    debugger;
                                    initializeSelectize('user_city_id', {
                                            placeholder: "Select City"
                                        },
                                        "<?= base_url(route_to('city_list_api')) ?>", {
                                            state_id: state_id
                                        }, 'city_id', 'city_name',
                                        selected_user_city_id)
                                }
                            });

                    });
                }
            });

        });
    });
</script>