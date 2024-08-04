<div class="p-3 form_bg">
    <div class="offcanvas-body">
        <form class="custom-validation bg-transparent border-0" action="#">
            <div class="row">
                <div class="offcanvas-header mb-3">
                    <div>
                        <h5 id="Add_outdoor_mediaLabel">Add Quotation</h5>
                        <p class="new_form_p">Please fill the form to add New Quotation</p>
                    </div>
                </div>
                <!-- Your existing fields (Quotation ID, Client Name, Quantity) -->
                <!-- Example fields: -->
                <div class="mb-3 col-md-3">
                    <label class="form-label">Quotation Id</label>
                    <p class="new_form_p">Automatically Appear</p>
                    <input type="text" class="form-control" required placeholder="" />
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label">Client Id</label>
                    <p class="new_form_p">Please Select Client ID</p>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>CL123</option>
                        <option>CL234</option>
                        <option>CL345</option>
                    </select>
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label">Client Name</label>
                    <p class="new_form_p">Automatically Appear</p>
                    <input type="text" class="form-control" required placeholder="" value="Alok Tripathi" disabled />
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label">Contact Email</label>
                    <p class="new_form_p">Automatically Appear</p>
                    <input type="text" class="form-control" required placeholder="" value="alok@gmail.com" disabled />
                </div>
                <!-- Client Name and Quantity fields continue... -->
            </div>

            <!-- Media details section -->
            <div class="row">
                <div class="offcanvas-header mb-3">
                    <div>
                        <h5 id="Add_media_detailsLabel">Add Media Details</h5>
                        <p class="new_form_p">Please fill the form to add Media Details</p>
                    </div>
                </div>
                <div id="media-fields-container" class="row">
                    <!-- Initial media detail fields -->
                    <div class="mb-3 col-md-4">
                        <label class="form-label text-capitalize">Media Type</label>
                        <p class="new_form_p">Please Select Media Type</p>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Billboard</option>
                            <option>Mall Media</option>
                            <option>Lift Branding</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Media Name</label>
                        <p class="new_form_p">Please add Media Name</p>
                        <input type="text" class="form-control" required placeholder="" />
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label text-capitalize">Illumination</label>
                        <p class="new_form_p">Please Select Illumination</p>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Ambient Lit</option>
                            <option>Backlit</option>
                            <option>Digital</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Size</label>
                        <p class="new_form_p">Please Add Media Size</p>
                        <input type="text" class="form-control" required placeholder="" />
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Total</label>
                        <p class="new_form_p"> Media Total</p>
                        <input type="text" class="form-control" required placeholder="" value="4000" disabled />
                    </div>
                    <div class="mb-3 col-md-1">
                        <button class="btn-add-input" id="clone-button" type="button"><i
                                class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div id="cloned-container" class="row p-0">
                    <!-- Cloned content will be appended here -->
                </div>
                <!-- <div class="table-responsive">
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
                </div> -->
            </div>

            <div class="row">
                <div class="offcanvas-header mb-2">
                    <div class="">
                        <h5 id="Add_outdoor_mediaLabel">Add Other Details</h5>
                        <p class="new_form_p">Please fill the form to add Other Details</p>
                    </div>
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label">Quotation Date</label>
                    <p class="new_form_p">Please Select Quotation Date</p>
                    <div class="input-group" id="Quotation_date">
                        <input type="text" class="form-control" placeholder="mm/dd/yyyy"
                            data-date-container='#Quotation_date' data-provide="datepicker" data-date-autoclose="true">
                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                    </div>
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label text-capitalize">Total Amount </label>
                    <p class="new_form_p">Please Select Total Amount</p>
                    <div>
                        <input type="text" class="form-control" required placeholder="" />
                    </div>
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label text-capitalize">Discount</label>
                    <p class="new_form_p">Please add Discount</p>
                    <div>
                        <input type="text" class="form-control" required placeholder="" />
                    </div>
                </div>
                <div class="mb-3 col-md-3">
                    <label class="form-label text-capitalize">Final Amount</label>
                    <p class="new_form_p">Please add Final Amount</p>
                    <div>
                        <input type="text" class="form-control" required placeholder="" />
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
<!-- ---------------add button---------------- -->
<script>
$(document).ready(function() {
    // Clone button click event
    $('#clone-button').click(function() {
        var clonedContent = $('#media-fields-container').clone(); // Clone the container
        clonedContent.find('#clone-button').remove(); // Remove clone button from cloned content

        // Add remove button
        var removeButton = $(
            '<button class="btn-remove-input " type="button"><i class="fas fa-minus"></i></button>');
        clonedContent.find('.col-md-1').append(removeButton);

        // Append cloned content to cloned-container
        $('#cloned-container').append(clonedContent);
    });

    // Use event delegation to handle remove button click event
    $('#cloned-container').on('click', '.btn-remove-input', function() {
        $(this).closest('.row').remove(); // Remove the closest row (cloned content)
    });
});
</script>