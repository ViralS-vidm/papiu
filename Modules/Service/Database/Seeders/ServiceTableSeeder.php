<?php

namespace Modules\Service\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;
use Modules\Image\Entities\Image;
use Modules\Service\Entities\Service;

class ServiceTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('services');
        $this->truncate('service_translations');

        $services = [
            [
                "name"              => "Nhà Trình Tường",
                "description"       => "Là ngôi nhà có lối kiến trúc điển hình  của dân tộc H’Mong Hà Giang, được giã thủ công bằng tay từ chất kiệu là đất và hoàn toàn không có chất kết dính. Với ngôi nhà trình tường, ĐẤT được tôn vinh, với tường đất, giường đất, ghế đất…",
                "price"             => 15000000,
                "price_description" => "15 triệu/ đêm",
                "product_id"        => 1,
                "en"                => [
                    "name"              => "The Mellow",
                    "description"       => "This is a traditional house of H’Mong race in Hà Giang",
                    "price_description" => "15 million/ night",
                ]
            ],
            [
                "name"              => "Nhà Kính",
                "description"       => "Ngôi nhà được xây dựng hoàn toàn bằng gỗ. Với thiết kế độc đáo, không gian mở mang đến cho Quý khách sự thư giãn và gần gũi với thiên nhiên ở mọi vị trí của ngôi nhà.",
                "price"             => 15000000,
                "price_description" => "15 triệu/ đêm",
                "product_id"        => 2,
                "en"                => [
                    "name"              => "The Fluffy",
                    "description"       => "The house is built by wood totally",
                    "price_description" => "15 million/ night",
                ]
            ],
            [
                "name"              => "Nhà Hầm",
                "description"       => "Layla được lấy cảm hứng từ câu chuyện tình  bất hủ của thế giới Ả Rập giữa nàng Layla và chàng Qays. Qua đó, tình yêu không bao giờ lịm tắt theo thời gian…",
                "price"             => 25000000,
                "price_description" => "25 triệu/ đêm",
                "product_id"        => 3,
                "en"                => [
                    "name"              => "Layla Qays",
                    "description"       => "Layla was built based on famous romantic story of Arab between miss Layla and mr Qays",
                    "price_description" => "25 million/ night",
                ]
            ],
            [
                "name"              => "Dịch vụ cầu hôn",
                "description"       => "Dịch vụ cầu hôn",
                "price"             => 10000000,
                "price_description" => "10 triệu trọn gói",
                "en"                => [
                    "name"              => "Engage Service",
                    "description"       => "Engage Service",
                    "price_description" => "10 million",
                ]
            ],
            [
                "name"              => "Dịch vụ cưới",
                "description"       => "Tổ chức lễ cưới theo truyền thống của người Dao",
                "price"             => 500000000,
                "price_description" => "Từ 500 triệu trọn gói",
                "en"                => [
                    "name"              => "Married Service",
                    "description"       => "Arrange married follow traditional of Dao race",
                    "price_description" => "from 500 million",
                ]
            ],
            [
                "name"              => "Gói trăng mật",
                "description"       => "Papiu là nơi lý tưởng để các cặp đôi tận hưởng tuần trăng mật ý nghĩa",
                "price"             => 55000000,
                "price_description" => "từ 55 triệu",
                "en"                => [
                    "name"              => "Honey Moon Service",
                    "description"       => "Honey Moon Service",
                    "price_description" => "from 55 million",
                ]
            ],
            [
                "name"              => "Quà tặng người thân",
                "description"       => "Trao đổi thông tin thiết kế gói sản phẩm theo yêu cầu từ phía khách hàng",
                "price"             => 20000000,
                "price_description" => "Từ 20 triệu trở lên",
                "en"                => [
                    "name"              => "Gift for honey",
                    "description"       => "Gift for honey",
                    "price_description" => "from 20 million",
                ]
            ],
            [
                "name"              => "Tủ lưu giữ kỷ niệm",
                "description"       => "Ở Papiu có 600 ngăn tủ được thiết kế theo các kích cỡ khác nhau để khách hàng đến với khu nghỉ dưỡng có thể lưu lại những kỷ vật đặc biệt có ý nghĩa",
                "price"             => 2000000,
                "price_description" => "Phí dịch vụ phụ thuộc vào kích thước kỷ vật nhưng tối đa không quá 2 triệu/ năm",
                "en"                => [
                    "name"              => "Memory lock",
                    "description"       => "Memory lock",
                    "price_description" => "no more than 2 million",
                ]
            ],
            [
                "name"        => "Xe đưa đón",
                "description" => "Xe đưa đón 2 chiều < 300 km",
                "en"          => [
                    "name"        => "Car service",
                    "description" => "Car service inside 300km",
                ]
            ],
        ];

        foreach ($services as $i => $service) {
            $service = Service::create($service);
            $service->homeImage()->attach([$i + 11, $i + 12], ['image_type' => Image::TYPE_HOME_IMAGE]);
        }

        $this->enableForeignKeys();
    }
}
