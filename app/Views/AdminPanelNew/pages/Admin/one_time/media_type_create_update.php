<div class="p-3 form_bg">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="AddVendorLabel">Media Type</h5>
            <p class="new_form_p">Please fill the form to add Media Type</p>
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
        <form id="form" method="post" enctype="multipart/form-data" class="custom-validation" action="<?= (isset($media_type_id) && !empty($media_type_id)) ? base_url(route_to('media_type_update_api')) : base_url(route_to('media_type_create_api')) ?>">
            <input type="hidden" id="media_type_id" name="media_type_id" value="<?= @$media_type_id ?>">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Media name <span class="theme_color">*</span></label>
                    <p class="new_form_p">Please add a Media Name</p>
                    <div>
                        <input type="text" id="media_type_name" name="media_type_name" class="form-control" value="<?= @$media_type_name ?>" />
                        <span class="error-message" id="error-media_type_name"></span>

                    </div>
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label">Media Description</label>
                    <p class="new_form_p">Please add a description</p>
                    <div>
                        <textarea required class="form-control" rows="5" id="media_type_description" name="media_type_description"><?= @$media_type_description ?></textarea>
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
                window.location.href = "<?= base_url(route_to('media_type_list_page')) ?>";
            }, 2000);
        }
    }

    function errorCallback(response) {
        console.log(response);
    }
</script>