<!-- -----------main page start----------- -->
<div class="p-3" style="background: #fffceb;">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel"><?= CreateUpdateAlias($group_type_id ?? null) ?> Group Type</h5>
            <p class="new_form_p">Please fill the form to add Group Type</p>
        </div>

    </div>
    <div class="offcanvas-body overflow-visible mt-2">
        <form id="group_type-form" method="post" enctype="multipart/form-data" class="custom-validation" action="<?= (isset($group_type_id) && !empty($group_type_id)) ? base_url(route_to('group_type_update_api')) : base_url(route_to('group_type_create_api')) ?>">
        <input type="hidden" class="form-control" name="group_type_id" id="group_type_id" value="<?= @$group_type_id ?>" />
        <div class="row">       
                <div class="col-md-12">
                    <h5>Group Type Information</h5>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2 form-label">Group Type Name</label>
                            <input type="text" class="form-control" name="group_type_name" id="group_type_name" value="<?= @$group_type_name ?>" placeholder="Group Type Name" />
                            <span class="error-message" id="error-group_type_name"></span>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2 form-label">Group Type Code</label>
                            <input type="text" class="form-control" name="group_type_code" id="group_type_code" value="<?= @$group_type_code ?>" placeholder="Group Type Code" />
                            <span class="error-message" id="error-group_type_code"></span>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2 form-label">Group Type Description</label>
                            <input type="text" class="form-control" name="group_type_description" id="group_type_description" value="<?= @$group_type_description ?>" placeholder="Group Type Description" />
                            <span class="error-message" id="error-group_type_description"></span>
                        </div>

                        <div class="col-md-4 mb-3">
                        <label class="form-label text-capitalize">Group Type Photo</label>
                        <p class="new_form_p">Please add a Group Type Photo</p>
                        <div>
                            <input type="hidden" id="group_type_image" name="group_type_image" value="<?= @$group_type_image ?>">
                            <div class="d-flex">
                                <input type="file" id="file" name="file" class="form-control"
                                    onchange="uploadImage('file', 'group_type', 'group_type_image', 'group_type_image_display')" />
                                <button type="button" class="btn del_btn ms-2"
                                    onclick="deleteImage('group_type_image', 'group_type_image_display')"><i
                                        class="bx bx-trash-alt"></i></button>
                            </div>
                        </div>
                        <span class="error-message" id="error-group_type_image"></span>
                    </div>
                    <div class="col-md-4">
                        <img id="group_type_image_display" name="group_type_image_display" onclick="enlargeImage(event)"
                            src="<?= (isset($group_type_image)) ? base_url($group_type_image) : "" ?>" height="80">
                    </div>
                       
                
                <div class="form_submit_div text-center mt-4">
                    <button type="button" class="submit_btn waves-effect waves-light me-1" onclick="submitFormWithAjax('group_type-form',true,true,successCallback,errorCallback)">
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
                window.location.href = "<?= base_url(route_to('group_type_list_page')) ?>";
            }, 2000);
        }
    }

    function errorCallback(response) {
        console.log(response);
    }
</script>

<!-- --------------main page end----------- -->