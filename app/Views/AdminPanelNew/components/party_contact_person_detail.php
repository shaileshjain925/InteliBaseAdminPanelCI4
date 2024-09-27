<div class="row" id="row_party_<?= $index ?>">
    <div class="mb-3 col-md-3">
        <label for="contact_person_json_data[<?= $index ?>]person_name" class="form-label">Name</label>
        <input type="text" class="form-control" id="contact_person_json_data[<?= $index ?>]person_name" name="contact_person_json_data[<?= $index ?>][person_name]" value="<?= @$person_name ?>" placeholder="Name">
        <span class="error-message" id="error-contact_person_json_data[<?= $index ?>]person_name"></span>
    </div>
    <div class="mb-3 col-md-3">
        <label for="contact_person_json_data[<?= $index ?>]person_designation" class="form-label">Designation</label>
        <input type="text" class="form-control" id="contact_person_json_data[<?= $index ?>]person_designation" name="contact_person_json_data[<?= $index ?>][person_designation]" value="<?= @$person_designation ?>" placeholder="Designation">
        <span class="error-message" id="error-contact_person_json_data[<?= $index ?>]person_designation"></span>
    </div>
    <div class="mb-3 col-md-2">
        <label for="contact_person_json_data[<?= $index ?>]person_mobile" class="form-label">Mobile</label>
        <input type="text" class="form-control" id="contact_person_json_data[<?= $index ?>]person_mobile" name="contact_person_json_data[<?= $index ?>][person_mobile]" value="<?= @$person_mobile ?>" placeholder="Mobile">
        <span class="error-message" id="error-contact_person_json_data[<?= $index ?>]person_mobile"></span>
    </div>
    <div class="mb-3 col-md-3">
        <label for="contact_person_json_data[<?= $index ?>]person_email" class="form-label">Email</label>
        <input type="text" class="form-control" id="contact_person_json_data[<?= $index ?>]person_email" name="contact_person_json_data[<?= $index ?>][person_email]" value="<?= @$person_email ?>" placeholder="Email">
        <span class="error-message" id="error-contact_person_json_data[<?= $index ?>]person_email"></span>
    </div>
    <div class="mb-3 col-md-1 align-content-center">
        <button type="button" class="text-white btn btn-sm btn-danger" onclick="$('#row_party_<?= $index ?>').remove();">
            <i class="bx bx-trash-alt"></i>
        </button>
    </div>

</div>