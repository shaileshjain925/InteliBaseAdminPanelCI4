<div class="offcanvas-header">
    <div class="">
        <h5 id="Add_outdoor_mediaLabel">View Group Type</h5>
    </div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <div class="row w-100">
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Group Type Id</label>
                <span class="ms-3"><?= @$group_type_id ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Group Type Name</label>
                <span class="ms-3"><?= @$group_type_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-12">
            <div class="view_div">
                <label class="form-label text-capitalize">Group Type Description</label>
                <span class="ms-3"><?= @$group_type_description ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-12">
            <div class="view_div">
            <a><img onclick="enlargeImage(event)" src="<?= (isset($group_type_image)) ? base_url($group_type_image) : "" ?>" height="80"></a>
            </div>
        </div>
        
    </div>
</div>