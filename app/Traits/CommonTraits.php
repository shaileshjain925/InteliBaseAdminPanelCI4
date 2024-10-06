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
use App\Models\UserDataAccessModel;
use App\Models\BusinessTypeModel;
use App\Models\DeliveryTermsModel;
use App\Models\ItemBrandsModel;
use App\Models\ItemCategoriesModel;
use App\Models\ItemGroupsModel;
use App\Models\ItemHsnModel;
use App\Models\ItemModel;
use App\Models\ItemSubGroupsModel;
use App\Models\ItemUqcModel;
use App\Models\PartyAddressModel;
use App\Models\PartyModel;
use App\Models\PaymentTermsModel;
use App\Models\PartyContactModel;
use App\Models\PartyRatingCreditModel;
use App\Models\PartyRatingValueModel;

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
    /**
     * Return Model Instance
     * @return ItemBrandsModel
     */
    public static function get_item_brand_model(...$variable)
    {
        return new ItemBrandsModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return ItemGroupsModel
     */
    public static function get_item_group_model(...$variable)
    {
        return new ItemGroupsModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return ItemSubGroupsModel
     */
    public static function get_item_sub_group_model(...$variable)
    {
        return new ItemSubGroupsModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return UserDataAccessModel
     */
    public static function get_user_data_access_model(...$variable)
    {
        return new UserDataAccessModel(...$variable);
    }

    /**
     * Return Model Instance
     * @return ItemCategoriesModel
     */
    public static function get_item_category_model(...$variable)
    {
        return new ItemCategoriesModel(...$variable);
    }

    /**
     * Return Model Instance
     * @return BusinessTypeModel
     */
    public static function get_business_types_model(...$variable)
    {
        return new BusinessTypeModel(...$variable);
    }

    /**
     * Return Model Instance
     * @return ItemHsnModel
     */
    public static function get_item_hsn_model(...$variable)
    {
        return new ItemHsnModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return ItemUqcModel
     */
    public static function get_item_uqc_model(...$variable)
    {
        return new ItemUqcModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return ItemModel
     */
    public static function get_item_model(...$variable)
    {
        return new ItemModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return PaymentTermsModel
     */
    public static function get_payment_terms_model(...$variable)
    {
        return new PaymentTermsModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return DeliveryTermsModel
     */
    public static function get_delivery_terms_model(...$variable)
    {
        return new DeliveryTermsModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return PartyModel
     */
    public static function get_party_model(...$variable)
    {
        return new PartyModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return PartyAddressModel
     */
    public static function get_party_address_model(...$variable)
    {
        return new PartyAddressModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return PartyContactModel
     */
    public static function get_party_contact_model(...$variable)
    {
        return new PartyContactModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return PartyRatingCreditModel
     */
    public static function get_party_rating_credit_model(...$variable)
    {
        return new PartyRatingCreditModel(...$variable);
    }
    /**
     * Return Model Instance
     * @return PartyRatingValueModel
     */
    public static function get_party_rating_value_model(...$variable)
    {
        return new PartyRatingValueModel(...$variable);
    }
}
