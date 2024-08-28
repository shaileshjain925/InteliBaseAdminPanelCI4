<div class="offcanvas-header">
    <div class="">
        <h5 id="Add_outdoor_mediaLabel">View State</h5>
    </div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <div class="row w-100">
        <div class="mb-3 col-md-4">
            <div class="view_div">
                <label class="form-label text-capitalize">State Id</label>
                <span class="ms-3"><?= @$state_id ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-4">
            <div class="view_div">
                <label class="form-label text-capitalize">State Name</label>
                <span class="ms-3"><?= @$state_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Short Name</label>
                <span class="ms-3"><?= @$short_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-4">
            <div class="view_div">
                <label class="form-label text-capitalize">State Code</label>
                <span class="ms-3"><?= @$state_code ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-4">
            <div class="view_div">
                <label class="form-label text-capitalize">Country Name</label>
                <span class="ms-3"><?= @$country_name ?></span>
            </div>
        </div>
    </div>
</div>