  <!-- -----------main page start----------- -->
  <div class="p-3" style="background: #fffceb;">
      <div class="offcanvas-header">
          <div class="">
              <h5 id="Add_outdoor_mediaLabel"><?= (isset($party_id) && !empty($party_id)) ? "Update" : "Create" ?> Lead</h5>
              <p class="new_form_p">Please fill the form to <?= (isset($party_id) && !empty($party_id)) ? "Update" : "Create" ?> Lead</p>
          </div>
      </div>
      <div class="offcanvas-body overflow-visible mt-2">
          <div class="error-message-box d-none">
              <p id="error-message"></p>
          </div>
          <div class="success-message-box d-none">
              <p id="success-message"></p>
          </div>
          <form id="form" method="post" enctype="multipart/form-data" class="custom-validation " action="<?= (isset($party_id) && !empty($party_id)) ? base_url(route_to('lead_update_api')) : base_url(route_to('lead_create_api')) ?>">
              <input type="hidden" id="party_id" name="party_id" value="<?= @$party_id ?>">
              <input type="hidden" id="party_type" name="party_type" value="lead">
              <div class="row">
                  <div class="mb-3 col-md-4">
                      <label class="form-label">Name</label>
                      <p class="new_form_p">Please add Lead Name</p>
                      <input type="text" id="contact_person_name" name="contact_person_name" class="form-control" value="<?= @$contact_person_name ?>" />
                      <span class="error-message" id="error-contact_person_name"></span>
                  </div>
                  <div class="mb-3 col-md-4">
                      <label class="form-label">Email</label>
                      <p class="new_form_p">Please add Lead Email</p>
                      <input type="text" id="contact_person_email" name="contact_person_email" class="form-control" value="<?= @$contact_person_email ?>" />
                      <span class="error-message" id="error-contact_person_email"></span>
                  </div>
                  <div class="mb-3 col-md-4">
                      <label class="form-label">Mobile Number</label>
                      <p class="new_form_p">Please add Lead Mobile Number</p>
                      <input type="number" id="contact_person_mobile" name="contact_person_mobile" class="form-control" value="<?= @$contact_person_mobile ?>" />
                      <span class="error-message" id="error-contact_person_mobile"></span>
                  </div>
                  <div class="mb-3 col-md-6">
                      <label class="form-label">Date</label>
                      <p class="new_form_p">Please Select Lead Date</p>
                      <input type="date" id="lead_date" name="lead_date" class="form-control" value="<?= @$lead_date ?>" />
                      <span class="error-message" id="error-lead_date"></span>
                  </div>
                  <div class="mb-3 col-md-6">
                      <label class="form-label text-capitalize">Status</label>
                      <p class="new_form_p">Please Select Status</p>
                      <div>

                          <select id="lead_status" name="lead_status">
                              <option disable>Select Status</option>
                              <option value="Hot" <?= (isset($lead_status) && $lead_status == "Hot") ? "selected" : "" ?>>Hot
                              </option>
                              <option value="Cold" <?= (isset($lead_status) && $lead_status == "Cold") ? "selected" : "" ?>>Cold
                              </option>
                              <option value="Warm" <?= (isset($lead_status) && $lead_status == "Warm") ? "selected" : "" ?>>Warm
                              </option>
                              <option value="Win" <?= (isset($lead_status) && $lead_status == "Win") ? "selected" : "" ?>>Win
                              </option>
                              <option value="Lost" <?= (isset($lead_status) && $lead_status == "Lost") ? "selected" : "" ?>>Lost
                              </option>>
                          </select>
                          <span class="error-message" id="error-lead_status"></span>
                      </div>
                  </div>
                  <div class="mb-3 col-md-12">
                      <label class="form-label">Description</label>
                      <p class="new_form_p">Please add Lead Description</p>
                      <input type="text" id="lead_description" name="lead_description" class="form-control" value="<?= @$lead_description ?>" />
                      <span class="error-message" id="error-lead_description"></span>
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
      function successCallback(response) {
          console.log(response);
          if (response.status == 201 || response.status == 200) {
              setTimeout(() => {
                  window.location.href = "<?= base_url(route_to('lead_list_page')) ?>";
              }, 2000);
          }
      }

      function errorCallback(response) {
          console.log(response);
      }
      $(document).ready(function() {
          $("#lead_status").selectize({});
      });
  </script>

  <!-- --------------main page end----------- -->