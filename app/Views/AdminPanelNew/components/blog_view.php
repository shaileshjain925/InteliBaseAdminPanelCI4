 <div class="offcanvas-header pb-0">
     <div class="">
         <h5 id="Add_New_clientLabel">View Blog</h5>
         <p class="new_form_p">View Blog Profile</p>
     </div>
     <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
 </div>
 <div class="offcanvas-body p-3">

     <div class="row w-100">
         <div class="mb-3 col-md-12">
             <div class="">
                 <label class="form-label text-capitalize">Blog Image</label>
                 <img id="blog_featured_image_display" name="blog_featured_image_display" onclick="enlargeImage(event)" src="<?= (isset($blog_featured_image)) ? base_url($blog_featured_image) : "" ?>" height="80">
             </div>
         </div>
         <div class="mb-3 col-md-6">
             <div class="view_div">
                 <label class="form-label text-capitalize">Title</label>
                 <span class="ms-3"><?= $blog_title ?></span>
             </div>
         </div>
         <div class="mb-3 col-md-6">
             <div class="view_div">
                 <label class="form-label text-capitalize">Date</label>
                 <span class="ms-3"><?= date('d-m-Y',strtotime($blog_date)) ?></span>
             </div>
         </div>
         <div class="mb-3 col-md-6">
             <div class="view_div">
                 <label class="form-label text-capitalize">Author Name</label>
                 <span class="ms-3"><?= $blog_author_name ?></span>
             </div>
         </div>
         <div class="mb-3 col-md-6">
             <div class="view_div">
                 <label class="form-label text-capitalize">Status</label>
                 <span class="ms-3"><?= $blog_status?></span>
             </div>
         </div>
         <div class="mb-3 col-md-12">
             <div class="view_div">
                 <label class="form-label text-capitalize">Short Content</label>
                 <span class="ms-3"><?= $blog_short_content ?></span>
             </div>
         </div>
         <div class="mb-3 col-12">
             <div class="view_div">
                 <label class="form-label text-capitalize">Description</label>
                 <span class="ms-3"><?= $blog_long_content ?></span>
             </div>
         </div>
         <div class="mb-3 col-md-12">
             <div class="view_div">
                 <label class="form-label text-capitalize">Meta Title</label>
                 <span class="ms-3"><?= $blog_seo_title ?></span>
             </div>
         </div>
         <div class="mb-3 col-md-12">
             <div class="view_div">
                 <label class="form-label text-capitalize">Meta Keywords</label>
                 <span class="ms-3"><?= $blog_seo_keyword ?></span>
             </div>
         </div>
         <div class="mb-3 col-md-12">
             <div class="view_div">
                 <label class="form-label text-capitalize">Meta Description</label>
                 <span class="ms-3"><?= $blog_seo_description ?></span>
             </div>
         </div>
     </div>

 </div>