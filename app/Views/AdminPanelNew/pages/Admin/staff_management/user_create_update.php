  <!-- -----------main page start----------- -->
  <div class="p-3" style="background: #fffceb;">
      <div class="offcanvas-header">
          <div class="">
              <h5 id="Add_outdoor_mediaLabel"><?= CreateUpdateAlias($user_id ?? null) ?> <?= UserType::from($user_type)->name ?></h5>
              <p class="new_form_p">Please fill the form to add <?= UserType::from($user_type)->name ?></p>
          </div>
      </div>
      <div class="offcanvas-body overflow-visible mt-2">
          <form class="custom-validation " action="#">
              <div class="row">
                  <div class="mb-3 col-md-4">
                      <label class="form-label">Name</label>
                      <p class="new_form_p">Please add Name</p>
                      <input type="text" class="form-control" required placeholder="" />
                  </div>
                  <div class="mb-3 col-md-4">
                      <label class="form-label">Email</label>
                      <p class="new_form_p">Please add Email</p>
                      <input type="text" class="form-control" required placeholder="" />
                  </div>
                  <div class="mb-3 col-md-4">
                      <label class="form-label">Mobile Number</label>
                      <p class="new_form_p">Please add Mobile Number</p>
                      <input type="text" class="form-control" required placeholder="" />
                  </div>
                  <div class="mb-3 col-md-6">
                      <label class="form-label">Date</label>
                      <p class="new_form_p">Please Select Date</p>
                      <input type="date" class="form-control" required placeholder="" />
                  </div>
                  <div class="mb-3 col-md-6">
                      <label class="form-label text-capitalize">Status</label>
                      <p class="new_form_p">Please Select Status</p>
                      <div>
                          <select class="form-select" aria-label="Default select example">
                              <option selected>Hot</option>
                              <option>Cold</option>
                              <option>Warm</option>
                              <option>Cancel</option>
                              <option>Converted</option>
                          </select>
                      </div>
                  </div>
                  <div class="mb-3 col-md-12">
                      <label class="form-label">Description</label>
                      <p class="new_form_p">Please add Description</p>
                      <input type="text" class="form-control" required placeholder="" />
                  </div>
                  <div class="form_submit_div text-center">
                      <button type="submit" class="submit_btn waves-effect waves-light me-1">
                          Submit
                      </button>
                  </div>
              </div>
          </form>
      </div>
  </div>

  <!-- --------------main page end----------- -->