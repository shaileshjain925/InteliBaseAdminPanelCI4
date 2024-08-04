<!-- -----------main page start----------- -->
<div class="p-3 form_bg">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel"><?= (isset($id) && !empty($id)) ? "Update" : "Create" ?> Website Information </h5>
            <p class="new_form_p">Please fill the form to <?= (isset($id) && !empty($id)) ? "Update" : "Create" ?> Website Information </p>
        </div>
    </div>
    <div class="offcanvas-body overflow-visible mt-2">
      <div class="error-message-box d-none">
            <p id="error-message"></p>
        </div>
        <div class="success-message-box d-none">
            <p id="success-message"></p>
        </div>
    <div class="offcanvas-body overflow-visible">
    <form id="form" method="post" enctype="multipart/form-data" class="custom-validation " action="<?= (isset($id) && !empty($id)) ? base_url(route_to('outdor_website_profile_update_api')) : base_url(route_to('outdor_website_profile_create_api')) ?>">
    <input type="hidden" id="id" name="id" value="<?= @$id ?>"> 
    <input type="hidden" id="firm_name" name="firm_name" value="<?= @$firm_name ?>"> 
            <div class="row">
                <div class="mb-3 col-md-12">
                    <label class="form-label">About company </label>
                    <p class="new_form_p">Please add Description About company</p>
                    <textarea class="form-control" name="about_company" id="about_company" rows=""></textarea>
                     <span class="error-message" id="error-about_company"></span>
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label">About owner</label>
                    <p class="new_form_p">Please add Description About owner</p>
                    <textarea class="form-control" name="about_owner" id="about_owner" rows=""></textarea>
                     <span class="error-message" id="error-about_owner"></span>
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label">Terms and conditions</label>
                    <p class="new_form_p">Please add Description Terms and conditions</p>
                    <textarea class="form-control" name="terms_condition" id="terms_condition" rows=""></textarea>
                     <span class="error-message" id="error-terms_condition"></span>
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label">Privacy and policies</label>
                    <p class="new_form_p">Please add Description Privacy and policies</p>
                    <textarea class="form-control" name="privacy_policies" id="privacy_policies" rows=""></textarea>
                     <span class="error-message" id="error-privacy_policies"></span>
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label">Disclaimer content</label>
                    <p class="new_form_p">Please add Description Disclaimer content</p>
                    <textarea class="form-control" name="disclaimer_content" id="disclaimer_content" rows=""></textarea>
                     <span class="error-message" id="disclaimer_content"></span>
                </div>
                <div class="form_submit_div text-center">
                <button type="button" class="submit_btn waves-effect waves-light me-1" onclick='submitFormWithAjax("form",true,true,successCallback,errorCallback)'>
                            Submit
                        </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
       function successCallback(response) {
        // console.log(response);
        // if (response.status == 201 || response.status == 200) {
        //     setTimeout(() => {
        //         window.location.href = ;
        //     }, 2000);
        // }
    }
    function errorCallback(response) {
        console.log(response);
    }
    </script>
<!-- --------------main page end----------- -->