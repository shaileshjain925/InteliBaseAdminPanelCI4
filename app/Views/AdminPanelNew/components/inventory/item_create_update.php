<!-- Item Form -->
<form id="item-form" method="post" enctype="multipart/form-data" action="<?= isset($item_id) ? base_url(route_to('item_update_api')) : base_url(route_to('item_create_api')) ?>">

    <!-- Hidden Item ID (for updates) -->
    <input type="hidden" name="item_id" value="<?= @$item_id ?>">

    <div class="row">
        <!-- Item Brand -->
        <div class="mb-3 col-md-6">
            <label for="item_brand_id" class="form-label">Item Brand</label>
            <select class="form-control" id="item_brand_id" name="item_brand_id">
                <option value="">Select Item Brand</option>
                <!-- Options will be dynamically populated -->
            </select>
            <span class="error-message" id="error-item_brand_id"></span>
        </div>

        <!-- Item Category -->
        <div class="mb-3 col-md-6">
            <label for="item_category_id" class="form-label">Item Category</label>
            <select class="form-control" id="item_category_id" name="item_category_id">
                <option value="">Select Item Category</option>
                <!-- Options will be dynamically populated -->
            </select>
            <span class="error-message" id="error-item_category_id"></span>
        </div>

        <!-- Item Sub Group -->
        <div class="mb-3 col-md-6">
            <label for="item_sub_group_id" class="form-label">Item Sub Group</label>
            <select class="form-control" id="item_sub_group_id" name="item_sub_group_id">
                <option value="">Select Item Sub Group</option>
                <!-- Options will be dynamically populated -->
            </select>
            <span class="error-message" id="error-item_sub_group_id"></span>
        </div>

        <!-- Item HSN -->
        <div class="mb-3 col-md-6">
            <label for="item_hsn_id" class="form-label">Item HSN</label>
            <select class="form-control" id="item_hsn_id" name="item_hsn_id">
                <option value="">Select HSN Code</option>
                <!-- Options will be dynamically populated -->
            </select>
            <span class="error-message" id="error-item_hsn_id"></span>
        </div>

        <!-- Item Class -->
        <div class="mb-3 col-md-6">
            <label for="item_class" class="form-label">Item Class</label>
            <select class="form-control" id="item_class" name="item_class">
                <option value="listed" <?= @$item_class == 'listed' ? 'selected' : '' ?>>Listed</option>
                <option value="non-listed" <?= @$item_class == 'non-listed' ? 'selected' : '' ?>>Non-Listed</option>
                <option value="not-assign" <?= @$item_class == 'not-assign' ? 'selected' : '' ?>>Not Assign</option>
            </select>
            <span class="error-message" id="error-item_class"></span>
        </div>

        <!-- Item Code -->
        <div class="mb-3 col-md-6">
            <label for="item_code" class="form-label">Item Code</label>
            <input type="text" class="form-control" id="item_code" name="item_code" value="<?= @$item_code ?>" placeholder="Item Code">
            <span class="error-message" id="error-item_code"></span>
        </div>

        <!-- Item Name -->
        <div class="mb-3 col-md-6">
            <label for="item_name" class="form-label">Item Name</label>
            <input type="text" class="form-control" id="item_name" name="item_name" value="<?= @$item_name ?>" placeholder="Item Name">
            <span class="error-message" id="error-item_name"></span>
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

        <!-- Item Nature -->
        <div class="mb-3 col-md-6">
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
        <div class="mb-3 col-md-6">
            <label for="item_manufacturing_type" class="form-label">Item Manufacturing Type</label>
            <select class="form-control" id="item_manufacturing_type" name="item_manufacturing_type">
                <option value="FinishedProduct" <?= @$item_manufacturing_type == 'FinishedProduct' ? 'selected' : '' ?>>Finished Product</option>
                <option value="RawMaterial" <?= @$item_manufacturing_type == 'RawMaterial' ? 'selected' : '' ?>>Raw Material</option>
                <option value="SemiFinished" <?= @$item_manufacturing_type == 'SemiFinished' ? 'selected' : '' ?>>Semi-Finished</option>
                <option value="Other" <?= @$item_manufacturing_type == 'Other' ? 'selected' : '' ?>>Other</option>
            </select>
            <span class="error-message" id="error-item_manufacturing_type"></span>
        </div>

        <!-- Additional Fields (Optional) -->
        <div class="mb-3 col-md-6">
            <label for="item_min_order_qty" class="form-label">Minimum Order Quantity</label>
            <input type="number" class="form-control" id="item_min_order_qty" name="item_min_order_qty" value="<?= @$item_min_order_qty ?>" placeholder="Min Order Quantity">
        </div>
        <div class="mb-3 col-md-6">
            <label for="item_length_cms" class="form-label">Length (cms)</label>
            <input type="number" class="form-control" id="item_length_cms" name="item_length_cms" value="<?= @$item_length_cms ?>" placeholder="Length in cm">
        </div>
        <!-- Add other fields similarly -->

        <!-- Submit Button -->
        <div class="form_submit_div text-center mt-4">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>