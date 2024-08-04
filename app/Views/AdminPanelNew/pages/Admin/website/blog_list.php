<!-- -----------main page start----------- -->
<div class="offcanvas offcanvas-end  vendor-offcanvas" tabindex="-1" id="right_floting_div">
</div>

<div class="row new_table_div col-md-12">
    <div class="card">
        <div class="card-body p-2">
            <div class="d-flex justify-content-end align-items-center mb-2">
                <a href="<?= base_url(route_to('admin_dashboard_page')) ?>"><i
                        class="fas fa-home home_icn me-3"></i></a>
                <img onclick="fetchTableData()" src="<?php echo base_url('AdminPanelNew/assets/images/refresh.png') ?>" height="20"
                    class="me-3">
                <a href="<?= @$_previous_path ?>">
                    <button class="btn export_btn me-3" type="button"><i class="fas fa-backward"></i></button>
                </a>
                <a href="<?= base_url(route_to('blog_create_update_page')) ?>">
                    <button class="btn add_form_btn"><i class="bx bx-plus me-2"></i>Add Blog</button>
                </a>
            </div>
            <div class="table-responsive">
                <table id="table_list"
                    class="table table-striped table-bordered dt-responsive nowrap table-nowrap align-middle">
                    
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    var DeleteApiUrl = "<?= base_url(route_to('blog_delete_api')) ?>"

    function deleteRecord(blog_id) {
        deleteRow({
            blog_id: blog_id
        }).then((response) => {
            fetchTableData();
        }).catch((error) => {
            console.log(error);
        });
    }

    function view(blog_id) {
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to('blog_view_component')) ?>",
            data: {
                blog_id: blog_id
            },
            success: function(response) {
                $("#right_floting_div").html("");
                $("#right_floting_div").html(response);
            }
        });
    }

    function successDataTableCallbackFunction(response) {
        var columns = [{
                title: "ID",
                data: "blog_id",
                visible: true
            },
            {
                title: "Titel",
                data: "blog_title",
                visible: true

            },
            {
                title: "Status",
                data: "blog_status",
                visible: true

            },
            {
                title: "Short Content",
                data: "blog_short_content",
                visible: true

            },
            {
                title: "Blog Status",
                data: "blog_status",
                render: function(data, type, row) {
                    var options = `
                  <option ${row.blog_status == 'draft' ? 'selected' : ''} value="draft">Draft</option>
                  <option ${row.blog_status == 'published' ? 'selected' : ''} value="published">Published</option>
                  `;
                    return `
                  <select class="form-select" id="blog_status_${row.blog_id}" name="blog_status" onchange="update_blog_status(${row.blog_id})">
                    <option disabled>Select Status</option>
                    ${options}
                  </select>`;
                }
            },
            {
                "title": "Actions",
                "data": null,
                "render": function(data, type, row) {
                    return `
                    <?php if (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin' || $_SESSION['user_type'] == 'manager')) : ?>
                        <a href="<?= base_url(route_to('blog_create_update_page')) ?>/${row.blog_id}" class="btn edit_btn edit" title="Profile Edit">
                        <i class="bx bx-edit-alt"></i>
                        </a>
                              <?php endif; ?>
                               <?php if (isset($_SESSION['user_type']) && ($_SESSION['user_type'] == 'admin')) : ?>
                        <button onclick="deleteRecord(${row.blog_id})" class="btn del_btn" title="Delete">
                        <i class="bx bx-trash-alt"></i>
                        </button>
                     <?php endif; ?>
                        <button onclick="view(${row.blog_id})" class="btn view_btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#right_floting_div" aria-controls="AddVendor"><i class="far fa-eye"></i></button>

                    `;
                }
            }
        ];
        if (response.status == 200) {
            return {
                "status": response.status,
                "columns": columns,
                "data": JSON.parse(response.data)
            };
        } else {
            return {
                "status": response.status,
                "columns": columns,
                "data": {}
            };
        }
    }

    function fetchTableData(parameter = {}) {
        parameter._autojoin = 'Y';
        parameter._select = '*';
        DataTableInitialized(
            'table_list', // table_id
            "<?= base_url(route_to('blog_list_api')) ?>", // url
            'POST', // method
            parameter, // parameter
            successDataTableCallbackFunction // dataTableSuccessCallBack
        );
    }
    $(document).ready(function() {
        fetchTableData();
    });
    function update_blog_status(blog_id) {
        var blog_status = $(`#blog_status_${blog_id}`).val();
        // Proceed with the AJAX call
        $.ajax({
            type: "post",
            url: "<?= base_url(route_to('blog_update_api')) ?>",
            data: {
                blog_id: blog_id,
                blog_status: blog_status
            },
            success: function(response) {
                // Handle the response from the server
                switch (response.status) {
                    case 200:
                        toastr.success(response.message || 'Blog Status Updated Successfully');
                        fetchTableData();
                        break;
                    case 400:
                        toastr.error(response.message || 'Bad Request');
                        break;
                    case 422:
                        toastr.error(response.message || 'Validation Failed');
                        break;
                    default:
                        toastr.error('An unknown error occurred');
                }
            },
            error: function(error) {
                toastr.error('There was an error updating the status.');
            }
        });
    }
    
</script>

<!-- --------------main page end----------- -->