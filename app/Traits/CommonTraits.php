<?php

namespace App\Traits;

use App\Models\CitiesModel;
use App\Models\CountriesModel;
use App\Models\DesignationsModel;
use App\Models\FunctionModel;
use App\Models\StatesModel;
use App\Models\UsersModel;
use App\Models\ModuleMenusModel;
use App\Models\ModulesModel;
use App\Models\RoleModuleMenusModel;
use App\Models\RoleModulesModel;
use App\Models\RolesModel;
use App\Models\LogsModel;
trait CommonTraits
{
    /**
     * Return Model Instance
     * @return FunctionModel
     */
    public static function get_function_model()
    {
        return new FunctionModel();
    }
    /**
     * Return Model Instance
     * @return CountriesModel
     */
    public static function get_countries_model(...$variable)
    {
        return new CountriesModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return StatesModel
     */
    public static function get_states_model(...$variable)
    {
        return new StatesModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return CitiesModel
     */
    public static function get_cities_model(...$variable)
    {
        return new CitiesModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return DesignationsModel
     */
    public static function get_designations_model(...$variable)
    {
        return new DesignationsModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return UsersModel
     */
    public static function get_users_model(...$variable)
    {
        return new UsersModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return ModuleMenusModel
     */
    public static function get_module_menus_model(...$variable)
    {
        return new ModuleMenusModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return ModulesModel
     */
    public static function get_modules_model(...$variable)
    {
        return new ModulesModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return RoleModuleMenusModel
     */
    public static function get_role_module_menus_model(...$variable)
    {
        return new RoleModuleMenusModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return RoleModulesModel
     */
    public static function get_role_modules_model(...$variable)
    {
        return new RoleModulesModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return RolesModel
     */
    public static function get_roles_model(...$variable)
    {
        return new RolesModel(...$variable);
    }
     /**
     * Return Model Instance
     * @return LogsModel
     */
    public static function get_logs_model(...$variable)
    {
        return new LogsModel(...$variable);
    }
}
