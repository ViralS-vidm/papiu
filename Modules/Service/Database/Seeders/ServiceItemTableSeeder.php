<?php

namespace Modules\Service\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;
use Modules\Service\Entities\ServiceItem;

class ServiceItemTableSeeder extends Seeder
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
        $this->truncate('service_items');
        $this->truncate('service_item_translations');

        $serviceItems = [
            // ROOM SERVICE
            [
                "name" => "Nhà hàng: phục vụ 5 bữa/ ngày; 24/7 tại phòng, vườn rau hoặc các không gian theo yêu cầu từ khách hàng",
                "en" => [
                    "name" => "Restaurant: 24x7 at room"
                ]
            ],
            ["name" => "Mini bar",
                "en" => [
                    "name" => "Mini bar"
                ],
            ],
            ["name" => "Giặt là"],
            ["name" => "Ngủ ngoài trời với trăng sao tại Yolo mount"],
            ["name" => "Xem Phim ngoài trời"],
            ["name" => "Kính thiên văn ngắm sao đêm"],
            ["name" => "Ống nhòm ngắm cảnh"],
            ["name" => "Xông hơi khô"],
            ["name" => "Tắm lá thơm"],
            ["name" => "Tắm bể sục treo ngoài trời"],
            ["name" => "Massage chân"],
            ["name" => "Quà tặng Papiu"],
            ["name" => "Lưu giữ kỷ niệm trong lòng đất tại Layla Qays"],
            ["name" => "Thăm quan con đường thổ cẩm"],
            ["name" => "Thăm quan khu trưng bày vẽ tranh vùng cao"],
            ["name" => "Đi bộ trong rừng"],
            ["name" => "Thăm nguồn nước trong lòng đất"],
            ["name" => "Zipline"],
            ["name" => "Phòng thể thao giải trí trong nhà"],
            ["name" => "Chơi trò chơi dân gian với người bản địa (Ném còn, cầu mây, kéo co…)"],
            ["name" => "Internet có dây/Wifi miễn phí"],
            ["name" => "Đồ ăn nhẹ mang theo xe"],
            ["name" => "Tour thăm bản người Dao"],
            ["name" => "Leo cây thể thao"],
            //ENGAGE SERVICE
            ["name" => "Trao đổi, tìm hiểu thông tin (câu chuyện tình yêu, ngày kỉ niệm, sở thích của cả hai nhân vật chính)"],
            ["name" => "Tư vấn nội dung, ý tưởng cầu hôn."],
            ["name" => "Trang trí không gian ấm cúng & lãng mạn với nến, hoa, bong bóng xung quanh khu vực cầu hôn"],
            ["name" => "Âm nhạc phù hợp"],
            ["name" => "Một tấm thiệp bằng form có tên hai người và trên tấm thiệp dán những tấm hình kỉ niệm đã chụp chung trong suốt thời gian quen nhau ( kích thước thiệp cao 70cm)"],
            ["name" => "Bảng chữ PP dán form có 4 người cầm: \"Làm vợ anh nhé/ làm người yêu anh nhé/ Will you marry me/ I Love you\""],
            ["name" => "Hoa cầu hôn"],
            ["name" => "Rượu vang, bánh"],
            ["name" => "Chụp ảnh phóng sự ghi lại khoảnh khắc ngọt ngào của 2 nhân vật chính"],
            ["name" => "Quà tặng cho cặp đôi"],
            //MARRIE SERVICE
            ["name" => "Tư vấn nội dung, ý tưởng kịch bản cưới"],
            ["name" => "Lưu trú 3 ngày 2 đêm cho tối đa 20 khách mời; "],
            ["name" => "Phục vụ ăn 3 bữa/ ngày ( trong đó có 1 tiệc cưới)"],
            ["name" => "Tổ chức tiệc cưới ( tiệc BBQ/ chọn món theo Menu hoặc yêu cầu từ khách hàng)"],
            ["name" => "Tổ chức chơi trò chơi dân gian tập thể"],
            ["name" => "Hoạt động đốt lửa ngoài trời buổi tối (Mùa đông)"],
            ["name" => "Tổ chức từ thiện tại bản Mông"],
            ["name" => "Thăm quan Cao Nguyên đá"],
            ["name" => "Thực hiện bộ ảnh ngoài trời / phóng sự cưới"],
            ["name" => "Backdrop"],
            ["name" => "Trang điểm cô dâu, chú rể"],
            ["name" => "Hoa cầm tay, hoa cài áo, hoa trang trí"],
            ["name" => "Trưởng bản người Dao thực hiện các nghi thức cưới theo phong tục"],
            ["name" => "Tặng kèm bộ trang phục cưới của người Giao ( bao gồm trang sức)"],
            ["name" => "Âm nhạc đặc trưng của người dân tộc"],
            ["name" => "Quà tặng cho Cô dâu chú rể và khách mời với nhiều lựa chọn"],
            ["name" => "Xe đưa 2 chiều < 300km toàn bộ khách ( đón tại 1 điểm)"],
            //HONEY MOON
            ["name" => "Khách hàng sẽ được thưởng thức bữa ăn đặc biệt được đầu bếp của Papiu thực hiện dành riêng cho tuần trang mặt"],
            ["name" => "Nghỉ 4 ngày 3 đêm"],
            ["name" => "Trang trí phòng ngủ"],
            ["name" => "Thực hiện ảnh ngoài trời hoặc tour thăm quan trải nghiệm bản"],
            //MEMORY BOX
            ["name" => "Kích thước tối đa ( rộng 25cm X cao 40 cm X sâu 30)"],
            ["name" => "Không để đồ vật có giá trị ( tiền, trang sức…)"],
            ["name" => "Không để đồ tươi sống, có thể gây ẩm mốc…"],
            ["name" => "Không để chất cấm, gây nổ"],
            ["name" => "Thời gian lưu giữ tối đa một năm. Sau đó sẽ gia hạn theo nhu cầu của khách hàng"],
        ];

        foreach ($serviceItems as $serviceItem) {
            ServiceItem::create($serviceItem);
        }

        $this->enableForeignKeys();
    }
}
