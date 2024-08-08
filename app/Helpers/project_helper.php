
<?php
enum UserType: string
{
    case SuperAdmin = 'super_admin';
    case Admin = 'admin';
    case SalesManager = 'sales_manager';
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
