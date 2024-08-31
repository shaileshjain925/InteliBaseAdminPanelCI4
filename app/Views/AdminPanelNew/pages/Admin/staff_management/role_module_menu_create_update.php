<h5 class="fw-bold">Role: <strong><?= $role_name ?></strong></h5>
<style>
    .table {}

    .table-responsive {
        border: 1px solid #ddd;
    }

    .table-light th {
        border: 1px solid #dee2e6;
    }

    .table-light {
        border-collapse: collapse;
    }

    .table {
        border-color: #bfcbd7;
    }

    .table-light thead {
        border-bottom: 2px solid #dee2e6;
    }

    .form-check {
        text-align: center !important;
        display: grid;
        place-items: center;
        align-content: center;
        height: 40px;
    }

    .form-check .form-check-input {
        float: none !important;
        border: 1px solid black;
        font-size: 15px;
    }

    .table-container {
        max-width: 100%;
        overflow-x: auto;
    }

    .card {
        border: 1px solid #c7bebe;
    }
</style>
<form id="role_module_menus_form" method="post" enctype="multipart/form-data">
    <input type="hidden" name="role_id" value="<?= $role_id ?>">
    <div id="modules_table_div">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center"><strong>Module Permission</strong></h4>
            </div>
            <div class="card-body">
                <div class="table-container">
                    <table id="modules_table" class="table align-middle table-hover table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th rowspan="2"><strong>Module Name</strong></th>
                                <th colspan="1"><strong>Dashboard</strong></th>
                                <th colspan="8"><strong>Master</strong></th>
                                <th colspan="8"><strong>Transaction</strong></th>
                                <th colspan="3"><strong>Report</strong></th>
                                <th colspan="1"><strong>Config</strong></th>
                            </tr>
                            <tr style="font-size: x-large;">
                                <th> <i class="mdi mdi-desktop-mac-dashboard" title="Dashboard Permission"></i></th>
                                <th><i class="fa fa-eye" title="View Permission"></i></th>
                                <th><i class="bx bx-plus me-2" title="Create Permission"></i></th>
                                <th><i class="bx bx-edit-alt" title="Edit Permission"></i></th>
                                <th title="Approval Permission">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                        <g>
                                            <path d="M74.11 54.374a7 7 0 0 0 7-7V17.999h215.014c5.214 0 9.695 2.017 13.702 6.166l.086.087.664.664c4.085 4.235 6.335 9.786 6.335 15.635v58.076a7 7 0 0 0 7 7h58.076c5.85 0 11.403 2.252 15.639 6.34l.66.66c.028.029.058.058.088.086 4.147 4.004 6.164 8.486 6.164 13.702v80.963a7 7 0 1 0 14 0v-80.963c0-8.938-3.594-17.141-10.393-23.727l-88.296-88.296c-6.587-6.799-14.79-10.393-23.726-10.393H74.11a7 7 0 0 0-7 7v36.375a7 7 0 0 0 7 7zm256.801 37.252V45.25l46.376 46.376zm171.437 160.553c-3.441-12.844-11.679-23.579-23.194-30.228-11.518-6.648-24.93-8.417-37.776-4.973-12.844 3.441-23.579 11.679-30.227 23.194-3.844 6.656-6.052 13.893-6.564 21.51-2.04 30.283-9.717 55.507-24.889 81.787l-6.745 11.682a22.739 22.739 0 0 0-13.588-.184v-169.38c0-8.938-3.595-17.141-10.393-23.725l-88.295-88.295c-6.588-6.8-14.791-10.394-23.728-10.394H14.935a7 7 0 0 0-7 7v430.825a6.997 6.997 0 0 0 7 7h337.429a7 7 0 0 0 7-7v-21.696l46.142 26.64a15.308 15.308 0 0 0 7.674 2.06c5.325 0 10.513-2.762 13.362-7.696l5.161-8.939 1.666.962a15.308 15.308 0 0 0 7.674 2.06c5.326 0 10.514-2.762 13.362-7.697l6.692-11.592c7.936-13.746 3.21-31.384-10.535-39.32l-33.489-19.335 4.374-7.577c5.476-9.486 3.32-21.319-4.549-28.342l6.746-11.682c15.172-26.28 33.179-45.54 58.385-62.448 6.341-4.254 11.504-9.785 15.347-16.439 6.648-11.516 8.415-24.931 4.973-37.775zM271.737 104.426l46.375 46.375h-46.375zm73.628 389.572H21.935V77.174h215.014c5.214 0 9.696 2.017 13.702 6.166l.086.087.663.663c4.086 4.236 6.336 9.788 6.336 15.635v58.076a7 7 0 0 0 7 7h58.076c5.85 0 11.403 2.252 15.638 6.339l.66.66.088.087c4.147 4.003 6.164 8.485 6.165 13.701v181.127l-3.605 6.245-33.489-19.335c-13.746-7.935-31.384-3.209-39.321 10.536l-6.692 11.592c-4.245 7.354-1.717 16.791 5.637 21.036l1.666.962-5.161 8.94c-4.244 7.354-1.716 16.79 5.637 21.035l75.33 43.492v22.779zm69.054-.693a1.42 1.42 0 0 1-1.912.512l-135.472-78.214a1.418 1.418 0 0 1-.512-1.912l5.161-8.939 137.895 79.613-5.161 8.94zm34.555-25.207-6.692 11.593a1.417 1.417 0 0 1-1.912.512l-165.476-95.537a1.418 1.418 0 0 1-.512-1.912l6.691-11.592c2.736-4.738 7.716-7.39 12.83-7.39 2.506 0 5.046.637 7.367 1.978l142.293 82.153c7.06 4.076 9.487 13.136 5.41 20.196zm-95.089-88.138 4.374-7.577c2.412-4.177 7.773-5.611 11.949-3.202l35.913 20.735c4.177 2.412 5.614 7.773 3.202 11.95l-4.374 7.576-51.065-29.482zm131.367-97.006c-2.765 4.787-6.473 8.761-11.021 11.813-27.073 18.161-46.414 38.847-62.71 67.074l-6.507 11.27-19.699-11.373 6.507-11.269c16.296-28.227 24.541-55.32 26.733-87.847.367-5.465 1.955-10.664 4.72-15.451 4.778-8.277 12.494-14.198 21.727-16.672 9.232-2.475 18.874-1.205 27.152 3.575 8.277 4.779 14.198 12.495 16.672 21.727s1.204 18.875-3.574 27.152zm-306.326-61.887h123.45a7 7 0 1 1 0 14h-123.45a7 7 0 1 1 0-14zm0-38.3h76.676a7 7 0 1 1 0 14h-76.676a7 7 0 1 1 0-14zm-45-19.099H72.424c-7.994 0-14.498 6.504-14.498 14.499v61.501c0 7.995 6.504 14.499 14.498 14.499h61.502c7.994 0 14.498-6.504 14.498-14.499v-61.501c0-7.995-6.504-14.499-14.498-14.499zm.498 76a.525.525 0 0 1-.498.499H72.424a.525.525 0 0 1-.498-.499v-61.501c0-.256.242-.499.498-.499h61.502c.256 0 .498.242.498.499zm-8.844-48.746a6.999 6.999 0 0 1 0 9.899l-26.09 26.09a6.998 6.998 0 0 1-11.01-1.45l-8.822-15.28a6.999 6.999 0 0 1 2.562-9.562 7 7 0 0 1 9.562 2.562l4.262 7.38 19.64-19.64a7 7 0 0 1 9.898 0zm8.346 79.623H72.424c-7.994 0-14.498 6.504-14.498 14.498v61.501c0 7.995 6.504 14.499 14.498 14.499h61.502c7.994 0 14.498-6.504 14.498-14.499v-61.501c0-7.994-6.504-14.498-14.498-14.498zm.498 76a.525.525 0 0 1-.498.499H72.424a.525.525 0 0 1-.498-.499v-61.501c0-.256.242-.498.498-.498h61.502c.256 0 .498.242.498.498zm-.498 30.877H72.424c-7.994 0-14.498 6.504-14.498 14.499v61.501c0 7.995 6.504 14.499 14.498 14.499h61.502c7.994 0 14.498-6.504 14.498-14.499v-61.501c0-7.995-6.504-14.499-14.498-14.499zm.498 76a.525.525 0 0 1-.498.499H72.424a.525.525 0 0 1-.498-.499v-61.501c0-.256.242-.499.498-.499h61.502c.256 0 .498.242.498.499zm-8.844-155.623a6.999 6.999 0 0 1 0 9.899l-26.09 26.09a6.996 6.996 0 0 1-5.863 1.99 6.999 6.999 0 0 1-5.148-3.44l-8.822-15.28a7 7 0 0 1 12.124-7l4.262 7.38 19.64-19.64a7 7 0 0 1 9.898 0zm0 106.877a6.999 6.999 0 0 1 0 9.899l-26.09 26.09a6.998 6.998 0 0 1-11.01-1.45l-8.822-15.28a7 7 0 0 1 12.124-7l4.262 7.38 19.64-19.64a7 7 0 0 1 9.898 0zm183.796-69.732a7 7 0 0 1-7 7h-123.45a7 7 0 1 1 0-14h123.45a7 7 0 0 1 7 7zm0-38.3a7 7 0 0 1-7 7h-123.45a7 7 0 1 1 0-14h123.45a7 7 0 0 1 7 7zm-61.024 106.877a7 7 0 0 1-7 7h-62.426a7 7 0 1 1 0-14h62.426a7 7 0 0 1 7 7zm-17.727 38.3a7 7 0 0 1-7 7h-44.699a7 7 0 1 1 0-14h44.699a7 7 0 0 1 7 7zM57.924 136.208a7 7 0 0 1 7-7h150.165a7 7 0 1 1 0 14H64.924a7 7 0 0 1-7-7z" fill="#000000" opacity="1" data-original="#000000" class=""></path>
                                        </g>
                                    </svg>
                                </th>
                                <th><i class="bx bx-trash-alt" title="Delete Permission"></i></th>
                                <th><i class="mdi mdi-printer" title="Print Permission"></i></th>
                                <th><i class="mdi mdi-file-excel" title="Export Permission"></i></th>
                                <th title="Bulk Delete Permission">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" x="0" y="0" viewBox="0 0 48 48" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                        <g>
                                            <path d="M43.1 47.5H4.9V.5h38.3v47zm-36.2-2h34.3v-43H6.9z" fill="#ff0000" opacity="1" data-original="#000000" class=""></path>
                                            <path d="M14.3 20.8 10.6 17l1.4-1.4 2.3 2.3 4.6-4.5 1.4 1.4zM14.3 34.6l-3.7-3.7 1.4-1.4 2.3 2.3 4.6-4.6 1.4 1.5zM22.6 16.7h14v2h-14zM22.6 30.7h14v2h-14z" fill="#ff0000" opacity="1" data-original="#000000" class=""></path>
                                        </g>
                                    </svg>
                                </th>
                                <th><i class="fa fa-eye" title="View Permission"></i></th>
                                <th><i class="bx bx-plus me-2" title="Create Permission"></i></th>
                                <th><i class="bx bx-edit-alt" title="Edit Permission"></i></th>
                                <th title="Approval Permission">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                        <g>
                                            <path d="M74.11 54.374a7 7 0 0 0 7-7V17.999h215.014c5.214 0 9.695 2.017 13.702 6.166l.086.087.664.664c4.085 4.235 6.335 9.786 6.335 15.635v58.076a7 7 0 0 0 7 7h58.076c5.85 0 11.403 2.252 15.639 6.34l.66.66c.028.029.058.058.088.086 4.147 4.004 6.164 8.486 6.164 13.702v80.963a7 7 0 1 0 14 0v-80.963c0-8.938-3.594-17.141-10.393-23.727l-88.296-88.296c-6.587-6.799-14.79-10.393-23.726-10.393H74.11a7 7 0 0 0-7 7v36.375a7 7 0 0 0 7 7zm256.801 37.252V45.25l46.376 46.376zm171.437 160.553c-3.441-12.844-11.679-23.579-23.194-30.228-11.518-6.648-24.93-8.417-37.776-4.973-12.844 3.441-23.579 11.679-30.227 23.194-3.844 6.656-6.052 13.893-6.564 21.51-2.04 30.283-9.717 55.507-24.889 81.787l-6.745 11.682a22.739 22.739 0 0 0-13.588-.184v-169.38c0-8.938-3.595-17.141-10.393-23.725l-88.295-88.295c-6.588-6.8-14.791-10.394-23.728-10.394H14.935a7 7 0 0 0-7 7v430.825a6.997 6.997 0 0 0 7 7h337.429a7 7 0 0 0 7-7v-21.696l46.142 26.64a15.308 15.308 0 0 0 7.674 2.06c5.325 0 10.513-2.762 13.362-7.696l5.161-8.939 1.666.962a15.308 15.308 0 0 0 7.674 2.06c5.326 0 10.514-2.762 13.362-7.697l6.692-11.592c7.936-13.746 3.21-31.384-10.535-39.32l-33.489-19.335 4.374-7.577c5.476-9.486 3.32-21.319-4.549-28.342l6.746-11.682c15.172-26.28 33.179-45.54 58.385-62.448 6.341-4.254 11.504-9.785 15.347-16.439 6.648-11.516 8.415-24.931 4.973-37.775zM271.737 104.426l46.375 46.375h-46.375zm73.628 389.572H21.935V77.174h215.014c5.214 0 9.696 2.017 13.702 6.166l.086.087.663.663c4.086 4.236 6.336 9.788 6.336 15.635v58.076a7 7 0 0 0 7 7h58.076c5.85 0 11.403 2.252 15.638 6.339l.66.66.088.087c4.147 4.003 6.164 8.485 6.165 13.701v181.127l-3.605 6.245-33.489-19.335c-13.746-7.935-31.384-3.209-39.321 10.536l-6.692 11.592c-4.245 7.354-1.717 16.791 5.637 21.036l1.666.962-5.161 8.94c-4.244 7.354-1.716 16.79 5.637 21.035l75.33 43.492v22.779zm69.054-.693a1.42 1.42 0 0 1-1.912.512l-135.472-78.214a1.418 1.418 0 0 1-.512-1.912l5.161-8.939 137.895 79.613-5.161 8.94zm34.555-25.207-6.692 11.593a1.417 1.417 0 0 1-1.912.512l-165.476-95.537a1.418 1.418 0 0 1-.512-1.912l6.691-11.592c2.736-4.738 7.716-7.39 12.83-7.39 2.506 0 5.046.637 7.367 1.978l142.293 82.153c7.06 4.076 9.487 13.136 5.41 20.196zm-95.089-88.138 4.374-7.577c2.412-4.177 7.773-5.611 11.949-3.202l35.913 20.735c4.177 2.412 5.614 7.773 3.202 11.95l-4.374 7.576-51.065-29.482zm131.367-97.006c-2.765 4.787-6.473 8.761-11.021 11.813-27.073 18.161-46.414 38.847-62.71 67.074l-6.507 11.27-19.699-11.373 6.507-11.269c16.296-28.227 24.541-55.32 26.733-87.847.367-5.465 1.955-10.664 4.72-15.451 4.778-8.277 12.494-14.198 21.727-16.672 9.232-2.475 18.874-1.205 27.152 3.575 8.277 4.779 14.198 12.495 16.672 21.727s1.204 18.875-3.574 27.152zm-306.326-61.887h123.45a7 7 0 1 1 0 14h-123.45a7 7 0 1 1 0-14zm0-38.3h76.676a7 7 0 1 1 0 14h-76.676a7 7 0 1 1 0-14zm-45-19.099H72.424c-7.994 0-14.498 6.504-14.498 14.499v61.501c0 7.995 6.504 14.499 14.498 14.499h61.502c7.994 0 14.498-6.504 14.498-14.499v-61.501c0-7.995-6.504-14.499-14.498-14.499zm.498 76a.525.525 0 0 1-.498.499H72.424a.525.525 0 0 1-.498-.499v-61.501c0-.256.242-.499.498-.499h61.502c.256 0 .498.242.498.499zm-8.844-48.746a6.999 6.999 0 0 1 0 9.899l-26.09 26.09a6.998 6.998 0 0 1-11.01-1.45l-8.822-15.28a6.999 6.999 0 0 1 2.562-9.562 7 7 0 0 1 9.562 2.562l4.262 7.38 19.64-19.64a7 7 0 0 1 9.898 0zm8.346 79.623H72.424c-7.994 0-14.498 6.504-14.498 14.498v61.501c0 7.995 6.504 14.499 14.498 14.499h61.502c7.994 0 14.498-6.504 14.498-14.499v-61.501c0-7.994-6.504-14.498-14.498-14.498zm.498 76a.525.525 0 0 1-.498.499H72.424a.525.525 0 0 1-.498-.499v-61.501c0-.256.242-.498.498-.498h61.502c.256 0 .498.242.498.498zm-.498 30.877H72.424c-7.994 0-14.498 6.504-14.498 14.499v61.501c0 7.995 6.504 14.499 14.498 14.499h61.502c7.994 0 14.498-6.504 14.498-14.499v-61.501c0-7.995-6.504-14.499-14.498-14.499zm.498 76a.525.525 0 0 1-.498.499H72.424a.525.525 0 0 1-.498-.499v-61.501c0-.256.242-.499.498-.499h61.502c.256 0 .498.242.498.499zm-8.844-155.623a6.999 6.999 0 0 1 0 9.899l-26.09 26.09a6.996 6.996 0 0 1-5.863 1.99 6.999 6.999 0 0 1-5.148-3.44l-8.822-15.28a7 7 0 0 1 12.124-7l4.262 7.38 19.64-19.64a7 7 0 0 1 9.898 0zm0 106.877a6.999 6.999 0 0 1 0 9.899l-26.09 26.09a6.998 6.998 0 0 1-11.01-1.45l-8.822-15.28a7 7 0 0 1 12.124-7l4.262 7.38 19.64-19.64a7 7 0 0 1 9.898 0zm183.796-69.732a7 7 0 0 1-7 7h-123.45a7 7 0 1 1 0-14h123.45a7 7 0 0 1 7 7zm0-38.3a7 7 0 0 1-7 7h-123.45a7 7 0 1 1 0-14h123.45a7 7 0 0 1 7 7zm-61.024 106.877a7 7 0 0 1-7 7h-62.426a7 7 0 1 1 0-14h62.426a7 7 0 0 1 7 7zm-17.727 38.3a7 7 0 0 1-7 7h-44.699a7 7 0 1 1 0-14h44.699a7 7 0 0 1 7 7zM57.924 136.208a7 7 0 0 1 7-7h150.165a7 7 0 1 1 0 14H64.924a7 7 0 0 1-7-7z" fill="#000000" opacity="1" data-original="#000000" class=""></path>
                                        </g>
                                    </svg>
                                </th>
                                <th><i class="bx bx-trash-alt" title="Delete Permission"></i></th>
                                <th><i class="mdi mdi-printer" title="Print Permission"></i></th>
                                <th><i class="mdi mdi-file-excel" title="Export Permission"></i></th>
                                <th title="Bulk Delete Permission">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" x="0" y="0" viewBox="0 0 48 48" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                        <g>
                                            <path d="M43.1 47.5H4.9V.5h38.3v47zm-36.2-2h34.3v-43H6.9z" fill="#ff0000" opacity="1" data-original="#000000" class=""></path>
                                            <path d="M14.3 20.8 10.6 17l1.4-1.4 2.3 2.3 4.6-4.5 1.4 1.4zM14.3 34.6l-3.7-3.7 1.4-1.4 2.3 2.3 4.6-4.6 1.4 1.5zM22.6 16.7h14v2h-14zM22.6 30.7h14v2h-14z" fill="#ff0000" opacity="1" data-original="#000000" class=""></path>
                                        </g>
                                    </svg>
                                </th>

                                <th><i class="fa fa-eye" title="View Permission"></i></th>
                                <th><i class="mdi mdi-printer" title="Print Permission"></i></th>
                                <th><i class="mdi mdi-file-excel" title="Export Permission"></i></th>
                                <th><i class="fa fa-eye" title="View Permission"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($modules as $key => $module): ?>
                                <tr>
                                    <td class="text-dark text-center">
                                        <?= $module['module_name'] ?>
                                        <input type="hidden" name="modules[<?= $key ?>][module_id]" value="<?= $module['module_id'] ?>">
                                        <input type="hidden" name="modules[<?= $key ?>][role_id]" value="<?= $role_id ?>">
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input id="dashboard-<?php echo $module['module_id']; ?>" type="checkbox" class="form-check-input text-center <?= $module['is_dashboard'] ? '' : 'd-none' ?>" title="Dashboard View Permission" name="modules[<?= $key ?>][dashboard]" <?= $module['dashboard'] ? 'checked' : '' ?> <?= $module['is_dashboard'] ? '' : 'disabled' ?>>
                                            <input data-module-id="dashboard-<?php echo $module['module_id']; ?>" type="radio" class="form-check-input text-center <?= $module['is_dashboard'] ? '' : 'd-none' ?>" title="Primary Dashboard" for="modules[<?= $key ?>][dashboard]" name="primary_dashboard" value="<?= $module['module_id'] ?>" <?= $module['is_primary_dashboard'] ? 'checked' : '' ?> <?= $module['is_dashboard'] ? '' : 'disabled' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input title="Master View Permission" type="checkbox" class="form-check-input text-center" name="modules[<?= $key ?>][master_view]" <?= $module['master_view'] ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input title="Master Create Permission" type="checkbox" class="form-check-input text-center" name="modules[<?= $key ?>][master_create]" <?= $module['master_create'] ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input title="Master Edit Permission" type="checkbox" class="form-check-input text-center" name="modules[<?= $key ?>][master_edit]" <?= $module['master_edit'] ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input title="Master Approval Permission" type="checkbox" class="form-check-input text-center" name="modules[<?= $key ?>][master_approval]" <?= $module['master_approval'] ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input title="Master Delete Permission" type="checkbox" class="form-check-input text-center" name="modules[<?= $key ?>][master_delete]" <?= $module['master_delete'] ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input title="Master Print Permission" type="checkbox" class="form-check-input text-center" name="modules[<?= $key ?>][master_print]" <?= $module['master_print'] ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input title="Master Export Permission" type="checkbox" class="form-check-input text-center" name="modules[<?= $key ?>][master_export]" <?= $module['master_export'] ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input title="Master Bulk Delete Permission" type="checkbox" class="form-check-input text-center" name="modules[<?= $key ?>][master_bulk_delete]" <?= $module['master_bulk_delete'] ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input title="Transaction View Permission" type="checkbox" class="form-check-input text-center" name="modules[<?= $key ?>][transaction_view]" <?= $module['transaction_view'] ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input title="Transaction Create Permission" type="checkbox" class="form-check-input text-center" name="modules[<?= $key ?>][transaction_create]" <?= $module['transaction_create'] ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input title="Transaction Edit Permission" type="checkbox" class="form-check-input text-center" name="modules[<?= $key ?>][transaction_edit]" <?= $module['transaction_edit'] ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input title="transaction Approval Permission" type="checkbox" class="form-check-input text-center" name="modules[<?= $key ?>][transaction_approval]" <?= $module['transaction_approval'] ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input title="Transaction Delete Permission" type="checkbox" class="form-check-input text-center" name="modules[<?= $key ?>][transaction_delete]" <?= $module['transaction_delete'] ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input title="Transaction Print Permission" type="checkbox" class="form-check-input text-center" name="modules[<?= $key ?>][transaction_print]" <?= $module['transaction_print'] ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input title="Transaction Export Permission" type="checkbox" class="form-check-input text-center" name="modules[<?= $key ?>][transaction_export]" <?= $module['transaction_export'] ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input title="Transaction Bulk Delete Permission" type="checkbox" class="form-check-input text-center" name="modules[<?= $key ?>][transaction_bulk_delete]" <?= $module['transaction_bulk_delete'] ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input title="Report View Permission" type="checkbox" class="form-check-input text-center" name="modules[<?= $key ?>][report_view]" <?= $module['report_view'] ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input title="Report Print Permission" type="checkbox" class="form-check-input text-center" name="modules[<?= $key ?>][report_print]" <?= $module['report_print'] ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input title="Report Export Permission" type="checkbox" class="form-check-input text-center" name="modules[<?= $key ?>][report_export]" <?= $module['report_export'] ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input title="Config View Permission" type="checkbox" class="form-check-input text-center" name="modules[<?= $key ?>][config_view]" <?= $module['config_view'] ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-secondary" onclick="getMenus()">Set Menus Permission</button>
            </div>
        </div>
    </div>
    <div id="module_menu_table_div" class="d-none">

    </div>
</form>
<script>
    $('input[type="radio"]').on('click', function() {
        var moduleId = $(this).data('module-id'); // Get the associated checkbox ID
        if ($(this).prop('checked')) {
            $('#' + moduleId).prop('checked', true); // Check the corresponding checkbox
        }
    });
    $('input[type="radio"]').on('mousedown', function(e) {
        if ($(this).prop('checked')) {
            $(this).one('click', function() {
                $(this).prop('checked', false);
            });
        }
    });

    function getMenus() {
        $('#role_module_menus_form').attr('action', '<?= base_url(route_to('role_module_menus_component')) ?>');
        submitFormWithAjax('role_module_menus_form', true, true, moduleSuccessCallback, moduleErrorCallback)
    }

    function backToModules() {
        $("#modules_table_div").removeClass('d-none');
        $("#module_menu_table_div").addClass('d-none');
    }

    function moduleSuccessCallback(response) {
        if (response.status == 200) {
            $("#modules_table_div").addClass('d-none');
            $("#module_menu_table_div").removeClass('d-none');
            var data = JSON.parse(response.data);
            $("#module_menu_table_div").html(data.html);
        }
    }

    function moduleErrorCallback(response) {

    }

    function setMenus() {
        $('#role_module_menus_form').attr('action', '<?= base_url(route_to('role_module_menus_create_update')) ?>');
        submitFormWithAjax('role_module_menus_form', true, true, modulemenuSuccessCallback, modulemenuErrorCallback);
    }

    function modulemenuSuccessCallback(response) {
        if (response.status == 200 || response.status == 201) {
            setInterval(() => {
                window.location.href = "<?= base_url(route_to('role_list_page')) ?>";
            }, 2000);
        } else {
            console.log(response);
        }
    }

    function modulemenuErrorCallback(response) {

    }
</script>