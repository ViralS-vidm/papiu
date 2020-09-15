<?php

namespace Modules\Cms\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Cms\Entities\ConfigCms;
use Modules\Cms\Entities\ImageCms;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;
use Modules\Image\Entities\Image;

class ImageCmsTableSeeder extends Seeder
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
        $images = ImageCms::all();
        foreach ($images as $img) {
            $img->imageCms()->detach();
        }

        $this->truncate('image_cms');
        $this->truncate('image_cms_translations');

        $services = [
            ["description" => 'Hình ảnh đầu tiên', "alt" => 'Hinh-anh-1', 'type' => ConfigCms::TYPE_SERVICE_CMS, 'key' => ImageCms::KEY_SERVICE_CMS,
                'en' => [
                    "description" => 'The first image', "alt" => 'Image-1',
                ]
            ],
            ["description" => 'Hình ảnh thứ hai', "alt" => 'Hinh-anh-2', 'type' => ConfigCms::TYPE_SERVICE_CMS, 'key' => ImageCms::KEY_SERVICE_CMS,
                'en' => [
                    "description" => 'The second image', "alt" => 'Image-2',
                ]
            ],
            ["description" => 'Hình ảnh thứ ba', "alt" => 'Hinh-anh-3', 'type' => ConfigCms::TYPE_SERVICE_CMS, 'key' => ImageCms::KEY_SERVICE_CMS,
                'en' => [
                    "description" => 'The third image', "alt" => 'Image-3',
                ]
            ],
        ];

        $imageDetails = Image::first();
        foreach ($services as $service) {
            $s = ImageCms::create($service);
            $s->imageCms()->detach();
            if ($imageDetails) {
                $s->imageCms()->attach([1], ['image_type' => Image::TYPE_SERVICE_CMS_IMAGE]);
                if ($s->id == 4) {
                    $s->imageCms()->attach([2, 3, 4, 5], ['image_type' => Image::TYPE_SERVICE_CMS_IMAGE]);
                }
            }
        }

        $introductions = [
            // service utilities
            ["description" => 'Zipline', "alt" => 'zipline', 'title' => 'ZIPLINE',
                'type' => ConfigCms::TYPE_INTRODUCE_CMS, 'key' => ImageCms::KEY_INTRODUCTION_SERVICE_UTILITIES,
                'en' => [
                    "description" => 'Zipline', "alt" => 'zipline', 'title' => 'ZIPLINE',
                ]
            ],
            ["description" => 'Massage chân', "alt" => 'foot_massage', 'title' => 'FOOT MASSAGE',
                'type' => ConfigCms::TYPE_INTRODUCE_CMS, 'key' => ImageCms::KEY_INTRODUCTION_SERVICE_UTILITIES,
                'en' => [
                    "description" => 'Foot Massage', "alt" => 'foot_massage', 'title' => 'FOOT MASSAGE',
                ]
            ],
            ["description" => 'Dịch vụ Cầu hôn', "alt" => 'marries', 'title' => 'DỊCH VỤ CẦU HÔN',
                'type' => ConfigCms::TYPE_INTRODUCE_CMS, 'key' => ImageCms::KEY_INTRODUCTION_SERVICE_UTILITIES,
                'en' => [
                    "description" => 'Marriage Service', "alt" => 'marries', 'title' => 'MARRIAGE SERVICE',
                ]
            ],
            ["description" => 'Đêm tối không đèn', "alt" => 'dark', 'title' => 'TRẢI NGHIỆM ĐÊM TỐI KHÔNG ÁNH ĐÈN',
                'type' => ConfigCms::TYPE_INTRODUCE_CMS, 'key' => ImageCms::KEY_INTRODUCTION_SERVICE_UTILITIES,
                'en' => [
                    "description" => 'Foot Massage', "alt" => 'dark', 'title' => 'EXPERIENCE THE DARKNESS WITH NO LIGHT',
                ]
            ],

            //review
            ["description" => 'ivivu.com', "alt" => 'ivivu.com', 'title' => 'ivivu.com',
                'type' => ConfigCms::TYPE_INTRODUCE_CMS, 'key' => ImageCms::KEY_INTRODUCTION_REVIEW,
                'en' => [
                    "description" => 'ivivu.com', "alt" => 'ivivu.com', 'title' => 'ivivu.com',
                ]
            ],
            ["description" => 'agoda', "alt" => 'agoda', 'title' => 'agoda',
                'type' => ConfigCms::TYPE_INTRODUCE_CMS, 'key' => ImageCms::KEY_INTRODUCTION_REVIEW,
                'en' => [
                    "description" => 'agoda', "alt" => 'agoda', 'title' => 'agoda',
                ]
            ],
            ["description" => 'booking.com', "alt" => 'booking.com', 'title' => 'booking.com',
                'type' => ConfigCms::TYPE_INTRODUCE_CMS, 'key' => ImageCms::KEY_INTRODUCTION_REVIEW,
                'en' => [
                    "description" => 'booking.com', "alt" => 'booking.com', 'title' => 'booking.com',
                ]
            ],
        ];
        $imageIntroductions =[
            //service utilities
            [
                'original_url' => 'papiu/images/zipline.jpg',
                'thumbnail_url' => 'papiu/images/zipline.jpg',
            ],
            [
                'original_url' => 'papiu/images/foot-massage.jpg',
                'thumbnail_url' => 'papiu/images/foot-massage.jpg',
            ],
            [
                'original_url' => 'papiu/images/cau-hon1.jpg',
                'thumbnail_url' => 'papiu/images/cau-hon1.jpg',
            ],
            [
                'original_url' => 'papiu/images/dem-toi-khong-den1.jpg',
                'thumbnail_url' => 'papiu/images/dem-toi-khong-den1.jpg',
            ],

            //review
            [
                'original_url' => 'papiu/images/ivivu-com-logo.png',
                'thumbnail_url' => 'papiu/images/ivivu-com-logo.png',
            ],
            [
                'original_url' => 'papiu/images/logo-agoda-com-hotel-brand-travel-agent-hotel-thumbnail.jpg',
                'thumbnail_url' => 'papiu/images/logo-agoda-com-hotel-brand-travel-agent-hotel-thumbnail.jpg',
            ],
            [
                'original_url' => 'papiu/images/booking-logo-300x166.png',
                'thumbnail_url' => 'papiu/images/booking-logo-300x166.png',
            ],
        ];

        foreach ($imageIntroductions as $key => $image) {
            $i = Image::create($image);
            $s = ImageCms::create($introductions[$key]);
            $s->imageCms()->detach();
            $s->imageCms()->attach([$i->id], ['image_type' => Image::TYPE_SERVICE_CMS_IMAGE]);
        }

        $sites = [
            ["description" => 'background', "alt" => 'overview', 'type' => ConfigCms::TYPE_SITE_SETTING_CMS, 'key' => ImageCms::KEY_SITE_BACKGROUND,
                'en' => [
                    "description" => 'background', "alt" => 'overview',
                ]
            ],
            ["description" => 'logo', "alt" => 'overview', 'type' => ConfigCms::TYPE_SITE_SETTING_CMS, 'key' => ImageCms::KEY_SITE_LOGO,
                'en' => [
                    "description" => 'logo', "alt" => 'overview',
                ]
            ],
            ["description" => 'logo_white', "alt" => 'overview', 'type' => ConfigCms::TYPE_SITE_SETTING_CMS, 'key' => ImageCms::KEY_SITE_LOGO_WHITE,
                'en' => [
                    "description" => 'logo_white', "alt" => 'overview',
                ]
            ],
        ];
        $logo = Image::create([
            'original_url' => 'papiu/images/Black.png',
            'thumbnail_url' => 'papiu/images/White.png'
        ]);
        $logoCms = ImageCms::create($sites[1]);
        $logoCms->imageCms()->attach([$logo->id],  ['image_type' => Image::TYPE_SERVICE_CMS_IMAGE]);
        $background = Image::create([
            'original_url' => 'papiu/images/Black.png',
            'thumbnail_url' => 'papiu/images/White.png'
        ]);
        $backgroundCms = ImageCms::create($sites[0]);
        $backgroundCms->imageCms()->attach([$background->id],  ['image_type' => Image::TYPE_SERVICE_CMS_IMAGE]);
        $logoWhite = Image::create([
            'original_url' => 'papiu/images/Logo.png',
            'thumbnail_url' => 'papiu/images/logo_book.png'
        ]);
        $logoWhiteCms = ImageCms::create($sites[2]);
        $logoWhiteCms->imageCms()->attach([$logoWhite->id],  ['image_type' => Image::TYPE_SERVICE_CMS_IMAGE]);

        $this->enableForeignKeys();
    }
}
