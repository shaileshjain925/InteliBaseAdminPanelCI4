<!-- Delivery Term Form -->
<div class="offcanvas-header">
    <div class="">
        <h5 id="Add_outdoor_mediaLabel"><?= isset($delivery_term_id) ? "Update" : "Create" ?> Delivery Term</h5>
    </div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <form id="payemnt_term_form" method="post" enctype="multipart/form-data" action="<?= isset($delivery_term_id) ? base_url(route_to('delivery_terms_update_api')) : base_url(route_to('delivery_terms_create_api')) ?>">

        <!-- Hidden Delivery Term ID (for updates) -->
        <input type="hidden" name="delivery_term_id" value="<?= @$delivery_term_id ?>">
        <input type="hidden" name="status" value="1">
        <div class="row">
            <!-- Delivery Term Code -->
            <div class="mb-3 col-md-4">
                <label for="delivery_term_code" class="form-label">Delivery Term Code</label>
                <input type="text" class="form-control" id="delivery_term_code" name="delivery_term_code" value="<?= @$delivery_term_code ?>" placeholder="Delivery Term Code">
                <span class="error-message" id="error-delivery_term_code"></span>
            </div>

            <!-- Delivery Term Name -->
            <div class="mb-3 col-md-4">
                <label for="delivery_term_name" class="form-label">Delivery Term Name</label>
                <input type="text" class="form-control" id="delivery_term_name" name="delivery_term_name" value="<?= @$delivery_term_name ?>" placeholder="Delivery Term Name">
                <span class="error-message" id="error-delivery_term_name"></span>
            </div>
            <!-- Delivery Term Description -->
            <div class="mb-3 col-md-4">
                <label for="delivery_term_description" class="form-label">Delivery Term Description</label>
                <input type="text" class="form-control" id="delivery_term_description" name="delivery_term_description" value="<?= @$delivery_term_description ?>" placeholder="Delivery Term Name">
                <span class="error-message" id="error-delivery_term_description"></span>
            </div>
            <!-- Submit Button -->
            <div class="form_submit_div text-center mt-4">
                <button type="button" class="btn btn-primary" onclick="submitFormWithAjax('payemnt_term_form', true, true, delivery_termFormSuccessCallback, delivery_termFormErrorCallback)">Submit</button>
            </div>
        </div>
    </form>
</div>