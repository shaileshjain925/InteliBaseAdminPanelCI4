<div class="p-3 form_bg">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="AddVendorLabel"><?= (isset($illumination_id) && !empty($illumination_id)) ?"Update": "Create"?> Illumination</h5>
            <p class="new_form_p">Please fill the form to <?= (isset($illumination_id) && !empty($illumination_id)) ?"Update": "Create"?> Illumination</p>
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
    <div class="offcanvas-body">
        <form id="form" method="post" enctype="multipart/form-data" class="custom-validation" action="<?= (isset($illumination_id) && !empty($illumination_id)) ? base_url(route_to('illumination_update_api')) : base_url(route_to('illumination_create_api'))?>">
        <input type="hidden" id="illumination_id" name="illumination_id" value="<?= @$illumination_id ?>">   

            <div class="mb-3">
                <label class="form-label text-capitalize">Illumination name <span class="theme_color">*</span></label>
                <p class="new_form_p">Please add a Illumination Name</p>
                <div>
                <input type="text" id="illumination_name" name="illumination_name" class="form-control" value="<?= @$illumination_name ?>" />
                <span class="error-message" id="error-illumination_name"></span>
                </div>
            </div>
            <div class="text-center">
                <button type="button"  class="submit_btn waves-effect waves-light me-1" onclick="submitFormWithAjax('form',true,true,successCallback,errorCallback)">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    function successCallback(response) {
        console.log(response);
        if (response.status == 201 || response.status == 200) {
            setTimeout(() => {
                window.location.href = "<?= base_url(route_to('illumination_list_page')) ?>";
            }, 2000);
        }
    }

    function errorCallback(response) {
        console.log(response);
    }
</script>