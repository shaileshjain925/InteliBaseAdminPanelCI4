<div class="p-3 form_bg">
    <div class="offcanvas-header mb-3">
        <div class="">
            <h5 id="Add_outdoor_mediaLabel">Assign Site</h5>
            <p class="new_form_p">Please fill the form to Assign Site</p>
        </div>
    </div>
    <div class="offcanvas-body">
        <form class="custom-validation" action="#">
            <div class="row">
                <div class="mb-3 col-md-3">
                    <label class="form-label text-capitalize">Location Name</label>
                    <p class="new_form_p">Automatically Appear Location Name</p>
                    <input type="text" class="form-control" required value="Chamunda Mata Temple Square" disabled />
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label text-capitalize">Site Engineer Name</label>
                    <p class="new_form_p">Please Select Site Engineer Name</p>
                    <div>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Ramesh</option>
                            <option>Rahul</option>
                            <option>Rinkesh</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-lbel text-capitalize">Date</label>
                    <p class="new_form_p">Please add a Date</p>
                    <input type="date" class="form-control" required placeholder="" />
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-lbel text-capitalize">Time</label>
                    <p class="new_form_p">Please add a Time</p>
                    <input type="date" class="form-control" required placeholder="" />
                </div>
                <div class="mb-3 col-md-5">
                      <input type="radio" id="html" name="fav_language" value="HTML">
                      <label for="Mounting">Mounting</label>
                      <input type="radio" id="css" name="fav_language" value="CSS">
                      <label for="Remove_Media">Remove Media</label>
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