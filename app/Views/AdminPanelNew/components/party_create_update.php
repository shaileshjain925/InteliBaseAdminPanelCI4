<!-- Party Form -->
<div class="offcanvas-header">
    <h5 id="Add_partyLabel"><?= isset($party_id) ? "Update" : "Create" ?> <?= $party_type ?></h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <form id="party-form" method="post" enctype="multipart/form-data" action="<?= isset($party_id) ? base_url(route_to('party_update_api')) : base_url(route_to('party_create_api')) ?>">

        <!-- Hidden Party ID (for updates) -->
        <input type="hidden" name="party_id" value="<?= @$party_id ?>">
        <input type="hidden" name="party_type" value="<?= $party_type ?>">

        <div class="row">
            <h5>Basic Information</h5>
            <!-- Party Code -->
            <div class="mb-3 col-md-4">
                <label for="party_code" class="form-label">Party Code</label>
                <input type="text" class="form-control" id="party_code" name="party_code" value="<?= @$party_code ?>" placeholder="Party Code">
                <span class="error-message" id="error-party_code"></span>
            </div>

            <!-- Party Name -->
            <div class="mb-3 col-md-4">
                <label for="party_name" class="form-label">Party Name</label>
                <input type="text" class="form-control" id="party_name" name="party_name" value="<?= @$party_name ?>" placeholder="Party Name">
                <span class="error-message" id="error-party_name"></span>
            </div>

            <!-- Party Email -->
            <div class="mb-3 col-md-4">
                <label for="party_email" class="form-label">Party Email</label>
                <input type="email" class="form-control" id="party_email" name="party_email" value="<?= @$party_email ?>" placeholder="Party Email">
                <span class="error-message" id="error-party_email"></span>
            </div>

            <!-- Party Number -->
            <div class="mb-3 col-md-4">
                <label for="party_number" class="form-label">Party Number</label>
                <input type="text" class="form-control" id="party_number" name="party_number" value="<?= @$party_number ?>" placeholder="Party Number">
                <span class="error-message" id="error-party_number"></span>
            </div>

            <!-- PAN Number -->
            <div class="mb-3 col-md-4">
                <label for="pan_no" class="form-label">PAN Number</label>
                <input type="text" class="form-control" id="pan_no" name="pan_no" value="<?= @$pan_no ?>" placeholder="PAN Number">
                <span class="error-message" id="error-pan_no"></span>
            </div>

            <!-- Payment Term -->
            <div class="mb-3 col-md-4">
                <label for="payment_term_id" class="form-label">Payment Term</label>
                <select class="" id="payment_term_id" name="payment_term_id" data-value="<?= @$payment_term_id ?>">
                    <!-- Options populated dynamically -->
                </select>
                <span class="error-message" id="error-payment_term_id"></span>
            </div>
            <h5>Business Details</h5>
            <!-- Firm Type -->
            <div class="mb-3 col-md-4">
                <label for="firm_type" class="form-label">Firm Type</label>
                <select class="" id="firm_type" name="firm_type">
                    <option value="PROPRIETORSHIP" <?= @$firm_type == 'PROPRIETORSHIP' ? 'selected' : '' ?>>Proprietorship</option>
                    <option value="PARTNERSHIP" <?= @$firm_type == 'PARTNERSHIP' ? 'selected' : '' ?>>Partnership</option>
                    <option value="LLP" <?= @$firm_type == 'LLP' ? 'selected' : '' ?>>LLP</option>
                    <option value="PVT LTD" <?= @$firm_type == 'PVT LTD' ? 'selected' : '' ?>>Pvt Ltd</option>
                    <option value="LIMITED" <?= @$firm_type == 'LIMITED' ? 'selected' : '' ?>>Limited</option>
                    <option value="GOVT" <?= @$firm_type == 'GOVT' ? 'selected' : '' ?>>Govt</option>
                    <option value="ENTERPRISE" <?= @$firm_type == 'ENTERPRISE' ? 'selected' : '' ?>>Enterprise</option>
                    <option value="SEMI GOVT.ENTR" <?= @$firm_type == 'SEMI GOVT.ENTR' ? 'selected' : '' ?>>Semi Govt. Enterprise</option>
                    <option value="EOU" <?= @$firm_type == 'EOU' ? 'selected' : '' ?>>EOU</option>
                </select>
                <span class="error-message" id="error-firm_type"></span>
            </div>

            <!-- Business Nature -->
            <div class="mb-3 col-md-4">
                <label for="business_nature_code" class="form-label">Business Nature</label>
                <select class="" id="business_nature_code" name="business_nature_code">
                    <option value="Retail" <?= @$business_nature_code == 'Retail' ? 'selected' : '' ?>>Retail</option>
                    <option value="Wholesale" <?= @$business_nature_code == 'Wholesale' ? 'selected' : '' ?>>Wholesale</option>
                    <option value="Stockist" <?= @$business_nature_code == 'Stockist' ? 'selected' : '' ?>>Stockist</option>
                    <option value="Manufacture" <?= @$business_nature_code == 'Manufacture' ? 'selected' : '' ?>>Manufacture</option>
                    <option value="Service" <?= @$business_nature_code == 'Service' ? 'selected' : '' ?>>Service</option>
                </select>
                <span class="error-message" id="error-business_nature_code"></span>
            </div>

            <!-- Business Type -->
            <div class="mb-3 col-md-4">
                <label for="business_type_id" class="form-label">Business Type</label>
                <select class="" id="business_type_id" name="business_type_id" data-value="<?= @$business_type_id ?>">
                    <!-- Options populated dynamically -->
                </select>
                <span class="error-message" id="error-business_type_id"></span>
            </div>

            <h5>Shipping Details</h5>

            <!-- Delivery Term -->
            <div class="mb-3 col-md-4">
                <label for="delivery_term_id" class="form-label">Delivery Term</label>
                <select class="" id="delivery_term_id" name="delivery_term_id" data-value="<?= @$delivery_term_id ?>">
                    <!-- Options populated dynamically -->
                </select>
                <span class="error-message" id="error-delivery_term_id"></span>
            </div>

            <!-- Packaging Type -->
            <div class="mb-3 col-md-4">
                <label for="packaging_type" class="form-label">Packaging Type</label>
                <select class="" id="packaging_type" name="packaging_type">
                    <option value="Standard" <?= @$packaging_type == 'Standard' ? 'selected' : '' ?>>Standard</option>
                    <option value="Non-Standard" <?= @$packaging_type == 'Non-Standard' ? 'selected' : '' ?>>Non-Standard</option>
                </select>
                <span class="error-message" id="error-packaging_type"></span>
            </div>
            <!-- Estimate Days -->
            <div class="mb-3 col-md-4">
                <label for="estimated_days_to_deliver" class="form-label">Estimate Delivery Dates</label>
                <input type="number" class="form-control" id="estimated_days_to_deliver" name="estimated_days_to_deliver" value="<?= @$estimated_days_to_deliver ?>" placeholder="Estimate Delivery Dates">
                <span class="error-message" id="error-estimated_days_to_deliver"></span>
            </div>
            <!--Billing Address -->
            <div class="mb-3 col-md-6">
                <label for="default_billing_address_id" class="form-label">Billing Address</label>
                <select class="" id="default_billing_address_id" name="default_billing_address_id" data-value="<?= @$default_billing_address_id ?>">
                </select>
                <span class="error-message" id="error-default_billing_address_id"></span>
            </div>
            <!-- Shipping Address -->
            <div class="mb-3 col-md-6">
                <label for="default_shipping_address_id" class="form-label">Shipping Address</label>
                <select class="" id="default_shipping_address_id" name="default_shipping_address_id" data-value="<?= @$default_shipping_address_id ?>">
                </select>
                <span class="error-message" id="error-default_shipping_address_id"></span>
            </div>

            <h5>Bank Details</h5>

            <!-- Bank Name -->
            <div class="mb-3 col-md-4">
                <label for="bank_name" class="form-label">Bank Name</label>
                <input type="text" class="form-control" id="bank_name" name="bank_name" value="<?= @$bank_name ?>" placeholder="Bank Name">
                <span class="error-message" id="error-bank_name"></span>
            </div>

            <!-- Bank Account Number -->
            <div class="mb-3 col-md-4">
                <label for="bank_no" class="form-label">Bank Account Number</label>
                <input type="text" class="form-control" id="bank_no" name="bank_no" value="<?= @$bank_no ?>" placeholder="Bank Account Number">
                <span class="error-message" id="error-bank_no"></span>
            </div>

            <!-- Bank IFSC -->
            <div class="mb-3 col-md-4">
                <label for="bank_ifsc" class="form-label">Bank IFSC</label>
                <input type="text" class="form-control" id="bank_ifsc" name="bank_ifsc" value="<?= @$bank_ifsc ?>" placeholder="Bank IFSC">
                <span class="error-message" id="error-bank_ifsc"></span>
            </div>

            <!-- Bank Holder Name -->
            <div class="mb-3 col-md-4">
                <label for="bank_holder_name" class="form-label">Bank Holder Name</label>
                <input type="text" class="form-control" id="bank_holder_name" name="bank_holder_name" value="<?= @$bank_holder_name ?>" placeholder="Bank Holder Name">
                <span class="error-message" id="error-bank_holder_name"></span>
            </div>

            <!-- Notes -->
            <div class="mb-3 col-md-12">
                <label for="notes" class="form-label">Notes</label>
                <textarea class="form-control" id="notes" name="notes" placeholder="Additional Notes"><?= @$notes ?></textarea>
                <span class="error-message" id="error-notes"></span>
            </div>

            <!-- Website -->
            <div class="mb-3 col-md-4">
                <label for="website" class="form-label">Website</label>
                <input type="text" class="form-control" id="website" name="website" value="<?= @$website ?>" placeholder="Website URL">
                <span class="error-message" id="error-website"></span>
            </div>
            <!-- Is Active -->
            <div class="mb-3 col-md-4">
                <label for="is_active" class="form-label">Is Active</label>
                <select class="" id="is_active" name="is_active">
                    <option value="1" <?= @$is_active == '1' ? 'selected' : '' ?>>Yes</option>
                    <option value="0" <?= @$is_active == '0' ? 'selected' : '' ?>>No</option>
                </select>
                <span class="error-message" id="error-is_active"></span>
            </div>

            <!-- Contact Person Details -->
            <h5>Contact Person Details <span onclick="addContactRow()" class="btn ms-2 btn-sm add_form_btn"><i class="bx bx-plus me-2"></i>Add Row</span></h5>
            <div id="contact_person_div" class="container">
                <?php if (isset($contact_person_json_data) && !empty($contact_person_json_data)): ?>
                    <?php foreach (json_decode($contact_person_json_data, true) as $key => $contact_details): ?>
                        <?= view('AdminPanelNew/components/party_contact_person_detail', array_merge($contact_details, ['index' => $key])) ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <?= view('AdminPanelNew/components/party_contact_person_detail', array_merge(['index' => 0])) ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="form_submit_div text-center mt-4">
            <button type="button" class="btn btn-primary" onclick="submitFormWithAjax('party-form', true, true, partyFormSuccessCallback, partyFormErrorCallback)">Submit</button>
        </div>
    </form>
</div>