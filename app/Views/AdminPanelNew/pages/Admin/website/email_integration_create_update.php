<!-- -----------main page start----------- -->
<div class="p-3 form_bg">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel"><?= (isset($id) && !empty($id)) ? "Update" : "Create" ?>  Email Integration</h5>
            <p class="new_form_p">Please fill the form to <?= (isset($id) && !empty($id)) ? "Update" : "Create" ?>  Email Integration</p>
        </div>
    </div>
    <div class="offcanvas-body overflow-visible mt-2">
      <div class="error-message-box d-none">
            <p id="error-message"></p>
        </div>
        <div class="success-message-box d-none">
            <p id="success-message"></p>
        </div>
    <div class="offcanvas-body overflow-visible mt-2">
    <form id="form" method="post" enctype="multipart/form-data" class="custom-validation " action="<?= (isset($id) && !empty($id)) ? base_url(route_to('outdor_website_profile_update_api')) : base_url(route_to('outdor_website_profile_create_api')) ?>">
    <input type="hidden" id="id" name="id" value="<?= @$id ?>"> 
    <input type="hidden" id="firm_name" name="firm_name" value="<?= @$firm_name ?>"> 
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">Email SMTP Host</label>
                    <p class="new_form_p">Please add Email SMTP Host</p>
                     <input type="text" id="email_smtp_host" name="email_smtp_host" class="form-control" value="<?= @$email_smtp_host ?>" />
                    <span class="error-message" id="error-email_smtp_host"></span>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Email SMTP Port</label>
                    <p class="new_form_p">Please add Email SMTP Port</p>
                     <input type="text" id="email_smtp_port" name="email_smtp_port" class="form-control" value="<?= @$email_smtp_port ?>" />
                    <span class="error-message" id="error-email_smtp_port"></span>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Email SMTP User</label>
                    <p class="new_form_p">Please Add Email SMTP User</p>
                    <div>
                         <input type="text" id="email_smtp_user" name="email_smtp_user" class="form-control" value="<?= @$email_smtp_user ?>" />
                    <span class="error-message" id="error-email_smtp_user"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Email SMTP Password</label>
                    <p class="new_form_p">Please Add Email SMTP Password</p>
                    <div>
                         <input type="text" id="email_smtp_password" name="email_smtp_password" class="form-control" value="<?= @$email_smtp_password ?>" />
                    <span class="error-message" id="error-email_smtp_password"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Email SMTP Crypto</label>
                    <p class="new_form_p">Please Add Email SMTP Crypto</p>
                    <div>
                         <input type="text" id="email_smtp_crypto" name="email_smtp_crypto" class="form-control" value="<?= @$email_smtp_crypto ?>" />
                    <span class="error-message" id="error-email_smtp_crypto"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Email</label>
                    <p class="new_form_p">Please Add Email</p>
                    <div>
                         <input type="text" id="email_from_email" name="email_from_email" class="form-control" value="<?= @$email_from_email ?>" />
                    <span class="error-message" id="error-email_from_email"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Email From Name</label>
                    <p class="new_form_p">Please Add Email From Name</p>
                    <div>
                    <input type="text" id="email_from_name" name="email_from_name" class="form-control" value="<?= @$email_from_name ?>" />
                    <span class="error-message" id="error-email_from_name"></span>
                    </div>
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
        // if (response.status == 201 || response.status == 200) {
        //     setTimeout(() => {
        //         window.location.href = "";
        //     }, 2000);
        // }

    }

    function errorCallback(response) {
        console.log(response);
    }
    </script>
<!-- --------------main page end----------- -->