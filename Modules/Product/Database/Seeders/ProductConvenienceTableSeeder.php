<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;
use Modules\Product\Entities\ProductConvenience;

class ProductConvenienceTableSeeder extends Seeder
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

        $this->truncate('product_conveniences');
        $this->truncate('product_convenience_translations');
        $this->truncate('product_conveniences_pivot');

        $conveniences = [
            ["name" => "Wifi", "icon" => "", "en" => [
                "name" => "Wifi"
            ]],
            ["name" => "Điều Hòa", "icon" => "", "en" => [
                "name" => "Air Con"
            ]],
            ["name" => "Giá Treo Quần Áo", "icon" => "", "en" => [
                "name" => "Cloth Hook"
            ]],
            ["name" => "Tivi", "icon" => "", "en" => [
                "name" => "Tivi"
            ]],
            ["name" => "Máy Sấy", "icon" => "", "en" => [
                "name" => "Dryer"
            ]],
        ];

        foreach ($conveniences as $convenience) {
            ProductConvenience::create($convenience);
        }

        $this->enableForeignKeys();
    }
}
