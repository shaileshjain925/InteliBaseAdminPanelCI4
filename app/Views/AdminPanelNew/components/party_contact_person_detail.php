<hr>
<div class="row" id="row_party_<?= $index ?>">
    <div class="mb-3 col-md-3">
        <label for="party_contact_data[<?= $index ?>]person_name" class="form-label">Name</label>
        <input type="text" class="form-control" id="party_contact_data[<?= $index ?>]person_name" name="party_contact_data[<?= $index ?>][person_name]" value="<?= @$person_name ?>" placeholder="Name">
        <span class="error-message" id="error-party_contact_data[<?= $index ?>]person_name"></span>
    </div>
    <div class="mb-3 col-md-3">
        <label for="party_contact_data[<?= $index ?>]person_designation" class="form-label">Designation</label>
        <input type="text" class="form-control" id="party_contact_data[<?= $index ?>]person_designation" name="party_contact_data[<?= $index ?>][person_designation]" value="<?= @$person_designation ?>" placeholder="Designation">
        <span class="error-message" id="error-party_contact_data[<?= $index ?>]person_designation"></span>
    </div>
    <div class="mb-3 col-md-3">
        <label for="party_contact_data[<?= $index ?>]person_department" class="form-label">Department</label>
        <input type="text" class="form-control" id="party_contact_data[<?= $index ?>]person_department" name="party_contact_data[<?= $index ?>][person_department]" value="<?= @$person_department ?>" placeholder="Department">
        <span class="error-message" id="error-party_contact_data[<?= $index ?>]person_department"></span>
    </div>
    <div class="mb-3 col-md-3">
        <label for="party_contact_data[<?= $index ?>]person_email_id" class="form-label">Email</label>
        <input type="text" class="form-control" id="party_contact_data[<?= $index ?>]person_email_id" name="party_contact_data[<?= $index ?>][person_email_id]" value="<?= @$person_email_id ?>" placeholder="Email">
        <span class="error-message" id="error-party_contact_data[<?= $index ?>]person_email_id"></span>
    </div>
    <div class="mb-3 col-md-3">
        <label for="party_contact_data[<?= $index ?>]person_mobile_number" class="form-label">Mobile</label>
        <input type="text" class="form-control" id="party_contact_data[<?= $index ?>]person_mobile_number" name="party_contact_data[<?= $index ?>][person_mobile_number]" value="<?= @$person_mobile_number ?>" placeholder="Mobile">
        <span class="error-message" id="error-party_contact_data[<?= $index ?>]person_mobile_number"></span>
    </div>
    <div class="mb-3 col-md-3">
        <label for="party_contact_data[<?= $index ?>]person_isd" class="form-label">ISD Code</label>
        <input type="text" class="form-control" id="party_contact_data[<?= $index ?>]person_isd" name="party_contact_data[<?= $index ?>][person_isd]" value="<?= @$person_isd ?>" placeholder="ISD Code">
        <span class="error-message" id="error-party_contact_data[<?= $index ?>]person_isd"></span>
    </div>
    <div class="mb-3 col-md-3">
        <label for="party_contact_data[<?= $index ?>]person_telephone_number" class="form-label">Telephone Number</label>
        <input type="text" class="form-control" id="party_contact_data[<?= $index ?>]person_telephone_number" name="party_contact_data[<?= $index ?>][person_telephone_number]" value="<?= @$person_telephone_number ?>" placeholder="Telephone Number">
        <span class="error-message" id="error-party_contact_data[<?= $index ?>]person_telephone_number"></span>
    </div>
    <div class="mb-3 col-md-3 align-content-center">
        <button type="button" class="text-white btn btn-sm btn-danger" onclick="$('#row_party_<?= $index ?>').remove();">
            <i class="bx bx-trash-alt"></i>
        </button>
    </div>

</div>