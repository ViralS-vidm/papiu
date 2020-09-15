<?php

namespace Modules\Cms\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Cms\Entities\MetaCms;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;

class MetaCmsTableSeeder extends Seeder
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

        $this->truncate('meta_cms');
        $this->truncate('meta_cms_translations');

        $metas = [
            ["key" => MetaCms::KEY_BOOK, "title" => 'Đặt phòng', 'description' => 'Đặt phòng tại Papiu', 'key_word' => 'dat_phong_papiu', 'tag' => 'dat-phong'],
            ["key" => MetaCms::KEY_INDEX, "title" => "P'apiu Lưu kỷ niệm - Dưỡng yêu thương", 'description' => 'Khu nghỉ dưỡng cao cấp dành cho các cặp đôi tại Đông Nam Á',
                'key_word' => 'resort_papiu', 'tag' => 'resort'],
            ["key" => MetaCms::KEY_INTRODUCTION, "title" => "Giới thiệu về P'apiu", 'description' => "Giới thiệu P'apiu", 'key_word' => 'resort_papiu', 'tag' => 'resort'],
            ["key" => MetaCms::KEY_PRODUCT, "title" => "Chi tiết khu nghỉ dưỡng", 'description' => "Chi tiết các phòng tại P'apiu",
                'key_word' => 'phong_ngu_cua_papiu', 'tag' => 'phong_ngu'],
            ["key" => MetaCms::KEY_SERVICE, "title" => "Dịch vụ", 'description' => "Chi tiết dịch vụ của P'apiu", 'key_word' => 'dich_vu_papiu', 'tag' => 'tien_ich_phong _ngu'],
            ["key" => MetaCms::KEY_GALLERY, "title" => "Trải nghiệm P'apiu", 'description' => "Trải nghiệm thiên nhiên, văn hóa, con người và âm thực tại P'apiu",
                'key_word' => 'bo_suu_tap_papiu', 'tag' => 'hinh_anh_dep'],
            ["key" => MetaCms::KEY_OFFER, "title" => "Ưu đãi", 'description' => "Ưu đãi độc quyền tại P'apiu",
                'key_word' => 'uu_dai_tai_papiu', 'tag' => 'uu_dai_doc_quyen'],
            ["key" => MetaCms::KEY_POLICY, "title" => "Chính sách bảo mật", 'description' => "Chính sách bảo mật chặt chẽ của P'apiu",
                'key_word' => 'chinh_sach_bao_mat_papiu', 'tag' => 'chinh_sach_bao_mat'],
            ["key" => MetaCms::KEY_CONTACT, "title" => "Liên hệ P'apiu", 'description' => "Thông tin liên hệ trực tiếp của P'apiu",
                'key_word' => 'lien_he_papiu', 'tag' => 'thong_tin_lien_he'],
            ["key" => MetaCms::KEY_AGENCY, "title" => "Đại Lý", 'description' => "Chính sách về đại lý - nhượng quyền của P'apiu",
                'key_word' => 'chinh_sach_dai_ly_nhuong_quyen_papiu', 'tag' => 'dai_ly_nhuong_quyen'],
            ["key" => MetaCms::KEY_CONDITION, "title" => "Điều khoản và điều kiện", 'description' => "Điều khoản và điều kiện của P'apiu",
                'key_word' => 'dieu_khoan_dieu_kien_papiu', 'tag' => 'dieu_khoan_dieu_kien'],
        ];

        foreach ($metas as $meta) {
            MetaCms::create($meta);
        }

        $this->enableForeignKeys();
    }
}
