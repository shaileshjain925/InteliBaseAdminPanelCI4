<!-- Item Form -->
<form id="item-form" method="post" enctype="multipart/form-data" action="<?= isset($item_id) ? base_url(route_to('item_update_api')) : base_url(route_to('item_create_api')) ?>">

    <!-- Hidden Item ID (for updates) -->
    <input type="hidden" name="item_id" value="<?= @$item_id ?>">

    <div class="row">
        <h5>Basic Information</h5>
        <!-- Item Code -->
        <div class="mb-3 col-md-4">
            <label for="item_code" class="form-label">Item Code</label>
            <input type="text" class="form-control" id="item_code" name="item_code" value="<?= @$item_code ?>" placeholder="Item Code">
            <span class="error-message" id="error-item_code"></span>
        </div>

        <!-- Item Name -->
        <div class="mb-3 col-md-4">
            <label for="item_name" class="form-label">Item Name</label>
            <input type="text" class="form-control" id="item_name" name="item_name" value="<?= @$item_name ?>" placeholder="Item Name">
            <span class="error-message" id="error-item_name"></span>
        </div>
        <!-- Item Class -->
        <div class="mb-3 col-md-4">
            <label for="item_class" class="form-label">Item Class</label>
            <select class="form-control" id="item_class" name="item_class">
                <option value="listed" <?= @$item_class == 'listed' ? 'selected' : '' ?>>Listed</option>
                <option value="non-listed" <?= @$item_class == 'non-listed' ? 'selected' : '' ?>>Non-Listed</option>
                <option value="not-assign" <?= @$item_class == 'not-assign' ? 'selected' : '' ?>>Not Assign</option>
            </select>
            <span class="error-message" id="error-item_class"></span>
        </div>

        <!-- Item Description -->
        <div class="mb-3 col-md-12">
            <label for="item_description" class="form-label">Item Description</label>
            <textarea class="form-control" id="item_description" name="item_description" placeholder="Item Description"><?= @$item_description ?></textarea>
            <span class="error-message" id="error-item_description"></span>
        </div>

        <!-- Item Supplier Description -->
        <div class="mb-3 col-md-12">
            <label for="item_supplier_description" class="form-label">Item Supplier Description</label>
            <textarea class="form-control" id="item_supplier_description" name="item_supplier_description" placeholder="Item Supplier Description"><?= @$item_supplier_description ?></textarea>
            <span class="error-message" id="error-item_supplier_description"></span>
        </div>

        <h5>Classification</h5>
        <!-- Item Brand -->
        <div class="mb-3 col-md-4">
            <label for="item_brand_id" class="form-label">Item Brand</label>
            <select class="form-control" id="item_brand_id" name="item_brand_id">
                <option value="">Select Item Brand</option>
                <!-- Options will be dynamically populated -->
            </select>
            <span class="error-message" id="error-item_brand_id"></span>
        </div>

        <!-- Item Category -->
        <div class="mb-3 col-md-4">
            <label for="item_category_id" class="form-label">Item Category</label>
            <select class="form-control" id="item_category_id" name="item_category_id">
                <option value="">Select Item Category</option>
                <!-- Options will be dynamically populated -->
            </select>
            <span class="error-message" id="error-item_category_id"></span>
        </div>

        <!-- Item Sub Group -->
        <div class="mb-3 col-md-4">
            <label for="item_sub_group_id" class="form-label">Item Sub Group</label>
            <select class="form-control" id="item_sub_group_id" name="item_sub_group_id">
                <option value="">Select Item Sub Group</option>
                <!-- Options will be dynamically populated -->
            </select>
            <span class="error-message" id="error-item_sub_group_id"></span>
        </div>

        <!-- Item HSN -->
        <div class="mb-3 col-md-4">
            <label for="item_hsn_id" class="form-label">Item HSN</label>
            <select class="form-control" id="item_hsn_id" name="item_hsn_id">
                <option value="">Select HSN Code</option>
                <!-- Options will be dynamically populated -->
            </select>
            <span class="error-message" id="error-item_hsn_id"></span>
        </div>

        <!-- Item Nature -->
        <div class="mb-3 col-md-4">
            <label for="item_nature" class="form-label">Item Nature</label>
            <select class="form-control" id="item_nature" name="item_nature">
                <option value="Capex" <?= @$item_nature == 'Capex' ? 'selected' : '' ?>>Capex</option>
                <option value="Packaging" <?= @$item_nature == 'Packaging' ? 'selected' : '' ?>>Packaging</option>
                <option value="Services" <?= @$item_nature == 'Services' ? 'selected' : '' ?>>Services</option>
                <option value="Saleable" <?= @$item_nature == 'Saleable' ? 'selected' : '' ?>>Saleable</option>
                <option value="Consumable" <?= @$item_nature == 'Consumable' ? 'selected' : '' ?>>Consumable</option>
                <option value="MRO" <?= @$item_nature == 'MRO' ? 'selected' : '' ?>>MRO</option>
                <option value="NoBuy" <?= @$item_nature == 'NoBuy' ? 'selected' : '' ?>>NoBuy</option>
                <option value="NoStock" <?= @$item_nature == 'NoStock' ? 'selected' : '' ?>>NoStock</option>
            </select>
            <span class="error-message" id="error-item_nature"></span>
        </div>

        <!-- Item Manufacturing Type -->
        <div class="mb-3 col-md-4">
            <label for="item_manufacturing_type" class="form-label">Item Manufacturing Type</label>
            <select class="form-control" id="item_manufacturing_type" name="item_manufacturing_type">
                <option value="FinishedProduct" <?= @$item_manufacturing_type == 'FinishedProduct' ? 'selected' : '' ?>>Finished Product</option>
                <option value="RawMaterial" <?= @$item_manufacturing_type == 'RawMaterial' ? 'selected' : '' ?>>Raw Material</option>
                <option value="SemiFinished" <?= @$item_manufacturing_type == 'SemiFinished' ? 'selected' : '' ?>>Semi-Finished</option>
                <option value="Other" <?= @$item_manufacturing_type == 'Other' ? 'selected' : '' ?>>Other</option>
            </select>
            <span class="error-message" id="error-item_manufacturing_type"></span>
        </div>
        <h5>Specifications</h5>
        <div class="mb-3 col-md-4">
            <label for="item_drawing_no" class="form-label">Drawing No</label>
            <input type="text" class="form-control" id="item_drawing_no" name="item_drawing_no" value="<?= @$item_drawing_no ?>" placeholder="Drawing No">
            <span class="error-message" id="error-item_drawing_no"></span>
        </div>
        <div class="mb-3 col-md-4">
            <label for="item_min_order_qty" class="form-label">Minimum Order Quantity</label>
            <input type="number" class="form-control" id="item_min_order_qty" name="item_min_order_qty" value="<?= @$item_min_order_qty ?>" placeholder="Min Order Quantity">
            <span class="error-message" id="error-item_min_order_qty"></span>
        </div>
        <div class="mb-3 col-md-4">
            <label for="item_min_order_pack_qty" class="form-label">Minimum Order Pack Quantity</label>
            <input type="number" class="form-control" id="item_min_order_pack_qty" name="item_min_order_pack_qty" value="<?= @$item_min_order_pack_qty ?>" placeholder="Min Order Pack Quantity">
            <span class="error-message" id="error-item_min_order_pack_qty"></span>
        </div>

        <div class="mb-3 col-md-3">
            <label for="item_length_cms" class="form-label">Length (cms)</label>
            <input type="number" class="form-control" id="item_length_cms" name="item_length_cms" value="<?= @$item_length_cms ?>" placeholder="Length in cm">
            <span class="error-message" id="error-item_length_cms"></span>
        </div>
        <div class="mb-3 col-md-3">
            <label for="item_height_cms" class="form-label">Height (cms)</label>
            <input type="number" class="form-control" id="item_height_cms" name="item_height_cms" value="<?= @$item_height_cms ?>" placeholder="Height in cm">
            <span class="error-message" id="error-item_height_cms"></span>
        </div>
        <div class="mb-3 col-md-3">
            <label for="item_width_cms" class="form-label">Width (cms)</label>
            <input type="number" class="form-control" id="item_width_cms" name="item_width_cms" value="<?= @$item_width_cms ?>" placeholder="Width in cm">
            <span class="error-message" id="error-item_width_cms"></span>
        </div>
        <div class="mb-3 col-md-3">
            <label for="item_weight_kg" class="form-label">Weight (kg)</label>
            <input type="number" class="form-control" id="item_weight_kg" name="item_weight_kg" value="<?= @$item_weight_kg ?>" placeholder="Weight (kg)">
            <span class="error-message" id="error-item_weight_kg"></span>
        </div>
        <div class="mb-3 col-md-12">
            <label for="item_remark" class="form-label">Remark</label>
            <textarea type="text" class="form-control" id="item_remark" name="item_remark" placeholder="Item Remark"><?= @$item_remark ?></textarea>
            <span class="error-message" id="error-item_remark"></span>
        </div>
        <div class="mb-3 col-md-12">
            <label for="item_quality_check_link" class="form-label">Item Quality Check Link</label>
            <input type="text" class="form-control" id="item_quality_check_link" name="item_quality_check_link" placeholder="Item Quality Check Link" value="<?= @$item_quality_check_link ?>">
            <span class="error-message" id="error-item_quality_check_link"></span>
        </div>
        <h5>Packaging Details</h5>
        <div class="mb-3 col-md-4">
            <label for="item_uqc_id" class="form-label">Base Unit</label>
            <select class="form-control" id="item_uqc_id" name="item_uqc_id">
                <option value="">Select Base Unit</option>
                <!-- Options will be dynamically populated -->
            </select>
            <span class="error-message" id="error-item_uqc_id"></span>
        </div>
        <div class="mb-3 col-md-4">
            <label for="item_pack_uqc_id" class="form-label">Pack Unit</label>
            <select class="form-control" id="item_pack_uqc_id" name="item_pack_uqc_id">
                <option value="">Select Pack Unit</option>
                <!-- Options will be dynamically populated -->
            </select>
            <span class="error-message" id="error-item_pack_uqc_id"></span>
        </div>
        <div class="mb-3 col-md-4">
            <label for="item_pack_uqc_id" class="form-label">Pack Unit</label>
            <select class="form-control" id="item_pack_uqc_id" name="item_pack_uqc_id">
                <option value="">Select Pack Unit</option>
                <!-- Options will be dynamically populated -->
            </select>
            <span class="error-message" id="error-item_pack_uqc_id"></span>
        </div>
        <div class="mb-3 col-md-4">
            <label for="item_pack_conversion" class="form-label">Base Units per Pack</label>
            <input type="number" class="form-control" id="item_pack_conversion" name="item_pack_conversion" value="<?= @$item_pack_conversion ?>" placeholder="Conversion">
            <span class="error-message" id="error-item_pack_conversion"></span>
        </div>
        <!-- Item Box Image -->
        <h5>Images</h5>
        <div class="mb-3 col-md-6">
            <label class="mb-2 form-label" for="item_box_image">Item Box Image</label>
            <input type="hidden" name="item_box_image" id="item_box_image" value="<?= @$item_box_image ?>">
            <div class="d-flex align-items-center">
                <img class="image-fluid" style="height:auto; width:100px" id="item_box_image_display" onclick="enlargeImage(event)" src="<?= (isset($item_box_image) && !empty($item_box_image)) ? base_url($item_box_image) : "" ?>">
                <?php if (isset($item_box_image) && !empty($item_box_image)) : ?>
                    <button type="button" class="btn btn-danger ms-2" onclick="deleteImage('item_box_image', 'item_box_image_display')"><i class="bx bx-trash-alt"></i></button>
                <?php endif; ?>
            </div>
            <input type="file" name="item_box_image_upload" id="item_box_image_upload" class="form-control mt-2" onchange="uploadImage('item_box_image_upload','user','item_box_image','item_box_image_display')">
            <span class="error-message" id="error-item_box_image"></span>
        </div>
        <!-- Item Image -->
        <div class="mb-3 col-md-6">
            <label class="mb-2 form-label" for="item_image">Item Image</label>
            <input type="hidden" name="item_image" id="item_image" value="<?= @$item_image ?>">
            <div class="d-flex align-items-center">
                <img class="image-fluid" style="height:auto; width:100px" id="item_image_display" onclick="enlargeImage(event)" src="<?= (isset($item_image) && !empty($item_image)) ? base_url($item_image) : "" ?>">
                <?php if (isset($item_image) && !empty($item_image)) : ?>
                    <button type="button" class="btn btn-danger ms-2" onclick="deleteImage('item_image', 'item_image_display')"><i class="bx bx-trash-alt"></i></button>
                <?php endif; ?>
            </div>
            <input type="file" name="item_image_upload" id="item_image_upload" class="form-control mt-2" onchange="uploadImage('item_image_upload','user','item_image','item_image_display')">
            <span class="error-message" id="error-item_image"></span>
        </div>
        <!-- Add other fields similarly -->
        <h5>Additional Options</h5>
        <div class="mb-3 col-md-3">
            <input type="hidden" name="item_inspection_required" value="0">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="item_inspection_required" id="item_inspection_required" <?= (isset($item_inspection_required) && $item_inspection_required == 1) ? "checked" : "" ?> value="1">
            </div>
            <label class="form-label">Inspection Required</label>
            <span class="error-message" id="error-item_inspection_required"></span>
        </div>
        <div class="mb-3 col-md-3">
            <input type="hidden" name="item_is_spare_part" value="0">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="item_is_spare_part" id="item_is_spare_part" <?= (isset($item_is_spare_part) && $item_is_spare_part == 1) ? "checked" : "" ?> value="1">
            </div>
            <label class="form-label">Is Spare Part</label>
            <span class="error-message" id="error-item_is_spare_part"></span>
        </div>
        <div class="mb-3 col-md-3">
            <input type="hidden" name="item_is_expire" value="0">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="item_is_expire" id="item_is_expire" <?= (isset($item_is_expire) && $item_is_expire == 1) ? "checked" : "" ?> value="1">
            </div>
            <label class="form-label">Is Expirable Item</label>
            <span class="error-message" id="error-item_is_expire"></span>
        </div>
        <div class="mb-3 col-md-3">
            <input type="hidden" name="item_is_active" value="0">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="item_is_active" id="item_is_active" <?= (isset($item_is_active) && $item_is_active == 1) ? "checked" : "" ?> value="1">
            </div>
            <label class="form-label">Is Active</label>
            <span class="error-message" id="error-item_is_active"></span>
        </div>

        <!-- Submit Button -->
        <div class="form_submit_div text-center mt-4">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>