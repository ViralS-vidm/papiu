<?php

namespace Modules\Cms\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Cms\Entities\ConfigCms;
use Modules\Cms\Entities\ImageCms;
use Modules\Cms\Entities\ImageCmsTranslation;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;
use Modules\Image\Entities\Image;

class GalleryCmsTableSeeder extends Seeder
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
        ConfigCms::whereIn('type', [ConfigCms::TYPE_GALLERY_CMS])->delete();
        $configs = [
            // header
            ["key" => ConfigCms::KEY_GALLERY_HEADER_DESCRIPTION_CMS,
                "value" => "Bỏ lại không gian và thời gian, tới P'apiu và hòa mình vào thiên nhiên kỳ vĩ,
                 đắm chìm trong khoảnh khắc tĩnh lặng riêng tư đặc biệt cùng người mình yêu thương.",
                'title' => 'Gallery', 'type' => ConfigCms::TYPE_GALLERY_CMS,
                'en' => [
                    'value' =>  "Leaving space and time, go to P'apiu and immerse yourself in the magnificent nature,
                     immersed in special moments of quiet quiet with your loved one.",
                    'title' => 'Gallery'
                ]
            ],

            //image
            ["key" => ConfigCms::KEY_GALLERY_NATURE_CMS,"value" => "THIÊN NHIÊN",
                'title' => 'Gallery Image', 'type' => ConfigCms::TYPE_GALLERY_CMS,
                'en' => [
                    'value' => "NATURE",
                    'title' => 'Gallery Image'
                ]
            ],
            ["key" => ConfigCms::KEY_GALLERY_ARCHITECTURE_CMS,"value" => "KIẾN TRÚC",
                'title' => 'Gallery Image', 'type' => ConfigCms::TYPE_GALLERY_CMS,
                'en' => [
                    'value' => "ARCHITECTURE",
                    'title' => 'Gallery Image'
                ]
            ],
            ["key" => ConfigCms::KEY_GALLERY_FOOD_CMS,"value" => "ẨM THỰC",
                'title' => 'Gallery Image', 'type' => ConfigCms::TYPE_GALLERY_CMS,
                'en' => [
                    'value' => "FOOD",
                    'title' => 'Gallery Image'
                ]
            ],
            ["key" => ConfigCms::KEY_GALLERY_PEOPLE_CMS,"value" => "CON NGƯỜI/VĂN HÓA",
                'title' => 'Gallery Image', 'type' => ConfigCms::TYPE_GALLERY_CMS,
                'en' => [
                    'value' => "PEOPLE / CULTURES",
                    'title' => 'Gallery Image'
                ]
            ],
        ];

        $images = ImageCms::whereIn('type', [ConfigCms::TYPE_GALLERY_CMS])->get();
        foreach ($images as $img) {
            $img->imageCms()->detach();
            $img->delete();
        }
        ImageCmsTranslation::whereIn('image_cms_id', $images->pluck('id'))->delete();

        foreach ($configs as $config) {
            ConfigCms::create($config);
        }

        $image =[
                'original_url' => 'papiu/images/food.png',
                'thumbnail_url' => 'papiu/images/food.png',
            ];
        $imageCms =[
            ["title" => 'THIÊN NHIÊN', "alt" => 'love_bridge', 'type' => ConfigCms::TYPE_GALLERY_CMS, 'key' => ImageCms::KEY_GALLERY_NATURE_CMS,
                'name' => 'Cầu Tình Yêu','description' => "Một Hà Giang hùng vĩ và nguyên sơ nhìn từ đỉnh núi Yolo Mount",
                'en' => [
                    "title" => 'NATURE', "alt" => 'love_bridge',
                    'name' => 'Love Bridge','description' => "A majestic and majestic Ha Giang viewed from the top of Yolo Mount",
                ]
            ],
            ["title" => 'THIÊN NHIÊN', "alt" => 'the_mellow', 'type' => ConfigCms::TYPE_GALLERY_CMS, 'key' => ImageCms::KEY_GALLERY_NATURE_CMS,
                'name' => 'The Mellow','description' => "Hòa mình vào giây phút thanh tịnh nên thơ giữa biển mây từ cầu tình yêu",
                'en' => [
                    "title" => 'NATURE', "alt" => 'the_mellow',
                    'name' => 'The Mellow','description' => "Immerse yourself in the moment of pure poetic poetry in the sea of clouds from love",
                ]
            ],
            ["title" => 'THIÊN NHIÊN', "alt" => 'the_fluffy', 'type' => ConfigCms::TYPE_GALLERY_CMS, 'key' => ImageCms::KEY_GALLERY_NATURE_CMS,
                'name' => 'The Fluffy','description' => "Nhâm nhi ly trà hoa cúc thanh mát và ngắm nhìn con thác hùng vĩ nhất nhì Hà Giang từ sân thượng khu nhà The Mellow",
                'en' => [
                    "title" => 'NATURE', "alt" => 'the_fluffy',
                    'name' => 'The Fluffy','description' => "Sip a chrysanthemum tea cup and watch the most majestic waterfall of Ha Giang from the rooftop of The Mellow building",
                ]
            ],
            ["title" => 'THIÊN NHIÊN', "alt" => 'layla_qays', 'type' => ConfigCms::TYPE_GALLERY_CMS, 'key' => ImageCms::KEY_GALLERY_NATURE_CMS,
                'name' => 'Layla Qays','description' => "Hòa mình vào hương hoa nguyệt quế, ngắm nhìn ngọn núi Khau Ka hùng vĩ tại ngôi nhà trên cây",
                'en' => [
                    "title" => 'NATURE', "alt" => 'layla_qays',
                    'name' => 'Layla Qays','description' => "Immerse yourself in the scent of laurel, watch the majestic Khau Ka mountain at the tree house",
                ]
            ],
        ];
        $i = Image::create($image);
        foreach ($imageCms as $key => $image) {
            $s = ImageCms::create($image);
            $s->imageCms()->detach();
            $s->imageCms()->attach([$i->id], ['image_type' => Image::TYPE_SERVICE_CMS_IMAGE]);
        }

        $image = [
                'original_url' => 'papiu/images/imgHome1.jpg',
                'thumbnail_url' => 'papiu/images/imgHome1.jpg',
            ];
        $imageCms =[
            ["title" => 'KIẾN TRÚC', "alt" => 'stilt_house', 'type' => ConfigCms::TYPE_GALLERY_CMS, 'key' => ImageCms::KEY_GALLERY_ARCHITECTURE_CMS,
                'name' => 'Nhà Sàn Người Mông','description' => "Khám phá cuộc sống người Mông với kiến trúc nhà trình tường độc đáo",
                'en' => [
                    "title" => 'ARCHITECTURE', "alt" => 'stilt_house',
                    'name' => 'Mong Stilt House','description' => "Discover Mong people 's life with unique wall constructions",
                ]
            ],
            ["title" => 'KIẾN TRÚC', "alt" => 'green_house', 'type' => ConfigCms::TYPE_GALLERY_CMS, 'key' => ImageCms::KEY_GALLERY_ARCHITECTURE_CMS,
                'name' => 'Nhà Kính Fluffy','description' => "Không chạy theo bất kỳ xu hướng nào,
                 nhà kính The Fluffy được lòng du khách bởi thiết kế nhà sàn nguyên sơ nhưng đẹp sang trọng",
                'en' => [
                    "title" => 'ARCHITECTURE', "alt" => 'green_house',
                    'name' => 'Fluffy GreenHouse','description' => "Not following any trend,
                     The Fluffy greenhouse is pleasing to visitors by its pristine but beautiful luxurious floor design.",
                ]
            ],
            ["title" => 'KIẾN TRÚC', "alt" => 'tunnel_house', 'type' => ConfigCms::TYPE_GALLERY_CMS, 'key' => ImageCms::KEY_GALLERY_ARCHITECTURE_CMS,
                'name' => 'Nhà Hầm Layla Qays','description' => "Lưu giữ khoảnh khắc thăng hoa cùng người thương tại hầm kỷ niệm",
                'en' => [
                    "title" => 'ARCHITECTURE', "alt" => 'tunnel_house',
                    'name' => 'Layla Qays House','description' => "Save sublimation moments with your loved ones in the memorial bunker",
                ]
            ],
        ];
        $i = Image::create($image);
        foreach ($imageCms as $key => $image) {
            $s = ImageCms::create($image);
            $s->imageCms()->detach();
            $s->imageCms()->attach([$i->id], ['image_type' => Image::TYPE_SERVICE_CMS_IMAGE]);
        }

        $images = [
            [
                'original_url' => 'papiu/images/food.png',
                'thumbnail_url' => 'papiu/images/food.png',
            ],
            [
                'original_url' => 'papiu/images/amthuc.png',
                'thumbnail_url' => 'papiu/images/amthuc.png',
            ]
        ];
        $imageCms =[
            ["title" => 'ẨM THỰC', "alt" => 'organic', 'type' => ConfigCms::TYPE_GALLERY_CMS, 'key' => ImageCms::KEY_GALLERY_FOOD_CMS,
                'name' => 'Hữu cơ', 'description' => "Khám phá nét đặc trưng Hà Giang trong văn hóa ấm thực P'apiu ngon, lạ và 100% organic",
                'en' => [
                    "title" => 'FOOD', "alt" => 'organic',
                    'name' => 'Organic','description' => "Discover the characteristics of Ha Giang in the delicious, strange and 100% organic P'apiu culture",
                ]
            ],
            ["title" => 'ẨM THỰC', "alt" => 'garden', 'type' => ConfigCms::TYPE_GALLERY_CMS, 'key' => ImageCms::KEY_GALLERY_FOOD_CMS,
                'name' => 'Vườn rau','description' => "Vườn rau sách được chăm chút từ bàn tay của những người dân tộc chăm chỉ, cẩn thận trong từng chi tiết",
                'en' => [
                    "title" => 'FOOD', "alt" => 'garden',
                    'name' => 'Garden','description' => "Vegetable garden is carefully cared from the hands of the industrious ethnic people, careful in every detail",
                ]
            ],
        ];
        foreach ($images as $key => $image) {
            $i = Image::create($image);
            $s = ImageCms::create($imageCms[$key]);
            $s->imageCms()->detach();
            $s->imageCms()->attach([$i->id], ['image_type' => Image::TYPE_SERVICE_CMS_IMAGE]);
        }

        $images = [
            [
                'original_url' => 'papiu/images/connguoi.png',
                'thumbnail_url' => 'papiu/images/connguoi.png',
            ],
            [
                'original_url' => 'papiu/images/amthuc.png',
                'thumbnail_url' => 'papiu/images/amthuc.png',
            ],
            [
                'original_url' => 'papiu/images/amthuc.png',
                'thumbnail_url' => 'papiu/images/amthuc.png',
            ],
            [
                'original_url' => 'papiu/images/amthuc.png',
                'thumbnail_url' => 'papiu/images/amthuc.png',
            ],
            [
                'original_url' => 'papiu/images/amthuc.png',
                'thumbnail_url' => 'papiu/images/amthuc.png',
            ],
            [
                'original_url' => 'papiu/images/Rectangle10.png',
                'thumbnail_url' => 'papiu/images/Rectangle10.png',
            ],
        ];
        $imageCms =[
            ["title" => 'CON NGƯỜI/VĂN HÓA', "alt" => 'human', 'type' => ConfigCms::TYPE_GALLERY_CMS, 'key' => ImageCms::KEY_GALLERY_PEOPLE_CMS,
                'name' => 'Con người', 'description' => "Con người P'apiu được đào tạo chuyên nghiệp nhưng vẫn giữ được nét hồn hậu, thật thà, nguyên sơ",
                'en' => [
                    "title" => 'PEOPLE / CULTURES', "alt" => 'human',
                    'name' => 'Human','description' => "P'apiu people are professionally trained but still retain the kindness, honesty, pristine",
                ]
            ],
            ["title" => 'CON NGƯỜI/VĂN HÓA', "alt" => 'game', 'type' => ConfigCms::TYPE_GALLERY_CMS, 'key' => ImageCms::KEY_GALLERY_PEOPLE_CMS,
                'name' => 'Trò chơi','description' => "Tìm hiểu nét văn hóa người Hà Giang với các trò chơi dân gian độc đáo",
                'en' => [
                    "title" => 'PEOPLE / CULTURES', "alt" => 'game',
                    'name' => 'Game','description' => "Learn about Ha Giang culture with unique folk games",
                ]
            ],
            ["title" => 'CON NGƯỜI/VĂN HÓA', "alt" => 'native', 'type' => ConfigCms::TYPE_GALLERY_CMS, 'key' => ImageCms::KEY_GALLERY_PEOPLE_CMS,
                'name' => 'Bản địa','description' => "Khám phá bản người Dao cùng văn hóa bản địa với hành trình đi xe máy từ P'apiu",
                'en' => [
                    "title" => 'PEOPLE / CULTURES', "alt" => 'native',
                    'name' => 'Native','description' => "Discovering the Dao village and indigenous culture with a motorbike journey from P'apiu",
                ]
            ],
            ["title" => 'CON NGƯỜI/VĂN HÓA', "alt" => 'art_gallery', 'type' => ConfigCms::TYPE_GALLERY_CMS, 'key' => ImageCms::KEY_GALLERY_PEOPLE_CMS,
                'name' => 'Phòng Tranh','description' => "Ngắm nhìn một Hà Giang rất khác trong mắt trẻ thơ tại Art Gallery chỉ có tại P'apiu",
                'en' => [
                    "title" => 'PEOPLE / CULTURES', "alt" => 'art_gallery',
                    'name' => 'Art Gallery','description' => "See a very different Ha Giang in the eyes of children at Art Gallery only at P'apiu",
                ]
            ],
            ["title" => 'CON NGƯỜI/VĂN HÓA', "alt" => 'zipline', 'type' => ConfigCms::TYPE_GALLERY_CMS, 'key' => ImageCms::KEY_GALLERY_PEOPLE_CMS,
                'name' => 'Zipline','description' => "Trải nghiệm cảm giác mạnh với đường trượt Zipline",
                'en' => [
                    "title" => 'PEOPLE / CULTURES', "alt" => 'zipline',
                    'name' => 'Zipline','description' => "Experience thrills with Zipline slider",
                ]
            ],
            ["title" => 'CON NGƯỜI/VĂN HÓA', "alt" => 'couple', 'type' => ConfigCms::TYPE_GALLERY_CMS, 'key' => ImageCms::KEY_GALLERY_PEOPLE_CMS,
                'name' => 'Cập đôi','description' => "Bỏ lại sau lưng những ồn ào phố thị, tìm về chốn riêng tư để tận hưởng khoảnh khắc thăng hoa và lãng mạn",
                'en' => [
                    "title" => 'PEOPLE / CULTURES', "alt" => 'couple',
                    'name' => 'Couple','description' => "Leaving the hustle and bustle of the city behind, find a private place to enjoy the sublimation and romance",
                ]
            ],
        ];
        foreach ($images as $key => $image) {
            $i = Image::create($image);
            $s = ImageCms::create($imageCms[$key]);
            $s->imageCms()->detach();
            $s->imageCms()->attach([$i->id], ['image_type' => Image::TYPE_SERVICE_CMS_IMAGE]);
        }

        $this->enableForeignKeys();
    }
}
