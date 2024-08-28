<?php
$input_count = 0;
?>
<div id="module_menus_table_div">
    <h4 class="text-center"><strong>Menu Permission</strong></h4>
    <div id="module_menus_table_sub_div">
        <?php foreach ($modules as $module_name => $menu_type): ?>
            <div class="card">
                <div class="card-header">
                    <h5><strong>Module:<?= $module_name ?></strong></h5>
                </div>
                <div class="card-body text-center">
                    <?php foreach ($menu_type as $menu_type_name => $menus): ?>
                        <?php if (module_menu_type_access($access_modules, $menus[0]['module_id'], $menu_type_name)): ?>
                            <div class="table-container mb-2">
                                <table id="modules_table" class="table align-middle table-hover table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th><strong><?= ucwords($menu_type_name) ?></strong></th>
                                            <?php if (module_menu_type_access($access_modules, $menus[0]['module_id'], $menu_type_name . "_view")): ?>
                                                <th>
                                                    <i style="font-size: x-large;" class="fa fa-eye" title="View Permission"></i>
                                                </th>
                                            <?php endif; ?>
                                            <?php if ($menu_type_name == 'master' || $menu_type_name == 'transaction'): ?>
                                                <?php if (module_menu_type_access($access_modules, $menus[0]['module_id'], $menu_type_name . "_create")): ?>
                                                    <th>
                                                        <i style="font-size: x-large;" class="bx bx-plus me-2" title="Create Permission"></i>
                                                    </th>
                                                <?php endif; ?>
                                                <?php if (module_menu_type_access($access_modules, $menus[0]['module_id'], $menu_type_name . "_edit")): ?>
                                                    <th>
                                                        <i style="font-size: x-large;" class="bx bx-edit-alt" title="Edit Permission"></i>
                                                    </th>
                                                <?php endif; ?>
                                                <?php if (module_menu_type_access($access_modules, $menus[0]['module_id'], $menu_type_name . "_approval")): ?>
                                                    <th title="Approval Permission">
                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                            <g>
                                                                <path d="M74.11 54.374a7 7 0 0 0 7-7V17.999h215.014c5.214 0 9.695 2.017 13.702 6.166l.086.087.664.664c4.085 4.235 6.335 9.786 6.335 15.635v58.076a7 7 0 0 0 7 7h58.076c5.85 0 11.403 2.252 15.639 6.34l.66.66c.028.029.058.058.088.086 4.147 4.004 6.164 8.486 6.164 13.702v80.963a7 7 0 1 0 14 0v-80.963c0-8.938-3.594-17.141-10.393-23.727l-88.296-88.296c-6.587-6.799-14.79-10.393-23.726-10.393H74.11a7 7 0 0 0-7 7v36.375a7 7 0 0 0 7 7zm256.801 37.252V45.25l46.376 46.376zm171.437 160.553c-3.441-12.844-11.679-23.579-23.194-30.228-11.518-6.648-24.93-8.417-37.776-4.973-12.844 3.441-23.579 11.679-30.227 23.194-3.844 6.656-6.052 13.893-6.564 21.51-2.04 30.283-9.717 55.507-24.889 81.787l-6.745 11.682a22.739 22.739 0 0 0-13.588-.184v-169.38c0-8.938-3.595-17.141-10.393-23.725l-88.295-88.295c-6.588-6.8-14.791-10.394-23.728-10.394H14.935a7 7 0 0 0-7 7v430.825a6.997 6.997 0 0 0 7 7h337.429a7 7 0 0 0 7-7v-21.696l46.142 26.64a15.308 15.308 0 0 0 7.674 2.06c5.325 0 10.513-2.762 13.362-7.696l5.161-8.939 1.666.962a15.308 15.308 0 0 0 7.674 2.06c5.326 0 10.514-2.762 13.362-7.697l6.692-11.592c7.936-13.746 3.21-31.384-10.535-39.32l-33.489-19.335 4.374-7.577c5.476-9.486 3.32-21.319-4.549-28.342l6.746-11.682c15.172-26.28 33.179-45.54 58.385-62.448 6.341-4.254 11.504-9.785 15.347-16.439 6.648-11.516 8.415-24.931 4.973-37.775zM271.737 104.426l46.375 46.375h-46.375zm73.628 389.572H21.935V77.174h215.014c5.214 0 9.696 2.017 13.702 6.166l.086.087.663.663c4.086 4.236 6.336 9.788 6.336 15.635v58.076a7 7 0 0 0 7 7h58.076c5.85 0 11.403 2.252 15.638 6.339l.66.66.088.087c4.147 4.003 6.164 8.485 6.165 13.701v181.127l-3.605 6.245-33.489-19.335c-13.746-7.935-31.384-3.209-39.321 10.536l-6.692 11.592c-4.245 7.354-1.717 16.791 5.637 21.036l1.666.962-5.161 8.94c-4.244 7.354-1.716 16.79 5.637 21.035l75.33 43.492v22.779zm69.054-.693a1.42 1.42 0 0 1-1.912.512l-135.472-78.214a1.418 1.418 0 0 1-.512-1.912l5.161-8.939 137.895 79.613-5.161 8.94zm34.555-25.207-6.692 11.593a1.417 1.417 0 0 1-1.912.512l-165.476-95.537a1.418 1.418 0 0 1-.512-1.912l6.691-11.592c2.736-4.738 7.716-7.39 12.83-7.39 2.506 0 5.046.637 7.367 1.978l142.293 82.153c7.06 4.076 9.487 13.136 5.41 20.196zm-95.089-88.138 4.374-7.577c2.412-4.177 7.773-5.611 11.949-3.202l35.913 20.735c4.177 2.412 5.614 7.773 3.202 11.95l-4.374 7.576-51.065-29.482zm131.367-97.006c-2.765 4.787-6.473 8.761-11.021 11.813-27.073 18.161-46.414 38.847-62.71 67.074l-6.507 11.27-19.699-11.373 6.507-11.269c16.296-28.227 24.541-55.32 26.733-87.847.367-5.465 1.955-10.664 4.72-15.451 4.778-8.277 12.494-14.198 21.727-16.672 9.232-2.475 18.874-1.205 27.152 3.575 8.277 4.779 14.198 12.495 16.672 21.727s1.204 18.875-3.574 27.152zm-306.326-61.887h123.45a7 7 0 1 1 0 14h-123.45a7 7 0 1 1 0-14zm0-38.3h76.676a7 7 0 1 1 0 14h-76.676a7 7 0 1 1 0-14zm-45-19.099H72.424c-7.994 0-14.498 6.504-14.498 14.499v61.501c0 7.995 6.504 14.499 14.498 14.499h61.502c7.994 0 14.498-6.504 14.498-14.499v-61.501c0-7.995-6.504-14.499-14.498-14.499zm.498 76a.525.525 0 0 1-.498.499H72.424a.525.525 0 0 1-.498-.499v-61.501c0-.256.242-.499.498-.499h61.502c.256 0 .498.242.498.499zm-8.844-48.746a6.999 6.999 0 0 1 0 9.899l-26.09 26.09a6.998 6.998 0 0 1-11.01-1.45l-8.822-15.28a6.999 6.999 0 0 1 2.562-9.562 7 7 0 0 1 9.562 2.562l4.262 7.38 19.64-19.64a7 7 0 0 1 9.898 0zm8.346 79.623H72.424c-7.994 0-14.498 6.504-14.498 14.498v61.501c0 7.995 6.504 14.499 14.498 14.499h61.502c7.994 0 14.498-6.504 14.498-14.499v-61.501c0-7.994-6.504-14.498-14.498-14.498zm.498 76a.525.525 0 0 1-.498.499H72.424a.525.525 0 0 1-.498-.499v-61.501c0-.256.242-.498.498-.498h61.502c.256 0 .498.242.498.498zm-.498 30.877H72.424c-7.994 0-14.498 6.504-14.498 14.499v61.501c0 7.995 6.504 14.499 14.498 14.499h61.502c7.994 0 14.498-6.504 14.498-14.499v-61.501c0-7.995-6.504-14.499-14.498-14.499zm.498 76a.525.525 0 0 1-.498.499H72.424a.525.525 0 0 1-.498-.499v-61.501c0-.256.242-.499.498-.499h61.502c.256 0 .498.242.498.499zm-8.844-155.623a6.999 6.999 0 0 1 0 9.899l-26.09 26.09a6.996 6.996 0 0 1-5.863 1.99 6.999 6.999 0 0 1-5.148-3.44l-8.822-15.28a7 7 0 0 1 12.124-7l4.262 7.38 19.64-19.64a7 7 0 0 1 9.898 0zm0 106.877a6.999 6.999 0 0 1 0 9.899l-26.09 26.09a6.998 6.998 0 0 1-11.01-1.45l-8.822-15.28a7 7 0 0 1 12.124-7l4.262 7.38 19.64-19.64a7 7 0 0 1 9.898 0zm183.796-69.732a7 7 0 0 1-7 7h-123.45a7 7 0 1 1 0-14h123.45a7 7 0 0 1 7 7zm0-38.3a7 7 0 0 1-7 7h-123.45a7 7 0 1 1 0-14h123.45a7 7 0 0 1 7 7zm-61.024 106.877a7 7 0 0 1-7 7h-62.426a7 7 0 1 1 0-14h62.426a7 7 0 0 1 7 7zm-17.727 38.3a7 7 0 0 1-7 7h-44.699a7 7 0 1 1 0-14h44.699a7 7 0 0 1 7 7zM57.924 136.208a7 7 0 0 1 7-7h150.165a7 7 0 1 1 0 14H64.924a7 7 0 0 1-7-7z" fill="#000000" opacity="1" data-original="#000000" class=""></path>
                                                            </g>
                                                        </svg>
                                                    </th>
                                                <?php endif; ?>
                                                <?php if (module_menu_type_access($access_modules, $menus[0]['module_id'], $menu_type_name . "_delete")): ?>
                                                    <th>
                                                        <i style="font-size: x-large;" class="bx bx-trash-alt" title="Delete Permission"></i>
                                                    </th>
                                                <?php endif ?>
                                            <?php endif ?>

                                            <?php if (module_menu_type_access($access_modules, $menus[0]['module_id'], $menu_type_name . "_print")): ?>
                                                <th>
                                                    <i style="font-size: x-large;" class="mdi mdi-printer" title="Print Permission"></i>
                                                </th>
                                            <?php endif; ?>
                                            <?php if (module_menu_type_access($access_modules, $menus[0]['module_id'], $menu_type_name . "_export")): ?>
                                                <th>
                                                    <i style="font-size: x-large;" class="mdi mdi-file-excel" title="Export Permission"></i>
                                                </th>
                                            <?php endif; ?>
                                            <?php if ($menu_type_name == 'master' || $menu_type_name == 'transaction'): ?>
                                                <?php if (module_menu_type_access($access_modules, $menus[0]['module_id'], $menu_type_name . "_bulk_delete")): ?>
                                                    <th title="Bulk Delete Permission">
                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" x="0" y="0" viewBox="0 0 48 48" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                            <g>
                                                                <path d="M43.1 47.5H4.9V.5h38.3v47zm-36.2-2h34.3v-43H6.9z" fill="#ff0000" opacity="1" data-original="#000000" class=""></path>
                                                                <path d="M14.3 20.8 10.6 17l1.4-1.4 2.3 2.3 4.6-4.5 1.4 1.4zM14.3 34.6l-3.7-3.7 1.4-1.4 2.3 2.3 4.6-4.6 1.4 1.5zM22.6 16.7h14v2h-14zM22.6 30.7h14v2h-14z" fill="#ff0000" opacity="1" data-original="#000000" class=""></path>
                                                            </g>
                                                        </svg>
                                                    </th>
                                                <?php endif; ?>
                                                <th title="Bulk Delete Permission">
                                                    <strong>Back Days Data Allowed</strong>
                                                </th>
                                            <?php endif; ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($menus as $menu): ?>
                                            <tr>
                                                <td>
                                                    <strong><?= ucwords($menu['menu_name']) ?></strong>
                                                    <input type="hidden" name="module_menus[<?= $input_count ?>][module_menu_id]" value="<?= $menu['module_menu_id'] ?>">
                                                    <input type="hidden" name="module_menus[<?= $input_count ?>][role_id]" value="<?= $role_id ?>">
                                                </td>
                                                <?php if (module_menu_type_access($access_modules, $menus[0]['module_id'], $menu_type_name . "_view")): ?>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input text-center" name="module_menus[<?= $input_count ?>][view]" <?= $menu['view'] ? 'checked' : '' ?>>
                                                        </div>
                                                    </td>
                                                <?php endif; ?>
                                                <?php if ($menu_type_name == 'master' || $menu_type_name == 'transaction'): ?>
                                                    <?php if (module_menu_type_access($access_modules, $menus[0]['module_id'], $menu_type_name . "_create")): ?>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input text-center" name="module_menus[<?= $input_count ?>][create]" <?= $menu['create'] ? 'checked' : '' ?>>
                                                            </div>
                                                        </td>
                                                    <?php endif; ?>
                                                    <?php if (module_menu_type_access($access_modules, $menus[0]['module_id'], $menu_type_name . "_edit")): ?>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input text-center" name="module_menus[<?= $input_count ?>][edit]" <?= $menu['edit'] ? 'checked' : '' ?>>
                                                            </div>
                                                        </td>
                                                    <?php endif; ?>
                                                    <?php if (module_menu_type_access($access_modules, $menus[0]['module_id'], $menu_type_name . "_approval")): ?>
                                                        <td title="Approval Permission">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input text-center" name="module_menus[<?= $input_count ?>][approval]" <?= $menu['approval'] ? 'checked' : '' ?>>
                                                            </div>
                                                        </td>
                                                    <?php endif; ?>
                                                    <?php if (module_menu_type_access($access_modules, $menus[0]['module_id'], $menu_type_name . "_delete")): ?>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input text-center" name="module_menus[<?= $input_count ?>][delete]" <?= $menu['delete'] ? 'checked' : '' ?>>
                                                            </div>
                                                        </td>
                                                    <?php endif ?>
                                                <?php endif ?>

                                                <?php if (module_menu_type_access($access_modules, $menus[0]['module_id'], $menu_type_name . "_print")): ?>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input text-center" name="module_menus[<?= $input_count ?>][print]" <?= $menu['print'] ? 'checked' : '' ?>>
                                                        </div>
                                                    </td>
                                                <?php endif; ?>
                                                <?php if (module_menu_type_access($access_modules, $menus[0]['module_id'], $menu_type_name . "_export")): ?>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input text-center" name="module_menus[<?= $input_count ?>][export]" <?= $menu['export'] ? 'checked' : '' ?>>
                                                        </div>
                                                    </td>
                                                <?php endif; ?>
                                                <?php if ($menu_type_name == 'master' || $menu_type_name == 'transaction'): ?>
                                                    <?php if (module_menu_type_access($access_modules, $menus[0]['module_id'], $menu_type_name . "_bulk_delete")): ?>
                                                        <td title="Bulk Delete Permission">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input text-center" name="module_menus[<?= $input_count ?>][bulk_delete]" <?= $menu['bulk_delete'] ? 'checked' : '' ?>>
                                                            </div>
                                                        </td>
                                                    <?php endif; ?>
                                                    <td title="Bulk Delete Permission">
                                                        <input type="number" class="form-control" name="module_menus[<?= $input_count ?>][back_days_data_allowed]" value="<?= $menu['back_days_data_allowed'] ?>">
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                            <?php
                                            $input_count = $input_count + 1
                                            ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-secondary" onclick="backToModules()">Back</button>
            <button type="button" class="btn btn-primary" onclick="setMenus()">Save</button>
        </div>
    </div>
</div>