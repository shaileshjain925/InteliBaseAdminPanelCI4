<!-- -----------main page start----------- -->
<div class="p-3" style="background: #fffceb;">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel"><?= CreateUpdateAlias($state_id ?? null) ?> State</h5>
            <p class="new_form_p">Please fill the form to add State</p>
        </div>
    </div>
    <div class="offcanvas-body overflow-visible mt-2">
        <form id="form" method="post" enctype="multipart/form-data" class="custom-validation" action="<?= (isset($state_id) && !empty($state_id)) ? base_url(route_to('state_update_api')) : base_url(route_to('state_create_api')) ?>">
            <input type="hidden" class="form-control" name="state_id" id="state_id" value="<?= @$state_id ?>" />
            <div class="row">
                <div class="col-md-12">
                    <h5>State Information</h5>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2 form-label">State Name</label>
                            <input type="text" class="form-control" name="state_name" id="state_name" value="<?= @$state_name ?>" placeholder="State Name" />
                            <span class="error-message" id="error-state_name"></span>
                        </div>


                        <div class="mb-3 col-md-4">
                            <label class="mb-2 form-label">Short Name</label>
                            <input type="text" class="form-control" name="short_name" id="short_name" value="<?= @$short_name ?>" placeholder="Short Name" />
                            <span class="error-message" id="error-short_name"></span>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="mb-2 form-label">State code</label>
                            <input type="text" class="form-control" name="state_code" id="state_code" value="<?= @$state_code ?>" placeholder="State Code" />
                            <span class="error-message" id="error-state_code"></span>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="form-label text-capitalize">Country</label>
                            <p class="new_form_p">Please add a Country</p>
                            <div>
                                <select aria-label="Default select example" id="country_id" name="country_id"></select>
                                <span class="error-message" id="error-country_id"></span>
                            </div>
                        </div>


                        <div class="form_submit_div text-center mt-4">
                            <button type="button" class="submit_btn waves-effect waves-light me-1" onclick="submitFormWithAjax('form',true,true,successCallback,errorCallback)">
                                Submit
                            </button>
                        </div>
                    </div>
        </form>
    </div>

</div>
<script>
    var selected_country_id = "<?= @$country_id ?>";

    $(document).ready(function() {

        initializeSelectize('country_id', {
                placeholder: "Select Country"
            }, "<?= base_url(route_to('country_list_api')) ?>", {}, "country_id", "country_name",
            selected_country_id)

    });

    function successCallback(response) {
        console.log(response);
        if (response.status == 201 || response.status == 200) {
            setTimeout(() => {
                window.location.href = "<?= base_url(route_to('state_list_page')) ?>";
            }, 2000);
        }
    }

    function errorCallback(response) {
        console.log(response);
    }
</script>

<!-- --------------main page end----------- -->