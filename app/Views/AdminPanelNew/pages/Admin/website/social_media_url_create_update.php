<!-- -----------main page start----------- -->
<div class="p-3 form_bg">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel"><?= (isset($id) && !empty($id)) ? "Update" : "Create" ?> Social Media URL</h5>
            <p class="new_form_p">Please fill the form to <?= (isset($id) && !empty($id)) ? "Update" : "Create" ?> Website Social Media URL</p>
        </div>
    </div>
    <div class="offcanvas-body overflow-visible mt-2">
        <div class="error-message-box d-none">
            <p id="error-message"></p>
        </div>
        <div class="success-message-box d-none">
            <p id="success-message"></p>
        </div>
        <div class="offcanvas-body overflow-visible mt-2">
            <form id="form" method="post" enctype="multipart/form-data" class="custom-validation " action="<?= (isset($id) && !empty($id)) ? base_url(route_to('outdor_website_profile_update_api')) : base_url(route_to('outdor_website_profile_create_api')) ?>">
                <input type="hidden" id="id" name="id" value="<?= @$id ?>">
                <input type="hidden" id="firm_name" name="firm_name" value="<?= @$firm_name ?>">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Google Maps URL </label>
                        <p class="new_form_p">Please add Google Maps URL</p>
                        <input type="text" id="google_map_url" name="google_map_url" class="form-control" value="<?= @$google_map_url ?>" />
                        <span class="error-message" id="error-google_map_url"></span>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Website URL</label>
                        <p class="new_form_p">Please add Website URL</p>
                        <input type="text" id="website_url" name="website_url" class="form-control" value="<?= @$website_url ?>" />
                        <span class="error-message" id="error-website_url"></span>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label text-capitalize">Play Store URL</label>
                        <p class="new_form_p">Please Add Play Store URL</p>
                        <div>
                            <input type="text" id="play_store_url" name="play_store_url" class="form-control" value="<?= @$play_store_url ?>" />
                            <span class="error-message" id="error-play_store_url"></span>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label text-capitalize">App Store URL</label>
                        <p class="new_form_p">Please Add App Store URL</p>
                        <div>
                            <input type="text" id="app_store_url" name="app_store_url" class="form-control" value="<?= @$app_store_url ?>" />
                            <span class="error-message" id="error-app_store_url"></span>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label text-capitalize">Facebook URL</label>
                        <p class="new_form_p">Please Add Facebook URL</p>
                        <div>
                            <input type="text" id="facebook_url" name="facebook_url" class="form-control" value="<?= @$facebook_url ?>" />
                            <span class="error-message" id="error-facebook_url"></span>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label text-capitalize">Instagram URL</label>
                        <p class="new_form_p">Please Add Instagram URL</p>
                        <div>
                            <input type="text" id="instagram_url" name="instagram_url" class="form-control" value="<?= @$instagram_url ?>" />
                            <span class="error-message" id="error-instagram_url"></span>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label text-capitalize">Twitter URL</label>
                        <p class="new_form_p">Please Add Twitter URL</p>
                        <div>
                            <input type="text" id="twitter_url" name="twitter_url" class="form-control" value="<?= @$twitter_url ?>" />
                            <span class="error-message" id="error-twitter_url"></span>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label text-capitalize">LinkedIn URL</label>
                        <p class="new_form_p">Please Add LinkedIn URL</p>
                        <div>
                            <input type="text" id="linkedin_url" name="linkedin_url" class="form-control" value="<?= @$linkedin_url ?>" />
                            <span class="error-message" id="error-linkedin_url"></span>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label text-capitalize">YouTube URL</label>
                        <p class="new_form_p">Please Add YouTube URL</p>
                        <div>
                            <input type="text" id="youtube_url" name="youtube_url" class="form-control" value="<?= @$youtube_url ?>" />
                            <span class="error-message" id="error-youtube_url"></span>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label text-capitalize">Telegram URL</label>
                        <p class="new_form_p">Please Add Telegram URL</p>
                        <div>
                            <input type="text" id="telegram_url" name="telegram_url" class="form-control" value="<?= @$telegram_url ?>" />
                            <span class="error-message" id="error-telegram_url"></span>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label text-capitalize">Pinterest URL</label>
                        <p class="new_form_p">Please Add Pinterest URL</p>
                        <div>
                            <input type="text" id="pinterest_url" name="pinterest_url" class="form-control" value="<?= @$pinterest_url ?>" />
                            <span class="error-message" id="error-pinterest_url"></span>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label text-capitalize">Google Search URL</label>
                        <p class="new_form_p">Please Add Google Search URL</p>
                        <div>
                            <input type="text" id="google_search_url" name="google_search_url" class="form-control" value="<?= @$google_search_url ?>" />
                            <span class="error-message" id="error-google_search_url"></span>
                        </div>
                    </div>
                    <div class="form_submit_div text-center">
                        <button type="button" class="submit_btn waves-effect waves-light me-1" onclick='submitFormWithAjax("form",true,true,successCallback,errorCallback)'>
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
       function successCallback(response) {
        // console.log(response);
        // if (response.status == 201 || response.status == 200) {
        //     setTimeout(() => {
        //         window.location.href = ;
        //     }, 2000);
        // }
    }
    function errorCallback(response) {
        console.log(response);
    }
    </script>

    <!-- --------------main page end----------- -->