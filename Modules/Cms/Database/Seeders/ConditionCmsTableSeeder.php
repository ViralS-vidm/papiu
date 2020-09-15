<?php

namespace Modules\Cms\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Cms\Entities\ConfigCms;
use Modules\Cms\Entities\ImageCms;
use Modules\Cms\Entities\ImageCmsTranslation;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;
use Modules\Image\Entities\Image;

class ConditionCmsTableSeeder extends Seeder
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

        ConfigCms::whereIn('type', [ConfigCms::TYPE_CONDITION_CMS])->delete();

        $configs = [
            [
                "key" => ConfigCms::KEY_CONDITION_TITLE_CMS, 'title' => 'Tiêu đề điều khoản và điều kiện', 'type' => ConfigCms::TYPE_CONDITION_CMS,
                "value" => "ĐIỀU KHOẢN VÀ ĐIỀU KIỆN",
                'en' => [
                    'value' => "TERMS AND CONDITION",
                    'title' => 'terms and condition'
                ]
            ],
            [
                "key" => ConfigCms::KEY_CONDITION_DESCRIPTION_CMS, 'title' => 'Nội dung điều khoản và điều kiện', 'type' => ConfigCms::TYPE_CONDITION_CMS,
                "value" => "<p>Dưới đây là các điều khoản và điều kiện của một hợp đồng pháp lý giữa quý vị và P'apiu (“Chúng tôi”). Khi
                truy cập hoặc sử dụng website này (“trang web”), quý vị đồng ý rằng quý vị đã đọc, hiểu và đồng ý tuân
                theo các điều khoản, luật và quy định hiện hành, bao gồm luật và quy định kiểm soát việc trích xuất và
                tái trích xuất. Nếu quý vị không đồng ý với các điều khoản này, vui lòng không sử dụng trang web này.
            </p>
            <ul>
                <li>
                    <span class=\"title\">TỪ CHỐI TRÁCH NHIỆM</span>
                    <p>Thông tin trên trang này không đảm bảo tính chính xác, cập nhật hoặc hoàn chỉnh, và trang này
                        có thể có lỗi kỹ thuật hoặc đánh máy. Chúng tôi không chịu trách nhiệm (và từ chối trách nhiệm)
                        về việc đảm bảo thông tin cập nhật, hay tính chính xác cũng như tính hoàn chỉnh của nội dung
                        thông tin đăng trên website. Do đó, quý vị nên kiểm tra tính chính xác và tính hoàn chỉnh của
                        tất cả các thông tin được đăng tải trước khi đưa ra quyết định liên quan đến dịch vụ, sản phẩm
                        hay các vấn đề khác thuộc trang này.
                        <br>
                        P'apiu có quyền thay đổi, chỉnh sửa và/hoặc nâng cấp trang web và cập nhật thay đổi về sản
                        phẩm, dịch vụ hay chương trình được giới thiệu trên trang web này bất kỳ lúc nào mà không cần
                        thông báo trước.
                    </p>
                </li>
                <li>
                    <span class=\"title\">BẢN QUYỀN VÀ NHÃN HIỆU</span>
                    <p>Trang web này có thể bao gồm hoặc đối chiếu với các nhãn hiệu, bản quyền, các thông báo về
                        quyền sở hữu tài sản khác và các thông tin cần được tôn trọng. Trang này và tất cả các nội dung
                        trên trang này không được sao chép, tái sử dụng, tái xuất bản, đăng tải, truyền tải, phân phối
                        hoặc sử dụng để tạo ra các tác phẩm khác mà không có thỏa thuận trước bằng văn bản với P'apiu.
                        Tuy nhiên, quý vị có thể truy cập, tải về hay sử dụng các tư liệu trên website với mục đích khác
                        với điều kiện tuân thủ các điều khoản, điều kiện và thông báo kèm theo.
                        <br>
                        Tất cả lô-gô (logo), tên sản phẩm và tên dịch vụ của P'apiu là nhãn hiệu của P'apiu.
                    </p>
                </li>
                <li>
                    <span class=\"title\">LIÊN KẾT VỚI CÁC TRANG WEB KHÁC</span>
                    <p>
                        EP'apiu cung cấp liên kết với các website khác để thuận tiện cho việc tìm kiếm thông tin của quý
                        vị. Nhưng chúng tôi sẽ không chịu trách nhiệm hay chịu trách nhiệm pháp lý về nội dung mà các
                        website khác cung cấp, bao gồm (nhưng không giới hạn) các thông tin quảng cáo hay tiếp thị. Nếu
                        quý vị quyết định truy cập vào website khác từ trang này, quý vị có thể phải chấp nhận rủi ro.
                        Các website khác có thể bao gồm liên kết đến trang này. Việc bao hàm những liên kết như thế
                        không chứng tỏ sự bảo lãnh, hỗ trợ hoặc đồng ý về nội dung, quảng cáo, sản phẩm, dịch vụ, chính
                        sách hoặc các tư liệu khác trên website này.

                    </p>
                </li>
                <li>
                    <span class=\"title\">PHÁP LUẬT</span>
                    <p>
                        Điều khoản và điều kiện này, cùng các quyền và nghĩa vụ tương ứng của các bên dưới đây, có thể
                        được chi phối bởi và được chiểu theo luật nước cộng hòa xã hội chủ nghĩa Việt Nam, mà không mâu
                        thuẫn với luật định.
                        Không sử dụng vào mục đích sai luật hoặc bị cấm
                        Trong trường hợp sử dụng trang này, quý vị phải đảm bảo không sử dụng trang này vì mục đích sai
                        luật hoặc bị cấm theo các điều khoản và điều kiện này.
                    </p>
                </li>
                <li>
                    <span class=\"title\">TỪ CHỐI BẢO HÀNH</span>
                    <p>
                        Quý vị sẽ chịu trách nhiệm với các rủi ro có thể xảy ra khi sử dụng website này. Tất cả tài
                        liệu, thông tin, sản phẩm, phần mềm, chương trình và dịch vụ cung cấp trên trang này không được
                        bảo hành hay bảo đảm dưới mọi hình thức. Theo luật, P'apiu sẽ từ chối việc bảo hành, bảo đảm hay
                        đại diện theo luật định dưới mọi hình thức ngầm hiểu hay phát ngôn bao gồm (nhưng không giới
                        hạn) việc bảo hành thương mại, tính khả dụng với mục đích nhất định, hay việc không xâm phạm đến
                        các quyền sở hữu trí tuệ và tài sản. P'apiu sẽ không chịu trách nhiệm bảo hành, bảo đảm rằng
                        website sẽ không bị gián đoạn, đúng thời hạn, an toàn hoặc không có lỗi.
                        <br>
                        Quý vị hiểu và đồng ý rằng nếu quý vị tải hoặc thu nhận tài liệu, thông tin, sản phẩm, phần
                        mềm, chương trình hoặc dịch vụ, quý vị sẽ phải tự chịu trách nhiệm về những rủi ro hoặc thiệt
                        hại có thể xảy ra, bao gồm việc mất dữ liệu hoặc gây thiệt hại cho hệ thống máy tính của quý vị.
                        <br>
                        Một số quyền hạn pháp lý không cho phép loại bỏ sự bảo hành, vì vậy việc loại trừ ở trên có
                        thể không áp dụng với quý vị.
                    </p>
                </li>
                <li>
                    <span class=\"title\">GIỚI HẠN CỦA NGHĨA VỤ PHÁP LÝ</span>
                    <p>
                        P'apiu sẽ không chịu bất kỳ trách nhiệm nào về thiệt hại trực tiếp, gián tiếp, tình cờ, đặc
                        biệt, hoặc do hậu quả của các vấn đề có liên quan đến hoặc phát sinh từ trang này hoặc bất kỳ
                        truy cập nào vào trang này, hoặc của website hay các nguồn có liên kết, giới thiệu hoặc truy cập
                        thông qua trang này, hoặc để sử dụng hoặc tải, hoặc truy cập vào bất kỳ tài liệu, thông tin, sản
                        phẩm hoặc dịch vụ bao gồm, mà không giới hạn đến bất kỳ việc lỗ lãi, gián đoạn kinh doanh, lỗ
                        lợi nhuận, hoặc mất mát chương trình hoặc dữ liệu khác, ngay cả khi P'apiu có khả năng gây ra
                        những thiệt hại như thế. Việc loại bỏ và từ chối trách nhiệm pháp lý áp dụng cho tất cả các
                        nguyên nhân, dựa trên hợp đồng, giấy bảo hành, thiệt hại hoặc bất kỳ pháp lý nào khác.
                        <br>
                        Các điều khoản, điều kiện khác hoặc bổ sung có thể áp dụng cho các tài liệu, thông tin, sản
                        phẩm, phần mềm và dịch vụ cụ thể do trang này cung cấp. Trong trường hợp có bất kỳ mâu thuẫn nào
                        xảy ra, các điều khoản, điều kiện và thông báo khác hoặc bổ sung như thế sẽ có thể được áp dụng
                        thay cho các điều khoản và điều kiện này. Vui lòng xem hợp đồng hoặc thông báo được áp dụng.

                    </p>
                </li>
                <li>
                    <span class=\"title\">THAY ĐỔI VỀ ĐIỀU KHOẢN VÀ ĐIỀU KIỆN NÀY</span>
                    <p>
                        P'apiu có quyền thêm, thay đổi, xóa bất kỳ điều khoản và điều kiện sử dụng hoặc việc cung cấp,
                        sản phẩm và chương trình mô tả trong trang này bất kỳ lúc nào mà không cần thông báo trước. Vui
                        lòng kiểm tra thường xuyên để cập nhật thay đổi. Khi quý vị tiếp tục sử dụng và/ hoặc truy cập
                        vào trang này thì mặc nhiên quý vị đã đồng ý với từng và tất cả các điều khoản, điều kiện và
                        thông báo trong trang này.
                    </p>
                </li>
            </ul>",
                'en' => [
                    "value" => "<p>The following are the terms and conditions of a legal agreement between you and P'apiu (\"We\").
 By accessing or using this website (the \"website\"), you agree that you have read, understood and agree to abide by applicable terms,
  laws and regulations, including laws and regulations. extraction and re-extraction. If you do not agree with these terms, please do not use this website.
            </p>
            <ul>
                <li>
                    <span class=\"title\">DENY THE RESPONSIBILITY</span>
                    <p>The information on this site is not guaranteed to be accurate, current or complete,
                     and this site may contain technical inaccuracies or typographical errors.
                      We are not responsible (and disclaimer) for ensuring the updated information,
                       or the accuracy and completeness of the information posted on the website.
                        Therefore, you should check the accuracy and completeness of all information posted before making decisions regarding services,
                         products or other matters on this site.
                        <br>
                        P'apiu reserves the right to change, modify and / or upgrade the website and to update changes to products,
                         services or programs introduced on this site at any time without notice.
                    </p>
                </li>
                <li>
                    <span class=\"title\">COPYRIGHT AND TRADEMARK</span>
                    <p>This website may include or reference trademarks, copyrights, other property ownership notices and
                     information that should be respected. This site and all content on this site may not be reproduced,
                      reused, republished, uploaded, transmitted, distributed or used to create other works without prior written consent.
                       Version with P'apiu. However, you may access, download or use materials on the website for purposes other than those subject to the terms,
                       conditions and notices included.
                        <br>
                        All P'apiu logos, product names and service names are trademarks of P'apiu.
                    </p>
                </li>
                <li>
                    <span class=\"title\">LINKS TO OTHER WEBSITES</span>
                    <p>
                        EP'apiu provides links to other websites to facilitate your search.
                         But we will not be responsible or liable for the content that other websites provide,
                          including (but not limited to) advertising or marketing information.
                           If you decide to access another website from this Site, you do so at your own risk.
                            Other websites may include links to this page. The inclusion of such links does not represent the guarantee,
                             support or consent of the content, advertising, products, services, policies or other materials on this website.
                    </p>
                </li>
                <li>
                    <span class=\"title\">LAW</span>
                    <p>
                        These terms and conditions, and the respective rights and obligations of the parties below,
                         may be governed by and construed in accordance with the laws of the Socialist Republic of Vietnam,
                          without conflict with the law. Do not use for purposes that are illegal or prohibited In the case of using this site,
                           you must ensure that you do not use this site for illegal purposes or are prohibited under these terms and conditions.
                    </p>
                </li>
                <li>
                    <span class=\"title\">REFUSE WARRANTY</span>
                    <p>
                        You will be responsible for the risks that may occur when using this website.
                         All materials, information, products, software, programs and services provided on this site are not warranted or guaranteed.
                          By law, P'apiu will refuse warranty, warranty or statutory representation in any implied form or
                           statement including (but not limited to) commercial warranties, usability for purposes certain,
                            or non-infringement of intellectual property and property rights. P'apiu will not be responsible for the warranty,
                             guaranteeing that the website will be uninterrupted, timely, secure or error free.
                        <br>
                        You understand and agree that if you download or acquire materials, information, products, software,
                         programs or services, you will be solely responsible for the risks or damages that may occur. out, including data loss or damage to your computer system.
                        <br>
                        Some jurisdictions do not allow the exclusion of warranties, so the above exclusions may not apply to you.
                    </p>
                </li>
                <li>
                    <span class=\"title\">LIMITATION OF LEGAL OBLIGATIONS</span>
                    <p>
                        P'apiu will not be responsible for any direct, indirect, incidental, special,
                         or consequential damages of matters relating to or arising from this site or any access.
                          visit this site, or the website or sources linked, referenced or accessed through this site,
                           or to use or download, or access to any materials, information, products or services including ,
                            without limiting any losses, business interruptions, loss of profits, or loss of other programs or data,
                             even if P'apiu is likely to cause such damages.The removal and liability disclaimer applies to all causes,
                              based on contract, warranty, damages or any other legal.
                        <br>
                        Other or additional terms and conditions may apply to specific documents, information, products,
                         software, and services provided by this site. In the event of any conflict, such additional or additional terms,
                          conditions and notices may apply in lieu of these terms and conditions. Please see the applicable contract or notice.
                    </p>
                </li>
                <li>
                    <span class=\"title\">CHANGES TO THESE TERMS AND CONDITIONS</span>
                    <p>
                        P'apiu reserves the right to add, change or delete any terms and conditions of use or the offers,
                         products and programs described on this site at any time without notice. Please check back often to update changes.
                          By continuing to use and / or accessing this site, you automatically agree to each and all of the terms, conditions and notices contained on this site.
                    </p>
                </li>
            </ul>",
                    'title' => 'Description terms and condition'
                ]
            ],
        ];

        foreach ($configs as $config) {
            ConfigCms::create($config);
        }

        $images = ImageCms::whereIn('type', [ConfigCms::TYPE_CONDITION_CMS])->get();
        foreach ($images as $img) {
            $img->imageCms()->detach();
            $img->delete();
        }
        ImageCmsTranslation::whereIn('image_cms_id', $images->pluck('id'))->delete();
        $image =[
            'original_url' => '/papiu/images/contact.jpg',
            'thumbnail_url' => '/papiu/images/contact.jpg',
        ];
        $imageCms =[
            "title" => 'Điều khoản và điều kiện', "alt" => 'term_condition', 'type' => ConfigCms::TYPE_CONDITION_CMS, 'key' => ImageCms::KEY_CONDITION_CMS,
            'name' => "Con đường thổ cẩm",'description' => "Con đường thổ cẩm",
            'en' => [
                "title" => 'Term and condition', "alt" => 'term_condition',
                'name' => 'Brocade road','description' => "Brocade road",
            ]
        ];
        $i = Image::create($image);
        $s = ImageCms::create($imageCms);
        $s->imageCms()->detach();
        $s->imageCms()->attach([$i->id], ['image_type' => Image::TYPE_SERVICE_CMS_IMAGE]);

        $this->enableForeignKeys();
    }
}
