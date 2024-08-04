<!-- -----------main page start----------- -->
<div class="p-3 form_bg">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel"><?= (isset($blog_id) && !empty($blog_id)) ? "Update" : "Create" ?> Blog</h5>
            <p class="new_form_p">Please fill the form to <?= (isset($blog_id) && !empty($blog_id)) ? "Update" : "Create" ?> Website Blog</p>
        </div>
    </div>
    <div class="offcanvas-body">
        <div class="error-message-box d-none">
            <p id="error-message"></p>
        </div>
        <div class="success-message-box d-none">
            <p id="success-message"></p>
        </div>
        <div class="offcanvas-body overflow-visible mt-2">
            <form id="form" method="post" enctype="multipart/form-data" class="custom-validation " action="<?= (isset($blog_id) && !empty($blog_id)) ? base_url(route_to('blog_update_api')) : base_url(route_to('blog_create_api')) ?>">
                <input type="hidden" id="blog_id" name="blog_id" value="<?= @$blog_id ?>">
                <input type="hidden" id="user_id" name="user_id" value="<?= @$_SESSION['user_id'] ?>">
                <input type="hidden" id="blog_featured_image" name="blog_featured_image">
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Title</label>
                        <p class="new_form_p">Please add Blog Title</p>
                        <input type="text" id="blog_title" name="blog_title" class="form-control" value="<?= @$blog_title ?>" />
                        <span class="error-message" id="error-blog_title"></span>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Date</label>
                        <p class="new_form_p">Please Select Blog Date</p>
                        <input type="date" id="blog_date" name="blog_date" class="form-control" value="<?= @$blog_date ?>" />
                        <span class="error-message" id="error-blog_date"></span>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Author Name</label>
                        <p class="new_form_p">Please add Author Name</p>
                        <input type="text" id="blog_author_name" name="blog_author_name" class="form-control" value="<?= @$blog_author_name ?>" />
                        <span class="error-message" id="error-blog_author_name"></span>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label text-capitalize">Blog Status</label>
                        <p class="new_form_p">Please Select Blog Status</p>
                        <div>
                            <select id="blog_status" name="blog_status">
                                <!-- <option disable>Select Blog Status</option> -->
                                <option value="draft" <?= (isset($blog_status) && $blog_status == "draft") ? "selected" : "" ?>>draft
                                </option>
                                <option value="published" <?= (isset($blog_status) && $blog_status == "published") ? "selected" : "" ?>>published
                                </option>
                            </select>
                            <span class="error-message" id="error-blog_status"></span>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label text-capitalize">Short Content</label>
                        <p class="new_form_p">Please Add Short Content</p>
                        <div>
                            <input type="text" id="blog_short_content" name="blog_short_content" class="form-control" value="<?= @$blog_short_content ?>" />
                            <span class="error-message" id="error-blog_short_content"></span>
                        </div>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label text-capitalize">Description</label>
                        <p class="new_form_p">Please Add Description</p>
                        <div>
                            <input type="text" id="blog_long_content" name="blog_long_content" class="form-control" value="<?= @$blog_long_content ?>" />
                            <span class="error-message" id="error-blog_long_content"></span>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label text-capitalize">Image</label>
                        <p class="new_form_p">Please Add Blog Image</p>
                        <div>
                            <input type="file" id="file" name="file" class="form-control" onchange="uploadImage('file', 'blog', 'blog_featured_image', 'blog_featured_image_display')" />
                            <button type="button" class="btn del_btn ms-2" onclick="deleteImage('blog_featured_image', 'blog_featured_image_display')"><i class="bx bx-trash-alt"></i></button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img id="blog_featured_image_display" name="blog_featured_image_display" onclick="enlargeImage(event)" src="<?= (isset($blog_featured_image)) ? base_url($blog_featured_image) : "" ?>" height="80">
                    </div>
                    <div class="mb-3">
                        <h5 id="Add_outdoor_mediaLabel" class="fw-bold">Add SEO Information</h5>
                        <p class="new_form_p">Please fill the form to add Blog SEO Information</p>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Meta Title</label>
                        <p class="new_form_p">Please add Blog Meta Title</p>
                        <input type="text" id="blog_seo_title" name="blog_seo_title" class="form-control" value="<?= @$blog_seo_title ?>" />
                        <span class="error-message" id="error-blog_seo_title"></span>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Meta Keywords</label>
                        <p class="new_form_p">Please add Blog Meta Keyword</p>
                        <input type="text" id="blog_seo_keyword" name="blog_seo_keyword" class="form-control" value="<?= @$blog_seo_keyword ?>" />
                        <span class="error-message" id="error-blog_seo_keyword"></span>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label">Meta Description</label>
                        <p class="new_form_p">Please add Blog Meta Decription</p>
                        <input type="text" id="blog_seo_description" name="blog_seo_description" class="form-control" value="<?= @$blog_seo_description ?>" />
                        <span class="error-message" id="error-blog_seo_description"></span>
                    </div>
                    <div class="form_submit_div text-center">
                        <button type="button" class="submit_btn waves-effect waves-light me-1" onclick="submitFormWithAjax('form',true,true,successCallback,errorCallback)">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#blog_status").selectize({
                placeholder: "Select Blog Status"
            });
        });

        function successCallback(response) {
            console.log(response);
            if (response.status == 201 || response.status == 200) {
                setTimeout(() => {
                    window.location.href = "<?= base_url(route_to('blog_list_page')) ?>";
                }, 2000);
            }
        }

        function errorCallback(response) {
            console.log(response);
        }
        $(document).ready(function() {
            $("#blog_status").selectize({});
        });
    </script>
    <!-- --------------main page end----------- -->