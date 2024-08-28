
<?php
enum UserType: string
{
    case SuperAdmin = 'super_admin';
    case Admin = 'admin';
    case SalesManager = 'staff';
    case SalesExecutive = 'sales_executive';
    case Purchase = 'purchase';
    case Finance = 'finance';
    case CRM = 'crm';
}

function checkUserType($user_type = null): bool
{
    if (!empty($user_type)) {
        $result = (isset($_SESSION['user_type']) && $_SESSION['user_type'] == $user_type) ? true : false;
    } else {
        $result =  (isset($_SESSION['user_type']) && !empty($_SESSION['user_type'])) ? true : false;
    }
    return $result;
}
function getUserType(): string|null
{
    $result = (isset($_SESSION['user_type']) && !empty($_SESSION['user_type'])) ? $_SESSION['user_type'] : null;
    return $result;
}
function UserTypeInList($user_type_array)
{
    return in_array(getUserType(), $user_type_array);
}
function CreateUpdateAlias($variable)
{
    return (empty($variable)) ? "Create" : "Update";
}
function module_menu_type_access($access_modules, $module_id, $prefix): bool
{
    $access_data = [];
    foreach ($access_modules as $key => $module) {
        if ($module['module_id'] == $module_id) {
            $access_data = $module;
            break;
        }
    }
    foreach ($access_data as $key => $value) {
        if(strpos($key, $prefix) === 0){
            return true;
        }
    }

    return false;
}
