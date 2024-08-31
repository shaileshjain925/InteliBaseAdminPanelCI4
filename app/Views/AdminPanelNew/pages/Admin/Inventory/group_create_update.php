<!-- -----------main page start----------- -->
<div class="p-3" style="background: #fffceb;">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel"><?= CreateUpdateAlias($group_id ?? null) ?> Group</h5>
            <p class="new_form_p">Please fill the form to add Group</p>
        </div>

    </div>
    <div class="offcanvas-body overflow-visible mt-2">
        <form id="group-form" method="post" enctype="multipart/form-data" class="custom-validation" action="<?= (isset($group_id) && !empty($group_id)) ? base_url(route_to('group_update_api')) : base_url(route_to('group_create_api')) ?>">
        <input type="hidden" class="form-control" name="group_id" id="group_id" value="<?= @$group_id ?>" />
        <div class="row">       
                <div class="col-md-12">
                    <h5>Group Information</h5>
                    <div class="row">
                    <div class="mb-3 col-md-4">
                            <label class="form-label text-capitalize">Group Type</label>
                            <p class="new_form_p">Please add a Group Type</p>
                            <div>
                                <select aria-label="Default select example" id="group_type_id" name="group_type_id"></select>
                                <span class="error-message" id="error-group_type_id"></span>
                            </div>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="mb-2 form-label">Group Name</label>
                            <input type="text" class="form-control" name="group_name" id="group_name" value="<?= @$group_name ?>" placeholder="Group Name" />
                            <span class="error-message" id="error-group_name"></span>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2 form-label">Group Code</label>
                            <input type="text" class="form-control" name="group_code" id="group_code" value="<?= @$group_code ?>" placeholder="Group Code" />
                            <span class="error-message" id="error-group_code"></span>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2 form-label">Group Description</label>
                            <input type="text" class="form-control" name="group_description" id="group_description" value="<?= @$group_description ?>" placeholder="Group Description" />
                            <span class="error-message" id="error-group_description"></span>
                        </div>

                        <div class="col-md-4 mb-3">
                        <label class="form-label text-capitalize">Group Photo</label>
                        <p class="new_form_p">Please add a Group Photo</p>
                        <div>
                            <input type="hidden" id="group_image" name="group_image" value="<?= @$group_image ?>">
                            <div class="d-flex">
                                <input type="file" id="file" name="file" class="form-control"
                                    onchange="uploadImage('file', 'group', 'group_image', 'group_image_display')" />
                                <button type="button" class="btn del_btn ms-2"
                                    onclick="deleteImage('group_image', 'group_image_display')"><i
                                        class="bx bx-trash-alt"></i></button>
                            </div>
                        </div>
                        <span class="error-message" id="error-group_image"></span>
                    </div>
                    <div class="col-md-4">
                        <img id="group_image_display" name="group_image_display" onclick="enlargeImage(event)"
                            src="<?= (isset($group_image)) ? base_url($group_image) : "" ?>" height="80">
                    </div>
                       
                
                <div class="form_submit_div text-center mt-4">
                    <button type="button" class="submit_btn waves-effect waves-light me-1" onclick="submitFormWithAjax('group-form',true,true,successCallback,errorCallback)">
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
                window.location.href = "<?= base_url(route_to('group_list_page')) ?>";
            }, 2000);
        }
    }

    function errorCallback(response) {
        console.log(response);
    }
    var selected_group_type_id = "<?= @$group_type_id ?>";

$(document).ready(function() {

    initializeSelectize('group_type_id', {
            placeholder: "Select Group Type"
        }, "<?= base_url(route_to('group_type_list_api')) ?>", {}, "group_type_id", "group_type_name",
        selected_group_type_id)

});
</script>

<!-- --------------main page end----------- -->