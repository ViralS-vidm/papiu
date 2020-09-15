<?php

namespace Modules\Image\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Core\Database\Seeders\Traits\DisableForeignKeys;
use Modules\Core\Database\Seeders\Traits\TruncateTable;
use Modules\Image\Entities\Image;

class ImageTableSeeder extends Seeder
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
        $this->truncate('images');
        $this->truncate('model_has_images');

        $images = [
            [
                'original_url' => 'storage/images/product-detail1.jpg',
                'thumbnail_url' => 'storage/images/thumbnail/product-detail1.jpg'
            ],
            [
                'original_url' => 'storage/images/product-detail2.jpg',
                'thumbnail_url' => 'storage/images/thumbnail/product-detail2.jpg'
            ],
            [
                'original_url' => 'storage/images/product-detail3.png',
                'thumbnail_url' => 'storage/images/thumbnail/product-detail3.png'
            ],
            [
                'original_url' => 'storage/images/product-detail4.png',
                'thumbnail_url' => 'storage/images/thumbnail/product-detail4.png'
            ],
            [
                'original_url' => 'storage/images/product-detail5.png',
                'thumbnail_url' => 'storage/images/thumbnail/product-detail5.png'
            ],
            [
                'original_url' => 'storage/images/product-detail6.png',
                'thumbnail_url' => 'storage/images/thumbnail/product-detail6.png'
            ],
            [
                'original_url' => 'storage/images/product-detail7.png',
                'thumbnail_url' => 'storage/images/thumbnail/product-detail7.png'
            ],
            [
                'original_url' => 'storage/images/product-home1.png',
                'thumbnail_url' => 'storage/images/thumbnail/product-home1.png'
            ],
            [
                'original_url' => 'storage/images/product-home2.png',
                'thumbnail_url' => 'storage/images/thumbnail/product-home2.png'
            ],
            [
                'original_url' => 'storage/images/product-home1.png',
                'thumbnail_url' => 'storage/images/thumbnail/product-home1.png'
            ],


            [
                'original_url' => 'storage/images/service-1.png',
                'thumbnail_url' => 'storage/images/thumbnail/service-1.png'
            ],
            [
                'original_url' => 'storage/images/service-2.png',
                'thumbnail_url' => 'storage/images/thumbnail/service-2.png'
            ],
            [
                'original_url' => 'storage/images/service-1.png',
                'thumbnail_url' => 'storage/images/thumbnail/service-1.png'
            ],
            [
                'original_url' => 'storage/images/service-2.png',
                'thumbnail_url' => 'storage/images/thumbnail/service-2.png'
            ],
            [
                'original_url' => 'storage/images/service-1.png',
                'thumbnail_url' => 'storage/images/thumbnail/service-1.png'
            ],
            [
                'original_url' => 'storage/images/service-3.png',
                'thumbnail_url' => 'storage/images/thumbnail/service-3.png'
            ],
            [
                'original_url' => 'storage/images/service-1.png',
                'thumbnail_url' => 'storage/images/thumbnail/service-1.png'
            ],
            [
                'original_url' => 'storage/images/service-2.png',
                'thumbnail_url' => 'storage/images/thumbnail/service-2.png'
            ],
            [
                'original_url' => 'storage/images/service-1.png',
                'thumbnail_url' => 'storage/images/thumbnail/service-1.png'
            ],
            [
                'original_url' => 'storage/images/service-2.png',
                'thumbnail_url' => 'storage/images/thumbnail/service-2.png'
            ],
            [
                'original_url' => 'storage/images/service-1.png',
                'thumbnail_url' => 'storage/images/thumbnail/service-1.png'
            ],
            [
                'original_url' => 'storage/images/service-3.png',
                'thumbnail_url' => 'storage/images/thumbnail/service-3.png'
            ],

        ];

        foreach ($images as $image) {
            Image::create($image);
        }

        $this->enableForeignKeys();
    }
}
