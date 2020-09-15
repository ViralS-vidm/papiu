<?php

namespace Modules\Cms\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Cms\Entities\ConfigCms;
use Modules\Cms\Entities\ImageCms;
use Modules\Cms\Entities\ImageCmsTranslation;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;
use Modules\Image\Entities\Image;

class ExperienceImageCmsTableSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $images = ImageCms::whereIn('key', [ImageCms::KEY_HOME_IMAGE_HASH_TAG])->get();
        foreach ($images as $img) {
            $img->imageCms()->detach();
            $img->delete();
        }
        ImageCmsTranslation::whereIn('image_cms_id', $images->pluck('id'))->delete();

        $images = [];
        for ($i = 1; $i < 16; $i++) {
            $images[] = [
                'original_url' => 'papiu/images/ins_'.$i.'.jpg',
                'thumbnail_url' => 'papiu/images/ins_'.$i.'.jpg',
            ];
        }
        $service = ["description" => 'Ảnh Hashtag', "alt" => 'image_hash_tag', 'type' => ConfigCms::TYPE_HOME_CMS, 'key' => ImageCms::KEY_HOME_IMAGE_HASH_TAG,
            'hash_tag' => "#couplegoals #couple #couplesgoals #couples #travelcouples #travelcouple #capellaubud #ubud #baliguide #bali #balitrip #travelgoals #bali",
            'en' => [
                "description" => 'Hash tag Image', "alt" => 'image_hash_tag',
                'hash_tag' => "#couplegoals #couple #couplesgoals #couples #travelcouples #travelcouple #capellaubud #ubud #baliguide #bali #balitrip #travelgoals #bali",
            ]
        ];
        foreach ($images as $image) {
            $i = Image::create($image);
            $s = ImageCms::create($service);
            $s->imageCms()->detach();
            $s->imageCms()->attach([$i->id], ['image_type' => Image::TYPE_SERVICE_CMS_IMAGE]);
        }

        $images = [];
        for ($i = 1; $i < 4; $i++) {
            $images[] = [
                'original_url' => 'papiu/images/giaithuong'.$i.'.png',
                'thumbnail_url' => 'papiu/images/giaithuong'.$i.'.png',
            ];
        }
        $awards = [
            ["description" => 'Ảnh Giải thưởng', "alt" => 'image_award', 'type' => ConfigCms::TYPE_HOME_CMS, 'key' => ImageCms::KEY_HOME_IMAGE_AWARD_CMS,
                'name' => "CONDE NAST TRAVELER READER’S CHOICE AWARDS", 'title' => '2019 #1 Top Hotel in Bali',
                'en' => [
                    "description" => 'Award Image', "alt" => 'image_award',
                    'name' => "CONDE NAST TRAVELER READER’S CHOICE AWARDS", 'title' => '2019 #1 Top Hotel in Bali',
                ]
            ],
            ["description" => 'Ảnh Giải thưởng', "alt" => 'image_award', 'type' => ConfigCms::TYPE_HOME_CMS, 'key' => ImageCms::KEY_HOME_IMAGE_AWARD_CMS,
                'name' => "TRAVEL + LEISURE IT LIST 2019", 'title' => 'Best New Hotels in the World',
                'en' => [
                    "description" => 'Award Image', "alt" => 'image_award',
                    'name' => "TRAVEL + LEISURE IT LIST 2019", 'title' => 'Best New Hotels in the World',
                ]
            ],
            ["description" => 'Ảnh Giải thưởng', "alt" => 'image_award', 'type' => ConfigCms::TYPE_HOME_CMS, 'key' => ImageCms::KEY_HOME_IMAGE_AWARD_CMS,
                'name' => "THE ULTRAS ULTIMATE LUXURY TRAVEL", 'title' => '2019 Best New Hotel of the World',
                'en' => [
                    "description" => 'Award Image', "alt" => 'image_award',
                    'name' => "THE ULTRAS ULTIMATE LUXURY TRAVEL", 'title' => '2019 Best New Hotel of the World',
                ]
            ]
        ];
        foreach ($images as $key => $image) {
            $i = Image::create($image);
            $s = ImageCms::create($awards[$key]);
            $s->imageCms()->detach();
            $s->imageCms()->attach([$i->id], ['image_type' => Image::TYPE_SERVICE_CMS_IMAGE]);
        }

        $images = [];
        for ($i = 1; $i < 6; $i++) {
            $images[] = [
                'original_url' => 'papiu/images/sl_'.$i.'.jpg',
                'thumbnail_url' => 'papiu/images/sl_'.$i.'.jpg',
            ];
        }
        $panel = ["description" => 'Panel Slide', "alt" => 'overview', 'type' => ConfigCms::TYPE_HOME_CMS, 'key' => ImageCms::KEY_PANEL_SLIDE,
            'en' => [
                "description" => 'Panel Slide', "alt" => 'overview',
            ]
        ];
        foreach ($images as $image) {
            $i = Image::create($image);
            $s = ImageCms::create($panel);
            $s->imageCms()->detach();
            $s->imageCms()->attach([$i->id], ['image_type' => Image::TYPE_SERVICE_CMS_IMAGE]);
        }

        $images = [
            [
                'original_url' => 'papiu/images/canh quan.jpg',
                'thumbnail_url' => 'papiu/images/canh quan.jpg',
            ],
            [
                'original_url' => 'papiu/images/con nguoi.jpg',
                'thumbnail_url' => 'papiu/images/con nguoi.jpg',
            ],
            [
                'original_url' => 'papiu/images/am thuc.jpg',
                'thumbnail_url' => 'papiu/images/am thuc.jpg',
            ],
        ];
        $panel =[
            ["title" => 'CẢNH QUAN', "alt" => 'overview', 'type' => ConfigCms::TYPE_HOME_CMS, 'key' => ImageCms::KEY_HOME_EXPERIENCE_SPECIAL_CMS,
                'description' => "P'apiu ẩn mình giữa non cao Hà Giang hùng vĩ. Đắm chìm giữa biển mây và đại ngàn nguyên sơ thuần khiết.",
                'en' => [
                    "title" => 'VIEW', "alt" => 'overview',
                    'description' => "P'apiu is hidden among the majestic high mountains of Ha Giang.
                     Immerse yourself amidst the sea of clouds and vast pure pristine.",
                ]
            ],
            ["title" => 'CON NGƯỜI/ DỊCH VỤ', "alt" => 'overview', 'type' => ConfigCms::TYPE_HOME_CMS, 'key' => ImageCms::KEY_HOME_EXPERIENCE_SPECIAL_CMS,
                'description' => "P'apiu ẩn mình giữa non cao Hà Giang hùng vĩ. Đắm chìm giữa biển mây và đại ngàn nguyên sơ thuần khiết.",
                'en' => [
                    "title" => 'PEOPLE / SERVICES', "alt" => 'overview',
                    'description' => "100% of people in P'apiu are indigenous people.
                     Being trained with professional services but still retaining the kindness, honesty and pristine",
                ]
            ],
            ["title" => 'ẨM THỰC', "alt" => 'overview', 'type' => ConfigCms::TYPE_HOME_CMS, 'key' => ImageCms::KEY_HOME_EXPERIENCE_SPECIAL_CMS,
                'description' => "P'apiu ẩn mình giữa non cao Hà Giang hùng vĩ. Đắm chìm giữa biển mây và đại ngàn nguyên sơ thuần khiết.",
                'en' => [
                    "title" => 'CUISINE', "alt" => 'overview',
                    'description' => "Immerse yourself in Ha Giang's traditional cultural space with delicious,
                     exotic, 100% natural dishes at P'apiu.",
                ]
            ],
        ];
        foreach ($images as $key => $image) {
            $i = Image::create($image);
            $s = ImageCms::create($panel[$key]);
            $s->imageCms()->detach();
            $s->imageCms()->attach([$i->id], ['image_type' => Image::TYPE_SERVICE_CMS_IMAGE]);
        }

        $this->enableForeignKeys();
    }
}
