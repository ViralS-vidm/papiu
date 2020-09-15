<?php

namespace Modules\Cms\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Cms\Entities\ConfigCms;
use Modules\Cms\Entities\VideoCms;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;

class MailCmsTableSeeder extends Seeder
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

        ConfigCms::whereIn('key', [ConfigCms::KEY_MAIL_CONTENT_CMS])->delete();

        $configs = [
            [
                "key" => ConfigCms::KEY_MAIL_CONTENT_CMS, 'title' => 'Đặt phòng thành công', 'type' => ConfigCms::TYPE_MAIL_CMS,
                "value" => "
                    <div>
                        <p>Xin chào bạn !!name!!</p>
                        <p>Chúng tôi nhận được yêu cầu đặt phòng thành công của bạn</p>
                        <p>Thông tin về việc đặt phòng :
                            <ul>
                                <li>
                                    <span>Họ và tên</span>
                                    <p>!!name!!</p>
                                </li>
                                <li>
                                    <span>Số điện thoại</span>
                                    <p>!!number!!</p>
                                </li>
                                <li>
                                    <span>Email</span>
                                    <p>!!email!!</p>
                                </li>
                                <li>
                                    <span>Địa chỉ</span>
                                    <p>!!address!!</p>
                                </li>
                                <li>
                                    <span>Ngày bắt đầu</span>
                                    <p>!!time_start!!</p>
                                </li>
                                <li>
                                    <span>Ngày kết thúc</span>
                                    <p>!!time_end!!</p>
                                </li>
                                <li>
                                    <span>Loại hình nhà</span>
                                    <p>!!product_name!!</p>
                                </li>
                                <li>
                                    <span>Dịch vụ đi kèm</span>
                                    <p>!!services_combo!!</p>
                                </li>
                            </ul><!-- End .list_infomationAccount -->
                        </p>
                        <span>Chúc bạn có chuyến đi vui vẻ.</span>
                    </div>",
                'en' => [
                    'value' => "
                    <div>
                        <p>Hi, !!name!!</p>
                        <p>We received your successful booking request.</p>
                        <p>Information about the booking:
                        <ul>
                            <li>
                                <span>Full name</span>
                                <p>!!name!!</p>
                            </li>
                            <li>
                                <span>Phone number</span>
                                <p>!!number!!</p>
                            </li>
                            <li>
                                <span>Email</span>
                                <p>!!email!!</p>
                            </li>
                            <li>
                                <span>Address</span>
                                <p>!!address!!</p>
                            </li>
                            <li>
                                <span>Start date</span>
                                <p>!!time_start!!</p>
                            </li>
                            <li>
                                <span>End date</span>
                                <p>!!time_end!!</p>
                            </li>
                            <li>
                                <span>Type of house</span>
                                <p>!!product_name!!</p>
                            </li>
                            <li>
                                <span>Bundled services</span>
                                <p>!!services_combo!!</p>
                            </li>
                        </ul><!-- End .list_infomationAccount -->
                         </p>
                        <span>Have fun trip.</span>
                    </div>",
                    'title' => 'Booking Done'
                ]
            ]
        ];

        foreach ($configs as $config) {
            ConfigCms::create($config);
        }
        $this->enableForeignKeys();
    }
}
