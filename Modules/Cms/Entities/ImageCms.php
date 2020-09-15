<?php

namespace Modules\Cms\Entities;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Modules\Cms\Entities\Traits\Relationship\ImageCmsRelationship;
use Modules\Cms\Entities\Traits\Scope\ImageCmsScope;

class ImageCms extends Model implements TranslatableContract
{
    use ImageCmsScope, ImageCmsRelationship, Translatable;

    const KEY_SERVICE_CMS = 'key_service_cms';

    // introduction
    const KEY_INTRODUCTION_SERVICE_UTILITIES = 'key_introduction_service_utilities';
    const KEY_INTRODUCTION_REVIEW = 'key_introduction_review';

    //site setting
    const KEY_SITE_LOGO = 'key_site_logo';
    const KEY_SITE_LOGO_WHITE = 'key_site_logo_white';
    const KEY_SITE_BACKGROUND = 'key_site_background';

    //home
    const KEY_HOME_IMAGE_HASH_TAG = 'key_home_image_hash_tag';
    const KEY_HOME_IMAGE_AWARD_CMS = 'key_home_image_award_cms';
    const KEY_PANEL_SLIDE = 'key_panel_slide';
    const KEY_HOME_EXPERIENCE_SPECIAL_CMS = 'key_home_experience_special_cms';
    const KEY_PRODUCT_EXPERIENCE_SPECIAL_CMS = 'key_product_experience_special_cms';

    //gallery
    const KEY_GALLERY_NATURE_CMS = "key_gallery_nature_cms";
    const KEY_GALLERY_ARCHITECTURE_CMS = "key_gallery_architecture_cms";
    const KEY_GALLERY_FOOD_CMS = "key_gallery_food_cms";
    const KEY_GALLERY_PEOPLE_CMS = "key_gallery_people_cms";

    //agency
    const KEY_AGENCY_SLIDE_CMS = "key_agency_slide_cms";
    const KEY_AGENCY_SLIDE_FORM_CMS = "key_agency_slide_form_cms";

    //condition
    const KEY_CONDITION_CMS = "key_condition_cms";

    protected $table = 'image_cms';
    protected $fillable = ['type', 'key'];
    public $translatedAttributes = ['description', 'alt', 'title', 'name', 'hash_tag', 'key_word', 'header', 'area'];
    public static function getListImage()
    {
        return [
            ConfigCms::TYPE_SERVICE_CMS => __('cms::labels.service'),
            ConfigCms::TYPE_INTRODUCE_CMS => __('cms::labels.introduce'),
            ConfigCms::TYPE_SITE_SETTING_CMS => __('cms::labels.site_setting'),
            ConfigCms::TYPE_HOME_CMS => __('cms::labels.home_cms'),
            ConfigCms::TYPE_PRODUCT_CMS => __('cms::labels.product_cms'),
            ConfigCms::TYPE_GALLERY_CMS => __('cms::labels.gallery'),
            ConfigCms::TYPE_AGENCY_CMS => __('cms::labels.agency'),
            ConfigCms::TYPE_CONDITION_CMS => __('cms::labels.condition'),
        ];
    }

    public static function getAreaImage()
    {
        return [
            //service
            self::KEY_SERVICE_CMS => __('cms::labels.label_image.key_service_cms'),
            // introduction
            self::KEY_INTRODUCTION_SERVICE_UTILITIES => __('cms::labels.label_image.key_introduction_service_utilities'),
            self::KEY_INTRODUCTION_REVIEW => __('cms::labels.label_image.key_introduction_review'),
            //common
            self::KEY_SITE_LOGO => __('cms::labels.label_image.key_site_logo'),
            self::KEY_SITE_LOGO_WHITE => __('cms::labels.label_image.key_site_logo_white'),
            self::KEY_SITE_BACKGROUND => __('cms::labels.label_image.key_site_background'),
            //home
            self::KEY_HOME_IMAGE_HASH_TAG => __('cms::labels.label_image.key_home_image_hash_tag'),
            self::KEY_HOME_IMAGE_AWARD_CMS => __('cms::labels.label_image.key_home_image_award_cms'),
            self::KEY_PANEL_SLIDE => __('cms::labels.label_image.key_panel_slide'),
            self::KEY_HOME_EXPERIENCE_SPECIAL_CMS => __('cms::labels.label_image.key_home_experience_special_cms'),
            //product
            self::KEY_PRODUCT_EXPERIENCE_SPECIAL_CMS => __('cms::labels.label_image.key_product_experience_special_cms'),
            //gallery
            self::KEY_GALLERY_NATURE_CMS => __('cms::labels.label_image.key_gallery_nature_cms'),
            self::KEY_GALLERY_ARCHITECTURE_CMS => __('cms::labels.label_image.key_gallery_architecture_cms'),
            self::KEY_GALLERY_FOOD_CMS => __('cms::labels.label_image.key_gallery_food_cms'),
            self::KEY_GALLERY_PEOPLE_CMS => __('cms::labels.label_image.key_gallery_people_cms'),
            //agency
            self::KEY_AGENCY_SLIDE_CMS => __('cms::labels.label_image.key_agency_slide_cms'),
            self::KEY_AGENCY_SLIDE_FORM_CMS => __('cms::labels.label_image.key_agency_slide_form_cms'),
            //condition
            self::KEY_CONDITION_CMS => __('cms::labels.label_image.key_condition_cms'),
        ];
    }

    public static function getTypeImage()
    {
        return [
            //service
            self::KEY_SERVICE_CMS => ConfigCms::TYPE_SERVICE_CMS,
            //introduction
            self::KEY_INTRODUCTION_SERVICE_UTILITIES =>ConfigCms::TYPE_INTRODUCE_CMS,
            self::KEY_INTRODUCTION_REVIEW => ConfigCms::TYPE_INTRODUCE_CMS,
            //common
            self::KEY_SITE_LOGO => ConfigCms::TYPE_SITE_SETTING_CMS,
            self::KEY_SITE_LOGO_WHITE => ConfigCms::TYPE_SITE_SETTING_CMS,
            self::KEY_SITE_BACKGROUND => ConfigCms::TYPE_SITE_SETTING_CMS,
            //home
            self::KEY_HOME_IMAGE_HASH_TAG => ConfigCms::TYPE_HOME_CMS,
            self::KEY_HOME_IMAGE_AWARD_CMS => ConfigCms::TYPE_HOME_CMS,
            self::KEY_PANEL_SLIDE => ConfigCms::TYPE_HOME_CMS,
            self::KEY_HOME_EXPERIENCE_SPECIAL_CMS => ConfigCms::TYPE_HOME_CMS,
            //product
            self::KEY_PRODUCT_EXPERIENCE_SPECIAL_CMS => ConfigCms::TYPE_PRODUCT_CMS,
            //gallery
            self::KEY_GALLERY_NATURE_CMS => ConfigCms::TYPE_GALLERY_CMS,
            self::KEY_GALLERY_ARCHITECTURE_CMS => ConfigCms::TYPE_GALLERY_CMS,
            self::KEY_GALLERY_FOOD_CMS => ConfigCms::TYPE_GALLERY_CMS,
            self::KEY_GALLERY_PEOPLE_CMS => ConfigCms::TYPE_GALLERY_CMS,
            //agency
            self::KEY_AGENCY_SLIDE_FORM_CMS => ConfigCms::TYPE_AGENCY_CMS,
            self::KEY_AGENCY_SLIDE_CMS => ConfigCms::TYPE_AGENCY_CMS,
            //condition
            self::KEY_CONDITION_CMS => ConfigCms::TYPE_CONDITION_CMS,
        ];
    }

    public function setKeyAttribute($value)
    {
        $this->attributes['type'] = self::getTypeImage()[$value];
        $this->attributes['key'] = $value;
    }

}
