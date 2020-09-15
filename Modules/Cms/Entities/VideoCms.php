<?php

namespace Modules\Cms\Entities;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Cms\Entities\Traits\Relationship\VideoCmsRelationship;

class VideoCms extends Model implements TranslatableContract
{
    use Translatable, VideoCmsRelationship;

    protected $fillable = ['key', 'source', 'type'];
    public $translatedAttributes = ['title', 'description', 'name'];

    const KEY_GALLERY_VIDEO_TOP_CMS = 'key_gallery_video_top_cms';
    const KEY_GALLERY_VIDEO_ORGANIC_CMS = 'key_gallery_video_organic_cms';
    const KEY_GALLERY_VIDEO_PEOPLE_CMS = 'key_gallery_video_people_cms';
    const KEY_GALLERY_VIDEO_COUPLE_CMS = 'key_gallery_video_couple_cms';
    const KEY_GALLERY_VIDEO_BOTTOM_CMS = 'key_gallery_video_bottom_cms';

    public static function getListVideo()
    {
        return [
            ConfigCms::TYPE_GALLERY_CMS => __('cms::labels.gallery'),
        ];
    }

    public static function getAreaVideo()
    {
        return [
            self::KEY_GALLERY_VIDEO_TOP_CMS => __('cms::labels.label_video.key_gallery_video_top_cms'),
            self::KEY_GALLERY_VIDEO_ORGANIC_CMS => __('cms::labels.label_video.key_gallery_video_organic_cms'),
            self::KEY_GALLERY_VIDEO_PEOPLE_CMS => __('cms::labels.label_video.key_gallery_video_people_cms'),
            self::KEY_GALLERY_VIDEO_COUPLE_CMS => __('cms::labels.label_video.key_gallery_video_couple_cms'),
            self::KEY_GALLERY_VIDEO_BOTTOM_CMS => __('cms::labels.label_video.key_gallery_video_bottom_cms')
        ];
    }
}
