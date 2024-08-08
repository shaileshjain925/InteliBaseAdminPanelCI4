<?php

namespace App\Traits;

use App\Models\CityModel;
use App\Models\CountryModel;
use App\Models\DesignationModel;
use App\Models\FunctionModel;
use App\Models\StateModel;
use App\Models\UserModel;

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
     * @return CountryModel
     */
    public static function get_country_model(...$variable)
    {
        return new CountryModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return StateModel
     */
    public static function get_state_model(...$variable)
    {
        return new StateModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return CityModel
     */
    public static function get_city_model(...$variable)
    {
        return new CityModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return DesignationModel
     */
    public static function get_designation_model(...$variable)
    {
        return new DesignationModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return UserModel
     */
    public static function get_user_model(...$variable)
    {
        return new UserModel(...$variable);
    }
}
