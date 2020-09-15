<?php

namespace Modules\Service\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;
use Modules\Service\Entities\Service;

class ServiceServiceItemTableSeeder extends Seeder
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
        $this->truncate('service_service_item');

        $data = [
            ["service_id" => 1, "item_ids" => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22]],
            ["service_id" => 2, "item_ids" => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22]],
            ["service_id" => 3, "item_ids" => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 23, 16, 17, 24, 18, 19, 20, 21, 22]],
            ["service_id" => 4, "item_ids" => [25, 26, 27, 28, 29, 30, 31, 32, 33, 34]],
            ["service_id" => 5, "item_ids" => [25, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51]],
            ["service_id" => 6, "item_ids" => [1, 52, 2, 53, 3, 54, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 55, 18, 19, 20, 21, 22]],
            ["service_id" => 8, "item_ids" => [56, 57, 58, 59, 60]],
        ];

        foreach ($data as $relationship) {
            $service = Service::find($relationship["service_id"]);
            $service->serviceItems()->attach($relationship["item_ids"]);
        }

        $this->enableForeignKeys();
    }
}
