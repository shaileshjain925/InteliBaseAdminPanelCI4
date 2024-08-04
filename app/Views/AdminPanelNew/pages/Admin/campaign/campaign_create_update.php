<div class="p-3 form_bg">
    <div class="offcanvas-body">
        <form class="custom-validation " action="#">
            <div class="offcanvas-header mb-3">
                <div class="">
                    <h5 id="Add_outdoor_mediaLabel">Add Campaign</h5>
                    <p class="new_form_p">Please fill the form to add New Campaign</p>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-4">
                    <label class="form-label">Campaign Id </label>
                    <p class="new_form_p">Automatically Appear </p>
                    <input type="Number" class="form-control" required placeholder="" />
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label">campaign Name </label>
                    <p class="new_form_p">Please add Campaign Name</p>
                    <input type="text" class="form-control" required placeholder="" />
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Quotation Id</label>
                    <p class="new_form_p">Please Select Quotation ID</p>
                    <div>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>CL123</option>
                            <option>CL456</option>
                            <option>CL789</option>
                            <option>CL741</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="offcanvas-header mb-3">
                <div class="">
                    <h5 id="Add_outdoor_mediaLabel">Client Details</h5>
                    <p class="new_form_p">Please fill the form to Client Detailsn</p>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-3">
                    <label class="form-label">Client Id </label>
                    <p class="new_form_p">Automatically Appear </p>
                    <input type="text" class="form-control" required placeholder="" value="CL123" disabled />
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label">Client Name</label>
                    <p class="new_form_p">Automatically Appear </p>
                    <input type="text" class="form-control" required placeholder="" value="Rajiv Sharma" disabled />
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label">PAN Card </label>
                    <p class="new_form_p">Automatically Appear </p>
                    <input type="text" class="form-control" required placeholder="" value="123456789" disabled />
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label">Client GSTN</label>
                    <p class="new_form_p">Automatically Appear </p>
                    <input type="text" class="form-control" required placeholder="" value="123456ASDF" disabled />
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label">Contact Name</label>
                    <p class="new_form_p">Automatically Appear </p>
                    <input type="text" class="form-control" required placeholder="" value="Anil Khurana" disabled />
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label">Contact Email</label>
                    <p class="new_form_p">Automatically Appear </p>
                    <input type="text" class="form-control" required placeholder="" value="anil@gmail.com" disabled />
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label">Contact Phone</label>
                    <p class="new_form_p">Automatically Appear </p>
                    <input type="number" class="form-control" required placeholder="" value="123456789" disabled />
                </div>
            </div>
            <div class="offcanvas-header mb-3">
                <div class="">
                    <h5 id="Add_outdoor_mediaLabel">Media Details</h5>
                    <p class="new_form_p">Please fill the form to Media Detailsn</p>
                </div>
                <div type="button" class="add_form_btn" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD</div>
            </div>
            <div class="table-responsive">
                <table id="table"
                    class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Media Type</th>
                            <th>Media Name</th>
                            <th>Illumination</th>
                            <th>Size</th>
                            <th>Days</th>
                            <th>Rental</th>
                            <th>Mounting</th>
                            <th>Printing</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Billboard</td>
                            <td>Clear Channel Outdoor</td>
                            <td>Ambient Lit</td>
                            <td>200x300</td>
                            <td>30</td>
                            <td>5000</td>
                            <td>5000</td>
                            <td>5000</td>
                            <td>15000</td>
                            <td>
                                <a type="button" class="btn edit_btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" title="Edit">
                                    <i class="bx bx-edit-alt"></i>
                                </a>
                                <button class="btn del_btn">
                                    <i class="bx bx-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Billboard</td>
                            <td>Clear Channel Outdoor</td>
                            <td>Ambient Lit</td>
                            <td>200x300</td>
                            <td>30</td>
                            <td>5000</td>
                            <td>5000</td>
                            <td>5000</td>
                            <td>15000</td>
                            <td>
                                <a type="button" class="btn edit_btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" title="Edit">
                                    <i class="bx bx-edit-alt"></i>
                                </a>
                                <button class="btn del_btn">
                                    <i class="bx bx-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Billboard</td>
                            <td>Clear Channel Outdoor</td>
                            <td>Ambient Lit</td>
                            <td>200x300</td>
                            <td>30</td>
                            <td>5000</td>
                            <td>5000</td>
                            <td>5000</td>
                            <td>15000</td>
                            <td>
                                <a type="button" class="btn edit_btn" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" title="Edit">
                                    <i class="bx bx-edit-alt"></i>
                                </a>
                                <button class="btn del_btn">
                                    <i class="bx bx-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="offcanvas-header mb-3">
                <div class="">
                    <h5 id="Add_outdoor_mediaLabel">Other Details</h5>
                    <p class="new_form_p">Please fill the form to Other Details</p>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Start Date</label>
                    <p class="new_form_p">Please Add Start Date</p>
                    <div>
                        <input type="date" class="form-control" required placeholder="" />
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">End Date</label>
                    <p class="new_form_p">Please Add End Date</p>
                    <div>
                        <input type="date" class="form-control" required placeholder="" />
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">PO Number</label>
                    <p class="new_form_p">Please Add Purchase Order Number</p>
                    <div>
                        <input type="text" class="form-control" required placeholder="" />
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Total Amount</label>
                    <p class="new_form_p">Automatically Appear</p>
                    <div>
                        <input type="text" class="form-control" required placeholder="" value="10,000" disabled />
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Discount</label>
                    <p class="new_form_p">Automatically Appear</p>
                    <div>
                        <input type="text" class="form-control" required placeholder="" value="1,000" disabled />
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label class="form-label text-capitalize">Final Amount</label>
                    <p class="new_form_p">Automatically Appear</p>
                    <div>
                        <input type="text" class="form-control" required placeholder="" value="9,000" disabled />
                    </div>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Media</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label text-capitalize">Media Type</label>
                        <p class="new_form_p">Please Select Media Type</p>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Billboard</option>
                            <option>Mall Media</option>
                            <option>Lift Branding</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Media Name</label>
                        <p class="new_form_p">Please add Media Name</p>
                        <input type="text" class="form-control" required placeholder="" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label text-capitalize">Illumination</label>
                        <p class="new_form_p">Please Select Illumination</p>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Ambient Lit</option>
                            <option>Backlit</option>
                            <option>Digital</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Size</label>
                        <p class="new_form_p">Please Add Media Size</p>
                        <input type="text" class="form-control" required placeholder="" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Rental</label>
                        <p class="new_form_p">Please Add Rental Amount</p>
                        <input type="text" class="form-control" required placeholder="" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Mounting</label>
                        <p class="new_form_p">Please Add Mounting Amount</p>
                        <input type="text" class="form-control" required placeholder="" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Printing</label>
                        <p class="new_form_p">Please Add Printing Amount</p>
                        <input type="text" class="form-control" required placeholder="" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Total</label>
                        <p class="new_form_p"> Media Total</p>
                        <input type="text" class="form-control" required placeholder="" value="4000" disabled />
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button type="button" class="submit_btn">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>