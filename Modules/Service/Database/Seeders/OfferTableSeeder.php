<?php

namespace Modules\Service\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;
use Modules\Service\Entities\Offer;

class OfferTableSeeder extends Seeder
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
        $this->truncate('offers');
        $this->truncate('offer_translations');
        $offers = [
            [
                "name" => "THANH TOÁN NGAY - QUÀ LIỀN TAY",
                "description" => "Du khách thanh toán ngay trong quá trình đặt phòng sẽ được tặng kèm một món quà siêu yêu dành cho cặp đôi. Cùng P'apiu tận hưởng kỳ nghỉ hoàn hảo nhất nhé!",
                "content" => "<li>
                                        <span class=\"title\">THANH TOÁN NGAY - QUÀ LIỀN TAY</span>
                                        <p>Trong quá trình đặt phòng thông qua website, du khách chọn hình thức thanh
                                            toán
                                            luôn qua thẻ sẽ được tặng kèm một món quà siêu đặc biệt và ý nghĩa để lưu
                                            giữ
                                            những kỷ niệm đáng nhớ tại P'apiu. </p>
                                    </li>
                                    <li>
                                        <span class='title'>ĐIỀU KIỆN ÁP DỤNG</span>
                                        <ol>
                                            <li>
                                                <span>Đặt phòng và thanh toán qua website</span>
                                            </li>
                                            <li>
                                                <span>Không hủy phòng</span>
                                            </li>
                                            <li>
                                                <span>Không hoàn tiền</span>
                                            </li>
                                        </ol>
                                    </li>
                                    <li>
                                        <span class=\"title\">THỜI GIAN ÁP DỤNG</span>
                                        <p>15/07/2020 - 15/08/2020</p>
                                    </li>",
                "en" => [
                    "name" => "PAY NOW - GIFT NOW",
                    "description" => "Customer pay in the booking time will get super lovely gift for couple.",
                    "content" => "<li>
                                        <span class = \"title \"> PAY NOW - FREE GIFTS </span>
                                        <p> During the booking process through the website, travelers choose the bar form
                                            maths
                                            Always through the card will be given with a super special gift and meaning to save
                                            Hold
                                            Memorable memories at P'apiu. </p>
                                    </li>
                                    <li>
                                        <span class = \"title \"> CONDITIONS OF APPLICATION </span>
                                        <ol>
                                            <li>
                                                <span> Booking and payment via the website </span>
                                            </li>
                                            <li>
                                                <span> Do not cancel the room </span>
                                            </li>
                                            <li>
                                                <span> No refunds </span>
                                            </li>
                                        </ol>
                                    </li>
                                    <li>
                                        <span class = \"title \"> APPLICATION TIME </span>
                                        <p> July 15, 2020 - August 15, 2020 </p>
                                    </li> ",
                ],
            ],
            [
                "name" => "MIỄN PHÍ ĐƯA ĐÓN TỪ SÂN BAY NỘI BÀI/TP. HÀ NỘI",
                "description" => "Đặt lịch trong tháng 08/2020, miễn phí đưa đón từ sân bay nội bài hoặc trung tâm thành phố Hà Nội với xe Mercedes-Maybach - Sang trọng, thoải mái và tiện lợi.",
                "content" => "<li>
                                        <span class=\"title\">MIỄN PHÍ ĐƯA ĐÓN TỪ SÂN BAY NỘI BÀI/TP. HÀ NỘI</span>
                                        <p>Với mong muốn du khách có được kỳ nghỉ hoàn hảo nhất từ lúc bắt đầu đến khi
                                            kết thúc, P'apiu dành tặng gói đưa đón MIỄN PHÍ từ sân bay nội bài hoặc
                                            trung tâm thành phố Hà Nội với xe Mercedes-Maybach sang trọng, thoải mái và
                                            tiện lợi khi đặt lịch trong tháng 07 và 08/2020.</p>
                                    </li>
                                    <li>
                                        <span class=\"title\">ĐIỀU KIỆN ÁP DỤNG</span>
                                        <ol>
                                            <li>
                                                <span>Du khách đặt lịch nghỉ dưỡng trong tháng 07 và 08/2020 </span>
                                            </li>
                                            <li>
                                                <span>Không hủy lịch </span>
                                            </li>
                                            <li>
                                                <span>Cọc trước 50%???</span>
                                            </li>
                                        </ol>
                                    </li>
                                    <li>
                                        <span class=\"title\">THỜI GIAN ÁP DỤNG</span>
                                        <p>13/07-30/08/2020 </p>
                                    </li>",
                "en" => [
                    "name" => "FREE PICKUP FROM NOI BAI AIRPORT",
                    "description" => "Booking in August 2020, you will get free transfer pickup from Noi Bai Airport.",
                    "content" => "<li>
                                        <span class = \"title \"> FREE DELIGHT FROM Noi Bai Airport / TP. HANOI </span>
                                        <p> Wishing you a perfect vacation from start to finish
                                            At the end, P'apiu offers a FREE shuttle package from Noi Bai airport or
                                            Hanoi city center with luxurious, comfortable and Mercedes-Maybach
                                            convenient when booking in July and August 20, 2020. </p>
                                    </li>
                                    <li>
                                        <span class = \"title \"> CONDITIONS OF APPLICATION </span>
                                        <ol>
                                            <li>
                                                <span> Tourists book a vacation in July and 08/2020 </span>
                                            </li>
                                            <li>
                                                <span> Do not cancel schedule </span>
                                            </li>
                                            <li>
                                                <span> 50% deposit ??? </span>
                                            </li>
                                        </ol>
                                    </li>
                                    <li>
                                        <span class = \"title \"> APPLICATION TIME </span>
                                        <p> 13 / 07-30 / 08/2020 </p>
                                    </li> ",
                ],
            ],
            [
                "name" => "MỘT MỐI TÌNH LÃNG MẠN TẠI P'APIU",
                "description" => "Cùng P'apiu tổ chức lễ cưới lãng mạn, ấm cúng, lưu giữ yêu thương với không gian nên thơ, tặng bộ trang phục của người Dao (bao gồm trang sức) và xe đưa đón khách mời 2 chiều.",
                "content" => " <li>
                                        <span class=\"title\">MỘT MỐI TÌNH LÃNG MẠN TẠI P'APIU</span>
                                        <p>Cùng P'apiu tổ chức lễ cưới ấm cúng, lưu giữ yêu thương với không gian lãng
                                            mạn, nên thơ. Ngoài những dịch vụ đầy đủ, chu đáo trong gói lễ cưới, P'apiu
                                            tặng kèm cô dâu, chú rể bộ trang phục của người Dao (bao gồm trang sức) và
                                            xe đưa đón khách mời 2 chiều khi đặt dịch vụ trong tháng 08/2020
                                            Hãy để p'apiu lưu giữ kỷ niệm và mối tình lãng mạn của bạn nhé! </p>
                                    </li>
                                    <li>
                                        <span class=\"title\">ĐIỀU KIỆN ÁP DỤNG</span>
                                        <ol>
                                            <li>
                                                <span>Du khách đặt dịch vụ lễ cưới tại P'apiu </span>
                                            </li>
                                        </ol>
                                    </li>
                                    <li>
                                        <span class=\"title\">THỜI GIAN ÁP DỤNG</span>
                                        <p>08/2020 </p>
                                    </li>",
                "en" => [
                    "name" => "LOVELY MARRIED IN P'APIU",
                    "description" => "P'PIU will arrange lovely married with you",
                    "content" => "<li>
                                        <span class = \"title \"> A ROMANTIC LOVE AT P'APIU </span>
                                        <p> With P'apiu to organize a cozy wedding ceremony, keep loving with the romantic space
                                            romantic, poetic. In addition to the full, thoughtful service in the wedding package, P'apiu
                                            Comes with the bride and groom costume of the Dao people (including jewelry) and
                                            2-way guest shuttle bus upon booking service in August 2020
                                            Let p'apiu keep your memories and romance! </p>
                                    </li>
                                    <li>
                                        <span class = \"title \"> CONDITIONS OF APPLICATION </span>
                                        <ol>
                                            <li>
                                                <span> Guests book a wedding service at P'apiu </span>
                                            </li>
                                        </ol>
                                    </li>
                                    <li>
                                        <span class = \"title \"> APPLICATION TIME </span>
                                        <p> 08/2020 </p>
                                    </li> ",
                ],
            ],
        ];

        foreach ($offers as $offer) {
            Offer::create($offer);
        }

        $this->enableForeignKeys();
    }
}
