<?php

namespace Modules\Cms\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Cms\Entities\ConfigCms;
use Modules\Cms\Entities\ImageCms;
use Modules\Cms\Entities\ImageCmsTranslation;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;
use Modules\Image\Entities\Image;

class AgencyCmsTableSeeder extends Seeder
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

        ConfigCms::whereIn('type', [ConfigCms::TYPE_AGENCY_CMS])->delete();

        $configs = [
            [
                "key" => ConfigCms::KEY_AGENCY_POLICY_TITLE_CMS, 'title' => 'Tiêu đề Chính sách đại lý', 'type' => ConfigCms::TYPE_AGENCY_CMS,
                "value" => "CHÍNH SÁCH",
                'en' => [
                    'value' => "POLICY",
                    'title' => 'Title Policy'
                ]
            ],
            [
                "key" => ConfigCms::KEY_AGENCY_POLICY_DESCRIPTION_CMS, 'title' => 'Nội dung Chính sách đại lý', 'type' => ConfigCms::TYPE_AGENCY_CMS,
                "value" => "<ul class=\"list_agency\">
                <li>
                    <h3>Chính sách</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                        ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                        tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum
                        iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu
                        feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                        luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                    </p>
                    <a href=\"\" class=\"btn-expensive\">Xem chi tiết</a>
                </li>
                <li>
                    <h3>Chính sách nhượng quyền</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                        ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                        tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum
                        iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu
                        feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                        luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                    </p>
                    <a href=\"\" class=\"btn-expensive\">Xem chi tiết</a>
                </li>
                <li>
                    <h3>Yêu cầu khi hợp tác nhượng quyền</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                        ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                        tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum
                        iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu
                        feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                        luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                    </p>
                    <a href=\"\" class=\"btn-expensive\">Xem chi tiết</a>
                </li>
            </ul>",
                'en' => [
                    "value" => "<ul class=\"list_agency\">
                <li>
                    <h3>Policy</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                        ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                        tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum
                        iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu
                        feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                        luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                    </p>
                    <a href=\"\" class=\"btn-expensive\">Show Detail</a>
                </li>
                <li>
                    <h3>Franchise policy</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                        ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                        tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum
                        iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu
                        feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                        luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                    </p>
                    <a href=\"\" class=\"btn-expensive\">Show Detail</a>
                </li>
                <li>
                    <h3>Required when franchising cooperation</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                        ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                        tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum
                        iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu
                        feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                        luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
                    </p>
                    <a href=\"\" class=\"btn-expensive\">Show Detail</a>
                </li>
            </ul>",
                    'title' => 'Description Agency Policy'
                ]
            ],
        ];

        foreach ($configs as $config) {
            ConfigCms::create($config);
        }

        $images = ImageCms::whereIn('type', [ConfigCms::TYPE_AGENCY_CMS])->get();
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
            "title" => 'Slide Đại lý', "alt" => 'slide_agency', 'type' => ConfigCms::TYPE_AGENCY_CMS, 'key' => ImageCms::KEY_AGENCY_SLIDE_CMS,
            'name' => "Con đường thổ cẩm",'description' => "Con đường thổ cẩm",
            'en' => [
                "title" => 'Agency slide', "alt" => 'slide_agency',
                'name' => 'Brocade road','description' => "Brocade road",
            ]
        ];
        $i = Image::create($image);
        for($x = 1; $x <=5 ;$x++) {
            $s = ImageCms::create($imageCms);
            $s->imageCms()->detach();
            $s->imageCms()->attach([$i->id], ['image_type' => Image::TYPE_SERVICE_CMS_IMAGE]);
        }

        $image =[
            'original_url' => '/papiu/images/agency.png',
            'thumbnail_url' => '/papiu/images/agency.png',
        ];
        $imageCms =[
            "title" => 'Form Đại lý', "alt" => 'form_agency', 'type' => ConfigCms::TYPE_AGENCY_CMS, 'key' => ImageCms::KEY_AGENCY_SLIDE_FORM_CMS,
            'name' => "Quầy thanh toán",'description' => "Quầy thanh toán",
            'en' => [
                "title" => 'Agency form', "alt" => 'form_agency',
                'name' => 'Checkout','description' => "Checkout",
            ]
        ];

        $img = Image::create($image);
        for($x = 1; $x <=3 ;$x++) {
            $s = ImageCms::create($imageCms);
            $s->imageCms()->detach();
            $s->imageCms()->attach([$img->id], ['image_type' => Image::TYPE_SERVICE_CMS_IMAGE]);
        }

        $this->enableForeignKeys();
    }
}
