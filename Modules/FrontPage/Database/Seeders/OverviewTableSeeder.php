<?php

namespace Modules\FrontPage\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;
use Modules\FrontPage\Entities\Overview;

class OverviewTableSeeder extends Seeder
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
        $this->truncate('overview');
        $this->truncate('model_has_overview');
        $overviews = [
            // papiu
            [
                'content' => 'Ẩn mình giữa núi rừng Hà Giang hùng vĩ, Khu nghỉ dưỡng P\'apiu là điểm đến lý tưởng để tận hưởng phút giây tĩnh lặng và khoảnh khắc ngọt ngào cùng người mình yêu. Là sự kết hợp giữa tinh hoa văn hóa bản địa và thiết kế sang trọng trong từng chi tiết. P\'apiu gồm 3 khu nhà chính với kiến trúc độc, lạ đậm chất văn hóa Hà Giang cùng dịch vụ đẳng cấp, chu đáo. P\'apiu mang đến cho du khách trải nghiệm riêng tư khác biệt và độc nhất tại Đông Nam Á'
            ],
            [
                'content' => 'Là sự kết hợp giữa tinh hoa văn hóa bản địa và thiết kế sang trọng trong từng chi tiết . P\'apiu được xây dựng gồm 3 khu nhà chính với những trải nghiệm khác biệt và riêng tư độc nhất.'
            ],
            [
                'content' => 'Không chỉ được đắm chìm trong thiên nhiên hùng vĩ và tận hưởng giây phút tĩnh lặng, thăng hoa; P\'apiu còn là nơi mang đến cho du khách những trải nghiệm có một không hai như tham quan bản người Dao, chơi trò chơi dân gian với người bản địa, ngủ ngoài trời sao, con đường thổ cẩm, đi bộ trong rừng hay thăm nguồn nước dưới lòng đất và những trải nghiệm khó quên khác.'
            ],

            // mellow
            [
                'content' => 'Trải nghiệm tiện nghi 5 sao với kiến trúc nhà trình tường độc đáo của người Mông. Là nơi lý tưởng để bỏ lại cuộc sống bon chen, tấp nập và tận hưởng khoảnh khắc tĩnh lặng thưởng trà dưới ánh bình mình. Ngắm nhìn con thác Phia Giầu giữa non cao bao la kỳ vĩ.'
            ],
            [
                'content' => 'Đi qua dãy trúc xanh mướt, The Mellow nằm ẩn mình giữa non cao P\'apiu hùng vĩ. Kiến trúc nhà trình tường truyền thống của dân tộc Mông với không gian ấm áp, đầy đủ tiện nghi và cách bày trí độc đáo. Từ sân thượng có thể thưởng trà ngắm nhìn biển mây cùng con thác Phia Dầu dưới ánh bình minh.'
            ],
            [
                'content' => 'The Mellow nằm ẩn mình giữa non núi P\'apiu hùng vĩ. Kiến trúc nhà trình tường truyền thống của dân tộc Mông gồm phòng khách, phòng ngủ, phòng tắm với lối đi đặc biệt giữa các phòng. Không gian ấm áp, đầy đủ tiện nghi và cách bày trí độc đáo. Từ sân thượng có thể thưởng trà hoa cúc ngắm nhìn biển mây cùng con thác Phia Dầu dưới ánh bình minh.'
            ],


            // fluffy
            [
                'content' => 'Kiến trúc nhà sàn được bao quanh bởi toàn bộ kính tạo ra không gian hoàn toàn mở, bốn bề là thiên nhiên, đắm chìm giữa vườn hoa đua sắc. Cùng cầu tình yêu thưởng ngắm biển mây đẹp tựa thiên đường.'
            ],
            [
                'content' => 'Nhà kính The Fluffy với kiến trúc nhà sàn bản địa, được thiết kế bao quanh bởi kính sang trọng, bày trí tỉ mỉ trong từng chi tiết. Con đường dẫn vào The Fluffy ngập tràn hương hoa, mang lại giây phút tĩnh lặng, lãng mạn nên thơ cùng cầu tình yêu ngắm nhìn biển mây đẹp tựa thiên đường.'
            ],
            [
                'content' => 'Địa điểm lý tưởng tận hưởng giây phút tĩnh lặng, hòa mình vào thiên nhiên'
            ],

            // layla
            [
                'content' => 'Nơi lý tưởng cùng người thương vun đắp tình cảm, mang lại cảm giác lãng mạn, thăng hoa với dịch vụ đặc biệt dưới lòng đất. Trải nghiệm cảm giác riêng tư khác biệt tại quán bar mini. Là nơi đầu tiên có phòng lưu giữ kỷ vật tình yêu từ hộp bí mật.'
            ],
            [
                'content' => 'Hầm kỷ niệm Layla Qays dưới lòng đất với hương tràm dễ chịu, được bày trí gồm những hộp bí mật lưu giữ kỷ vật ngọt ngào. Quán bar mini với vẻ đẹp huyền bí mang lại cảm giác riêng tư đặc biệt, lãng mạn và thăng hoa. Khi tình yêu có thể qua đi nhưng kỷ niệm sẽ luôn còn mãi!'
            ],
            [
                'content' => 'Cùng người thương chìm đắm trong không gian lãng mạn, thăng hòa và cảm giác riêng tư khác biệt'
            ]
        ];


        foreach ($overviews as $overview) {
            Overview::create($overview);
        }

        $this->enableForeignKeys();
    }
}
