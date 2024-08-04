<div class="p-3 form_bg">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="AddVendorLabel">Terms and Condition</h5>
            <p class="new_form_p">Please fill the form to add Terms and Condition</p>
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
        <form id="form" method="post" enctype="multipart/form-data" class="custom-validation" action="<?= (isset($terms_condition_id) && !empty($terms_condition_id)) ? base_url(route_to('vouchar_terms_and_condition_update_api')) : base_url(route_to('vouchar_terms_and_condition_create_api')) ?>">
            <input type="hidden" id="terms_condition_id" name="terms_condition_id" value="<?= @$terms_condition_id ?>">
            <div class="row">
                <!-- <div class="mb-3 col-md-6">
                    <label class="form-label">Terms Id </label>
                    <p class="new_form_p">Automatically Appear</p>
                    <input type="text" class="form-control" required placeholder="" />
                </div> -->
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Terms Type <span class="red_color">*</span></label>
                    <p class="new_form_p">Please Select Terms</p>
                    <div>
                        <select class="form-select" aria-label="Default select example" id="v_type" name="v_type" value="<?= @$v_type ?>">
                        <option disabled>Select Terms</option>
                        <option value="invoice" <?= (isset($v_type) && $v_type == "invoice") ? "selected" : "" ?>>Invoice
                        </option>
                        <option value="order" <?= (isset($v_type) && $v_type == "order") ? "selected" : "" ?>>Order
                        </option>
                        <option value="quotation" <?= (isset($v_type) && $v_type == "quotation") ? "selected" : "" ?>>Quotation
                        </option>
                        </select>
                        <span class="error-message" id="error-v_type"></span>
                    </div>
                </div>

                <div class="mb-3 col-md-12">
                    <label class="form-label">Terms Description</label>
                    <p class="new_form_p">Please add a description</p>
                    <div>
                        <textarea required class="ckeditor-active" rows="5" id="terms_condition" name="terms_condition"><?= @$terms_condition ?></textarea>
                        <span class="error-message" id="error-terms_condition"></span>
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
        function successCallback(response) {
        console.log(response);
        if (response.status == 201 || response.status == 200) {
            setTimeout(() => {
                window.location.href = "<?= base_url(route_to('terms_list_page')) ?>";
            }, 2000);
        }
    }

    function errorCallback(response) {
        console.log(response);
    }
    $(document).ready(function() {
          $("#v_type").selectize({});
         
      });
</script>
