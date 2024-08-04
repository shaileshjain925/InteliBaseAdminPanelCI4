<div class="offcanvas-header pb-0">
                        <div class="">
                            <h5 id="Add_New_clientLabel">View Lead</h5>
                            <p class="new_form_p">View Lead Profile</p>
                        </div>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body p-3">
                        <div class="row w-100">
                            <div class="mb-3 col-md-6">
                                <div class="view_div">
                                    <label class="form-label text-capitalize">Name</label>
                                    <span class="ms-3"><?= $contact_person_name ?></span>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="view_div">
                                    <label class="form-label text-capitalize">Email</label>
                                    <span class="ms-3"><?= $contact_person_email ?></span>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="view_div">
                                    <label class="form-label text-capitalize">Mobile</label>
                                    <span class="ms-3"><?= $contact_person_mobile ?></span>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="view_div">
                                    <label class="form-label text-capitalize">Status</label>
                                    <span class="ms-3"><?= $lead_status ?></span>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="view_div">
                                    <label class="form-label text-capitalize">Date</label>
                                    <span class="ms-3"><?= date('d-m-Y',strtotime($lead_date)) ?></span>
                                </div>
                            </div>
                            <div class="mb-3 col-md-12">
                                <div class="view_div">
                                    <label class="form-label text-capitalize">Description</label>
                                    <span class="ms-3"><?= $lead_description ?></span>
                                </div>
                                </div>
                        </div>

                    </div>