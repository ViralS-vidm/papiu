<?php

namespace Modules\Cms\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Cms\Entities\ConfigCms;

class ExtraBookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $configs = [
            ["key" => ConfigCms::KEY_BOOKING_HOME_TITLE_CMS, "value" => 'ĐẶT PHÒNG <br> NGAY <br> HÔM NAY', 'title' => "", 'type' => ConfigCms::TYPE_HOME_CMS, 'area' => 'Đặt phòng ngay hôm nay',
             'en'  => [
                 'value' => "ORDER <br> NOW <br> TODAY", "area" => 'Order now today',
                 'title' => ""
             ]
            ],
            ["key" => ConfigCms::KEY_BOOKING_HOME_DESCRIPTION_CMS, "value" => "Đặt phòng ngay để tận hưởng những giây phút thăng hoa, riêng tư đặc biệt tại P'apiu", 'title' => "", 'type' => ConfigCms::TYPE_HOME_CMS, 'area' => 'Đặt phòng ngay hôm nay',
             'en'  => [
                 'value' => "Book now to enjoy special sublimation moments in P'apiu", "area" => 'Order now today',
                 'title' => ""
             ]
            ],
            ["key" => ConfigCms::KEY_BOOKING_HOME_LINK_LABEL_CMS, "value" => "ĐẶT PHÒNG NGAY", 'title' => "", 'type' => ConfigCms::TYPE_HOME_CMS, 'area' => 'Đặt phòng ngay hôm nay',
             'en'  => [
                 'value' => "ORDER NOW", "area" => 'Order now today',
                 'title' => ""
             ]
            ],
            ["key" => ConfigCms::KEY_BOOKING_HOME_LINK_URL_CMS, "value" => url('/book'), 'title' => "", 'type' => ConfigCms::TYPE_HOME_CMS, 'area' => 'Đặt phòng ngay hôm nay',
             'en'  => [
                 'value' => url('/book'), "area" => 'Order now today',
                 'title' => ""
             ]
            ],
            ["key" => ConfigCms::KEY_BOOKING_PRODUCT_LIST_TITLE_CMS, "value" => 'ĐẶT PHÒNG <br> NGAY <br> HÔM NAY', 'title' => "", 'type' => ConfigCms::TYPE_PRODUCT_CMS, 'area' => 'Đặt phòng ngay hôm nay',
             'en'  => [
                 'value' => "ORDER <br> NOW <br> TODAY", "area" => 'Order now today',
                 'title' => ""
             ]
            ],
            ["key" => ConfigCms::KEY_BOOKING_PRODUCT_LIST_DESCRIPTION_CMS, "value" => "Đặt phòng ngay để tận hưởng những giây phút thăng hoa, riêng tư đặc biệt tại P'apiu", 'title' => "", 'type' => ConfigCms::TYPE_PRODUCT_CMS, 'area' => 'Đặt phòng ngay hôm nay',
             'en'  => [
                 'value' => "Book now to enjoy special sublimation moments in P'apiu", "area" => 'Order now today',
                 'title' => ""
             ]
            ],
            ["key" => ConfigCms::KEY_BOOKING_PRODUCT_LIST_LINK_LABEL_CMS, "value" => "ĐẶT PHÒNG NGAY", 'title' => "", 'type' => ConfigCms::TYPE_PRODUCT_CMS, 'area' => 'Đặt phòng ngay hôm nay',
             'en'  => [
                 'value' => "ORDER NOW", "area" => 'Order now today',
                 'title' => ""
             ]
            ],
            ["key" => ConfigCms::KEY_BOOKING_PRODUCT_LIST_LINK_URL_CMS, "value" => url('/book'), 'title' => "", 'type' => ConfigCms::TYPE_PRODUCT_CMS, 'area' => 'Đặt phòng ngay hôm nay',
             'en'  => [
                 'value' => url('/book'), "area" => 'Order now today',
                 'title' => ""
             ]
            ],
            ["key" => ConfigCms::KEY_BOOKING_OFFER_TITLE_CMS, "value" => 'ĐẶT PHÒNG <br> NGAY <br> HÔM NAY', 'title' => "", 'type' => ConfigCms::TYPE_OFFER_CMS, 'area' => 'Đặt phòng ngay hôm nay',
             'en'  => [
                 'value' => "ORDER <br> NOW <br> TODAY", "area" => 'Order now today',
                 'title' => ""
             ]
            ],
            ["key" => ConfigCms::KEY_BOOKING_OFFER_DESCRIPTION_CMS, "value" => "Đặt lịch ngay để tận hưởng kỳ nghỉ hoàn hảo với những ưu đãi đọc quyền chỉ có tại P'apiu", 'title' => "", 'type' => ConfigCms::TYPE_OFFER_CMS, 'area' => 'Đặt phòng ngay hôm nay',
             'en'  => [
                 'value' => "Book now to enjoy special sublimation moments in P'apiu", "area" => 'Order now today',
                 'title' => ""
             ]
            ],
            ["key" => ConfigCms::KEY_BOOKING_OFFER_LINK_LABEL_CMS, "value" => "ĐẶT PHÒNG NGAY", 'title' => "", 'type' => ConfigCms::TYPE_OFFER_CMS, 'area' => 'Đặt phòng ngay hôm nay',
             'en'  => [
                 'value' => "ORDER NOW", "area" => 'Order now today',
                 'title' => ""
             ]
            ],
            ["key" => ConfigCms::KEY_BOOKING_OFFER_LINK_URL_CMS, "value" => url('/book'), 'title' => "", 'type' => ConfigCms::TYPE_OFFER_CMS, 'area' => 'Đặt phòng ngay hôm nay',
             'en'  => [
                 'value' => url('/book'), "area" => 'Order now today',
                 'title' => ""
             ]
            ],
            ["key" => ConfigCms::KEY_BOOKING_GALLERY_TITLE_CMS, "value" => 'ĐẶT PHÒNG <br> NGAY <br> HÔM NAY', 'title' => "", 'type' => ConfigCms::TYPE_GALLERY_CMS, 'area' => 'Đặt phòng ngay hôm nay',
             'en'  => [
                 'value' => "ORDER <br> NOW <br> TODAY", "area" => 'Order now today',
                 'title' => ""
             ]
            ],
            ["key" => ConfigCms::KEY_BOOKING_GALLERY_DESCRIPTION_CMS, "value" => "Đặt phòng ngay để tận hưởng những giây phút trải nghiệm có một không hai tại P'apiu", 'title' => "", 'type' => ConfigCms::TYPE_GALLERY_CMS, 'area' => 'Đặt phòng ngay hôm nay',
             'en'  => [
                 'value' => "Book now to enjoy special sublimation moments in P'apiu", "area" => 'Order now today',
                 'title' => ""
             ]
            ],
            ["key" => ConfigCms::KEY_BOOKING_GALLERY_LINK_LABEL_CMS, "value" => "ĐẶT PHÒNG NGAY", 'title' => "", 'type' => ConfigCms::TYPE_GALLERY_CMS, 'area' => 'Đặt phòng ngay hôm nay',
             'en'  => [
                 'value' => "ORDER NOW", "area" => 'Order now today',
                 'title' => ""
             ]
            ],
            ["key" => ConfigCms::KEY_BOOKING_GALLERY_LINK_URL_CMS, "value" => url('/book'), 'title' => "", 'type' => ConfigCms::TYPE_GALLERY_CMS, 'area' => 'Đặt phòng ngay hôm nay',
             'en'  => [
                 'value' => url('/book'), "area" => 'Order now today',
                 'title' => ""
             ]
            ],
        ];

        foreach ($configs as $config) {
            ConfigCms::create($config);
        }
    }
}
