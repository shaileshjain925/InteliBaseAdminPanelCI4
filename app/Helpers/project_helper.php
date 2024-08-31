
<?php

use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;

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
        if (strpos($key, $prefix) === 0) {
            return true;
        }
    }

    return false;
}
function check_module_access(string $module_code): bool
{
    if ($_SESSION['user_type'] == 'super_admin') {
        return true;
    }
    $modules = isset($_SESSION['_access_rights']['modules']) ? $_SESSION['_access_rights']['modules'] : null;
    if (empty($modules)) {
        return false;
    } else {
        $module_codes = array_column($modules, 'module_code') ?? [];
        return in_array($module_code, $module_codes);
    }
}
function check_dashboard_access($module_code = null)
{

    if ($_SESSION['user_type'] == 'super_admin' || $_SESSION['user_type'] == 'admin') {
        return ($module_code != 'starter') ? true : false;
    }
    $modules = isset($_SESSION['_access_rights']['modules']) ? $_SESSION['_access_rights']['modules'] : null;
    if (empty($modules)) {
        return ($module_code == 'starter') ? true : false;
    } else {
        foreach ($modules as $key => $module) {
            if ($module_code == $module['module_code'] && $module['dashboard'] == 1) {
                return true;
            }
        }
        return ($module_code == 'starter') ? true : false;
    }
}

function check_menu_access(string $menu_code, $access_type): bool
{
    if ($_SESSION['user_type'] == 'super_admin') {
        return true;
    } else {

        $module_menus = isset($_SESSION['_access_rights']['module_menus']) ? $_SESSION['_access_rights']['module_menus'] : [];
        if (empty($module_menus)) {
            return false;
        } else {
            foreach ($module_menus as $key => $menus) {
                if ($menu_code == $menus['menu_code'] && isset($menus[$access_type]) && $menus[$access_type] == 1) {
                    return true;
                }
            }
            return false;
        }
    }
}

function back_date_view_access(string $menu_code, $date_required = false): string|int|null
{
    if ($_SESSION['user_type'] == 'super_admin') {
        return null;
    }
    return null;
}
function back_date_edit_access(string $menu_code, $date_required = false): string|int|null
{
    if ($_SESSION['user_type'] == 'super_admin') {
        return null;
    }
    return null;
}
function getUserIds(bool $encode_json = false): string|array|null
{
    if ($encode_json) {
        return json_encode($_SESSION['_access_rights']['user_ids'] ?? []);
    } else {
        return $_SESSION['_access_rights']['user_ids'];
    }
}
function get_user_data_access(string $access_type, $encode_json = false): array|string|null
{
    if ($encode_json) {
        return json_encode($_SESSION['_access_rights'][$access_type] ?? []);
    } else {
        return $_SESSION['_access_rights'][$access_type];
    }
}
