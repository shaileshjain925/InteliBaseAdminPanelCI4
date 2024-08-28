<div class="offcanvas-header">
    <div class="">
        <h5 id="Add_outdoor_mediaLabel">View City</h5>
    </div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <div class="row w-100">
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">City Id</label>
                <span class="ms-3"><?= @$city_id ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">City Name</label>
                <span class="ms-3"><?= @$city_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">Country Name</label>
                <span class="ms-3"><?= @$country_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <div class="view_div">
                <label class="form-label text-capitalize">State Name</label>
                <span class="ms-3"><?= @$state_name ?></span>
            </div>
        </div>
    </div>
</div>