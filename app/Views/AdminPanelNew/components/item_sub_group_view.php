<div class="offcanvas-header">
    <div class="">
        <h5 id="Add_outdoor_mediaLabel">View Item Sub Group</h5>
    </div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <div class="row w-100">
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Item Group Name</label>
                <span class="ms-3"><?= @$item_group_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Item Sub Group Id</label>
                <span class="ms-3"><?= @$item_sub_group_id ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Item Sub Group Name</label>
                <span class="ms-3"><?= @$item_sub_group_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Item Sub Group Code</label>
                <span class="ms-3"><?= @$item_sub_group_code ?></span>
            </div>
        </div>

        <div class="mb-3 col-md-12">
            <div class="view_div">
                <label class="form-label text-capitalize">Group Description</label>
                <span class="ms-3"><?= @$item_sub_group_description ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-12">
            <div class="view_div">
                <a><img onclick="enlargeImage(event)" src="<?= (isset($item_sub_group_image)) ? base_url($item_sub_group_image) : "" ?>" height="80"></a>
            </div>
        </div>

    </div>
</div>