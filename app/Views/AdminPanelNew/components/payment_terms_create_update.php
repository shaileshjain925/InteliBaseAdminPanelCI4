<!-- Payment Term Form -->
<div class="offcanvas-header">
    <div class="">
        <h5 id="Add_outdoor_mediaLabel"><?= isset($payment_term_id) ? "Update" : "Create" ?> Payment Term</h5>
    </div>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body">
    <form id="payemnt_term_form" method="post" enctype="multipart/form-data" action="<?= isset($payment_term_id) ? base_url(route_to('payment_terms_update_api')) : base_url(route_to('payment_terms_create_api')) ?>">

        <!-- Hidden Payment Term ID (for updates) -->
        <input type="hidden" name="payment_term_id" value="<?= @$payment_term_id ?>">
        <input type="hidden" name="status" value="1">
        <div class="row">
            <!-- Payment Term Code -->
            <div class="mb-3 col-md-4">
                <label for="payment_term_code" class="form-label">Payment Term Code</label>
                <input type="text" class="form-control" id="payment_term_code" name="payment_term_code" value="<?= @$payment_term_code ?>" placeholder="Payment Term Code">
                <span class="error-message" id="error-payment_term_code"></span>
            </div>

            <!-- Payment Term Name -->
            <div class="mb-3 col-md-4">
                <label for="payment_term_name" class="form-label">Payment Term Name</label>
                <input type="text" class="form-control" id="payment_term_name" name="payment_term_name" value="<?= @$payment_term_name ?>" placeholder="Payment Term Name">
                <span class="error-message" id="error-payment_term_name"></span>
            </div>
            <!-- Due Days -->
            <div class="mb-3 col-md-4">
                <label for="due_days" class="form-label">Due Days</label>
                <input type="number" class="form-control" id="due_days" name="due_days" value="<?= @$due_days ?>" placeholder="Due Days">
                <span class="error-message" id="error-due_days"></span>
            </div>
            <!-- Interest Rate % -->
            <div class="mb-3 col-md-4">
                <label for="post_due_interest_rate" class="form-label">Interest Rate %</label>
                <input type="number" class="form-control" id="post_due_interest_rate" name="post_due_interest_rate" value="<?= @$post_due_interest_rate ?>" placeholder="Interest Rate %">
                <span class="error-message" id="error-post_due_interest_rate"></span>
            </div>
            <!-- Submit Button -->
            <div class="form_submit_div text-center mt-4">
                <button type="button" class="btn btn-primary" onclick="submitFormWithAjax('payemnt_term_form', true, true, payment_termFormSuccessCallback, payment_termFormErrorCallback)">Submit</button>
            </div>
        </div>
    </form>
</div>