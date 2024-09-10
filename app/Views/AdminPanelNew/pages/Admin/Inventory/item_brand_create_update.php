<!-- -----------main page start----------- -->
<div class="p-3" style="background: #fffceb;">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel"><?= CreateUpdateAlias($item_brand_id ?? null) ?> Item Brand</h5>
            <p class="new_form_p">Please fill the form to add Item Brand</p>
        </div>
    </div>
    <div class="offcanvas-body overflow-visible mt-2">
        <form id="item_brand-form" method="post" enctype="multipart/form-data" class="custom-validation" action="<?= (isset($item_brand_id) && !empty($item_brand_id)) ? base_url(route_to('item_brand_update_api')) : base_url(route_to('item_brand_create_api')) ?>">
            <input type="hidden" class="form-control" name="item_brand_id" id="item_brand_id" value="<?= @$item_brand_id ?>" />
            <div class="row">
                <div class="col-md-12">
                    <h5>Item Brand Information</h5>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="mb-2 form-label">Item Brand Name</label>
                            <input type="text" class="form-control" name="item_brand_name" id="item_brand_name" value="<?= @$item_brand_name ?>" placeholder="Item Brand Name" />
                            <span class="error-message" id="error-item_brand_name"></span>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="mb-2 form-label">Item Brand Code</label>
                            <input type="text" class="form-control" name="item_brand_code" id="item_brand_code" value="<?= @$item_brand_code ?>" placeholder="Item Brand Code" />
                            <span class="error-message" id="error-item_brand_code"></span>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="mb-2 form-label">Item Brand Description</label>
                            <textarea class="form-control" name="item_brand_description" id="item_brand_description" placeholder="Item Brand Description"><?= @$item_brand_description ?></textarea>
                            <span class="error-message" id="error-item_brand_description"></span>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label text-capitalize">Item Brand Photo</label>
                            <p class="new_form_p">Please add a Item Brand Photo</p>
                            <div>
                                <input type="hidden" id="item_brand_image" name="item_brand_image" value="<?= @$item_brand_image ?>">
                                <div class="d-flex">
                                    <input type="file" id="file" name="file" class="form-control"
                                        onchange="uploadImage('file', 'item_brand', 'item_brand_image', 'item_brand_image_display')" />
                                    <button type="button" class="btn del_btn ms-2"
                                        onclick="deleteImage('item_brand_image', 'item_brand_image_display')"><i
                                            class="bx bx-trash-alt"></i></button>
                                </div>
                            </div>
                            <span class="error-message" id="error-item_brand_image"></span>
                        </div>
                        <div class="col-md-4">
                            <img id="item_brand_image_display" name="item_brand_image_display" onclick="enlargeImage(event)"
                                src="<?= (isset($item_brand_image)) ? base_url($item_brand_image) : "" ?>" height="80">
                        </div>


                        <div class="form_submit_div text-center mt-4">
                            <button type="button" class="submit_btn waves-effect waves-light me-1" onclick="submitFormWithAjax('item_brand-form',true,true,successCallback,errorCallback)">
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
                window.location.href = "<?= base_url(route_to('item_brand_list_page')) ?>";
            }, 2000);
        }
    }

    function errorCallback(response) {
        console.log(response);
    }
</script>

<!-- --------------main page end----------- -->