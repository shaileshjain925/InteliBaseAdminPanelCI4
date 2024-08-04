<div class="offcanvas-header pb-0">
    <div class="">
        <h5 id="Add_New_clientLabel">View Media Type</h5>
        <p class="new_form_p">Please fill the form to View Media Type</p>
    </div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body p-3">
    <div class="row w-100">
        <div class="mb-3 col-md-12">
            <div class="view_div">
                <label class="form-label text-capitalize">Media Type</label>
                <span class="ms-3"><?= @$media_type_name ?></span>
            </div>
        </div>
        <div class="mb-3 col-md-12">
            <div class="view_div">
                <label class="form-label text-capitalize">Media Description</label>
                <span class="ms-3"><?= @$media_type_description ?></span>
            </div>
        </div>
    </div>
</div>