<?php

namespace Modules\Cms\Entities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Cms\Entities\Traits\Relationship\ConfigCmsRelationship;
use Modules\Cms\Entities\Traits\Scope\ConfigCmsScope;

class ConfigCms extends Model implements TranslatableContract
{
    use ConfigCmsScope, ConfigCmsRelationship, Translatable;

    //type
    const TYPE_SERVICE_CMS = 1;
    const TYPE_INTRODUCE_CMS = 2;
    const TYPE_MENU_CMS = 3;
    const TYPE_BOOKING_CMS = 4;
    const TYPE_SITE_SETTING_CMS = 5;
    const TYPE_HOME_CMS = 6;
    const TYPE_PRODUCT_CMS = 7;
    const TYPE_PRODUCT_DETAIL_CMS = 8;
    const TYPE_GALLERY_CMS = 9;
    const TYPE_OFFER_CMS = 10;
    const TYPE_MAIL_CMS = 11;
    const TYPE_POLICY_CMS = 12;
    const TYPE_AGENCY_CMS = 13;
    const TYPE_CONDITION_CMS = 14;

    // service label
    const KEY_SERVICE_TITLE_CMS = 'key_service_title_cms';
    const KEY_SERVICE_DESCRIPTION_CMS = 'key_service_description_cms';
    const KEY_SERVICE_LIST_SERVICE_CMS = 'key_service_list_service_cms';

    // introduction label
    const KEY_INTRODUCTION_OVERVIEW_CMS = 'key_introduction_overview_cms';
    const KEY_INTRODUCTION_MOVE_CMS = 'key_introduction_move_guide_cms';
    const KEY_INTRODUCTION_UTILITIES_CMS = 'key_introduction_utilities_cms';
    const KEY_INTRODUCTION_REVIEW_TITLE_CMS = 'key_introduction_review_title_cms';
    const KEY_INTRODUCTION_REWARD_TITLE_CMS = 'key_introduction_reward_title_cms';

    //menu label
    const KEY_MENU_HOME_CMS = 'key_menu_home_cms';
    const KEY_MENU_ABOUT_CMS = 'key_menu_about_cms';
    const KEY_MENU_CATEGORY_CMS = 'key_menu_category_cms';
    const KEY_MENU_CATEGORY_MELLOW_CMS = 'key_menu_category_mellow_cms';
    const KEY_MENU_CATEGORY_FLUFFY_CMS = 'key_menu_category_fluffy_cms';
    const KEY_MENU_CATEGORY_LAYLA_CMS = 'key_menu_category_layla_cms';
    const KEY_MENU_SERVICE_CMS = 'key_menu_service_cms';
    const KEY_MENU_OFFER_CMS = 'key_menu_offer_cms';
    const KEY_MENU_GALLERY_CMS = 'key_menu_gallery_cms';
    const KEY_MENU_CONTACT_NOW_CMS = 'key_menu_contact_now_cms';

    //footer menu label
    const KEY_MENU_FOOTER_BOOKING_CMS = 'key_menu_footer_booking_cms';
    const KEY_MENU_FOOTER_GALLERY_CMS = 'key_menu_footer_gallery_cms';
    const KEY_MENU_FOOTER_ABOUT_CMS = 'key_menu_footer_about_cms';
    const KEY_MENU_FOOTER_AGENCY_CMS = 'key_menu_footer_agency_cms';
    const KEY_MENU_FOOTER_CONTACT_CMS = 'key_menu_footer_contact_cms';

    //service booking in homepage
    const KEY_BOOKING_HOME_TITLE_CMS = 'key_booking_home_title_cms';
    const KEY_BOOKING_HOME_DESCRIPTION_CMS = 'key_booking_home_description_cms';
    const KEY_BOOKING_HOME_LINK_LABEL_CMS = 'key_booking_home_link_label_cms';
    const KEY_BOOKING_HOME_LINK_URL_CMS = 'key_booking_home_link_url_cms';

    //service booking in product list
    const KEY_BOOKING_PRODUCT_LIST_TITLE_CMS = 'key_booking_product_list_title_cms';
    const KEY_BOOKING_PRODUCT_LIST_DESCRIPTION_CMS = 'key_booking_product_list_description_cms';
    const KEY_BOOKING_PRODUCT_LIST_LINK_LABEL_CMS = 'key_booking_product_list_link_label_cms';
    const KEY_BOOKING_PRODUCT_LIST_LINK_URL_CMS = 'key_booking_product_list_link_url_cms';

    //service booking in offer
    const KEY_BOOKING_OFFER_TITLE_CMS = 'key_booking_offer_title_cms';
    const KEY_BOOKING_OFFER_DESCRIPTION_CMS = 'key_booking_offer_description_cms';
    const KEY_BOOKING_OFFER_LINK_LABEL_CMS = 'key_booking_offer_link_label_cms';
    const KEY_BOOKING_OFFER_LINK_URL_CMS = 'key_booking_offer_link_url_cms';

    //service booking in gallery
    const KEY_BOOKING_GALLERY_TITLE_CMS = 'key_booking_gallery_title_cms';
    const KEY_BOOKING_GALLERY_DESCRIPTION_CMS = 'key_booking_gallery_description_cms';
    const KEY_BOOKING_GALLERY_LINK_LABEL_CMS = 'key_booking_gallery_link_label_cms';
    const KEY_BOOKING_GALLERY_LINK_URL_CMS = 'key_booking_gallery_link_url_cms';

    //common service booking
    const KEY_BOOKING_TITLE_CMS = 'key_booking_title_cms';
    const KEY_BOOKING_DESCRIPTION_CMS = 'key_booking_description_cms';
    const KEY_BOOKING_LINK_LABEL_CMS = 'key_booking_link_label_cms';
    const KEY_BOOKING_LINK_URL_CMS = 'key_booking_link_url_cms';

    //site_setting
    const KEY_SITE_ADDRESS = 'key_site_address';
    const KEY_SITE_PHONE = 'key_site_phone';
    const KEY_SITE_EMAIL = 'key_site_email';
    const KEY_SITE_FACEBOOK = 'key_site_facebook';
    const KEY_SITE_INSTAGRAM = 'key_site_instagram';
    const KEY_SITE_YOUTUBE = 'key_site_youtube';

    //home
    const KEY_HOME_VIDEO_BACKGROUND_URL_CMS = 'key_home_video_background_url_cms';
    const KEY_HOME_VIDEO_URL_CMS = 'key_home_video_url_cms';
    const KEY_HOME_VIDEO_TITLE_CMS = 'key_home_video_title_cms';
    const KEY_HOME_VIDEO_DESCRIPTION_CMS = 'key_home_video_description_cms';
    const KEY_HOME_VIDEO_BRIEF_CMS = 'key_home_video_brief_cms';
    const KEY_HOME_MANY_PRODUCT_TITLE_CMS = 'key_home_many_product_title_cms';
    const KEY_HOME_MANY_PRODUCT_DESCRIPTION_CMS = 'key_home_many_product_description_cms';
    const KEY_HOME_EXPERIENCE_IMAGES_TITLE_CMS = 'key_home_experience_images_title_cms';
    const KEY_HOME_EXPERIENCE_IMAGES_DESCRIPTION_CMS = 'key_home_experience_images_description_cms';
    const KEY_HOME_EXPERIENCE_SPECIAL_TITLE_CMS = 'key_home_experience_special_title_cms';
    const KEY_HOME_EXPERIENCE_SPECIAL_DESCRIPTION_CMS = 'key_home_experience_special_description_cms';

    //product
    const KEY_PRODUCT_OVER_VIEW_DESCRIPTION_CMS = 'key_product_over_view_description_cms';
    const KEY_PRODUCT_OVER_VIEW_SLOGAN_CMS = 'key_product_over_view_slogan_cms';
    const KEY_PRODUCT_OVER_VIEW_LINK_LABEL_CMS = 'key_product_over_view_link_label_cms';
    const KEY_PRODUCT_OVER_VIEW_LINK_URL_CMS = 'key_product_over_view_link_url_cms';
    const KEY_PRODUCT_DETAIL_WELCOME_TITLE_CMS = 'key_product_detail_welcome_title_cms';
    const KEY_PRODUCT_DETAIL_WELCOME_BRIEF_CMS = 'key_product_detail_welcome_brief_cms';
    const KEY_PRODUCT_DETAIL_WELCOME_DESCRIPTION_CMS = 'key_product_detail_welcome_description_cms';
    const KEY_PRODUCT_DETAIL_WELCOME_LINK_LABEL_CMS = 'key_product_detail_welcome_link_label_cms';
    const KEY_PRODUCT_DETAIL_WELCOME_LINK_URL_CMS = 'key_product_detail_welcome_link_url_cms';

    //gallery
    const KEY_GALLERY_HEADER_DESCRIPTION_CMS = 'key_gallery_header_description_cms';
    const KEY_GALLERY_NATURE_CMS = "key_gallery_nature_cms";
    const KEY_GALLERY_ARCHITECTURE_CMS = "key_gallery_architecture_cms";
    const KEY_GALLERY_FOOD_CMS = "key_gallery_food_cms";
    const KEY_GALLERY_PEOPLE_CMS = "key_gallery_people_cms";

    //mail
    const KEY_MAIL_CONTENT_CMS = 'key_mail_content_cms';

    //policy
    const KEY_POLICY_TITLE_CMS = 'key_policy_title_cms';
    const KEY_POLICY_DESCRIPTION_CMS = 'key_policy_description_cms';

    //agency
    const KEY_AGENCY_POLICY_TITLE_CMS = "key_agency_policy_title_cms";
    const KEY_AGENCY_POLICY_DESCRIPTION_CMS = "key_agency_policy_description_cms";

    //condition
    const KEY_CONDITION_TITLE_CMS = "key_condition_title_cms";
    const KEY_CONDITION_DESCRIPTION_CMS = "key_condition_description_cms";

    //status
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;

    protected $fillable = ['key', 'type', 'status'];
    public $translatedAttributes = ['value', 'title', 'area'];

    public static function getTypeSelect()
    {
        return [
            self::TYPE_SERVICE_CMS        => __('cms::labels.service'),
            self::TYPE_INTRODUCE_CMS      => __('cms::labels.introduce'),
            self::TYPE_MENU_CMS           => __('cms::labels.menu'),
            self::TYPE_BOOKING_CMS        => __('cms::labels.booking'),
            self::TYPE_SITE_SETTING_CMS   => __('cms::labels.site_setting'),
            self::TYPE_HOME_CMS           => __('cms::labels.home_cms'),
            self::TYPE_PRODUCT_CMS        => __('cms::labels.product_cms'),
            self::TYPE_PRODUCT_DETAIL_CMS => __('cms::labels.product_detail_cms'),
            self::TYPE_GALLERY_CMS        => __('cms::labels.gallery'),
            self::TYPE_OFFER_CMS          => __('cms::labels.offer'),
            self::TYPE_MAIL_CMS           => __('cms::labels.mail'),
            self::TYPE_POLICY_CMS         => __('cms::labels.policy'),
            self::TYPE_AGENCY_CMS         => __('cms::labels.agency'),
            self::TYPE_CONDITION_CMS      => __('cms::labels.condition'),
        ];
    }

    public static function getAreaConfig()
    {
        return [
            //service
            self::KEY_SERVICE_TITLE_CMS => __('cms::labels.label_config.key_service_overview_cms'),
            self::KEY_SERVICE_DESCRIPTION_CMS => __('cms::labels.label_config.key_service_overview_cms'),
            self::KEY_SERVICE_LIST_SERVICE_CMS => __('cms::labels.label_config.key_service_list_service_cms'),
            //introduction
            self::KEY_INTRODUCTION_OVERVIEW_CMS => __('cms::labels.label_config.key_introduction_overview_cms'),
            self::KEY_INTRODUCTION_MOVE_CMS => __('cms::labels.label_config.key_introduction_detail_cms'),
            self::KEY_INTRODUCTION_UTILITIES_CMS => __('cms::labels.label_config.key_introduction_detail_cms'),
            self::KEY_INTRODUCTION_REVIEW_TITLE_CMS => __('cms::labels.label_config.key_introduction_detail_cms'),
            self::KEY_INTRODUCTION_REWARD_TITLE_CMS => __('cms::labels.label_config.key_introduction_detail_cms'),
            //menu
            self::KEY_MENU_HOME_CMS => __('cms::labels.label_config.key_home_menu_top'),
            self::KEY_MENU_ABOUT_CMS => __('cms::labels.label_config.key_home_menu_top'),
            self::KEY_MENU_CATEGORY_CMS => __('cms::labels.label_config.key_home_menu_top'),
            self::KEY_MENU_CATEGORY_MELLOW_CMS => __('cms::labels.label_config.key_home_menu_top'),
            self::KEY_MENU_CATEGORY_FLUFFY_CMS => __('cms::labels.label_config.key_home_menu_top'),
            self::KEY_MENU_CATEGORY_LAYLA_CMS => __('cms::labels.label_config.key_home_menu_top'),
            self::KEY_MENU_SERVICE_CMS => __('cms::labels.label_config.key_home_menu_top'),
            self::KEY_MENU_OFFER_CMS => __('cms::labels.label_config.key_home_menu_top'),
            self::KEY_MENU_GALLERY_CMS => __('cms::labels.label_config.key_home_menu_top'),
            self::KEY_MENU_CONTACT_NOW_CMS => __('cms::labels.label_config.key_home_menu_top'),
            self::KEY_MENU_FOOTER_BOOKING_CMS => __('cms::labels.label_config.key_home_menu_bottom'),
            self::KEY_MENU_FOOTER_GALLERY_CMS => __('cms::labels.label_config.key_home_menu_bottom'),
            self::KEY_MENU_FOOTER_ABOUT_CMS => __('cms::labels.label_config.key_home_menu_bottom'),
            self::KEY_MENU_FOOTER_AGENCY_CMS => __('cms::labels.label_config.key_home_menu_bottom'),
            self::KEY_MENU_FOOTER_CONTACT_CMS => __('cms::labels.label_config.key_home_menu_bottom'),
            //booking
            self::KEY_BOOKING_HOME_TITLE_CMS => __('cms::labels.label_config.key_order_now'),
            self::KEY_BOOKING_HOME_DESCRIPTION_CMS => __('cms::labels.label_config.key_order_now'),
            self::KEY_BOOKING_HOME_LINK_LABEL_CMS => __('cms::labels.label_config.key_order_now'),
            self::KEY_BOOKING_HOME_LINK_URL_CMS => __('cms::labels.label_config.key_order_now'),
            self::KEY_BOOKING_PRODUCT_LIST_TITLE_CMS => __('cms::labels.label_config.key_order_now'),
            self::KEY_BOOKING_PRODUCT_LIST_DESCRIPTION_CMS => __('cms::labels.label_config.key_order_now'),
            self::KEY_BOOKING_PRODUCT_LIST_LINK_LABEL_CMS => __('cms::labels.label_config.key_order_now'),
            self::KEY_BOOKING_PRODUCT_LIST_LINK_URL_CMS => __('cms::labels.label_config.key_order_now'),
            self::KEY_BOOKING_OFFER_TITLE_CMS => __('cms::labels.label_config.key_order_now'),
            self::KEY_BOOKING_OFFER_DESCRIPTION_CMS => __('cms::labels.label_config.key_order_now'),
            self::KEY_BOOKING_OFFER_LINK_LABEL_CMS => __('cms::labels.label_config.key_order_now'),
            self::KEY_BOOKING_OFFER_LINK_URL_CMS => __('cms::labels.label_config.key_order_now'),
            self::KEY_BOOKING_GALLERY_TITLE_CMS => __('cms::labels.label_config.key_order_now'),
            self::KEY_BOOKING_GALLERY_DESCRIPTION_CMS => __('cms::labels.label_config.key_order_now'),
            self::KEY_BOOKING_GALLERY_LINK_LABEL_CMS => __('cms::labels.label_config.key_order_now'),
            self::KEY_BOOKING_GALLERY_LINK_URL_CMS => __('cms::labels.label_config.key_order_now'),
            self::KEY_BOOKING_TITLE_CMS => __('cms::labels.label_config.key_home_menu_bottom'),
            self::KEY_BOOKING_DESCRIPTION_CMS => __('cms::labels.label_config.key_home_menu_bottom'),
            self::KEY_BOOKING_LINK_LABEL_CMS => __('cms::labels.label_config.key_home_menu_bottom'),
            self::KEY_BOOKING_LINK_URL_CMS => __('cms::labels.label_config.key_home_menu_bottom'),
            //common
            self::KEY_SITE_ADDRESS => __('cms::labels.label_config.key_information_contact'),
            self::KEY_SITE_PHONE => __('cms::labels.label_config.key_information_contact'),
            self::KEY_SITE_EMAIL => __('cms::labels.label_config.key_information_contact'),
            self::KEY_SITE_FACEBOOK => __('cms::labels.label_config.key_information_contact'),
            self::KEY_SITE_INSTAGRAM => __('cms::labels.label_config.key_information_contact'),
            self::KEY_SITE_YOUTUBE => __('cms::labels.label_config.key_information_contact'),
            //home
            self::KEY_HOME_VIDEO_BACKGROUND_URL_CMS => __('cms::labels.label_config.key_home_video'),
            self::KEY_HOME_VIDEO_URL_CMS => __('cms::labels.label_config.key_home_video'),
            self::KEY_HOME_VIDEO_TITLE_CMS => __('cms::labels.label_config.key_home_video'),
            self::KEY_HOME_VIDEO_DESCRIPTION_CMS => __('cms::labels.label_config.key_home_video'),
            self::KEY_HOME_VIDEO_BRIEF_CMS => __('cms::labels.label_config.key_home_video'),
            self::KEY_HOME_MANY_PRODUCT_TITLE_CMS => __('cms::labels.label_config.key_home_overview_product'),
            self::KEY_HOME_MANY_PRODUCT_DESCRIPTION_CMS => __('cms::labels.label_config.key_home_overview_product'),
            self::KEY_HOME_EXPERIENCE_IMAGES_TITLE_CMS => __('cms::labels.label_config.key_home_experience_image'),
            self::KEY_HOME_EXPERIENCE_IMAGES_DESCRIPTION_CMS  => __('cms::labels.label_config.key_home_experience_image'),
            self::KEY_HOME_EXPERIENCE_SPECIAL_TITLE_CMS => __('cms::labels.label_config.key_home_experience_special'),
            self::KEY_HOME_EXPERIENCE_SPECIAL_DESCRIPTION_CMS => __('cms::labels.label_config.key_home_experience_special'),
            //product
            self::KEY_PRODUCT_OVER_VIEW_DESCRIPTION_CMS => __('cms::labels.label_config.key_product_overview'),
            self::KEY_PRODUCT_OVER_VIEW_SLOGAN_CMS => __('cms::labels.label_config.key_product_overview'),
            self::KEY_PRODUCT_OVER_VIEW_LINK_LABEL_CMS => __('cms::labels.label_config.key_product_overview'),
            self::KEY_PRODUCT_OVER_VIEW_LINK_URL_CMS => __('cms::labels.label_config.key_product_overview'),
            self::KEY_PRODUCT_DETAIL_WELCOME_TITLE_CMS => __('cms::labels.label_config.key_product_detail_bottom'),
            self::KEY_PRODUCT_DETAIL_WELCOME_BRIEF_CMS => __('cms::labels.label_config.key_product_detail_bottom'),
            self::KEY_PRODUCT_DETAIL_WELCOME_DESCRIPTION_CMS => __('cms::labels.label_config.key_product_detail_bottom'),
            self::KEY_PRODUCT_DETAIL_WELCOME_LINK_LABEL_CMS => __('cms::labels.label_config.key_product_detail_bottom'),
            self::KEY_PRODUCT_DETAIL_WELCOME_LINK_URL_CMS => __('cms::labels.label_config.key_product_detail_bottom'),
            //gallery
            self::KEY_GALLERY_HEADER_DESCRIPTION_CMS => __('cms::labels.label_config.key_gallery_detail'),
            self::KEY_GALLERY_NATURE_CMS => __('cms::labels.label_config.key_gallery_detail'),
            self::KEY_GALLERY_ARCHITECTURE_CMS => __('cms::labels.label_config.key_gallery_detail'),
            self::KEY_GALLERY_FOOD_CMS => __('cms::labels.label_config.key_gallery_detail'),
            self::KEY_GALLERY_PEOPLE_CMS => __('cms::labels.label_config.key_gallery_detail'),
            //mail
            self::KEY_MAIL_CONTENT_CMS => __('cms::labels.label_config.key_mail_booking_done'),
            //policy
            self::KEY_POLICY_TITLE_CMS => __('cms::labels.label_config.key_policy_title'),
            self::KEY_POLICY_DESCRIPTION_CMS => __('cms::labels.label_config.key_policy_content'),
            //agency
            self::KEY_AGENCY_POLICY_TITLE_CMS => __('cms::labels.label_config.key_agency_policy_title'),
            self::KEY_AGENCY_POLICY_DESCRIPTION_CMS => __('cms::labels.label_config.key_agency_policy_description'),
            //condition
            self::KEY_CONDITION_TITLE_CMS => __('cms::labels.label_config.key_condition_title'),
            self::KEY_CONDITION_DESCRIPTION_CMS => __('cms::labels.label_config.key_condition_description'),
        ];
    }

    public static function getSelectedStatus()
    {
        return [
            self::STATUS_DISABLE => __('cms::labels.disable'),
            self::STATUS_ENABLE => __('cms::labels.enable'),
        ];
    }
}
