 <!-- Add Vendor form -->
 <div class="offcanvas offcanvas-end  vendor-offcanvas" tabindex="-1" id="Add_New_client"
     aria-labelledby="Add_New_clientLabel">
     <div class="offcanvas-header pb-0">
         <div class="">
             <h5 id="Add_New_clientLabel">View Task Detail</h5>
             <!-- <p class="new_form_p">Please fill the form to View Site Engineer</p> -->
         </div>
         <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
     </div>
     <div class="offcanvas-body p-3">
         <div class="row w-100">
             <div class="mb-3 col-md-6">
                 <div class="view_div">
                     <label class="form-label text-capitalize">Assign Date</label>
                     <span class="ms-3">12-02-2024</span>
                 </div>
             </div>
             <div class="mb-3 col-md-6">
                 <div class="view_div">
                     <label class="form-label text-capitalize">Campaign Name</label>
                     <span class="ms-3">Campaign Name</span>
                 </div>
             </div>
             <div class="mb-3 col-md-9">
                 <div class="view_div">
                     <label class="form-label text-capitalize">Location Name</label>
                     <span class="ms-3">Chamunda Mata Temple Square</span>
                 </div>
             </div>
             <div class="mb-3 col-md-9">
                 <div class="view_div">
                     <label class="form-label text-capitalize">Location Type</label>
                     <span class="ms-3">Prime</span>
                 </div>
             </div>
             <div class="mb-3 col-md-6">
                 <div class="view_div">
                     <label class="form-label text-capitalize">City</label>
                     <span class="ms-3">Ujjain</span>
                 </div>
             </div>
             <div class="mb-3 col-md-6">
                 <div class="view_div">
                     <label class="form-label text-capitalize">State</label>
                     <span class="ms-3">Madhya Pradesh</span>
                 </div>
             </div>

             <div class="mb-3 col-md-6">
                 <div class="view_div">
                     <label class="form-label text-capitalize">Pincode</label>
                     <span class="ms-3">4560010</span>
                 </div>
             </div>
             <div class="mb-3 col-md-6">
                 <div class="view_div">
                     <label class="form-label text-capitalize">Media Type</label>
                     <span class="ms-3">Billboard</span>
                 </div>
             </div>
             <div class="mb-3 col-md-6">
                 <div class="view_div">
                     <label class="form-label text-capitalize">Media Name</label>
                     <span class="ms-3">Clear Channel Outdoor</span>
                 </div>
             </div>
             <div class="mb-3 col-md-6">
                 <div class="view_div">
                     <label class="form-label text-capitalize">From Date</label>
                     <span class="ms-3">12-04-2024</span>
                 </div>
             </div>
             <div class="mb-3 col-md-6">
                 <div class="view_div">
                     <label class="form-label text-capitalize">To Date</label>
                     <span class="ms-3">18-04-2024</span>
                 </div>
             </div>
             <div class="mb-3 col-md-6">
                 <div class="view_div">
                     <label class="form-label text-capitalize">Size</label>
                     <span class="ms-3">200x400</span>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- End from -->
 <!-- Vendors list -->
 <div class="row">
     <div class="col-12">
         <div class="card">
             <div class="card-body">
                 <div class="offcanvas-body row">
                     <div class="mb-3 col-md-3">
                         <p class="new_form_p">Please add a From Date</p>
                         <input type="date" class="form-control" required placeholder="" />
                     </div>
                     <div class="mb-3 col-md-3">
                         <p class="new_form_p">Please add a To Date</p>
                         <input type="date" class="form-control" required placeholder="" />
                     </div>
                 </div>

                 <div class="table-responsive">
                     <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap  
                                  table-nowrap align-middle">
                         <thead>
                             <tr>
                                 <th>SN</th>
                                 <th>Media Name</th>
                                 <th>Work Date</th>
                                 <th>Work Time</th>
                                 <th>Purpose</th>
                                 <th>Status</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>1</td>
                                 <td>Clear Channel Door</td>
                                 <td>12-04-2023</td>
                                 <td>05:00 AM</td>
                                 <td>Mounting</td>
                                 <td>
                                     <p class="pending_text">Pending</p>
                                 </td>
                                 <td>
                                     <button type="button" class="btn edit_btn" data-bs-toggle="modal"
                                         data-bs-target="#exampleModal" title="Edit Task">
                                         <img src="<?php echo base_url('AdminPanelNew/assets/images/task.png')?>"
                                             height="30">
                                     </button>
                                 </td>
                             </tr>
                             <tr>
                                 <td>1</td>
                                 <td>Clear Channel Door</td>
                                 <td>12-04-2023</td>
                                 <td>05:00 AM</td>
                                 <td>Mounting</td>
                                 <td>
                                     <p class="complete_text">Completed</p>
                                 </td>
                                 <td>
                                     <button type="button" class="btn edit_btn" data-bs-toggle="modal"
                                         data-bs-target="#exampleModal" title="Edit Task">
                                         <img src="<?php echo base_url('AdminPanelNew/assets/images/task.png')?>"
                                             height="30">
                                     </button>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
     <!-- end col -->
 </div>
 <!-- end row -->
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-sm">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Change Work Status</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="row">
                     <div class="col-md-6 ps-0">
                         <button class="w-100 btn pending_text me-2" type="button">Pending Task</button>
                     </div>
                     <div class="col-md-6 p-0">
                         <a href="<?php echo base_url(route_to('site_complete_photo'))?>" target="_blank"><button
                                 class="w-100 btn complete_text me-2" type="button">Completed Task</button></a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>