<!-- -----------main page start----------- -->
<div class="p-3 form_bg">
    <div class="offcanvas-header">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel"><?= (isset($id) && !empty($id)) ? "Update" : "Create" ?>  Mode Of Payment</h5>
            <p class="new_form_p">Please fill the form to <?= (isset($id) && !empty($id)) ? "Update" : "Create" ?>  Mode Of Payment</p>
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
                    <label class="form-label">Bank name</label>
                    <p class="new_form_p">Please add Bank name</p>
                   <input type="text" id="bank_name" name="bank_name" class="form-control" value="<?= @$bank_name ?>" />
                    <span class="error-message" id="error-bank_name"></span>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Bank Account No.</label>
                    <p class="new_form_p">Please add Bank Account No.</p>
                    <input type="number" id="bank_acc_no" name="bank_acc_no" class="form-control" value="<?= @$bank_acc_no ?>" />
                    <span class="error-message" id="error-bank_acc_no"></span>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Bank IFSC code</label>
                    <p class="new_form_p">Please Add Bank IFSC code</p>
                    <div>
                       <input type="text" id="bank_ifsc_code" name="bank_ifsc_code" class="form-control" value="<?= @$bank_ifsc_code ?>" />
                    <span class="error-message" id="error-bank_ifsc_code"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Bank Account</label>
                    <p class="new_form_p">Please Select Bank Account</p>
                    <div>
                    <select id="bank_acc_type" name="bank_acc_type">
                              <option disable>Select Bank Account Type</option>
                              <option value="Saving" <?= (isset($bank_acc_type) && $bank_acc_type == "Saving") ? "selected" : "" ?>>Saving
                              </option>
                              <option value="Current" <?= (isset($bank_acc_type) && $bank_acc_type == "Current") ? "selected" : "" ?>>Current
                              </option>
                          </select>
                          <span class="error-message" id="error-bank_acc_type"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Phone Pay Number</label>
                    <p class="new_form_p">Please Add Pay Number</p>
                    <div>
                       <input type="text" id="phone_pay_number" name="phone_pay_number" class="form-control" value="<?= @$phone_pay_number ?>" />
                    <span class="error-message" id="error-phone_pay_number"></span>
                    </div>
                </div>
            
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Phone pay UPI</label>
                    <p class="new_form_p">Please Add Phone pay UPI</p>
                    <div>
                       <input type="text" id="phone_pay_upi" name="phone_pay_upi" class="form-control" value="<?= @$phone_pay_upi ?>" />
                    <span class="error-message" id="error-phone_pay_upi"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Google Pay UPI</label>
                    <p class="new_form_p">Please Add Google Pay UPI</p>
                    <div>
                       <input type="text" id="google_pay_upi" name="google_pay_upi" class="form-control" value="<?= @$google_pay_upi ?>" />
                    <span class="error-message" id="error-google_pay_upi"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Google Pay Number</label>
                    <p class="new_form_p">Please Add Google Pay Number</p>
                    <div>
                       <input type="text" id="google_pay_number" name="google_pay_number" class="form-control" value="<?= @$google_pay_number ?>" />
                    <span class="error-message" id="error-google_pay_number"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Paytm UPI</label>
                    <p class="new_form_p">Please Add Paytm UPI</p>
                    <div>
                       <input type="text" id="paytm_upi" name="paytm_upi" class="form-control" value="<?= @$paytm_upi ?>" />
                    <span class="error-message" id="error-paytm_upi"></span>
                    </div>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Paytm Number</label>
                    <p class="new_form_p">Please Add Paytm Number</p>
                    <div>
                       <input type="text" id="paytm_number" name="paytm_number" class="form-control" value="<?= @$paytm_number ?>" />
                    <span class="error-message" id="error-paytm_number"></span>
                    </div>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Amazon Pay UPI</label>
                    <p class="new_form_p">Please Add Amazon Pay UPI</p>
                    <div>
                       <input type="text" id="amazonpay_upi" name="amazonpay_upi" class="form-control" value="<?= @$amazonpay_upi ?>" />
                    <span class="error-message" id="error-amazonpay_upi"></span>
                    </div>

                </div> <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Amazon Number</label>
                    <p class="new_form_p">Please Add Amazon Number</p>
                    <div>
                       <input type="text" id="amazonpay_number" name="amazonpay_number" class="form-control" value="<?= @$amazonpay_number ?>" />
                    <span class="error-message" id="error-amazonpay_number"></span>
                    </div>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Bhim UPI</label>
                    <p class="new_form_p">Please Add Bhim UPI</p>
                    <div>
                       <input type="text" id="bhim_upi" name="bhim_upi" class="form-control" value="<?= @$bhim_upi ?>" />
                    <span class="error-message" id="error-bhim_upi"></span>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label text-capitalize">Bhim Number</label>
                    <p class="new_form_p">Please Add Bhim Number</p>
                    <div>
                       <input type="text" id="bhim_number" name="bhim_number" class="form-control" value="<?= @$bhim_number ?>" />
                    <span class="error-message" id="error-bhim_number"></span>
                    </div>
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
        // console.log(response);
        // if (response.status == 201 || response.status == 200) {
        //     setTimeout(() => {
        //         window.location.href = "";
        //     }, 2000);
        // }
    }

    function errorCallback(response) {
        console.log(response);
    }
    $(document).ready(function() {
          $("#bank_acc_type").selectize({});
          
      });
    </script>
<!-- --------------main page end----------- -->