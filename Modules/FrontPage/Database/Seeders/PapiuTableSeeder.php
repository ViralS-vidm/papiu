<?php

namespace Modules\FrontPage\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;
use Modules\FrontPage\Entities\Papiu;

class PapiuTableSeeder extends Seeder
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
        $this->truncate('papiu');

        $papiu = [
            'slogan' => 'P\'apiu <strong>Lưu kỷ niệm - Dưỡng yêu thương </strong> ',
            'introduce' => 'Không chỉ được đắm chìm trong thiên nhiên hùng vĩ và tận hưởng giây phút tĩnh lặng, thăng hoa; P\'apiu còn là nơi mang đến cho du khách những trải nghiệm có một không hai như tham quan bản người Dao, chơi trò chơi dân gian với người bản địa, ngủ ngoài trời sao, con đường thổ cẩm, đi bộ trong rừng hay thăm nguồn nước dưới lòng đất và những trải nghiệm khó quên khác. ',
            'service_introduce' => 'Không chỉ bao gồm những dịch vụ cơ bản mà du khách được trải nghiệm trong quá trình tận hưởng kỳ nghỉ tại các khu nhà, P\'apiu dành riêng cho du khách những gói dịch vụ đặc biệt khác như cầu hôn, lễ cưới, quà tặng người thân, tủ lưu giữ kỷ niệm hay xe đưa đón. P\'apiu hy vọng các cặp đôi sẽ có thể bỏ quên không gian và thời gian, tận hưởng kỳ nghỉ hoàn hảo cùng những kỷ niệm tuyệt vời khó quên.'
        ];

        $papiu = Papiu::create($papiu);

        $papiu->overview()->attach([1, 2, 3]);

        $this->enableForeignKeys();
    }
}
