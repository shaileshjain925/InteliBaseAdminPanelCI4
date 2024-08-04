<!-- -----------main page start----------- -->
<div class="p-3 form_bg">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel"><?= (isset($id) && !empty($id)) ? "Update" : "Create" ?>  Company Details</h5>
            <p class="new_form_p">Please fill the form to <?= (isset($id) && !empty($id)) ? "Update" : "Create" ?>  Website Company Details</p>
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
        <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">Firm Name </label>
                    <p class="new_form_p">Please add Firm Name</p>
                    <input type="text" id="firm_name" name="firm_name" class="form-control" value="<?= @$firm_name ?>" />
                    <span class="error-message" id="error-firm_name"></span>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Slogan</label>
                    <p class="new_form_p">Please add Slogan</p>
                    <input type="text" id="firm_slogan" name="firm_slogan" class="form-control" value="<?= @$firm_slogan ?>" />
                    <span class="error-message" id="error-firm_slogan"></span>
                </div>
                <div class="mb-3 col-md-12">
                    <label class="form-label text-capitalize">Address</label>
                    <p class="new_form_p">Please Add Address</p>
                    <div>
                    <input type="text" id="firm_address" name="firm_address" class="form-control" value="<?= @$firm_address ?>" />
                    <span class="error-message" id="error-firm_address"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Owner Name</label>
                    <p class="new_form_p">Please Add Owner Name</p>
                    <div>
                    <input type="text" id="firm_owner_name" name="firm_owner_name" class="form-control" value="<?= @$firm_owner_name ?>" />
                    <span class="error-message" id="error-firm_owner_name"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">CIN Number</label>
                    <p class="new_form_p">Please Add CIN Number</p>
                    <div>
                    <input type="text" id="firm_cin_no" name="firm_cin_no" class="form-control" value="<?= @$firm_cin_no ?>" />
                    <span class="error-message" id="error-firm_cin_no"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">GST Number</label>
                    <p class="new_form_p">Please Add GST Number</p>
                    <div>
                    <input type="text" id="firm_gst_no" name="firm_gst_no" class="form-control" value="<?= @$firm_gst_no ?>" />
                    <span class="error-message" id="error-firm_gst_no"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">PAN Number</label>
                    <p class="new_form_p">Please Add PAN Number</p>
                    <div>
                    <input type="text" id="firm_pan_no" name="firm_pan_no" class="form-control" value="<?= @$firm_pan_no ?>" />
                    <span class="error-message" id="error-firm_pan_no"></span>
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
        //         window.location.href = ;
        //     }, 2000);
        // }
    }

    function errorCallback(response) {
        console.log(response);
    }
    </script>
<!-- --------------main page end----------- -->