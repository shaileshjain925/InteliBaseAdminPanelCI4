<div class="p-3 form_bg">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel"><?= (isset($id) && !empty($id)) ? "Update" : "Create" ?> Contact Information </h5>
            <p class="new_form_p">Please fill the form to <?= (isset($id) && !empty($id)) ? "Update" : "Create" ?> Contact Information </p>
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

                    <div class="mb-3 col-md-4">
                        <label class="form-label">Contact Mobile </label>
                        <p class="new_form_p">Please add Contact Mobile</p>
                        <input type="number" id="contact_mobile" name="contact_mobile" class="form-control" value="<?= @$contact_mobile ?>" />
                        <span class="error-message" id="error-contact_mobile"></span>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Contact Whatsapp</label>
                        <p class="new_form_p">Please add Contact Whatsapp</p>
                        <input type="number" id="contact_whatsapp" name="contact_whatsapp" class="form-control" value="<?= @$contact_whatsapp ?>" />
                        <span class="error-message" id="error-contact_whatsapp"></span>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Contact Email</label>
                        <p class="new_form_p">Please add Contact Email</p>
                        <input type="text" id="contact_email" name="contact_email" class="form-control" value="<?= @$contact_email ?>" />
                        <span class="error-message" id="error-contact_email"></span>
                    </div>
                    <div class="mb-3">
                        <h5 id="Add_outdoor_mediaLabel">Add sale Information</h5>
                        <p class="new_form_p">Please fill the form to add Website sale Information</p>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Sales Mobile </label>
                        <p class="new_form_p">Please add Sales Mobile</p>
                        <input type="number" id="sales_mobile" name="sales_mobile" class="form-control" value="<?= @$sales_mobile ?>" />
                        <span class="error-message" id="error-sales_mobile"></span>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Sales Whatsapp</label>
                        <p class="new_form_p">Please add Sales Whatsapp</p>
                        <input type="number" id="sales_whatsapp" name="sales_whatsapp" class="form-control" value="<?= @$sales_whatsapp ?>" />
                        <span class="error-message" id="error-sales_whatsapp"></span>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Sales Email</label>
                        <p class="new_form_p">Please add Sales Email</p>
                        <input type="text" id="sales_email" name="sales_email" class="form-control" value="<?= @$sales_email ?>" />
                        <span class="error-message" id="error-sales_email"></span>
                    </div>
                    <div class="mb-3">
                        <h5 id="Add_outdoor_mediaLabel">Add Support Information</h5>
                        <p class="new_form_p">Please fill the form to add Website Support Information</p>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Support Mobile </label>
                        <p class="new_form_p">Please add Support Mobile</p>
                        <input type="number" id="support_mobile" name="support_mobile" class="form-control" value="<?= @$support_mobile ?>" />
                        <span class="error-message" id="error-support_mobile"></span>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Support Whatsapp</label>
                        <p class="new_form_p">Please add Support Whatsapp</p>
                        <input type="number" id="support_whatsapp" name="support_whatsapp" class="form-control" value="<?= @$support_whatsapp ?>" />
                        <span class="error-message" id="error-support_whatsapp"></span>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Support Email</label>
                        <p class="new_form_p">Please add Support Email</p>
                        <input type="text" id="support_email" name="support_email" class="form-control" value="<?= @$support_email ?>" />
                        <span class="error-message" id="error-support_email"></span>
                    </div>
                    <div class="mb-3">
                        <h5 id="Add_outdoor_mediaLabel">Add Career Information</h5>
                        <p class="new_form_p">Please fill the form to add Website Career Information</p>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Career Mobile </label>
                        <p class="new_form_p">Please add Career Mobile</p>
                        <input type="number" id="career_mobile" name="career_mobile" class="form-control" value="<?= @$career_mobile ?>" />
                        <span class="error-message" id="error-career_mobile"></span>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Career Whatsapp</label>
                        <p class="new_form_p">Please add Career Whatsapp</p>
                        <input type="number" id="career_whatsapp" name="career_whatsapp" class="form-control" value="<?= @$career_whatsapp ?>" />
                        <span class="error-message" id="error-career_whatsapp"></span>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Career Email</label>
                        <p class="new_form_p">Please add Career Email</p>
                        <input type="text" id="career_email" name="career_email" class="form-control" value="<?= @$career_email ?>" />
                        <span class="error-message" id="error-career_email"></span>
                    </div>
                    <div class="form_submit_div text-center">
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
            // console.log(response);
            // if (response.status === 201 || response.status === 200) {
            //     setTimeout(() => {
            //         window.location.reload();
            //     }, 2000); 
            // }
        }

        function errorCallback(response) {
            console.log(response);
        }
        $(document).ready(function() {
            fetchTableData();
        });
    </script>