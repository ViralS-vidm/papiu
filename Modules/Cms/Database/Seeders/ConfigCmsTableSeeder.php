<?php

namespace Modules\Cms\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Cms\Entities\ConfigCms;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;

class ConfigCmsTableSeeder extends Seeder
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

        $this->truncate('config_cms');
        $this->truncate('config_cms_translations');

        $configs = [
            // services
            ["key" => ConfigCms::KEY_SERVICE_TITLE_CMS, "value" => 'Giới thiệu chung', 'type' => ConfigCms::TYPE_SERVICE_CMS, 'title' => 'Tiêu đề',
                'en' => [
                    'value' => 'Introduction', 'title' => 'Title',
                ]
            ],
            ["key" => ConfigCms::KEY_SERVICE_DESCRIPTION_CMS, "value" => 'Không chỉ bao gồm những dịch vụ cơ bản trong quá
                trình tận hưởng kỳ nghỉ tại các khu nhà, P\'apiu dành riêng cho du khách các gói dịch vụ đặc biệt khác như cầu hôn,
                 lễ cưới, quà tặng người thân, tủ lưu giữ kỷ niệm hay xe đưa đón. P\'apiu hy vọng các cặp đôi sẽ có kỳ nghỉ
                 hoàn hảo cùng những kỷ niệm tuyệt vời khó quên tại.', 'type' => ConfigCms::TYPE_SERVICE_CMS, 'title' => 'Mô tả',
                'en' => [
                    'value' => "Not only includes the basic services too
                 to enjoy your vacation at home, P'apiu offers visitors other special service packages such as marriage proposals,
                  weddings, loved ones gifts, souvenir storage cabinets or shuttle cars. P'apiu hopes couples will have a holiday
                  Perfect with unforgettable memories at.", 'title' => 'Description',
                ]
            ],
            ["key" => ConfigCms::KEY_SERVICE_LIST_SERVICE_CMS,
                "value" =>"<li>
                        <span>Internet có dây/Wifi miễn phí</span>
                    </li>
                    <li>
                        <span>Mini bar</span>
                    </li>
                    <li>
                        <span>Giặt là</span>
                    </li>
                    <li>
                        <span>Phòng thể thao giải trí trong nhà</span>
                    </li>
                    <li>
                        <span>Xem phim ngoài trời</span>
                    </li>
                    <li>
                        <span>Kính thiên văn ngắm sao đêm</span>
                    </li>
                    <li>
                        <span>Ống nhòm ngắm cảnh</span>
                    </li>
                    <li>
                        <span>Xông hơi khô</span>
                    </li>
                    <li>
                        <span>Tắm lá thơm</span>
                    </li>
                    <li>
                        <span>Tắm bể sục treo ngoài trời</span>
                    </li>
                    <li>
                        <span>Massage chân</span>
                    </li>
                    <li>
                        <span>Quà tặng Papiu</span>
                    </li>
                    <li>
                        <span>Lưu giữ kỷ niệm trong lòng đất tại Layla Qays</span>
                    </li>
                    <li>
                        <span>Tham quan con đường thổ cẩm</span>
                    </li>
                    <li>
                        <span>Thăm quan khu trưng bày vẽ tranh vùng cao</span>
                    </li>
                    <li>
                        <span>Đi bộ trong rừng</span>
                    </li>
                    <li>
                        <span>Thăm nguồn nước trong lòng đất</span>
                    </li>
                    <li>
                        <span>Zipline</span>
                    </li>
                    <li>
                        <span>Ngủ ngoài trời với trăng sao tại Yolo mount</span>
                    </li>
                    <li>
                        <span>Chơi trò chơi dân gian với người bản địa (Ném còn, cầu mây, kéo co…)</span>
                    </li>
                    <li>
                        <span>Đồ ăn nhẹ mang theo xe </span>
                    </li>
                    <li>
                        <span>Phục vụ 5 bữa/ ngày; 24/7 tại phòng, nhà hàng, vườn rau hoặc các không gian theo yêu cầu từ khách hàng</span>
                    </li>", 'type' => ConfigCms::TYPE_SERVICE_CMS, 'title' => 'DỊCH VỤ',
                'en' => [
                    'value' => "<li>
                        <span>Wired Internet / Free Wifi</span>
                    </li>
                    <li>
                        <span>Mini bar</span>
                    </li>
                    <li>
                        <span>Laundry</span>
                    </li>
                    <li>
                        <span>Indoor recreational sports room</span>
                    </li>
                    <li>
                        <span>Watch movies outdoors</span>
                    </li>
                    <li>
                        <span>Telescope watching the night star</span>
                    </li>
                    <li>
                        <span>View binoculars</span>
                    </li>
                    <li>
                        <span>Sauna</span>
                    </li>
                    <li>
                        <span>Scented shower</span>
                    </li>
                    <li>
                        <span>Bath outdoor jacuzzi</span>
                    </li>
                    <li>
                        <span>Foot massage</span>
                    </li>
                    <li>
                        <span>Papiu Gift</span>
                    </li>
                    <li>
                        <span>Keep memories in the ground at Layla Qays</span>
                    </li>
                    <li>
                        <span>Visiting brocade road</span>
                    </li>
                    <li>
                        <span>Visiting highland painting display area</span>
                    </li>
                    <li>
                        <span>Walking in the forest</span>
                    </li>
                    <li>
                        <span>Visit underground water</span>
                    </li>
                    <li>
                        <span>Zipline</span>
                    </li>
                    <li>
                        <span>Sleeping outdoors with moon and stars at Yolo mount</span>
                    </li>
                    <li>
                        <span>Playing folk games with indigenous people (Throw still, pray for clouds, tug of war ...)</span>
                    </li>
                    <li>
                        <span>Snacks to bring car </span>
                    </li>
                    <li>
                        <span>Serving 5 meals / day; 24/7 in rooms, restaurants, vegetable gardens or other spaces as required by customers</span>
                    </li>",
                    'title' => "SERVICES",
                ]
            ],


            // introduce
            [
                "key" => ConfigCms::KEY_INTRODUCTION_OVERVIEW_CMS,
                "title" => 'TỔNG QUAN VỀ P’APIU',
                "value" => " <li>
                    <p>
                        P'apiu là điểm cuối cùng của ngọn núi kéo dài từ huyện Vị Xuyên và kết thúc bởi con suối xanh
                        dưới chân núi P'apiu. Được xây dựng trong vòng 6 năm hoàn toàn bằng sức người, tỉ mỉ, cận thận
                        trong từng chi tiết. P'apiu hùng vĩ và nguyên sơ với hơn 80.000 cây xanh các loại.
                    </p>
                    <p>
                        Cung đường thổ cẩm dài nhất Việt Nam dẫn lối tới P'apiu với trải nghiệm lên đèo có một không
                        hai.
                    </p>
                </li>
                <li>
                    <p>
                        P'apiu được thiết kế gồm 3 khu nhà chính: nhà trình tường The Mellow của người Mông, nhà kính
                        The Fluffy với không gian mở và Hầm kỷ niệm Layla Qays lãng mạn. Mỗi khu nhà đều mang trong mình
                        một trải nghiệm khác biệt và riêng tư độc nhất.
                        Đặc biệt, mọi vật dụng ở P'apiu đều thân thiện với môi trường, sự tĩnh lặng cho du khách được
                        hòa mình với thiên nhiên, bỏ lại không gian và thời gian!
                    </p>
                </li>",
                'type' => ConfigCms::TYPE_INTRODUCE_CMS,
                'en' => [
                    'title' => 'OVERVIEW OF P’APIU',
                    'value' => "<li>
                    <p>
                        P'apiu is the last point of the mountain extending from Vi Xuyen district and ending by the green stream
                         at the foot of P'apiu mountain. Built within 6 years entirely by human power, meticulous, careful
                         in every detail. P'apiu majestic and pristine with more than 80,000 trees of all kinds.
                    </p>
                    <p>
                        The longest brocade road in Vietnam leads the way to P'apiu with a unique experience special.
                    </p>
                </li>
                <li>
                    <p>
                        P'apiu is designed with 3 main buildings: The Mellow wall of the Mong people, the greenhouse
                         The Fluffy with open space and Tunnel commemorate the romantic Layla Qays. Each building has its own
                         A unique and unique experience.
                         In particular, all things in P'apiu are environmentally friendly, quiet for visitors
                         mingle with nature, leaving space and time!
                    </p>
                </li>",
                ]
            ],
            [
                "key" => ConfigCms::KEY_INTRODUCTION_MOVE_CMS,
                "title" => 'HƯỚNG DẪN DI CHUYỂN',
                "value" => " <li>
                                    <p>
                                        Từ Hà Nội: Di chuyển theo tuyến đường Hà Nội - Tuyên Quang - Hà Giang và có mặt
                                        tại P'apil sau 6-7 giờ di chuyển bằng phương tiện (xe limosine vip hoặc xe tự
                                        lái)
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        Từ Hồ Chí Minh hoặc khu vực miền nam:
                                        Đáp xuống sân bay nội bài và di chuyển theo tuyến đường Hà Nội - Tuyên Quang -
                                        Hà Giang.
                                        Sau khi có mặt tại nhà đón khách, nhân viên P'apiu sẽ hướng dẫn cụ thể cách di
                                        chuyển lên đến từng khu nhà.
                                        <br>
                                        Chúc quý khách có kỳ nghỉ dưỡng vui vẻ!
                                    </p>
                                </li>",
                'type' => ConfigCms::TYPE_INTRODUCE_CMS,
                'en' => [
                    'title' => 'INSTRUCTIONS FOR MOVING',
                    'value' => " <li>
                                    <p>
                                        From Hanoi: Move along the route Hanoi - Tuyen Quang - Ha Giang and present
                                         at P'apil after 6-7 hours by car (limosine vip or self-drive car)
                                         drive)
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        From Ho Chi Minh or the southern region:
                                         Land at Noi Bai International Airport and follow the route Hanoi - Tuyen Quang -
                                         Ha Giang.
                                         After arriving at the guest house, P'apiu staff will guide you in detail how to go
                                         Move up to each block.
                                        <br>
                                        Wishing you a happy vacation!
                                    </p>
                                </li>",
                ]
            ],
            [
                "key" => ConfigCms::KEY_INTRODUCTION_UTILITIES_CMS,
                "title" => 'TIỆN TÍCH DỊCH VỤ',
                "value" => '',
                'type' => ConfigCms::TYPE_INTRODUCE_CMS,
                'en' => [
                    "title" => 'FACILITIES SERVICES',
                    "value" => '',
                ]
            ],
            [
                "key" => ConfigCms::KEY_INTRODUCTION_REVIEW_TITLE_CMS,
                "title" => 'REVIEW',
                "value" => "P'apiu được đề xuất bởi nhiều ứng dụng đặt phòng trong nước và Quốc tế với dịch vụ chuẩn 5 sao,
                 mang lại cho du khách trải nghiệm riêng tư khác biệt",
                'type' => ConfigCms::TYPE_INTRODUCE_CMS,
                'en' => [
                    "title" => 'REVIEW',
                    "value" => "P'apiu is recommended by many domestic and international booking applications with 5-star service,
                     giving visitors a different privacy experience.",
                ]
            ],
            [
                "key" => ConfigCms::KEY_INTRODUCTION_REWARD_TITLE_CMS,
                "title" => 'CÁC GIẢI THƯỞNG',
                "value" => '',
                'type' => ConfigCms::TYPE_INTRODUCE_CMS,
                'en' => [
                    "title" => 'AWARDS',
                    "value" => '',
                ]
            ],
        ];

        foreach ($configs as $config) {
            ConfigCms::create($config);
        }

        $this->enableForeignKeys();
    }
}
