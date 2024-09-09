<h5>User: <Strong><?= $user_name ?></Strong></h5>
<form id="user_access_data_from" method="post" action="<?= base_url(route_to('user_data_access_create_api')) ?>">
    <input type="hidden" name="user_id" id="user_id" value="<?= @$user_id ?>" />
    <div class="row">
        <div class="col">
            <label for="groups" class="">User Groups Access</label>
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
    <?php if (isset($groups) && !empty($groups)): ?>
        var selected_groups = JSON.parse('<?= json_encode($groups) ?>');
    <?php else: ?>
        var selected_groups = null;
    <?php endif; ?>
   

    $(document).ready(function() {
        var groups_api_parameter = {
            "_autojoin": "Y",
            "_select": "*,CONCAT(group.group_name,' (',item_group.item_group_name,')') as group_name_with_item_group"
        };
        initializeSelectize('groups', {
                placeholder: "Select Groups"
            }, "<?= base_url(route_to('group_list_api')) ?>", groups_api_parameter, "group_id", "group_name_with_item_group",
            selected_groups, 'item_group_name')

       
    });
</script>