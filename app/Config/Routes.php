<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;
use MenuActionType as MAT;
// Load custom helpers
helper("commonfunction_helper");
helper('array');

// Retrieve PHP_SELF
$php_self = $_SERVER['PHP_SELF'];

// Define allowed file extensions
$extensions = ['js', 'css', 'img', 'map', 'jpg', 'jpeg', 'png', 'gif', 'webp', 'woff', 'woff2', 'ttf', 'otf', 'mp4', 'webm', 'ogg', 'mp3', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'txt'];

// Extract file extension using pathinfo
$file_extension = pathinfo($php_self, PATHINFO_EXTENSION);
function encodeArray($array)
{
    $serializedArray = serialize($array);
    return urlencode($serializedArray);
}

// Ensure this part is outside the CodeIgniter routing definitions
if (!in_array($file_extension, $extensions)) {
    // Admin Page Controller Start -----------------------------------------------------------------------------
    $routes->get('/', 'AdminPageController::login_page', ['as' => 'login_page']);
    $routes->get('logout', 'AdminPageController::logout', ['as' => 'logout']);
    $routes->get('setSession/(:any)', 'AdminPageController::setSession/$1', ['as' => 'setSession']);

    $routes->group('Admin', function ($routes) {
        $routes->get('', 'AdminPageController::default_dashboard', ['as' => 'default_dashboard']);
        $routes->group('Dashboard', function ($routes) {
            $routes->get('Admin', 'AdminPageController::admin_dashboard_page', ['as' => 'admin_dashboard_page']);
            $routes->get('Dummy', 'AdminPageController::dummy_dashboard', ['as' => 'dummy_dashboard']);
        });
        $routes->group('Dummy', function ($routes) {
            $routes->get('List', 'AdminPageController::dummy_list_page', ['as' => 'dummy_list_page']);
            $routes->get('CreateUpdate', 'AdminPageController::dummy_create_update_page', ['as' => 'dummy_create_update_page']);
            $routes->post('View', 'AdminPageController::dummy_view_component', ['as' => 'dummy_view_component']);
        });
        $routes->group('OneTimeSetting', function ($routes) {
            $routes->group('MediaType', function ($routes) {
                $routes->get('List', 'AdminPageController::media_type_list_page', ['as' => 'media_type_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::media_type_create_update_page', ['as' => 'media_type_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::media_type_create_update_page/$1');
                $routes->post('View', 'AdminPageController::media_type_view_component', ['as' => 'media_type_view_component']);
            });
            $routes->group('Location', function ($routes) {
                $routes->get('List', 'AdminPageController::location_list_page', ['as' => 'location_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::location_create_update_page', ['as' => 'location_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::location_create_update_page/$1');
                $routes->post('View', 'AdminPageController::location_view_component', ['as' => 'location_view_component']);
            });
            $routes->group('Illumanation', function ($routes) {
                $routes->get('List', 'AdminPageController::illumination_list_page', ['as' => 'illumination_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::illumination_create_update_page', ['as' => 'illumination_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::illumination_create_update_page/$1');
            });

            $routes->group('Terms_Conditions', function ($routes) {
                $routes->get('List', 'AdminPageController::terms_list_page', ['as' => 'terms_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::terms_create_update_page', ['as' => 'terms_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::terms_create_update_page/$1');
            });
        });
        $routes->group('StaffManagement', function ($routes) {
            $routes->post('View', 'AdminPageController::staff_view_component', ['as' => 'staff_view_component']);
            $routes->group('Admin', function ($routes) {
                $routes->get('CreateUpdate', 'AdminPageController::admin_create_update_page', ['as' => 'admin_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::admin_create_update_page/$1');
                $routes->get('List', 'AdminPageController::admin_list_page', ['as' => 'admin_list_page']);
            });
            $routes->group('Manager', function ($routes) {
                $routes->get('CreateUpdate', 'AdminPageController::manager_create_update_page', ['as' => 'manager_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::manager_create_update_page/$1');
                $routes->get('List', 'AdminPageController::manager_list_page', ['as' => 'manager_list_page']);
            });
            $routes->group('SalesExecutive', function ($routes) {
                $routes->get('CreateUpdate', 'AdminPageController::sales_executive_create_update_page', ['as' => 'sales_executive_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::sales_executive_create_update_page/$1');
                $routes->get('List', 'AdminPageController::sales_executive_list_page', ['as' => 'sales_executive_list_page']);
            });
            $routes->group('SiteEngineer', function ($routes) {
                $routes->get('CreateUpdate', 'AdminPageController::site_engineer_create_update_page', ['as' => 'site_engineer_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::site_engineer_create_update_page/$1');
                $routes->get('List', 'AdminPageController::site_engineer_list_page', ['as' => 'site_engineer_list_page']);
            });
        });
        $routes->group('SalesExecutive', function ($routes) {
            $routes->get('List', 'AdminPageController::sales_executive_list_page', ['as' => 'sales_executive_list_page']);
            $routes->get('AssignLeadsList', 'AdminPageController::assign_lead_list_page', ['as' => 'assign_lead_list_page']);
            $routes->get('WorkList', 'AdminPageController::for_sales_excecutive_list_page', ['as' => 'for_sales_excecutive_list_page']);
            $routes->get('WinLeadsList', 'AdminPageController::win_leads_list_page', ['as' => 'win_leads_list_page']);
            $routes->get('LostLeadsList', 'AdminPageController::lost_leads_list_page', ['as' => 'lost_leads_list_page']);
        });
        // site engineer
        $routes->group('SiteEngineer', function ($routes) {
            $routes->get('List', 'AdminPageController::site_engineer_list_page', ['as' => 'site_engineer_list_page']);
            $routes->get('AssignSiteList', 'AdminPageController::assign_site_list_page', ['as' => 'assign_site_list_page']);
            $routes->get('UnassignSiteList', 'AdminPageController::unassigned_site_list_page', ['as' => 'unassigned_site_list_page']);
            $routes->get('WorkList', 'AdminPageController::for_site_engineer_list_page', ['as' => 'for_site_engineer_list_page']);
            $routes->get('CompletedSiteList', 'AdminPageController::complete_site_list_page', ['as' => 'complete_site_list_page']);
            $routes->get('PendingSiteList', 'AdminPageController::Pending_site_list_page', ['as' => 'Pending_site_list_page']);
        });

        $routes->group('Lead', function ($routes) {
            $routes->get('Dashboard', 'AdminPageController::lead_dashboard', ['as' => 'lead_dashboard']);
            $routes->get('List', 'AdminPageController::lead_list_page', ['as' => 'lead_list_page']);
            $routes->get('CreateUpdate', 'AdminPageController::lead_create_update_page', ['as' => 'lead_create_update_page']);
            $routes->get('CreateUpdate/(:num)', 'AdminPageController::lead_create_update_page/$1');
            $routes->post('View', 'AdminPageController::lead_view_component', ['as' => 'lead_view_component']);
        });
        $routes->group('Client', function ($routes) {
            $routes->get('Dashboard', 'AdminPageController::client_dashboard', ['as' => 'client_dashboard']);
            $routes->get('List', 'AdminPageController::client_list_page', ['as' => 'client_list_page']);
            $routes->get('CreateUpdate', 'AdminPageController::client_create_update_page', ['as' => 'client_create_update_page']);
            $routes->get('CreateUpdate/(:num)', 'AdminPageController::client_create_update_page/$1');
            $routes->post('View', 'AdminPageController::client_view_component', ['as' => 'client_view_component']);
            $routes->get('QuotationList', 'AdminPageController::client_all_quotation_list_page', ['as' => 'client_all_quotation_list_page']);
            $routes->get('PaymentHistory', 'AdminPageController::client_payment_history_page', ['as' => 'client_payment_history_page']);
        });
        $routes->group('Vendor', function ($routes) {
            $routes->get('Dashboard', 'AdminPageController::vendor_dashboard', ['as' => 'vendor_dashboard']);
            $routes->get('List', 'AdminPageController::vendor_list_page', ['as' => 'vendor_list_page']);
            $routes->get('CreateUpdate', 'AdminPageController::vendor_create_update_page', ['as' => 'vendor_create_update_page']);
            $routes->get('CreateUpdate/(:num)', 'AdminPageController::vendor_create_update_page/$1');
            $routes->post('View', 'AdminPageController::vendor_view_component', ['as' => 'vendor_view_component']);
        });
        $routes->group('Inventory', function ($routes) {
            $routes->get('Dashboard', 'AdminPageController::inventory_dashboard', ['as' => 'inventory_dashboard']);
            $routes->get('List', 'AdminPageController::media_list_page', ['as' => 'media_list_page']);
            $routes->get('CreateUpdate', 'AdminPageController::media_create_update_page', ['as' => 'media_create_update_page']);
            $routes->get('CreateUpdate/(:num)', 'AdminPageController::media_create_update_page/$1');
            $routes->post('View', 'AdminPageController::media_view_component', ['as' => 'media_view_component']);
            $routes->get('PerformanceList', 'AdminPageController::asset_performance_list_page', ['as' => 'asset_performance_list_page']);
            $routes->get('PerformanceDetailList', 'AdminPageController::asset_performance_detail_list_page', ['as' => 'asset_performance_detail_list_page']);
            $routes->get('RealTimeMediaList', 'AdminPageController::real_time_media_list_page', ['as' => 'real_time_media_list_page']);
        });
        $routes->group('Campaign', function ($routes) {
            $routes->get('Dashboard', 'AdminPageController::campaign_dashboard', ['as' => 'campaign_dashboard']);
            $routes->get('List', 'AdminPageController::campaign_list_page', ['as' => 'campaign_list_page']);
            $routes->get('CreateUpdate', 'AdminPageController::campaign_create_update_page', ['as' => 'campaign_create_update_page']);
            $routes->post('View', 'AdminPageController::campaign_view_component', ['as' => 'campaign_view_component']);
            $routes->get('PaymentList', 'AdminPageController::campaign_payment_list_page', ['as' => 'campaign_payment_list_page']);
            $routes->get('Invoice', 'AdminPageController::campaign_invoice_page', ['as' => 'campaign_invoice_page']);
            $routes->get('PPT', 'AdminPageController::campaign_ppt_page', ['as' => 'campaign_ppt_page']);
        });
        $routes->group('Quotation', function ($routes) {
            $routes->get('List', 'AdminPageController::quotation_list_page', ['as' => 'quotation_list_page']);
            $routes->get('CreateUpdate', 'AdminPageController::quotation_create_update_page', ['as' => 'quotation_create_update_page']);
            $routes->get('View', 'AdminPageController::quotation_view_page', ['as' => 'quotation_view_page']);
            $routes->get('PPT', 'AdminPageController::quotation_ppt_page', ['as' => 'quotation_ppt_page']);
            $routes->get('Excel', 'AdminPageController::quotation_excel_page', ['as' => 'quotation_excel_page']);
        });
        $routes->group('SiteEngineer', function ($routes) {
            $routes->get('List', 'AdminPageController::site_engineer_list_page', ['as' => 'site_engineer_list_page']);
            $routes->get('CreateUpdate', 'AdminPageController::site_engineer_create_update_page', ['as' => 'site_engineer_create_update_page']);
            $routes->post('View', 'AdminPageController::site_engineer_view_component', ['as' => 'site_engineer_view_component']);
            $routes->get('Site', 'AdminPageController::for_site_engineer', ['as' => 'for_site_engineer']);
            $routes->get('SiteCompletePhoto', 'AdminPageController::site_complete_photo', ['as' => 'site_complete_photo']);
            $routes->get('AssignSite', 'AdminPageController::assign_site_page', ['as' => 'assign_site_page']);
            $routes->get('CompletePendingSite', 'AdminPageController::complete_pending_site_list_page', ['as' => 'complete_pending_site_list_page']);
            $routes->post('SiteView', 'AdminPageController::site_view_component', ['as' => 'site_view_component']);
        });
        $routes->group('Finance', function ($routes) {
            $routes->get('Dashboard', 'AdminPageController::finance_dashboard', ['as' => 'finance_dashboard']);
            $routes->get('TopProfitableMediaList', 'AdminPageController::top_profitable_media_list_page', ['as' => 'top_profitable_media_list_page']);
            $routes->get('CreateUpdate', 'AdminPageController::invoice_create_update_page', ['as' => 'invoice_create_update_page']);
            $routes->get('PaymentTrackingList', 'AdminPageController::payment_tracking_list_page', ['as' => 'payment_tracking_list_page']);
        });
        $routes->group('WebsiteSetup', function ($routes) {
            $routes->get('CompanyDetailCreateUpdate', 'AdminPageController::company_detail_create_update_page', ['as' => 'company_detail_create_update_page']);
            $routes->get('ContactInfoCreateUpdate', 'AdminPageController::contact_info_create_update_page', ['as' => 'contact_info_create_update_page']);
            $routes->get('EmailIntegrationCreateUpdate', 'AdminPageController::email_integration_create_update_page', ['as' => 'email_integration_create_update_page']);
            $routes->get('ModeOfPaymentCreateUpdate', 'AdminPageController::mode_of_payment_create_update_page', ['as' => 'mode_of_payment_create_update_page']);
            $routes->get('SocialMediaUrlCreateUpdate', 'AdminPageController::social_media_url_create_update_page', ['as' => 'social_media_url_create_update_page']);
            $routes->get('WebsiteInfoCreateUpdate', 'AdminPageController::website_info_create_update_page', ['as' => 'website_info_create_update_page']);
            $routes->get('SubscribersList', 'AdminPageController::subscribers_list_page', ['as' => 'subscribers_list_page']);
            $routes->group('Blog', function ($routes) {
                $routes->get('List', 'AdminPageController::blog_list_page', ['as' => 'blog_list_page']);
                $routes->get('CreateUpdate', 'AdminPageController::blog_create_update_page', ['as' => 'blog_create_update_page']);
                $routes->get('CreateUpdate/(:num)', 'AdminPageController::blog_create_update_page/$1');
                $routes->post('View', 'AdminPageController::blog_view_component', ['as' => 'blog_view_component']);
            });
        });
        $routes->group('FileUpload', function ($routes) {
            $routes->post('ImageUpload', 'AdminApiController::ImageUpload', ['as' => 'file_upload_image_api']);
            $routes->post('ImageDelete', 'AdminApiController::deleteImage', ['as' => 'file_delete_image_api']);
        });
    });
    // Admin Page Controller End -----------------------------------------------------------------------------


    // Admin Api Controller Start -----------------------------------------------------------------------------
    $routes->group('AdminApi', function ($routes) {
        $routes->group('NoAuth', function ($routes) {
        });
        $routes->group('Auth', function ($routes) {
            $routes->group('country', function ($routes) {
                $routes->post("country_get_api", "AdminApiController::country_get_api", ['as' => 'country_get_api']);
                $routes->post("country_list_api", "AdminApiController::country_list_api", ['as' => 'country_list_api']);
                $routes->post("country_create_api", "AdminApiController::country_create_api", ['as' => 'country_create_api']);
                $routes->post("country_update_api", "AdminApiController::country_update_api", ['as' => 'country_update_api']);
                $routes->post("country_delete_api", "AdminApiController::country_delete_api", ['as' => 'country_delete_api']);
            });
            $routes->group('state', function ($routes) {
                $routes->post("state_get_api", "AdminApiController::state_get_api", ['as' => 'state_get_api']);
                $routes->post("state_list_api", "AdminApiController::state_list_api", ['as' => 'state_list_api']);
                $routes->post("state_create_api", "AdminApiController::state_create_api", ['as' => 'state_create_api']);
                $routes->post("state_update_api", "AdminApiController::state_update_api", ['as' => 'state_update_api']);
                $routes->post("state_delete_api", "AdminApiController::state_delete_api", ['as' => 'state_delete_api']);
            });
            $routes->group('city', function ($routes) {
                $routes->post("city_get_api", "AdminApiController::city_get_api", ['as' => 'city_get_api']);
                $routes->post("city_list_api", "AdminApiController::city_list_api", ['as' => 'city_list_api']);
                $routes->post("city_create_api", "AdminApiController::city_create_api", ['as' => 'city_create_api']);
                $routes->post("city_update_api", "AdminApiController::city_update_api", ['as' => 'city_update_api']);
                $routes->post("city_delete_api", "AdminApiController::city_delete_api", ['as' => 'city_delete_api']);
            });

            $routes->group('illumination', function ($routes) {
                $routes->post("illumination_get_api", "AdminApiController::illumination_get_api", ['as' => 'illumination_get_api']);
                $routes->post("illumination_list_api", "AdminApiController::illumination_list_api", ['as' => 'illumination_list_api']);
                $routes->post("illumination_create_api", "AdminApiController::illumination_create_api", ['as' => 'illumination_create_api']);
                $routes->post("illumination_update_api", "AdminApiController::illumination_update_api", ['as' => 'illumination_update_api']);
                $routes->post("illumination_delete_api", "AdminApiController::illumination_delete_api", ['as' => 'illumination_delete_api']);
            });

            $routes->group('location', function ($routes) {
                $routes->post("location_get_api", "AdminApiController::location_get_api", ['as' => 'location_get_api']);
                $routes->post("location_list_api", "AdminApiController::location_list_api", ['as' => 'location_list_api']);
                $routes->post("location_create_api", "AdminApiController::location_create_api", ['as' => 'location_create_api']);
                $routes->post("location_update_api", "AdminApiController::location_update_api", ['as' => 'location_update_api']);
                $routes->post("location_delete_api", "AdminApiController::location_delete_api", ['as' => 'location_delete_api']);
            });

            $routes->group('location_type', function ($routes) {
                $routes->post("location_type_get_api", "AdminApiController::location_type_get_api", ['as' => 'location_type_get_api']);
                $routes->post("location_type_list_api", "AdminApiController::location_type_list_api", ['as' => 'location_type_list_api']);
                $routes->post("location_type_create_api", "AdminApiController::location_type_create_api", ['as' => 'location_type_create_api']);
                $routes->post("location_type_update_api", "AdminApiController::location_type_update_api", ['as' => 'location_type_update_api']);
                $routes->post("location_type_delete_api", "AdminApiController::location_type_delete_api", ['as' => 'location_type_delete_api']);
            });

            $routes->group('media', function ($routes) {
                $routes->post("media_get_api", "AdminApiController::media_get_api", ['as' => 'media_get_api']);
                $routes->post("media_list_api", "AdminApiController::media_list_api", ['as' => 'media_list_api']);
                $routes->post("media_create_api", "AdminApiController::media_create_api", ['as' => 'media_create_api']);
                $routes->post("media_update_api", "AdminApiController::media_update_api", ['as' => 'media_update_api']);
                $routes->post("media_delete_api", "AdminApiController::media_delete_api", ['as' => 'media_delete_api']);
            });

            $routes->group('media_type', function ($routes) {
                $routes->post("media_type_get_api", "AdminApiController::media_type_get_api", ['as' => 'media_type_get_api']);
                $routes->post("media_type_list_api", "AdminApiController::media_type_list_api", ['as' => 'media_type_list_api']);
                $routes->post("media_type_create_api", "AdminApiController::media_type_create_api", ['as' => 'media_type_create_api']);
                $routes->post("media_type_update_api", "AdminApiController::media_type_update_api", ['as' => 'media_type_update_api']);
                $routes->post("media_type_delete_api", "AdminApiController::media_type_delete_api", ['as' => 'media_type_delete_api']);
            });

            $routes->group('outdor_website_profile', function ($routes) {
                $routes->post("outdor_website_profile_get_api", "AdminApiController::outdor_website_profile_get_api", ['as' => 'outdor_website_profile_get_api']);
                $routes->post("outdor_website_profile_list_api", "AdminApiController::outdor_website_profile_list_api", ['as' => 'outdor_website_profile_list_api']);
                $routes->post("outdor_website_profile_create_api", "AdminApiController::outdor_website_profile_create_api", ['as' => 'outdor_website_profile_create_api']);
                $routes->post("outdor_website_profile_update_api", "AdminApiController::outdor_website_profile_update_api", ['as' => 'outdor_website_profile_update_api']);
                $routes->post("outdor_website_profile_delete_api", "AdminApiController::outdor_website_profile_delete_api", ['as' => 'outdor_website_profile_delete_api']);
            });

            $routes->group('party', function ($routes) {
                $routes->post("party_get_api", "AdminApiController::party_get_api", ['as' => 'party_get_api']);
                $routes->post("party_list_api", "AdminApiController::party_list_api", ['as' => 'party_list_api']);
                $routes->post("party_create_api", "AdminApiController::party_create_api", ['as' => 'party_create_api']);
                $routes->post("party_update_api", "AdminApiController::party_update_api", ['as' => 'party_update_api']);
                $routes->post("party_delete_api", "AdminApiController::party_delete_api", ['as' => 'party_delete_api']);
            });

            $routes->group('lead', function ($routes) {
                $routes->post("lead_get_api", "AdminApiController::lead_get_api", ['as' => 'lead_get_api']);
                $routes->post("lead_list_api", "AdminApiController::lead_list_api", ['as' => 'lead_list_api']);
                $routes->post("lead_create_api", "AdminApiController::lead_create_api", ['as' => 'lead_create_api']);
                $routes->post("lead_update_api", "AdminApiController::lead_update_api", ['as' => 'lead_update_api']);
                $routes->post("lead_delete_api", "AdminApiController::lead_delete_api", ['as' => 'lead_delete_api']);
            });

            $routes->group('client', function ($routes) {
                $routes->post("client_get_api", "AdminApiController::client_get_api", ['as' => 'client_get_api']);
                $routes->post("client_list_api", "AdminApiController::client_list_api", ['as' => 'client_list_api']);
                $routes->post("client_create_api", "AdminApiController::client_create_api", ['as' => 'client_create_api']);
                $routes->post("client_update_api", "AdminApiController::client_update_api", ['as' => 'client_update_api']);
                $routes->post("client_delete_api", "AdminApiController::client_delete_api", ['as' => 'client_delete_api']);
            });

            $routes->group('vendor', function ($routes) {
                $routes->post("vendor_get_api", "AdminApiController::vendor_get_api", ['as' => 'vendor_get_api']);
                $routes->post("vendor_list_api", "AdminApiController::vendor_list_api", ['as' => 'vendor_list_api']);
                $routes->post("vendor_create_api", "AdminApiController::vendor_create_api", ['as' => 'vendor_create_api']);
                $routes->post("vendor_update_api", "AdminApiController::vendor_update_api", ['as' => 'vendor_update_api']);
                $routes->post("vendor_delete_api", "AdminApiController::vendor_delete_api", ['as' => 'vendor_delete_api']);
            });

            $routes->group('blog', function ($routes) {
                $routes->post("blog_get_api", "AdminApiController::blog_get_api", ['as' => 'blog_get_api']);
                $routes->post("blog_list_api", "AdminApiController::blog_list_api", ['as' => 'blog_list_api']);
                $routes->post("blog_create_api", "AdminApiController::blog_create_api", ['as' => 'blog_create_api']);
                $routes->post("blog_update_api", "AdminApiController::blog_update_api", ['as' => 'blog_update_api']);
                $routes->post("blog_delete_api", "AdminApiController::blog_delete_api", ['as' => 'blog_delete_api']);
            });

            $routes->group('subscribers', function ($routes) {
                $routes->post("subscribers_get_api", "AdminApiController::subscribers_get_api", ['as' => 'subscribers_get_api']);
                $routes->post("subscribers_list_api", "AdminApiController::subscribers_list_api", ['as' => 'subscribers_list_api']);
                $routes->post("subscribers_create_api", "AdminApiController::subscribers_create_api", ['as' => 'subscribers_create_api']);
                $routes->post("subscribers_update_api", "AdminApiController::subscribers_update_api", ['as' => 'subscribers_update_api']);
                $routes->post("subscribers_delete_api", "AdminApiController::subscribers_delete_api", ['as' => 'subscribers_delete_api']);
            });


            $routes->group('sales_item_transaction', function ($routes) {
                $routes->post("sales_item_transaction_get_api", "AdminApiController::sales_item_transaction_get_api", ['as' => 'sales_item_transaction_get_api']);
                $routes->post("sales_item_transaction_list_api", "AdminApiController::sales_item_transaction_list_api", ['as' => 'sales_item_transaction_list_api']);
                $routes->post("sales_item_transaction_create_api", "AdminApiController::sales_item_transaction_create_api", ['as' => 'sales_item_transaction_create_api']);
                $routes->post("sales_item_transaction_update_api", "AdminApiController::sales_item_transaction_update_api", ['as' => 'sales_item_transaction_update_api']);
                $routes->post("sales_item_transaction_delete_api", "AdminApiController::sales_item_transaction_delete_api", ['as' => 'sales_item_transaction_delete_api']);
            });

            $routes->group('sales_transaction', function ($routes) {
                $routes->post("sales_transaction_get_api", "AdminApiController::sales_transaction_get_api", ['as' => 'sales_transaction_get_api']);
                $routes->post("sales_transaction_list_api", "AdminApiController::sales_transaction_list_api", ['as' => 'sales_transaction_list_api']);
                $routes->post("sales_transaction_create_api", "AdminApiController::sales_transaction_create_api", ['as' => 'sales_transaction_create_api']);
                $routes->post("sales_transaction_update_api", "AdminApiController::sales_transaction_update_api", ['as' => 'sales_transaction_update_api']);
                $routes->post("sales_transaction_delete_api", "AdminApiController::sales_transaction_delete_api", ['as' => 'sales_transaction_delete_api']);
            });

            $routes->group('user', function ($routes) {
                $routes->post("user_get_api", "AdminApiController::user_get_api", ['as' => 'user_get_api']);
                $routes->post("user_list_api", "AdminApiController::user_list_api", ['as' => 'user_list_api']);
                $routes->post("user_create_api", "AdminApiController::user_create_api", ['as' => 'user_create_api']);
                $routes->post("user_update_api", "AdminApiController::user_update_api", ['as' => 'user_update_api']);
                $routes->post("user_delete_api", "AdminApiController::user_delete_api", ['as' => 'user_delete_api']);
            });

            $routes->group('vouchar_terms_and_condition', function ($routes) {
                $routes->post("vouchar_terms_and_condition_get_api", "AdminApiController::vouchar_terms_and_condition_get_api", ['as' => 'vouchar_terms_and_condition_get_api']);
                $routes->post("vouchar_terms_and_condition_list_api", "AdminApiController::vouchar_terms_and_condition_list_api", ['as' => 'vouchar_terms_and_condition_list_api']);
                $routes->post("vouchar_terms_and_condition_create_api", "AdminApiController::vouchar_terms_and_condition_create_api", ['as' => 'vouchar_terms_and_condition_create_api']);
                $routes->post("vouchar_terms_and_condition_update_api", "AdminApiController::vouchar_terms_and_condition_update_api", ['as' => 'vouchar_terms_and_condition_update_api']);
                $routes->post("vouchar_terms_and_condition_delete_api", "AdminApiController::vouchar_terms_and_condition_delete_api", ['as' => 'vouchar_terms_and_condition_delete_api']);
            });
        });
    });
    // Admin Api Controller End -----------------------------------------------------------------------------

}
