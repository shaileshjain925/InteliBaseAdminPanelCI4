<!-- -----------main page start----------- -->
<div class="p-3" style="background: #fffceb;">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel"><?= CreateUpdateAlias($city_id ?? null) ?> City</h5>
            <p class="new_form_p">Please fill the form to add City</p>
        </div>
    </div>
    <div class="offcanvas-body overflow-visible mt-2">
        <form id="form" method="post" enctype="multipart/form-data" class="custom-validation" action="<?= (isset($city_id) && !empty($city_id)) ? base_url(route_to('city_update_api')) : base_url(route_to('city_create_api')) ?>">
            <input type="hidden" class="form-control" name="city_id" id="city_id" value="<?= @$city_id ?>" />
            <div class="row">
                <div class="col-md-12">
                    <h5>City Information</h5>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2 form-label">City Name</label>
                            <input type="text" class="form-control" name="city_name" id="city_name" value="<?= @$city_name ?>" placeholder="City Name" />
                            <span class="error-message" id="error-city_name"></span>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="form-label text-capitalize">Country</label>
                            <p class="new_form_p">Please add a Country</p>
                            <div>
                                <select aria-label="Default select example" id="country_id" name="country_id"></select>
                                <span class="error-message" id="error-country_id"></span>
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label text-capitalize">State</label>
                            <p class="new_form_p">Please add a State</p>
                            <div>
                                <select aria-label="Default select example" id="state_id" name="state_id"></select>
                                <span class="error-message" id="error-state_id"></span>
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
    var selected_state_id = "<?= @$state_id ?>";

    function successCallback(response) {
        console.log(response);
        if (response.status == 201 || response.status == 200) {
            setTimeout(() => {
                window.location.href = "<?= base_url(route_to('city_list_page')) ?>";
            }, 2000);
        }
    }

    function errorCallback(response) {
        console.log(response);
    }
    $(document).ready(function() {
        initializeSelectize('state_id', {
            placeholder: "Select State"
        })
        initializeSelectize('country_id', {
                placeholder: "Select Country"
            }, apiUrl = "<?= base_url(route_to('country_list_api')) ?>", {}, "country_id", "country_name", selected_country_id)
            .onchange(function(
                country_id) {
                initializeSelectize('state_id').clearOptions().then(function() {
                    // Initialize state selectize dropdown
                    if (country_id != '') {
                        initializeSelectize('state_id', {
                            placeholder: "Select State"
                        }, "<?= base_url(route_to('state_list_api')) ?>", {
                            country_id: country_id
                        }, 'state_id', 'state_name', selected_state_id)
                    }
                });
            });
    });
</script>

<!-- --------------main page end----------- -->