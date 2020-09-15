<?php

namespace Modules\Cms\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Cms\Entities\ConfigCms;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;

class CommonCmsTableSeeder extends Seeder
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
        ConfigCms::whereIn('type', [ConfigCms::TYPE_MENU_CMS, ConfigCms::TYPE_BOOKING_CMS, ConfigCms::TYPE_SITE_SETTING_CMS])->delete();
        $configs = [
            // menu header
            ["key" => ConfigCms::KEY_MENU_HOME_CMS, "value" => ('/'), 'title' => 'Trang chủ', 'type' => ConfigCms::TYPE_MENU_CMS,
                'en' => [
                    'value' =>  ('/'),
                    'title' => 'HOME'
                ]
            ],
            ["key" => ConfigCms::KEY_MENU_ABOUT_CMS, "value" => ('/introduction'), 'title' => "VỀ P'APIU", 'type' => ConfigCms::TYPE_MENU_CMS,
                'en' => [
                    'value' =>  url('/introduction'),
                    'title' => "ABOUT P'APIU"
                ]
            ],
            ["key" => ConfigCms::KEY_MENU_CATEGORY_CMS, "value" => ('/products'), 'title' => "KHU NHÀ", 'type' => ConfigCms::TYPE_MENU_CMS,
                'en' => [
                    'value' =>  ('/products'),
                    'title' => "CATEGORY"
                ]
            ],
            ["key" => ConfigCms::KEY_MENU_CATEGORY_MELLOW_CMS, "value" => ('/products/1'), 'title' => "The Mellow", 'type' => ConfigCms::TYPE_MENU_CMS,
                'en' => [
                    'value' =>  ('/products/1'),
                    'title' => "The Mellow"
                ]
            ],
            ["key" => ConfigCms::KEY_MENU_CATEGORY_FLUFFY_CMS, "value" => ('/products/2'), 'title' => "The Fluffy", 'type' => ConfigCms::TYPE_MENU_CMS,
                'en' => [
                    'value' =>  ('/products/2'),
                    'title' => "The Fluffy"
                ]
            ],
            ["key" => ConfigCms::KEY_MENU_CATEGORY_LAYLA_CMS, "value" => ('/products/3'), 'title' => "Layla Qays", 'type' => ConfigCms::TYPE_MENU_CMS,
                'en' => [
                    'value' =>  ('/products/3'),
                    'title' => "Layla Qays"
                ]
            ],
            ["key" => ConfigCms::KEY_MENU_SERVICE_CMS, "value" => ('/service'), 'title' => "DỊCH VỤ", 'type' => ConfigCms::TYPE_MENU_CMS,
                'en' => [
                    'value' =>  ('/service'),
                    'title' => "SERVICES"
                ]
            ],
            ["key" => ConfigCms::KEY_MENU_OFFER_CMS, "value" => ('/offer'), 'title' => 'ƯU ĐÃI', 'type' => ConfigCms::TYPE_MENU_CMS,
                'en' => [
                    'value' =>  ('/offer'),
                    'title' => "OFFER"
                ]
            ],
            ["key" => ConfigCms::KEY_MENU_GALLERY_CMS, "value" => ('/gallery'), 'title' => "TRẢI NGHIỆM", 'type' => ConfigCms::TYPE_MENU_CMS,
                'en' => [
                    'value' =>  ('/gallery'),
                    'title' => "GALLERY"
                ]
            ],
            ["key" => ConfigCms::KEY_MENU_CONTACT_NOW_CMS, "value" => ('/contact'), 'title' => "LIÊN HỆ", 'type' => ConfigCms::TYPE_MENU_CMS,
                'en' => [
                    'value' =>  ('/contact'),
                    'title' => "CONTACT NOW"
                ]
            ],

            //menu footer
            ["key" => ConfigCms::KEY_MENU_FOOTER_BOOKING_CMS, "value" => ('/book'), 'title' => "Đặt phòng", 'type' => ConfigCms::TYPE_MENU_CMS,
                'en' => [
                    'value' =>  ('/book'),
                    'title' => "Booking"
                ]
            ],
            ["key" => ConfigCms::KEY_MENU_FOOTER_GALLERY_CMS, "value" => ('/gallery'), 'title' => "Trải Nghiệm", 'type' => ConfigCms::TYPE_MENU_CMS,
                'en' => [
                    'value' =>  ('/gallery'),
                    'title' => "Gallery"
                ]
            ],
            ["key" => ConfigCms::KEY_MENU_FOOTER_ABOUT_CMS, "value" => ('/introduction'), 'title' => "Về chúng tôi", 'type' => ConfigCms::TYPE_MENU_CMS,
                'en' => [
                    'value' =>  ('/introduction'),
                    'title' => "About us"
                ]
            ],
            ["key" => ConfigCms::KEY_MENU_FOOTER_AGENCY_CMS, "value" => ('/agency'), 'title' => "Đại lý", 'type' => ConfigCms::TYPE_MENU_CMS,
                'en' => [
                    'value' =>  ('/agency'),
                    'title' => "Agency"
                ]
            ],
            ["key" => ConfigCms::KEY_MENU_FOOTER_CONTACT_CMS, "value" => ('/contact'), 'title' => "Liên hệ", 'type' => ConfigCms::TYPE_MENU_CMS,
                'en' => [
                    'value' =>  ('/contact'),
                    'title' => "Contact now"
                ]
            ],

            //service booking
            ["key" => ConfigCms::KEY_BOOKING_TITLE_CMS, "value" => 'ĐẶT PHÒNG <br> NGAY <br> HÔM NAY', 'title' => "", 'type' => ConfigCms::TYPE_BOOKING_CMS,
                'en' => [
                    'value' => "ORDER <br> NOW <br> TODAY",
                    'title' => ""
                ]
            ],
            ["key" => ConfigCms::KEY_BOOKING_DESCRIPTION_CMS, "value" => "Khám phá không gian tĩnh lặng, riêng tư và cảm xúc thăng hoa đặc biệt tại P'apiu ngay hôm nay!", 'title' => "", 'type' => ConfigCms::TYPE_BOOKING_CMS,
                'en' => [
                    'value' => "Book now to enjoy special sublimation moments in P'apiu",
                    'title' => ""
                ]
            ],
            ["key" => ConfigCms::KEY_BOOKING_LINK_LABEL_CMS, "value" => "ĐẶT PHÒNG NGAY", 'title' => "", 'type' => ConfigCms::TYPE_BOOKING_CMS,
                'en' => [
                    'value' => "ORDER NOW",
                    'title' => ""
                ]
            ],
            ["key" => ConfigCms::KEY_BOOKING_LINK_URL_CMS, "value" => ('/book'), 'title' => "", 'type' => ConfigCms::TYPE_BOOKING_CMS,
                'en' => [
                    'value' => ('/book'),
                    'title' => ""
                ]
            ],

            //site setting
            ["key" => ConfigCms::KEY_SITE_ADDRESS, "value" =>'Km18 xã Yên Đỉnh, Bắc Mê, Hà Giang', 'title' => "", 'type' => ConfigCms::TYPE_SITE_SETTING_CMS,
                'en' => [
                    'value' => "Km18, Yen Dinh Commune, Bac Me District, Ha Giang Province",
                    'title' => ""
                ]
            ],
            ["key" => ConfigCms::KEY_SITE_PHONE, "value" =>'0219 3841999', 'title' => "", 'type' => ConfigCms::TYPE_SITE_SETTING_CMS,
                'en' => [
                    'value' => "+84 219 3841999",
                    'title' => ""
                ]
            ],
            ["key" => ConfigCms::KEY_SITE_EMAIL, "value" =>'contact@papiu.vn', 'title' => "", 'type' => ConfigCms::TYPE_SITE_SETTING_CMS,
                'en' => [
                    'value' => "contact@papiu.vn",
                    'title' => ""
                ]
            ],
            ["key" => ConfigCms::KEY_SITE_FACEBOOK, "value" =>'https://www.facebook.com/papiuresort/', 'title' => "", 'type' => ConfigCms::TYPE_SITE_SETTING_CMS,
                'en' => [
                    'value' => "https://www.facebook.com/papiuresort/",
                    'title' => ""
                ]
            ],
            ["key" => ConfigCms::KEY_SITE_INSTAGRAM, "value" => 'https://www.instagram.com/papiuresort/', 'title' => "", 'type' => ConfigCms::TYPE_SITE_SETTING_CMS,
                'en' => [
                    'value' => "https://www.instagram.com/papiuresort/",
                    'title' => ""
                ]
            ],
            ["key" => ConfigCms::KEY_SITE_YOUTUBE, "value" =>'https://www.youtube.com/channel/UCUjOi-PK6eJce4TzvbMQr1Q/featured', 'title' => "", 'type' => ConfigCms::TYPE_SITE_SETTING_CMS,
                'en' => [
                    'value' => "https://www.youtube.com/channel/UCUjOi-PK6eJce4TzvbMQr1Q/featured",
                    'title' => ""
                ]
            ],


        ];

        foreach ($configs as $config) {
            ConfigCms::create($config);
        }

        $this->enableForeignKeys();
    }
}
