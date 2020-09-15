<?php

namespace Modules\Cms\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Cms\Entities\ConfigCms;
use Modules\Cms\Entities\ImageCms;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;
use Modules\Image\Entities\Image;

class ProductCmsTableSeeder extends Seeder
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
        ConfigCms::whereIn('type', [ConfigCms::TYPE_PRODUCT_CMS])->delete();
        $configs = [
            // overview
            ["key" => ConfigCms::KEY_PRODUCT_OVER_VIEW_DESCRIPTION_CMS,
                "value" => "Không chỉ được đắm chìm trong thiên nhiên hùng vĩ và tận hưởng giây phút tĩnh lặng, thăng hoa;
                 P'apiu còn là nơi mang đến cho du khách những trải nghiệm có một không hai như tham quan bản người Dao,
                  chơi trò chơi dân gian với người bản địa, ngủ ngoài trời sao, con đường thổ cẩm,
                   đi bộ trong rừng hay thăm nguồn nước dưới lòng đất và những trải nghiệm khó quên khác.",
                'title' => 'Product Overview', 'type' => ConfigCms::TYPE_PRODUCT_CMS,
                'en' => [
                    'value' =>  "Not only immersed in the majestic nature and enjoy moments of tranquility, sublimation;
                     P'apiu is also a place that gives visitors a unique experience such as visiting the Dao village,
                      playing folk games with the indigenous people, sleeping outdoors, brocade paths,
                       walking in the forest or Visit underground water sources and other unforgettable experiences.",
                    'title' => 'Product Overview'
                ]
            ],
            ["key" => ConfigCms::KEY_PRODUCT_OVER_VIEW_SLOGAN_CMS, "value" => "P'apiu <strong>Lưu kỷ niệm - Dưỡng yêu thương</strong>",
                'title' => 'Product Overview', 'type' => ConfigCms::TYPE_PRODUCT_CMS,
                'en' => [
                    'value' =>  "P'apiu <strong>Save memories - Nursing love</strong>.",
                    'title' => 'Product Overview'
                ]
            ],
            ["key" => ConfigCms::KEY_PRODUCT_OVER_VIEW_LINK_LABEL_CMS, "value" => "TRẢI NGHIỆM VR TOUR",
                'title' => 'Product Overview', 'type' => ConfigCms::TYPE_PRODUCT_CMS,
                'en' => [
                    'value' =>  "EXPERIENCE VR TOUR",
                    'title' => 'Product Overview'
                ]
            ],
            ["key" => ConfigCms::KEY_PRODUCT_OVER_VIEW_LINK_URL_CMS, "value" => "#",
                'title' => 'Product Overview', 'type' => ConfigCms::TYPE_PRODUCT_CMS,
                'en' => [
                    'value' =>  "#",
                    'title' => 'Product Overview'
                ]
            ],

            //product detail
            ["key" => ConfigCms::KEY_PRODUCT_DETAIL_WELCOME_TITLE_CMS, "value" => "ĐẾN VỚI P’APIU",
                'title' => 'Product Detail', 'type' => ConfigCms::TYPE_PRODUCT_DETAIL_CMS,
                'en' => [
                    'value' =>  "COME TO P’APIU",
                    'title' => 'Product Detail'
                ]
            ],
            ["key" => ConfigCms::KEY_PRODUCT_DETAIL_WELCOME_BRIEF_CMS, "value" => "Cùng tận hưởng những trải nghiệm khó quên",
                'title' => 'Product Detail', 'type' => ConfigCms::TYPE_PRODUCT_DETAIL_CMS,
                'en' => [
                    'value' =>  "Enjoy the unforgettable experience together",
                    'title' => 'Product Detail'
                ]
            ],
            ["key" => ConfigCms::KEY_PRODUCT_DETAIL_WELCOME_DESCRIPTION_CMS, "value" => "Không chỉ được đắm chìm trong thiên nhiên hùng vĩ và
             tận hưởng giây phút tĩnh lặng, thăng hoa; P'apiu còn là nơi mang đến cho du khách những trải nghiệm
              có một không hai như tham quan bản người Dao, chơi trò chơi dân gian với người bản địa, ngủ ngoài trời sao,
               con đường thổ cẩm, đi bộ trong rừng hay thăm nguồn nước dưới lòng đất và những trải nghiệm khó quên khác.",
                'title' => 'Product Detail', 'type' => ConfigCms::TYPE_PRODUCT_DETAIL_CMS,
                'en' => [
                    'value' =>  "Not only immersed in the majestic nature and enjoy moments of tranquility, sublimation;
                     P'apiu is also a place that gives visitors a unique experience such as visiting the Dao village,
                      playing folk games with the indigenous people, sleeping outdoors, brocade paths,
                       walking in the forest or Visit underground water sources and other unforgettable experiences.",
                    'title' => 'Product Detail'
                ]
            ],
            ["key" => ConfigCms::KEY_PRODUCT_DETAIL_WELCOME_LINK_LABEL_CMS, "value" => "KHÁM PHÁ THÊM",
                'title' => 'Product Detail', 'type' => ConfigCms::TYPE_PRODUCT_DETAIL_CMS,
                'en' => [
                    'value' =>  "DISCOVER MORE",
                    'title' => 'Product Detail'
                ]
            ],
            ["key" => ConfigCms::KEY_PRODUCT_DETAIL_WELCOME_LINK_URL_CMS, "value" => '#',
                'title' => 'Product Detail', 'type' => ConfigCms::TYPE_PRODUCT_DETAIL_CMS,
                'en' => [
                    'value' =>  '#',
                    'title' => 'Product Detail'
                ]
            ],
        ];

        foreach ($configs as $config) {
            ConfigCms::create($config);
        }

        $images = [
            [
                'original_url' => 'papiu/images/canhquan.png',
                'thumbnail_url' => 'papiu/images/canhquan.png',
            ],
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
        ];
        $imageCms =[
            ["title" => 'ZIPLINE', "alt" => 'zipline', 'type' => ConfigCms::TYPE_PRODUCT_CMS, 'key' => ImageCms::KEY_PRODUCT_EXPERIENCE_SPECIAL_CMS,
                'description' => "Kéo dài từ nhà hàng tới Layla Qays, đường trượt Zipline mang tới trải nghiệm cảm giác mạnh có một không hai tại P'apiu",
                'en' => [
                    "title" => 'ZIPLINE', "alt" => 'zipline',
                    'description' => "Stretching from the restaurant to Layla Qays, the Zipline slide provides a unique thrilling experience at P'apiu",
                ]
            ],
            ["title" => 'YOLO MOUNT', "alt" => 'yolo_mount', 'type' => ConfigCms::TYPE_PRODUCT_CMS, 'key' => ImageCms::KEY_PRODUCT_EXPERIENCE_SPECIAL_CMS,
                'description' => "Nằm ở hướng tây, Yolo Mount là địa điểm lý tưởng để ngắm hoàng hôn mỗi chiều tà.
                 Cùng người thương đắm chìm trong biển mây và thiên nhiên kỳ vĩ.",
                'en' => [
                    "title" => 'YOLO MOUNT', "alt" => 'yolo_mount',
                    'description' => "Located in the west, Yolo Mount is the ideal place to watch the sunset every afternoon.
                     With your loved ones immersed in the sea of clouds and magnificent nature.",
                ]
            ],
            ["title" => 'ẨM THỰC', "alt" => 'cuisine', 'type' => ConfigCms::TYPE_PRODUCT_CMS, 'key' => ImageCms::KEY_PRODUCT_EXPERIENCE_SPECIAL_CMS,
                'description' => "Không chỉ đơn thuần là những món ăn đậm chất Hà Giang,
                 ẩm thực P'apiu còn lưu giữ tinh túy từ thiên nhiên, 100% sạch tự nhiên mang lại cảm giác ngon, lạ không thể quên",
                'en' => [
                    "title" => 'CUISINE', "alt" => 'cuisine',
                    'description' => "Not only is Ha Giang's rich dishes, P'apiu cuisine also preserves the essence of nature,
                     100% natural clean brings a strange, delicious and unforgettable feeling.",
                ]
            ],
            ["title" => 'FOOT MASSAGE', "alt" => 'foot_massage', 'type' => ConfigCms::TYPE_PRODUCT_CMS, 'key' => ImageCms::KEY_PRODUCT_EXPERIENCE_SPECIAL_CMS,
                'description' => "Tận hưởng giây phút thư giãn với dịch vụ Foot Massage từ người dân bản địa có tay nghề cao.",
                'en' => [
                    "title" => 'FOOT MASSAGE', "alt" => 'foot_massage',
                    'description' => "Enjoy a relaxing moment with the Foot Massage service from skilled indigenous people.",
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
