<!-- -----------main page start----------- -->
<div class="p-3" style="background: #fffceb;">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel"><?= CreateUpdateAlias($item_sub_group_id ?? null) ?> Sub Sub Group</h5>
            <p class="new_form_p">Please fill the form to add Sub Sub Group</p>
        </div>

    </div>
    <div class="offcanvas-body overflow-visible mt-2">
        <form id="item_sub_group-form" method="post" enctype="multipart/form-data" class="custom-validation" action="<?= (isset($item_sub_group_id) && !empty($item_sub_group_id)) ? base_url(route_to('item_sub_group_update_api')) : base_url(route_to('item_sub_group_create_api')) ?>">
            <input type="hidden" class="form-control" name="item_sub_group_id" id="item_sub_group_id" value="<?= @$item_sub_group_id ?>" />
            <div class="row">
                <div class="col-md-12">
                    <h5>Sub Group Information</h5>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label text-capitalize">Item Sub Group</label>
                            <p class="new_form_p">Please add a Item Sub Group</p>
                            <div>
                                <select aria-label="Default select example" id="item_group_id" name="item_group_id"></select>
                                <span class="error-message" id="error-item_group_id"></span>
                            </div>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="mb-2 form-label">Sub Group Name</label>
                            <input type="text" class="form-control" name="item_sub_group_name" id="item_sub_group_name" value="<?= @$item_sub_group_name ?>" placeholder="Sub Group Name" />
                            <span class="error-message" id="error-item_sub_group_name"></span>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="mb-2 form-label">Sub Group Code</label>
                            <input type="text" class="form-control" name="item_sub_group_code" id="item_sub_group_code" value="<?= @$item_sub_group_code ?>" placeholder="Sub Group Code" />
                            <span class="error-message" id="error-item_sub_group_code"></span>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label class="mb-2 form-label">Sub Group Description</label>
                            <textarea class="form-control" name="item_sub_group_description" id="item_sub_group_description" placeholder="Sub Group Description"><?= @$item_sub_group_description ?></textarea>
                            <span class="error-message" id="error-item_sub_group_description"></span>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="mb-2 form-label">Listed Overhead Percentage</label>
                            <input type="text" class="form-control" name="listed_overhead_percentage" id="listed_overhead_percentage" value="<?= @$listed_overhead_percentage ?>" placeholder="Listed Overhead Percentage" />
                            <span class="error-message" id="error-listed_overhead_percentage"></span>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="mb-2 form-label">Listed Margin Percentage</label>
                            <input type="text" class="form-control" name="listed_margin_percentage" id="listed_margin_percentage" value="<?= @$listed_margin_percentage ?>" placeholder="Listed Margin Percentage" />
                            <span class="error-message" id="error-listed_margin_percentage"></span>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="mb-2 form-label">Non Listed Overhead Percentage</label>
                            <input type="text" class="form-control" name="nonlisted_overhead_percentage" id="nonlisted_overhead_percentage" value="<?= @$nonlisted_overhead_percentage ?>" placeholder="Non Listed Overhead Percentage" />
                            <span class="error-message" id="error-nonlisted_overhead_percentage"></span>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="mb-2 form-label">Non Listed Margin Percentage</label>
                            <input type="text" class="form-control" name="nonlisted_margin_percentage" id="nonlisted_margin_percentage" value="<?= @$nonlisted_margin_percentage ?>" placeholder="Non Listed Margin Percentage" />
                            <span class="error-message" id="error-nonlisted_margin_percentage"></span>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label text-capitalize">Sub Group Photo</label>
                            <p class="new_form_p">Please add a Sub Group Photo</p>
                            <div>
                                <input type="hidden" id="item_sub_group_image" name="item_sub_group_image" value="<?= @$item_sub_group_image ?>">
                                <div class="d-flex">
                                    <input type="file" id="file" name="file" class="form-control"
                                        onchange="uploadImage('file', 'item_sub_group', 'item_sub_group_image', 'item_sub_group_image_display')" />
                                    <button type="button" class="btn del_btn ms-2"
                                        onclick="deleteImage('item_sub_group_image', 'item_sub_group_image_display')"><i
                                            class="bx bx-trash-alt"></i></button>
                                </div>
                            </div>
                            <span class="error-message" id="error-item_sub_group_image"></span>
                        </div>
                        <div class="col-md-4">
                            <img id="item_sub_group_image_display" name="item_sub_group_image_display" onclick="enlargeImage(event)"
                                src="<?= (isset($item_sub_group_image)) ? base_url($item_sub_group_image) : "" ?>" height="80">
                        </div>


                        <div class="form_submit_div text-center mt-4">
                            <button type="button" class="submit_btn waves-effect waves-light me-1" onclick="submitFormWithAjax('item_sub_group-form',true,true,successCallback,errorCallback)">
                                Submit
                            </button>
                        </div>
                    </div>
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
                window.location.href = "<?= base_url(route_to('item_sub_group_list_page')) ?>";
            }, 2000);
        }
    }

    function errorCallback(response) {
        console.log(response);
    }
    var selected_item_group_id = "<?= @$item_group_id ?>";

    $(document).ready(function() {

        initializeSelectize('item_group_id', {
                placeholder: "Select Item Group"
            }, "<?= base_url(route_to('item_group_list_api')) ?>", {}, "item_group_id", "item_group_name",
            selected_item_group_id)

    });
</script>

<!-- --------------main page end----------- -->