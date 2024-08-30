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
    <div class="row">
        <div class="col">
            <label for="users" class="">User States Access</label>
            <select name="states[]" id="states" multiple></select>
        </div>
    </div>

    <div class="form_submit_div text-center mt-4">
        <button type="button" class="submit_btn waves-effect waves-light me-1" onclick="submitFormWithAjax('user_access_data_from',true,true,successCallback,errorCallback)">
            Save
        </button>
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
    <?php if (isset($states) && !empty($states)): ?>
        var selected_states = JSON.parse('<?= json_encode($states) ?>');
    <?php else: ?>
        var selected_states = null;
    <?php endif; ?>

    $(document).ready(function() {
        var groups_api_parameter = {
            "_autojoin": "Y",
            "_select": "*,CONCAT(group.group_name,' (',group_type.group_type_name,')') as group_name_with_group_type"
        };
        initializeSelectize('groups', {
                placeholder: "Select Groups"
            }, "<?= base_url(route_to('group_list_api')) ?>", groups_api_parameter, "group_id", "group_name_with_group_type",
            selected_groups, 'group_type_name')

        var states_api_parameter = {
            "_autojoin": "Y",
            "_select": "*,CONCAT(states.state_name,' (',countries.country_name,')') as state_name_with_country"
        };
        initializeSelectize('states', {
                placeholder: "Select states"
            }, "<?= base_url(route_to('state_list_api')) ?>", states_api_parameter, "state_id", "state_name_with_country",
            selected_states, 'country_name')
    });
</script>