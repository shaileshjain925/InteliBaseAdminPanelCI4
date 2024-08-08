<!-- -----------main page start----------- -->
<div class="p-3" style="background: #fffceb;">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel"><?= CreateUpdateAlias($user_id ?? null) ?> <?= UserType::from($user_type)->name ?></h5>
            <p class="new_form_p">Please fill the form to add <?= UserType::from($user_type)->name ?></p>
        </div>
        <?php if (isset($_form_type) && $_form_type == "component"): ?>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <?php endif; ?>
    </div>
    <div class="offcanvas-body overflow-visible mt-2">
        <form id="user-form" method="post" enctype="multipart/form-data" class="custom-validation" action="<?= base_url(route_to((isset($user_id) && !empty($user_id) ? "user_update_api" : "user_create_api"))) ?>">
            <input type="hidden" name="user_id" id="user_id" value="<?= @$user_id ?>">
            <div class="row">
                <!-- User Name -->
                <div class="mb-3 col-md-4">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="user_name" value="<?= @$user_name ?>" placeholder="" />
                    <span class="error-message" id="user_name-error"></span>
                </div>

                <!-- User Image -->
                <div class="mb-3 col-md-6">
                    <label class="form-label">User Image</label>
                    <input type="file" class="form-control" name="user_image" />
                    <span class="error-message" id="user_image-error"></span>
                </div>

                <!-- User Email -->
                <div class="mb-3 col-md-4">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" name="user_email" value="<?= @$user_email ?>" placeholder="" />
                    <span class="error-message" id="user_email-error"></span>
                </div>

                <!-- User Mobile -->
                <div class="mb-3 col-md-4">
                    <label class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" name="user_mobile" value="<?= @$user_mobile ?>" placeholder="" />
                    <span class="error-message" id="user_mobile-error"></span>
                </div>

                <!-- User Address -->
                <div class="mb-3 col-md-12">
                    <label class="form-label">Address</label>
                    <textarea type="text" class="form-control" name="user_address" placeholder=""><?= @$user_address ?></textarea>
                    <span class="error-message" id="user_address-error"></span>
                </div>

                <!-- Country -->
                <div class="mb-3 col-md-4">
                    <label class="form-label">Country</label>
                    <select class="selectize-select" name="user_country_id">
                    </select>
                    <span class="error-message" id="user_country_id-error"></span>
                </div>

                <!-- State -->
                <div class="mb-3 col-md-4">
                    <label class="form-label">State</label>
                    <select class="selectize-select" name="user_state_id">
                    </select>
                    <span class="error-message" id="user_state_id-error"></span>
                </div>

                <!-- City -->
                <div class="mb-3 col-md-4">
                    <label class="form-label">City</label>
                    <select class="selectize-select" name="user_city_id">
                    </select>
                    <span class="error-message" id="user_city_id-error"></span>
                </div>


                <!-- Pincode -->
                <div class="mb-3 col-md-4">
                    <label class="form-label">Pincode</label>
                    <input type="text" class="form-control" name="user_pincode" value="<?= @$user_pincode ?>" placeholder="" />
                    <span class="error-message" id="user_pincode-error"></span>
                </div>

                <!-- Aadhaar Card -->
                <div class="mb-3 col-md-4">
                    <label class="form-label">Aadhaar Card</label>
                    <input type="text" class="form-control" name="user_aadhaar_card" value="<?= @$user_aadhaar_card ?>" placeholder="" />
                    <span class="error-message" id="user_aadhaar_card-error"></span>
                </div>

                <!-- Aadhaar Card Image -->
                <div class="mb-3 col-md-4">
                    <label class="form-label">Aadhaar Card Image</label>
                    <input type="file" class="form-control" name="user_aadhaar_card_image" />
                    <span class="error-message" id="user_aadhaar_card_image-error"></span>
                </div>

                <!-- Password -->
                <div class="mb-3 col-md-6">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" />
                    <span class="error-message" id="password-error"></span>
                </div>

                <!-- Reporting To -->
                <?php if ($user_type == 'sales_executive'): ?>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Reporting To</label>
                        <select class="selectize-select" name="user_city_id">
                            <option value="" selected>Select City</option>
                        </select>
                        <span class="error-message" id="user_city_id-error"></span>
                    </div>
                <?php endif; ?>



                <!-- Form Submit -->
                <div class="form_submit_div text-center">
                    <button type="submit" class="submit_btn waves-effect waves-light me-1" onclick="user_form_submit()">
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
    var selected_user_country_id = '<?= @$user_country_id ?>';
</script>
<?php if (!isset($_form_type) || $_form_type != "component"): ?>
    <script>
        function user_form_submit() {
            submitFormWithAjax('user-form', true, true, successCallback, errorCallback)
        }

        function successCallback(response) {

        }

        function errorCallback(response) {

        }
    </script>
<?php endif; ?>
<!-- --------------main page end----------- -->