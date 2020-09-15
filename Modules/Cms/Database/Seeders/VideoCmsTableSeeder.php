<?php

namespace Modules\Cms\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Cms\Entities\ConfigCms;
use Modules\Cms\Entities\VideoCms;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;

class VideoCmsTableSeeder extends Seeder
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

        $images = VideoCms::all();
        foreach ($images as $img) {
            $img->imageCms()->detach();
        }
        $this->truncate('video_cms');
        $this->truncate('video_cms_translations');
        $videos = [
            [
                'key' => VideoCms::KEY_GALLERY_VIDEO_TOP_CMS, 'source' => "https://www.youtube.com/embed/wGVtpiZ32aA",
                'description' => "Bỏ lại không gian và thời gian, tới P'apiu và hòa mình vào thiên nhiên kỳ vĩ,
                 đắm chìm trong khoảnh khắc tĩnh lặng riêng tư đặc biệt cùng người mình yêu thương.",
                'title' => 'Video tiêu đề', 'type' => ConfigCms::TYPE_GALLERY_CMS,
                'en' => [
                    'description' => "Leaving space and time, go to P'apiu and immerse yourself in the magnificent nature,
                         Immerse yourself in a special moment of quiet privacy with the person you love.",
                    'title' => 'Top video',
                ]
            ],
            [
                'key' => VideoCms::KEY_GALLERY_VIDEO_BOTTOM_CMS, 'source' => "https://www.youtube.com/embed/xnxWPrJBxPo",
                'description' => "Bỏ lại sau lưng những ồn ào phố thị, tìm về chốn riêng tư để tận hưởng khoảnh khắc thăng hoa và lãng mạn",
                'title' => 'Video dưới', 'type' => ConfigCms::TYPE_GALLERY_CMS,
                'en' => [
                    'description' => "Leaving the hustle and bustle of the city behind, find a private place to enjoy the uplifting and romantic moments",
                    'title' => 'Bottom video',
                ]
            ],
            [
                'key' => VideoCms::KEY_GALLERY_VIDEO_ORGANIC_CMS, 'source' => "https://www.youtube.com/embed/xnxWPrJBxPo",
                'description' => "Khám phá nét đặc trưng Hà Giang trong văn hóa ấm thực P'apiu ngon, lạ và 100% organic",
                'title' => 'ẨM THỰC', 'type' => ConfigCms::TYPE_GALLERY_CMS, 'name' => 'Hữu cơ',
                'en' => [
                    'description' => "Discover the characteristics of Ha Giang in the delicious, strange and 100% organic P'apiu culture",
                    'title' => 'Food video', 'name' => 'Organic',
                ]
            ],
            [
                'key' => VideoCms::KEY_GALLERY_VIDEO_PEOPLE_CMS, 'source' => "https://www.youtube.com/embed/xnxWPrJBxPo",
                'description' => "Con người P'apiu được đào tạo chuyên nghiệp nhưng vẫn giữ được nét hồn hậu, thật thà, nguyên sơ ",
                'title' => 'CON NGƯỜI/VĂN HÓA', 'type' => ConfigCms::TYPE_GALLERY_CMS, 'name' => 'Con người',
                'en' => [
                    'description' => "P'apiu people are professionally trained but still retain the kindness, honesty, pristine",
                    'title' => 'People video', 'name' => 'People',
                ]
            ],
            [
                'key' => VideoCms::KEY_GALLERY_VIDEO_COUPLE_CMS, 'source' => "https://www.youtube.com/embed/xnxWPrJBxPo",
                'description' => "Bỏ lại sau lưng những ồn ào phố thị, tìm về chốn riêng tư để tận hưởng khoảnh khắc thăng hoa và lãng mạn",
                'title' => 'CON NGƯỜI/VĂN HÓA', 'type' => ConfigCms::TYPE_GALLERY_CMS, 'name' => 'Cặp đôi',
                'en' => [
                    'description' => "Leaving the hustle and bustle of the city behind, find a private place to enjoy the uplifting and romantic moments",
                    'title' => 'People video', 'name' => 'Couple',
                ]
            ],
        ];

        foreach ($videos as $video) {
            VideoCms::create($video);
        }
        $this->enableForeignKeys();
    }
}
