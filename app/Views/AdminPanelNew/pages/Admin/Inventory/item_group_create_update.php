<!-- -----------main page start----------- -->
<div class="p-3" style="background: #fffceb;">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel"><?= CreateUpdateAlias($item_group_id ?? null) ?> Item Group</h5>
            <p class="new_form_p">Please fill the form to add Item Group</p>
        </div>

    </div>
    <div class="offcanvas-body overflow-visible mt-2">
        <form id="item_group-form" method="post" enctype="multipart/form-data" class="custom-validation" action="<?= (isset($item_group_id) && !empty($item_group_id)) ? base_url(route_to('item_group_update_api')) : base_url(route_to('item_group_create_api')) ?>">
            <input type="hidden" class="form-control" name="item_group_id" id="item_group_id" value="<?= @$item_group_id ?>" />
            <div class="row">
                <div class="col-md-12">
                    <h5>Item Group Information</h5>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="mb-2 form-label">Item Group Name</label>
                            <input type="text" class="form-control" name="item_group_name" id="item_group_name" value="<?= @$item_group_name ?>" placeholder="Item Group Name" />
                            <span class="error-message" id="error-item_group_name"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="mb-2 form-label">Item Group Code</label>
                            <input type="text" class="form-control" name="item_group_code" id="item_group_code" value="<?= @$item_group_code ?>" placeholder="Item Group Code" />
                            <span class="error-message" id="error-item_group_code"></span>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="mb-2 form-label">Item Group Description</label>
                            <textarea type="text" class="form-control" name="item_group_description" id="item_group_description" placeholder="Item Group Description"><?= @$item_group_description ?></textarea>
                            <span class="error-message" id="error-item_group_description"></span>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label text-capitalize">Item Group Photo</label>
                            <p class="new_form_p">Please add a Item Group Photo</p>
                            <div>
                                <input type="hidden" id="item_group_image" name="item_group_image" value="<?= @$item_group_image ?>">
                                <div class="d-flex">
                                    <input type="file" id="file" name="file" class="form-control"
                                        onchange="uploadImage('file', 'item_group', 'item_group_image', 'item_group_image_display')" />
                                    <button type="button" class="btn del_btn ms-2"
                                        onclick="deleteImage('item_group_image', 'item_group_image_display')"><i
                                            class="bx bx-trash-alt"></i></button>
                                </div>
                            </div>
                            <span class="error-message" id="error-item_group_image"></span>
                        </div>
                        <div class="col-md-4">
                            <img id="item_group_image_display" name="item_group_image_display" onclick="enlargeImage(event)"
                                src="<?= (isset($item_group_image)) ? base_url($item_group_image) : "" ?>" height="80">
                        </div>


                        <div class="form_submit_div text-center mt-4">
                            <button type="button" class="submit_btn waves-effect waves-light me-1" onclick="submitFormWithAjax('item_group-form',true,true,successCallback,errorCallback)">
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
                window.location.href = "<?= base_url(route_to('item_group_list_page')) ?>";
            }, 2000);
        }
    }

    function errorCallback(response) {
        console.log(response);
    }
</script>

<!-- --------------main page end----------- -->