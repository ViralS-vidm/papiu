<?php

namespace Modules\Cms\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Cms\Entities\ConfigCms;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;

class PolicyCmsTableSeeder extends Seeder
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

        ConfigCms::whereIn('type', [ConfigCms::TYPE_POLICY_CMS])->delete();

        $configs = [
            [
                "key" => ConfigCms::KEY_POLICY_TITLE_CMS, 'title' => 'Tiêu đề Chính sách bảo mật', 'type' => ConfigCms::TYPE_POLICY_CMS,
                "value" => "CHÍNH SÁCH BẢO MẬT THÔNG TIN VÀ DỮ LIỆU",
                'en' => [
                    'value' => "INFORMATION AND DATA PRIVACY POLICY",
                    'title' => 'Title Policy'
                ]
            ],
            [
                "key" => ConfigCms::KEY_POLICY_DESCRIPTION_CMS, 'title' => 'Nội dung Chính sách bảo mật', 'type' => ConfigCms::TYPE_POLICY_CMS,
                "value" => "<p>Bảo vệ thông tin và dữ liệu Khách hàng luôn là một vấn đề quan trọng với Chúng tôi, do đó Chúng tôi chỉ
                sử
                dụng tên và một số thông tin có liên quan đến giao dịch giữa Chúng tôi và Khách hàng trong một số trường
                hợp
                nhất định được đề ra trong chính sách bảo mật này. Chúng tôi chỉ giữ thông tin Khách hàng trong trường
                hợp
                luật pháp yêu cầu hoặc cho mục đích mà thông tin đó được thu thập.
                <br>
                Khách hàng có thể ghé thăm trang website papiu.vn mà không phải cung cấp bất kì thông tin cá nhân nào.
            </p>
            <ul>
                <li>
                    <span class=\"title\">BẢO VỆ THÔNG TIN CỦA QUÝ KHÁCH</span>
                    <p>Chúng tôi mong muốn Quý khách khi truy cập trang web này sẽ cảm thấy yên tâm lên kế hoạch và để
                        lại
                        thông
                        tin đặt phòng, vì vậy P'apiu cam kết sẽ bảo vệ thông tin của Quý khách thật an toàn. Khu Nghỉ
                        dưỡng
                        của
                        chúng tôi đã thực hiện một chương trình bảo mật với đội ngũ thiết kế và duy trì trang web của
                        mình
                        để thông
                        tin của Quý khách luôn được lưu trữ cẩn thận trong hệ thống, tránh được những truy cập trái
                        phép.
                        Trang web
                        của chúng tôi cũng đã được chứng nhận an toàn và đảm bảo đầy đủ các yêu cầu nghiêm ngặt. Các máy
                        chủ
                        trang
                        web/ hệ thống được trang bị cấu hình với mã hóa dữ liệu, xáo trộn, và tường lửa đúng chuẩn. Khi
                        Quý
                        khách
                        nhập thông tin cá nhân trong quá trình đặt phòng, hoặc gửi email đăng ký, dữ liệu của Quý khách
                        sẽ
                        được bảo
                        vệ, đảm bảo truyền tải an toàn và không bị rò rỉ thông tin ra ngoài.
                        Khách hàng có thể ghé thăm trang website papiu.vn mà không phải cung cấp bất kì thông tin cá
                        nhân
                        nào.
                    </p>
                </li>
                <li>
                    <span class=\"title\">CHÍNH SÁCH VÀ BẢO MẬT</span>
                    <p>Tại P'apiu, sự riêng tư và bảo
                        mật thông tin người dùng là rất quan trọng. Chúng tôi cam kết duy trì sự riêng tư và bảo mật
                        thông
                        tin
                        người
                        dùng của Quý khách. Chúng tôi có thể sẽ cập nhật thêm những chính sách và quy định bảo mật riêng
                        tư
                        này
                        bất
                        cứ lúc nào, vì vậy hãy kiểm tra tại đây thường xuyên. P'apiu sẽ không tiết lộ thông tin người
                        dùng
                        nhận
                        diện
                        cho bất kỳ bên thứ ba mà không có sự đồng ý của Quý khách.
                        <br>
                        Mục tiêu của chúng tôi chính là cung cấp cho Quý khách một trải nghiệm Internet thật an toàn,
                        nơi
                        Quý
                        khách
                        có thể yên tâm cung cấp các thông tin để hỗ trợ đặt phòng và các dịch vụ của chúng tôi. Để đạt
                        được
                        mục
                        tiêu
                        này, một phần hoạt động trang web này sẽ bao gồm việc thu thập các loại thông tin nhất định về
                        người
                        truy
                        cập và sử dụng trang web.
                        <br>
                        Chúng tôi hiểu rằng sự riêng tư của Quý khách rất quan trọng, vì vậy chúng tôi sẽ giải thích rõ
                        ràng
                        các
                        loại thông tin đang được thu thập và cách thức mà chúng tôi sử dụng nó. Chính sách bảo mật này
                        chỉ
                        áp
                        dụng
                        cho trang web của chúng tôi.
                        <br>
                        Chính sách bảo mật này bao gồm hai loại thông tin thu thập tại các trang web, cá nhân và tổng
                        hợp.
                        Thuật
                        ngữ
                        \"thông tin cá nhân\" liên quan đến dữ liệu mà Quý khách tự nguyện cung cấp bao gồm việc sử dụng
                        trang
                        nhận
                        dạng Quý khách và/ hoặc các công ty thay mặt Quý khách đang truy cập và sử dụng trang web này.
                        Ví
                        dụ,
                        thông
                        tin cá nhân bao gồm: những thông tin mà Quý khách gửi cho chúng tôi như Tên, Địa chỉ E-mail, Số
                        Điện
                        thoại,
                        Công ty liên kết, Địa điểm truy cập và/ hoặc một số thông tin cá nhân khác. Thuật ngữ \"dữ liệu
                        tổng
                        hợp\"
                        đề
                        cập đến thông tin tổng quát về Quý khách ví dụ như số lần truy cập vào các trang web nhất định,
                        truy
                        cập
                        từ
                        trang web liên quan khác hoặc được được dẫn đến từ trang khác.</p>
                </li>
                <li>
                    <span class=\"title\">NHỮNG THÔNG TIN NÀO ĐƯỢC THU THẬP? CHÚNG TÔI SẼ SỬ DỤNG THÔNG TIN NHƯ THẾ NÀO?</span>
                    <p>
                        Chúng tôi luôn đảm bảo các thông tin cá nhân của Quý khách sẽ không được sử dụng khi chưa được
                        cho
                        phép.
                        Quý
                        khách có thể đã gửi một yêu cầu nhận thông tin về P'apiu, từng tham gia vào một trong những
                        chương
                        trình
                        khuyến mãi của chúng tôi hoặc đăng ký e-mail để nhận thông tin mới nhất. Để đáp lại, chúng tôi
                        có
                        thể
                        yêu
                        cầu thông tin như tên của Quý khách và địa chỉ bưu điện. Trong trường hợp Quý khách chọn để cung
                        cấp
                        thông
                        tin này, chúng tôi sẽ chỉ sử dụng nó cho mục đích theo quy định của Quý khách ở phía dưới các
                        hình
                        thức
                        thu
                        thập thông tin.
                    </p>
                </li>
                <li>
                    <span class=\"title\">CHÚNG TÔI SẼ SỬ DỤNG THÔNG TIN CỦA QUÝ KHÁCH ĐỂ:</span>
                    <p>
                        <ol>
                            <li>
                    <p>Đăng ký Quý khách trở thành một thành viên của P'apiu</p>
                </li>
                <li>
                    <p>Giúp Quý khách lên kế hoạch và đặt phòng/ dịch vụ ở P'apiu</p>
                </li>
                <li>
                    <p>Gửi email tới Quý khách về chương trình khuyến mãi hoặc những chương trình đặc biệt của chúng
                        tôi</p>
                </li>
                <li>
                    <p> Gửi tin truyền thông tiếp thị hoặc các cuộc điều tra đối với Quý khách
                    </p>
                <li>
                    <p>
                        Trả lời các câu hỏi hoặc gợi ý của Quý khách
                    </p>
                </li>
                <li>
                    <p> Nâng cao chất lượng việc Quý khách truy cập trang web của chúng tôi
                    </p>
                </li>
                </ol>
                </p>
                <p>
                    Tất cả các hình thức trên sẽ có một nút opt-out để cho phép Quý khách từ chối không nhận được
                    những
                    thông
                    tin như trên trong tương lai. Khi quyết định có hay không tham gia, xin lưu ý rằng chúng tôi sẽ
                    chỉ
                    được sử
                    dụng cho các mục đích của Khu Nghỉ dưỡng. Chúng tôi không bán, thuê hay chia sẻ bất kỳ thông tin
                    cá
                    nhân của
                    Quý khách với bất kỳ bên nào khác, cũng không sử dụng nó cho mục đích thương mại không được chấp
                    thuận. Quý
                    khách có thể yêu cầu được loại bỏ khỏi danh sách của chúng tôi bất cứ lúc nào.
                </p>
                </li>
            </ul>",
                'en' => [
                    "value" => "<p>Protection of Customer information and data is always an important issue for us,
 so we only use the name and some information related to the transaction between us and customers in some cases.
  Certain policies are set forth in this privacy policy. We only keep Customer information where required by law or for the purpose for which it is collected.
Customers can visit the website papiu.vn without providing any personal information.
            </p>
            <ul>
                <li>
                    <span class=\"title\">PROTECT YOUR INFORMATION</span>
                    <p>We want you to visit this website will feel secure planning and leaving reservation information,
                     so P'apiu is committed to protecting your information is safe.
                      Our Resort has implemented a security program with a team of designers and maintainers of our website so that your information is always carefully stored in the system,
                       avoiding unauthorized access. Our website has also been certified to be safe and to meet all stringent requirements.
                        The web server / system is equipped with a configuration of data encryption, scrambling, and a standard firewall.
                         When you enter personal information during the booking process, or send a registration email, your data will be protected,
                          ensuring safe transmission and no information leakage. Customers can visit the website papiu.vn without providing any personal information.
                           When you enter personal information during the booking process, or send a registration email, your data will be protected,
                            ensuring safe transmission and no information leakage. Customers can visit the website papiu.vn without providing any personal information.
                             When you enter personal information during the booking process, or send a registration email, your data will be protected,
                              ensuring safe transmission and no information leakage. Customers can visit the website papiu.vn without providing any personal information.
                    </p>
                </li>
                <li>
                    <span class=\"title\">POLICY AND PRIVACY</span>
                    <p>At P'apiu, privacy and security of user information is very important.
                     We are committed to maintaining the privacy and security of your user information.
                      We may update these privacy policies and regulations at any time, so check here regularly.
                       P'apiu will not disclose user identifiable information to any third party without your consent.
                        <br>
                        Our goal is to provide you with a very safe Internet experience where you can safely provide information to support our reservation and services.
                         To achieve this goal, an active part of this website will include the collection of certain types of information about the site's visitors and users.
                        <br>
                        We understand that your privacy is important, so we will clearly explain the types of information being collected and how we use it.
                         This privacy policy only applies to our website.
                        <br>
                        This privacy policy covers two types of information collected at web sites, personal and aggregate.
                         The term \"personal information\" relates to data that you voluntarily provide,
                         including the use of your identity page and / or companies accessing and using this website on your behalf.
                          For example, personal information includes: information that you send to us such as
                          Name, E-mail Address, Telephone Number, Affiliates, Location access and / or some other personal information.
                          The term \"aggregated data\" refers to general information about you such as the number of visits to certain websites,
                           visits from other related websites or being taken from other sites.</p>
                </li>
                <li>
                    <span class=\"title\">WHAT INFORMATION IS COLLECTED? HOW WILL WE USE INFORMATION?</span>
                    <p>
                       We always make sure your personal information will not be used without permission.
                        You may have sent a request to receive information about P'apiu, ever participated in one of our promotions or register for e-mail to receive the latest information.
                         In response, we may request information such as your name and postal address. In the event that you choose to provide this information.
                    </p>
                </li>
                <li>
                    <span class=\"title\">WE WILL USE YOUR INFORMATION TO:</span>
                    <p>
                        <ol>
                            <li>
                    <p>Registration You become a member of P'apiu</p>
                </li>
                <li>
                    <p>Help you plan and book a room / service in P'apiu</p>
                </li>
                <li>
                    <p>Email you about our promotions or special offers</p>
                </li>
                <li>
                    <p> Send marketing communications or surveys to you</p>
                <li>
                    <p>Answer your questions or suggestions</p>
                </li>
                <li>
                    <p> Improve the quality of your visitors to our site </p>
                </li>
                </ol>
                </p>
                <p>
                   All of the above will have an opt-out button to allow you to refuse to receive such information in the future.
                    When deciding whether or not to participate, please note that we will only be used for Resort purposes.
                     We do not sell, rent or share any of your personal information with any other party, nor use it for unapproved commercial purposes.
                      You may request to be removed from our list at any time.
                </p>
                </li>
            </ul>",
                    'title' => 'Description Policy'
                ]
            ],
        ];

        foreach ($configs as $config) {
            ConfigCms::create($config);
        }
        $this->enableForeignKeys();
    }
}
