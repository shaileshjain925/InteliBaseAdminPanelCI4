<!-- -----------main page start----------- -->
<div class="p-3" style="background: #fffceb;">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel"><?= CreateUpdateAlias($country_id ?? null) ?> Country</h5>
            <p class="new_form_p">Please fill the form to add Country</p>
        </div>

    </div>
    <div class="offcanvas-body overflow-visible mt-2">
        <form id="country-form" method="post" enctype="multipart/form-data" class="custom-validation" action="<?= (isset($country_id) && !empty($country_id)) ? base_url(route_to('country_update_api')) : base_url(route_to('country_create_api')) ?>">
        <input type="hidden" class="form-control" name="country_id" id="country_id" value="<?= @$country_id ?>" />
        <div class="row">       
                <div class="col-md-12">
                    <h5>Country Information</h5>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="mb-2 form-label">Country Name</label>
                            <input type="text" class="form-control" name="country_name" id="country_name" value="<?= @$country_name ?>" placeholder="Country Name" />
                            <span class="error-message" id="error-country_name"></span>
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="mb-2 form-label">Alias</label>
                            <input type="text" class="form-control" name="alias" id="alias" value="<?= @$alias ?>" placeholder="Alias" />
                            <span class="error-message" id="error-alias"></span>
                        </div>

                        
                        <div class="mb-3 col-md-4">
                            <label class="mb-2 form-label">Short Name</label>
                            <input type="text" class="form-control" name="short_name" id="short_name" value="<?= @$short_name ?>" placeholder="Short Name" />
                            <span class="error-message" id="error-short_name"></span>
                        </div>

                                             <div class="mb-3 col-md-6">
                            <label class="mb-2 form-label">Phone code</label>
                            <input type="text" class="form-control" name="phonecode" id="phonecode" value="<?= @$phonecode ?>" placeholder="Phone Code" />
                            <span class="error-message" id="error-phonecode"></span>
                        </div>

                        >
                        <div class="mb-3 col-md-6">
                            <label class="mb-2 form-label">Currency</label>
                            <input type="text" class="form-control" name="currency" id="currency" value="<?= @$currency ?>" placeholder="Currency" />
                            <span class="error-message" id="error-currency"></span>
                        </div>

                                              <div class="mb-3 col-md-6">
                            <label class="mb-2 form-label">Currency Name</label>
                            <input type="text" class="form-control" name="currency_name" id="currency_name" placeholder="Currency Name" />
                            <span class="error-message" id="error-currency_name"></span>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="mb-2 form-label">Currency Symbol</label>
                            <input type="text" class="form-control" name="currency_symbol" id="currency_symbol" value="<?= @$currency_symbol ?>" placeholder="$" />
                            <span class="error-message" id="error-currency_symbol"></span>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="mb-2 form-label">Region</label>
                            <input type="text" class="form-control" name="region" id="region" value="<?= @$region ?>" placeholder="Region" />
                            <span class="error-message" id="error-region"></span>
                        </div>
                    </div>
                </div>


                
                <div class="form_submit_div text-center mt-4">
                    <button type="button" class="submit_btn waves-effect waves-light me-1" onclick="submitFormWithAjax('country-form',true,true,successCallback,errorCallback)">
                        Submit
                    </button>
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
                window.location.href = "<?= base_url(route_to('country_list_page')) ?>";
            }, 2000);
        }
    }

    function errorCallback(response) {
        console.log(response);
    }
</script>

<!-- --------------main page end----------- -->