<?php

namespace Modules\Cms\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Cms\Entities\ConfigCms;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;

class HomeCmsTableSeeder extends Seeder
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
        ConfigCms::whereIn('type', [ConfigCms::TYPE_HOME_CMS])->delete();
        $configs = [
            // video
            ["key" => ConfigCms::KEY_HOME_VIDEO_BACKGROUND_URL_CMS, "value" => "https://www.capellahotels.com/assets/img/site_images/global/CAP_HQ_16X9.mp4",
                'title' => 'Video', 'type' => ConfigCms::TYPE_HOME_CMS,
                'en' => [
                    'value' =>  "https://www.capellahotels.com/assets/img/site_images/global/CAP_HQ_16X9.mp4",
                    'title' => 'Video'
                ]
            ],
            ["key" => ConfigCms::KEY_HOME_VIDEO_URL_CMS, "value" => "https://www.youtube.com/embed/daZzj_TcibY",
                'title' => 'Video', 'type' => ConfigCms::TYPE_HOME_CMS,
                'en' => [
                    'value' =>  "https://www.youtube.com/embed/daZzj_TcibY",
                    'title' => 'Video'
                ]
            ],
            ["key" => ConfigCms::KEY_HOME_VIDEO_TITLE_CMS, "value" => "P'apiu <br><strong>Lưu kỷ niệm - Dưỡng yêu thương</strong>",
                'title' => 'Video', 'type' => ConfigCms::TYPE_HOME_CMS,
                'en' => [
                    'value' =>  "P'apiu <br><strong>Save memories - Nursing love</strong>",
                    'title' => 'Video'
                ]
            ],
            ["key" => ConfigCms::KEY_HOME_VIDEO_DESCRIPTION_CMS, "value" => "Ẩn mình giữa núi rừng Hà Giang hùng vĩ,
            Khu nghỉ dưỡng P'apiu là điểm đến lý tưởng để tận hưởng phút giây tĩnh lặng và khoảnh khắc ngọt ngào cùng người mình yêu.
             Là sự kết hợp giữa tinh hoa văn hóa bản địa và thiết kế sang trọng trong từng chi tiết.
              P'apiu gồm 3 khu nhà chính với kiến trúc độc, lạ đậm chất văn hóa Hà Giang cùng dịch vụ đẳng cấp, chu đáo.
               P'apiu mang đến cho du khách trải nghiệm riêng tư khác biệt và độc nhất tại Đông Nam Á",
                'title' => 'Video', 'type' => ConfigCms::TYPE_HOME_CMS,
                'en' => [
                    'value' => "Nestled amidst the majestic Ha Giang mountains,
                     P'apiu Resort is an ideal destination to enjoy quiet moments and sweet moments with your loved one.
                  A combination of quintessence of indigenous culture and luxurious design in every detail.
                   P'apiu consists of 3 main buildings with unique and unique architecture imbued with Ha Giang culture and high-class and thoughtful services.
                    P'apiu offers travelers a unique and unique privacy experience in Southeast Asia",
                    'title' => 'Video'
                ]
            ],
            ["key" => ConfigCms::KEY_HOME_VIDEO_BRIEF_CMS, "value" => "Ẩn mình giữa núi rừng Hà Giang hùng vĩ,
            Khu nghỉ dưỡng P'apiu là điểm đến lý tưởng để tận hưởng phút giây tĩnh lặng và khoảnh khắc ngọt ngào cùng người mình yêu.
             Là sự kết hợp giữa tinh hoa văn hóa bản địa và thiết kế sang trọng trong từng chi tiết.
              P'apiu gồm 3 khu nhà chính với kiến trúc độc, lạ đậm chất văn hóa Hà Giang cùng dịch vụ đẳng cấp, chu đáo.
               P'apiu mang đến cho du khách trải nghiệm riêng tư khác biệt và độc nhất tại Đông Nam Á",
                'title' => 'Video', 'type' => ConfigCms::TYPE_HOME_CMS,
                'en' => [
                    'value' => "Nestled amidst the majestic Ha Giang mountains,
                     P'apiu Resort is an ideal destination to enjoy quiet moments and sweet moments with your loved one.
                  A combination of quintessence of indigenous culture and luxurious design in every detail.
                   P'apiu consists of 3 main buildings with unique and unique architecture imbued with Ha Giang culture and high-class and thoughtful services.
                    P'apiu offers travelers a unique and unique privacy experience in Southeast Asia",
                    'title' => 'Video'
                ]
            ],

            //many product
            ["key" => ConfigCms::KEY_HOME_MANY_PRODUCT_TITLE_CMS, "value" => "CÁC LỰA CHỌN NGHỈ DƯỠNG TẠI P'APIU",
                'title' => 'Many Products', 'type' => ConfigCms::TYPE_HOME_CMS,
                'en' => [
                    'value' => "P’APIU HOUSES",
                    'title' => 'Many Products'
                ]
            ],
            ["key" => ConfigCms::KEY_HOME_MANY_PRODUCT_DESCRIPTION_CMS, "value" => "Là sự kết hợp giữa tinh hoa văn hóa bản địa và
             thiết kế sang trọng trong từng chi tiết . P'apiu được xây dựng gồm 3 khu nhà chính với những trải nghiệm khác biệt và riêng tư độc nhất.",
                'title' => 'Many Products', 'type' => ConfigCms::TYPE_HOME_CMS,
                'en' => [
                    'value' => "A combination of quintessence of indigenous culture and luxurious design in every detail.
                     P'apiu is built with 3 main houses with different experiences and unique privacy.",
                    'title' => 'Many Products'
                ]
            ],

            // image hashtag
            ["key" => ConfigCms::KEY_HOME_EXPERIENCE_IMAGES_TITLE_CMS, "value" => "HÌNH ẢNH <br> TRẢI NGHIỆM",
                'title' => 'Experience Pictures', 'type' => ConfigCms::TYPE_HOME_CMS,
                'en' => [
                    'value' => "EXPERIENCE <br> PICTURES",
                    'title' => 'Experience Pictures'
                ]
            ],
            ["key" => ConfigCms::KEY_HOME_EXPERIENCE_IMAGES_DESCRIPTION_CMS, "value" => "Chia sẻ những khoảnh khắc hạnh phúc của bạn cùng P’apiu,
             tạo nên những dấu ấn thật đáng nhớ.",
                'title' => 'Experience Pictures', 'type' => ConfigCms::TYPE_HOME_CMS,
                'en' => [
                    'value' => "Share your happy moments with P’apiu, create memorable memories.",
                    'title' => 'Experience Pictures'
                ]
            ],

            // experience special
            ["key" => ConfigCms::KEY_HOME_EXPERIENCE_SPECIAL_TITLE_CMS, "value" => "TRẢI NGHIỆM<br> ĐẶC TRƯNG",
                'title' => 'Experience Special', 'type' => ConfigCms::TYPE_HOME_CMS,
                'en' => [
                    'value' => "EXPERIENCE <br> SPECIAL",
                    'title' => 'Experience Special'
                ]
            ],
            ["key" => ConfigCms::KEY_HOME_EXPERIENCE_SPECIAL_DESCRIPTION_CMS, "value" => "Khu nghỉ dưỡng P'apiu là
            điểm đến riêng tư với những trải nghiệm có một không hai. Sẽ là nơi lưu giữ những kỷ niệm đẹp,
             khoảnh khắc đặc biệt nhất trong đời của các cặp đôi.",
                'title' => 'Experience Special', 'type' => ConfigCms::TYPE_HOME_CMS,
                'en' => [
                    'value' => "P'apiu Resort is a private destination with a unique experience.
                     It will be a place to keep beautiful memories, the most special moments in the life of couples.",
                    'title' => 'Experience Special'
                ]
            ],

        ];

        foreach ($configs as $config) {
            ConfigCms::create($config);
        }

        $this->enableForeignKeys();
    }
}
