<h5>User: <Strong><?= $user_name ?></Strong></h5>
<form id="user_access_data_from" method="post" action="<?= base_url(route_to('user_data_access_create_api')) ?>">
    <input type="hidden" name="user_id" id="user_id" value="<?= @$user_id ?>" />
    <div class="row">
        <div class="col">
            <label for="groups" class="">Item Sub Groups Access</label>
            <select name="groups[]" id="groups" multiple></select>

            <span class="error-message" id="error-user_data_access_type"></span>

        </div>
    </div>
</form>
<script>
    function successCallback(response) {
        console.log(response);
        if (response.status == 201 || response.status == 200) {
            setTimeout(() => {
                window.location.href = "<?= base_url(route_to('staff_list_page')) ?>";
            }, 2000);
        }
    }

    function errorCallback(response) {
        console.log(response);
    }
    <?php if (isset($item_sub_groups) && !empty($item_sub_groups)): ?>
        var selected_item_sub_groups = JSON.parse('<?= json_encode($item_sub_groups) ?>');
    <?php else: ?>
        var selected_item_sub_groups = null;
    <?php endif; ?>


    $(document).ready(function() {
        var groups_api_parameter = {
            "_autojoin": "Y",
            "_select": "*,CONCAT(item_sub_groups.item_sub_group_name,' (',item_groups.item_group_name,')') as sub_group_name_with_group"
        };
        initializeSelectize('groups', {
                placeholder: "Select Sub Groups"
            }, "<?= base_url(route_to('item_sub_group_list_api')) ?>", groups_api_parameter, "item_sub_group_id", "sub_group_name_with_group",
            selected_item_sub_groups, 'item_group_name')
    });
</script>