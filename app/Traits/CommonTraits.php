<?php

namespace App\Traits;

use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\IlluminationModel;
use App\Models\LocationModel;
use App\Models\LocationTypeModel;
use App\Models\MediaModel;
use App\Models\MediaTypeModel;
use App\Models\OutdorWebsiteProfileModel;
use App\Models\SalesTransactionModel;
use App\Models\SalesItemTransactionModel;
use App\Models\UserModel;
use App\Models\VoucharTermsAndConditionModel;
use App\Models\SubscribersListModel;
use App\Models\ClientModel;
use App\Models\LeadModel;
use App\Models\PartyModel;
use App\Models\VendorModel;
use App\Models\PaymentTransactionModel;
use App\Models\BlogPostModel;




trait CommonTraits
{
    /**
     * Return Model Instance
     * @return CityModel
     */
    public function get_city_model()
    {
        return new CityModel();
    }
    /**
     * Return Model Instance
     * @return CountryModel
     */
    public function get_country_model()
    {
        return new CountryModel();
    }
    /**
     * Return Model Instance
     * @return IlluminationModel
     */
    public function get_illumination_model()
    {
        return new IlluminationModel();
    }
    /**
     * Return Model Instance
     * @return LocationModel
     */
    public function get_location_model()
    {
        return new LocationModel();
    }
    /**
     * Return Model Instance
     * @return LocationTypeModel
     */
    public function get_location_type_model()
    {
        return new LocationTypeModel();
    }
    /**
     * Return Model Instance
     * @return MediaModel
     */
    public function get_media_model()
    {
        return new MediaModel();
    }
    /**
     * Return Model Instance
     * @return MediaTypeModel
     */
    public function get_media_type_model()
    {
        return new MediaTypeModel();
    }
    /**
     * Return Model Instance
     * @return OutdorWebsiteProfileModel
     */
    public function get_outdor_website_profile_model()
    {
        return new OutdorWebsiteProfileModel();
    }
    /**
     * Return Model Instance
     * @return PartyModel
     */
    public function get_party_model()
    {
        return new PartyModel();
    }
    /**
     * Return Model Instance
     * @return SalesItemTransactionModel
     */
    public function get_sales_item_transaction_model()
    {
        return new SalesItemTransactionModel();
    }
    /**
     * Return Model Instance
     * @return SalesTransactionModel
     */
    public function get_sales_transaction_model()
    {
        return new SalesTransactionModel();
    }
    /**
     * Return Model Instance
     * @return StateModel
     */
    public function get_state_model()
    {
        return new StateModel();
    }
    /**
     * Return Model Instance
     * @return UserModel
     */
    public function get_user_model()
    {
        return new UserModel();
    }
   
    /**
     * Return Model Instance
     * @return VoucharTermsAndConditionModel
     */
    public function get_vouchar_terms_and_condition_model()
    {
        return new VoucharTermsAndConditionModel();
    }

    /**
     * Return Model Instance
     * @return ClientModel
     */
    public function get_client_model()
    {
        return new ClientModel();
    }

    /**
     * Return Model Instance
     * @return LeadModel
     */
    public function get_lead_model()
    {
        return new LeadModel();
    }

    /**
     * Return Model Instance
     * @return VendorModel
     */
    public function get_vendor_model()
    {
        return new VendorModel();
    }
    /**
     * Return Model Instance
     * @return PaymentTransactionModel
     */
    public function get_payment_transaction_model()
    {
        return new PaymentTransactionModel();
    }

    /**
     * Return Model Instance
     * @return SubscribersListModel
     */
    public function get_subscribers_list_model()
    {
        return new SubscribersListModel();
    }
   /**
     * Return Model Instance
     * @return BlogPostModel
     */
    public function get_blog_post_model()
    {
        return new BlogPostModel();

    }
}
