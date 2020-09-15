<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;
use Modules\Image\Entities\Image;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductConvenience;

class ProductTableSeeder extends Seeder
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
        $this->truncate('products');
        $this->truncate('product_translations');

        $products = [
            [
                "name"            => "Nhà Trình Tường",
                "home_intro"      => "Trải nghiệm tiện nghi đặc biệt với kiến trúc nhà trình tường độc đáo của người Mông. Là nơi lý tưởng để bỏ lại cuộc sống bon chen, tấp nập và tận hưởng khoảnh khắc tĩnh lặng thưởng trà dưới ánh bình mình. Ngắm nhìn con thác Phia Giầu giữa non cao bao la kỳ vĩ.",
                "cate_intro"      => "Đi qua dãy trúc xanh mướt, The Mellow nằm ẩn mình giữa non cao P'apiu hùng vĩ. Kiến trúc nhà trình tường truyền thống của dân tộc Mông với không gian ấm áp, đầy đủ tiện nghi và lối đi độc đáo. Từ sân thượng có thể thưởng trà ngắm nhìn biển mây cùng con thác Phia Dầu dưới ánh bình minh.",
                "detail_overview" => "The Mellow nằm ẩn mình giữa non núi P'apiu hùng vĩ. Kiến trúc nhà trình tường truyền thống của dân tộc Mông gồm phòng khách, phòng ngủ, phòng tắm với lối đi đặc biệt giữa các phòng. Không gian ấm áp, đầy đủ tiện nghi và cách bày trí độc đáo. Từ sân thượng có thể thưởng trà hoa cúc ngắm nhìn biển mây cùng con thác Phia Dầu dưới ánh bình minh.",
                "detail_brief"    => "Trải nghiệm kiến trúc nhà trình tường của người Mông và con thác Phia Giầu đẹp tựa thiên đường",
                "price_per_day"   => "15000000",
                "num_bedroom"     => "1",
                "num_bathroom"    => "1",
                "num_lounge"      => "1",
                "en"              => [
                    "name"            => "The Mellow",
                    "home_intro"      => "This is a traditional house of H’Mong race in Hà Giang",
                    "cate_intro"      => "This is a traditional house of H’Mong race in Hà Giang",
                    "detail_overview" => "This is a traditional house of H’Mong race in Hà Giang",
                    "detail_brief"    => "This is a traditional house of H’Mong race in Hà Giang",
                ]
            ],
            [
                "name"            => "Nhà Kính",
                "home_intro"      => "Kiến trúc nhà sàn được bao quanh bởi toàn bộ kính tạo ra không gian hoàn toàn mở, bốn bề là thiên nhiên, đắm chìm giữa vườn hoa đua sắc. Cùng cầu tình yêu thưởng ngắm biển mây đẹp tựa thiên đường.",
                "cate_intro"      => "Nhà kính The Fluffy với kiến trúc nhà sàn bản địa, được thiết kế bao quanh bởi kính sang trọng, bày trí tỉ mỉ trong từng chi tiết. Con đường dẫn vào The Fluffy ngập tràn hương hoa, mang lại giây phút tĩnh lặng, lãng mạn nên thơ. Cùng cầu tình yêu ngắm nhìn biển mây đẹp tựa thiên đường.",
                "detail_overview" => "Nhà kính The Fluffy vởi kiến trúc nhà sàn truyền thống nhưng cực kỳ sang trọng bởi thiết kế nhà kính bao quanh và cách bày trí tỉ mỉ trong từng chi tiết. Cả phòng khách, phòng ngủ  và phòng tắm The Fluffy đều ngập tràn hương hoa mang lại giây phút tĩnh lặng, lãng mạn cùng cầu tình yêu có tầm nhìn đẹp tựa thiên đường.",
                "detail_brief"    => "Địa điểm lý tưởng tận hưởng giây phút tĩnh lặng, hòa mình vào thiên nhiên",
                "price_per_day"   => "15000000",
                "num_bedroom"     => "1",
                "num_bathroom"    => "1",
                "num_lounge"      => "1",
                "en"              => [
                    "name"            => "The Fluffy",
                    "home_intro"      => "The house is built by wood totally",
                    "cate_intro"      => "The house is built by wood totally",
                    "detail_overview" => "The house is built by wood totally",
                    "detail_brief"    => "The house is built by wood totally",
                ]
            ],
            [
                "name"            => "Nhà Hầm",
                "home_intro"      => "Nơi lý tưởng cùng người thương vun đắp tình cảm, mang lại cảm giác lãng mạn, thăng hoa với dịch vụ đặc biệt dưới lòng đất. Trải nghiệm cảm giác riêng tư khác biệt tại quán bar mini. Là nơi đầu tiên có phòng lưu giữ kỷ vật tình yêu từ hộp bí mật.",
                "cate_intro"      => "Hầm kỷ niệm Layla Qays dưới lòng đất với hương tràm dễ chịu, được bày trí gồm những hộp bí mật lưu giữ kỷ vật ngọt ngào. Quán bar mini với vẻ đẹp huyền bí mang lại cảm giác riêng tư đặc biệt, lãng mạn và thăng hoa. Khi tình yêu có thể qua đi nhưng kỷ niệm sẽ luôn còn mãi!",
                "detail_overview" => "Lấy cảm hứng từ câu chuyện tình yêu bất hủ nàng Layla và chàng Qays, Hầm kỷ niệm Layla Qays dưới lòng đất với hương tràm dễ chịu được bày trí gồm những hộp bí mật lưu giữ kỷ vật ngọt ngào. Thiết kế bao gồm phòng khách, phòng ngủ, phòng tắm và mini bar với vẻ đẹp huyền bí mang lại cảm giác riêng tư đặc biệt, lãng mạn và thăng hoa.",
                "detail_brief"    => "Cùng người thương chìm đắm trong không gian lãng mạn, thăng hòa và cảm giác riêng tư khác biệt",
                "price_per_day"   => "25000000",
                "num_bedroom"     => "1",
                "num_bathroom"    => "1",
                "num_lounge"      => "1",
                "en"              => [
                    "name"            => "Layla Qays",
                    "home_intro"      => "Layla was built based on famous romantic story of Arab between miss Layla and mr Qays",
                    "cate_intro"      => "Layla was built based on famous romantic story of Arab between miss Layla and mr Qays",
                    "detail_overview" => "Layla was built based on famous romantic story of Arab between miss Layla and mr Qays",
                    "detail_brief"    => "Layla was built based on famous romantic story of Arab between miss Layla and mr Qays",
                ]
            ],
        ];

        $conveniences = ProductConvenience::pluck('id', 'id')->all();
        $imageDetails = Image::where('id', '<=', 7)->pluck('id', 'id')->all();
        $imagesHome = Image::where('id', '>', 7)->where('id', '<=', 9)->pluck('id', 'id')->all();

        foreach ($products as $i => $product) {
            $p = Product::create($product);
            $p->conveniences()->attach($conveniences);
            $p->detailImages()->attach($imageDetails, ['image_type' => Image::TYPE_DETAIL_IMAGE]);
            $p->homeImage()->attach([$i + 8], ['image_type' => Image::TYPE_HOME_IMAGE]);
        }

        $mellow = Product::find(1);
        $flufyy = Product::find(2);
        $layla = Product::find(3);

        $mellow->overview()->attach([4, 5, 6]);
        $flufyy->overview()->attach([7, 8, 9]);
        $layla->overview()->attach([10, 11, 12]);

        $this->enableForeignKeys();
    }
}
