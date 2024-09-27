<!-- Party Form -->
<div class="offcanvas-header">
    <h5 id="Add_partyLabel"><?= isset($address_id) ? "Update" : "Create" ?> Address</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<!-- Party Address Form -->
<div class="offcanvas-body overflow-visible mt-2">
    <form id="party_address-form" method="post" enctype="multipart/form-data" class="custom-validation" action="<?= base_url(route_to((isset($address_id) && !empty($address_id) ? "party_address_update_api" : "party_address_create_api"))) ?>">
        <input type="hidden" name="address_id" id="address_id" value="<?= @$address_id ?>">
        <input type="hidden" name="party_id" id="party_id" value="<?= @$party_id ?>">
        <div class="row">
            <!-- Short Address Name -->
            <div class="mb-3 col-md-4">
                <label class="mb-2 form-label">Short Address Name</label>
                <input type="text" class="form-control" name="address_short_name" value="<?= @$address_short_name ?>" placeholder="Short Name for Address" />
                <span class="error-message" id="error-address_short_name"></span>
            </div>
            <!-- Firm Name -->
            <div class="mb-3 col-md-4">
                <label class="mb-2 form-label">Firm Name</label>
                <input type="text" class="form-control" name="firm_name" value="<?= @$firm_name ?>" placeholder="Firm Name" required />
                <span class="error-message" id="error-firm_name"></span>
            </div>

            <!-- Firm GST -->
            <div class="mb-3 col-md-4">
                <label class="mb-2 form-label">Firm GST</label>
                <input type="text" class="form-control" name="firm_gst" value="<?= @$firm_gst ?>" placeholder="Firm GST" maxlength="15" />
                <span class="error-message" id="error-firm_gst"></span>
            </div>

            <!-- Party Country -->
            <div class="mb-3 col-md-4">
                <label class="mb-2 form-label">Country</label>
                <select class="" name="party_country_id" id="party_country_id" data-value="<?= @$party_country_id ?>"></select>
                <span class="error-message" id="error-party_country_id"></span>
            </div>

            <!-- Party State -->
            <div class="mb-3 col-md-4">
                <label class="mb-2 form-label">State</label>
                <select class="" name="party_state_id" id="party_state_id" data-value="<?= @$party_state_id ?>"></select>
                <span class="error-message" id="error-party_state_id"></span>
            </div>

            <!-- Party City -->
            <div class="mb-3 col-md-4">
                <label class="mb-2 form-label">City</label>
                <select class="" name="party_city_id" id="party_city_id" data-value="<?= @$party_city_id ?>"></select>
                <span class="error-message" id="error-party_city_id"></span>
            </div>

            <!-- Party Pincode -->
            <div class="mb-3 col-md-4">
                <label class="mb-2 form-label">Pincode</label>
                <input type="text" class="form-control" name="party_pincode" value="<?= @$party_pincode ?>" placeholder="Pincode" />
                <span class="error-message" id="error-party_pincode"></span>
            </div>

            <!-- Party Address -->
            <div class="mb-3 col-md-8">
                <label class="mb-2 form-label">Address</label>
                <textarea class="form-control" name="party_addresses" placeholder="Full Address"><?= @$party_addresses ?></textarea>
                <span class="error-message" id="error-party_addresses"></span>
            </div>

            <!-- Contact Person Name -->
            <div class="mb-3 col-md-4">
                <label class="mb-2 form-label">Contact Person</label>
                <input type="text" class="form-control" name="address_person_name" value="<?= @$address_person_name ?>" placeholder="Contact Person Name" />
                <span class="error-message" id="error-address_person_name"></span>
            </div>

            <!-- Contact Person Mobile -->
            <div class="mb-3 col-md-4">
                <label class="mb-2 form-label">Contact Mobile</label>
                <input type="text" class="form-control" name="address_person_mobile" value="<?= @$address_person_mobile ?>" placeholder="Contact Mobile" />
                <span class="error-message" id="error-address_person_mobile"></span>
            </div>

            <!-- Contact Person Email -->
            <div class="mb-3 col-md-4">
                <label class="mb-2 form-label">Contact Email</label>
                <input type="email" class="form-control" name="address_person_email" value="<?= @$address_person_email ?>" placeholder="Contact Email" />
                <span class="error-message" id="error-address_person_email"></span>
            </div>

            <!-- Address Type -->
            <div class="mb-3 col-md-4">
                <label class="mb-2 form-label">Address Type</label>
                <select class="" name="address_type" id="address_type">
                    <option value="MainOffice" <?= isset($address_type) && $address_type == 'MainOffice' ? 'selected' : '' ?>>Main Office</option>
                    <option value="Other" <?= isset($address_type) && $address_type == 'Other' ? 'selected' : '' ?>>Other</option>
                </select>
                <span class="error-message" id="error-address_type"></span>
            </div>
        </div>

        <!-- Form Submit -->
        <div class="form_submit_div text-center mt-4">
            <button type="button" class="submit_btn waves-effect waves-light me-1" onclick="submitFormWithAjax('party_address-form', true, true, partyAddressFormSuccessCallback, partyAddressFormErrorCallback)">Submit</button>
        </div>
    </form>
</div>