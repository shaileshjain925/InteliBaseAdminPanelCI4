<!-- -----------main page start----------- -->
<div class="p-3" style="background: #fffceb;">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel"><?= CreateUpdateAlias($user_id ?? null) ?> Staff</h5>
            <p class="new_form_p">Please fill the form to add Staff</p>
        </div>
        <?php if (isset($_form_type) && $_form_type == "component") : ?>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <?php endif; ?>
    </div>
    <div class="offcanvas-body overflow-visible mt-2">
        <form id="user-form" method="post" enctype="multipart/form-data" class="custom-validation" action="<?= base_url(route_to((isset($user_id) && !empty($user_id) ? "user_update_api" : "user_create_api"))) ?>">
            <input type="hidden" name="user_id" id="user_id" value="<?= @$user_id ?>">
            <input type="hidden" name="user_aadhaar_card_image" id="user_aadhaar_card_image" value="<?= @$user_aadhaar_card_image ?>">
            <input type="hidden" name="user_image" id="user_image" value="<?= @$user_image ?>">
            <div class="row">
                <div class="mb-3 col-md-3">
                    <label class="mb-2 form-label">Name</label>
                    <input type="text" class="form-control" name="user_name" value="<?= @$user_name ?>" placeholder="" />
                    <span class="error-message" id="error-user_name"></span>
                </div>
                <div class="mb-3 col-md-3">
                    <label class="mb-2 form-label">Code</label>
                    <input type="text" class="form-control" name="user_code" value="<?= @$user_code ?>" placeholder="" />
                    <span class="error-message" id="error-user_code"></span>
                </div>

                <!-- User Image -->
                <div class="mb-3 col-md-3">
                    <img class="image-fluid" style="height:auto; width:100px" id="user_image_display" onclick="enlargeImage(event)" src="<?= (isset($user_image) && !empty($user_image)) ? base_url($user_image) : "" ?>">
                    <?php if (isset($user_image) && !empty($user_image)) : ?>
                        <button type="button" class="btn btn-danger ms-2" onclick="deleteImage('user_image', 'user_image_display')"><i class="bx bx-trash-alt"></i></button>
                    <?php endif; ?>
                    <label class="mb-2 form-label">Staff Image</label>
                    <input type="file" name="user_image_upload" id="user_image_upload" class="form-control" onchange="uploadImage('user_image_upload','user','user_image','user_image_display')">
                    <span class="error-message" id="error-user_image"></span>
                </div>
                <!-- user_aadhaar_card_image -->
                <div class="mb-3 col-md-3">
                    <img class="image-fluid" style="height:auto; width:100px" id="user_aadhaar_card_image_display" onclick="enlargeImage(event)" src="<?= (isset($user_aadhaar_card_image) && !empty($user_aadhaar_card_image)) ? base_url($user_aadhaar_card_image) : "" ?>">
                    <?php if (isset($user_aadhaar_card_image) && !empty($user_aadhaar_card_image)) : ?>
                        <button type="button" class="btn btn-danger ms-2" onclick="deleteImage('user_aadhaar_card_image', 'user_aadhaar_card_image_display')"><i class="bx bx-trash-alt"></i></button>
                    <?php endif; ?>
                    <label class="mb-2 form-label">Staff Aadhaar Image</label>
                    <input type="file" name="user_aadhaar_card_image_upload" id="user_aadhaar_card_image_upload" class="form-control" onchange="uploadImage('user_aadhaar_card_image_upload','user','user_aadhaar_card_image','user_aadhaar_card_image_display')">
                    <span class="error-message" id="error-user_aadhaar_card_image"></span>
                </div>

                <!-- User Email -->
                <div class="mb-3 col-md-4">
                    <label class="mb-2 form-label">Email</label>
                    <input type="text" class="form-control" name="user_email" value="<?= @$user_email ?>" placeholder="" />
                    <span class="error-message" id="error-user_email"></span>
                </div>

                <!-- User Mobile -->
                <div class="mb-3 col-md-4">
                    <label class="mb-2 form-label">Mobile Number</label>
                    <input type="text" class="form-control" name="user_mobile" value="<?= @$user_mobile ?>" placeholder="" />
                    <span class="error-message" id="error-user_mobile"></span>
                </div>

                <!-- User Address -->
                <div class="mb-3 col-md-4">
                    <label class="mb-2 form-label">Address</label>
                    <textarea type="text" class="form-control" name="user_address" placeholder=""><?= @$user_address ?></textarea>
                    <span class="error-message" id="error-user_address"></span>
                </div>

                <!-- Country -->
                <div class="mb-3 col-md-3">
                    <label class="mb-2 form-label">Country</label>
                    <select class="" name="user_country_id" id="user_country_id">
                    </select>
                    <span class="error-message" id="error-user_country_id"></span>
                </div>

                <!-- State -->
                <div class="mb-3 col-md-3">
                    <label class="mb-2 form-label">State</label>
                    <select class="" name="user_state_id" id="user_state_id">
                    </select>
                    <span class="error-message" id="error-user_state_id"></span>
                </div>

                <!-- City -->
                <div class="mb-3 col-md-3">
                    <label class="mb-2 form-label">City</label>
                    <select class="" name="user_city_id" id="user_city_id">
                    </select>
                    <span class="error-message" id="error-user_city_id"></span>
                </div>


                <!-- Pincode -->
                <div class="mb-3 col-md-3">
                    <label class="mb-2 form-label">Pincode</label>
                    <input type="text" class="form-control" name="user_pincode" value="<?= @$user_pincode ?>" placeholder="" />
                    <span class="error-message" id="error-user_pincode"></span>
                </div>
                <!-- Designation -->
                <div class="mb-3 col-md-3">
                    <label class="mb-2 form-label">Designation</label>
                    <select class="" name="designation_id" id="designation_id">
                    </select>
                    <span class="error-message" id="error-designation_id"></span>
                </div>

                <!-- Role To -->
                <div class="mb-3 col-md-3">
                    <label class="mb-2 form-label">Role</label>
                    <select class="" name="role_id" id="role_id">
                    </select>
                    <span class="error-message" id="error-role_id"></span>
                </div>

                <!-- Reporting To -->
                <div class="mb-3 col-md-3">
                    <label class="mb-2 form-label">Reporting To</label>
                    <select class="" name="reporting_to_user_id" id="reporting_to_user_id">
                    </select>
                    <span class="error-message" id="error-reporting_to_user_id"></span>
                </div>

                <!-- User Type-->
                <div class="mb-3 col-md-3">
                    <label class="mb-2 form-label">User Type</label>
                    <select class="" name="user_type" id="user_type">
                        <?php if (isset($user_type) && $user_type == 'super_admin'): ?>
                            <option value="super_admin" <?= (isset($user_type) && $user_type == 'super_admin') ? "selected" : "" ?>>Super Admin</option>
                        <?php else: ?>
                            <option value="admin" <?= (isset($user_type) && $user_type == 'admin') ? "selected" : "" ?>>Admin</option>
                            <option value="staff" <?= (isset($user_type) && $user_type == 'staff') ? "selected" : "" ?>>Staff</option>
                        <?php endif; ?>
                    </select>
                    <span class="error-message" id="error-user_type"></span>
                </div>



                <!-- Aadhaar Card -->
                <div class="mb-3 col-md-3">
                    <label class="mb-2 form-label">Aadhaar Card</label>
                    <input type="text" class="form-control" name="user_aadhaar_card" value="<?= @$user_aadhaar_card ?>" placeholder="" />
                    <span class="error-message" id="error-user_aadhaar_card"></span>
                </div>

                <!-- Password -->
                <div class="mb-3 col-md-3">
                    <label class="mb-2 form-label">Password</label>
                    <input type="password" class="form-control" name="password" />
                    <span class="error-message" id="error-password"></span>
                </div>

                <!-- Form Submit -->
                <div class="form_submit_div text-center">
                    <button type="button" class="submit_btn waves-effect waves-light me-1" onclick="user_form_submit()">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    var selected_user_country_id = '<?= @$user_country_id ?>';
    var selected_user_state_id = '<?= @$user_state_id ?>';
    var selected_user_city_id = '<?= @$user_city_id ?>';
    var selected_designation_id = '<?= @$designation_id ?>';
    var selected_reporting_to_user_id = '<?= @$reporting_to_user_id ?>';
    var selected_role_id = '<?= @$role_id ?>';
</script>
<?php if (!isset($_form_type) || $_form_type != "component") : ?>
    <script>
        function user_form_submit() {
            submitFormWithAjax('user-form', true, true, successCallback, errorCallback)
        }

        function successCallback(response) {
            if (response.status == 200 || response.status == 201) {
                setInterval(() => {
                    window.location.href = "<?= base_url(route_to('staff_list_page')) ?>";
                }, 2000);
            } else {
                console.log(response);
            }
        }

        function errorCallback(response) {

        }
        $(document).ready(function() {
            initializeSelectize('role_id', {
                placeholder: "Select Role"
            }, apiUrl = "<?= base_url(route_to('role_list_api')) ?>", {}, "role_id", "role_name", selected_role_id)
            initializeSelectize('reporting_to_user_id', {
                placeholder: "Select Reporting To"
            }, apiUrl = "<?= base_url(route_to('user_list_api')) ?>", {
                <?php if (isset($user_id) && !empty($user_id)): ?>
                    _whereNotIn: [{
                        fieldname: "reporting_to_user_id",
                        value: ["<?= $user_id ?>"]
                    }, ]
                <?php endif; ?>
            }, "user_id", "user_name", selected_reporting_to_user_id)
            initializeSelectize('designation_id', {
                placeholder: "Select Designation"
            }, apiUrl = "<?= base_url(route_to('designation_list_api')) ?>", {}, "designation_id", "designation_name", selected_designation_id)

            initializeSelectize('user_state_id', {
                placeholder: "Select State"
            })
            initializeSelectize('user_city_id', {
                placeholder: "Select City"
            })
            initializeSelectize('user_type', {
                placeholder: "Select User Type"
            })
            initializeSelectize('user_country_id', {
                    placeholder: "Select Country"
                }, apiUrl = "<?= base_url(route_to('country_list_api')) ?>", {}, "country_id", "country_name", selected_user_country_id)
                .onchange(function(
                    country_id) {
                    initializeSelectize('user_state_id').clearOptions().then(function() {
                        // Initialize state selectize dropdown
                        if (country_id != '') {
                            initializeSelectize('user_state_id', {
                                placeholder: "Select State"
                            }, "<?= base_url(route_to('state_list_api')) ?>", {
                                country_id: country_id
                            }, 'state_id', 'state_name', selected_user_state_id).onchange(function(
                                state_id) {
                                initializeSelectize('user_city_id').clearOptions().then(function() {
                                    // Initialize state selectize dropdown
                                    if (state_id != '') {
                                        initializeSelectize('user_city_id', {
                                            placeholder: "Select City"
                                        }, "<?= base_url(route_to('city_list_api')) ?>", {
                                            state_id: state_id
                                        }, 'city_id', 'city_name', selected_user_city_id)
                                    }
                                });
                            });
                        }
                    });
                });
        });
    </script>
<?php endif; ?>
<!-- --------------main page end----------- -->