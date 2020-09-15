<?php

namespace Modules\Feedback\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;
use Modules\Feedback\Entities\Feedback;

class FeedbackTableSeeder extends Seeder
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
        $this->truncate('feedbacks');

        factory(Feedback::class, 10)->create();

        $this->enableForeignKeys();
    }
}
