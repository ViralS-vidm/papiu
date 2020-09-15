<?php

namespace Modules\FrontPage\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Blog\Database\Seeders\PostTableSeeder;
use Modules\Cms\Database\Seeders\AgencyCmsTableSeeder;
use Modules\Cms\Database\Seeders\CommonCmsTableSeeder;
use Modules\Cms\Database\Seeders\ConditionCmsTableSeeder;
use Modules\Cms\Database\Seeders\ConfigCmsTableSeeder;
use Modules\Cms\Database\Seeders\ExperienceImageCmsTableSeeder;
use Modules\Cms\Database\Seeders\ExtraBookingTableSeeder;
use Modules\Cms\Database\Seeders\GalleryCmsTableSeeder;
use Modules\Cms\Database\Seeders\HomeCmsTableSeeder;
use Modules\Cms\Database\Seeders\ImageCmsTableSeeder;
use Modules\Cms\Database\Seeders\MailCmsTableSeeder;
use Modules\Cms\Database\Seeders\MetaCmsTableSeeder;
use Modules\Cms\Database\Seeders\PolicyCmsTableSeeder;
use Modules\Cms\Database\Seeders\ProductCmsTableSeeder;
use Modules\Cms\Database\Seeders\VideoCmsTableSeeder;
use Modules\Image\Database\Seeders\ImageTableSeeder;
use Modules\Product\Database\Seeders\ProductConvenienceTableSeeder;
use Modules\Product\Database\Seeders\ProductTableSeeder;
use Modules\Service\Database\Seeders\OfferTableSeeder;
use Modules\Service\Database\Seeders\ServiceItemTableSeeder;
use Modules\Service\Database\Seeders\ServiceServiceItemTableSeeder;
use Modules\Service\Database\Seeders\ServiceTableSeeder;

class FrontPageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(ImageTableSeeder::class);
        $this->call(OverviewTableSeeder::class);
        $this->call(PapiuTableSeeder::class);
        $this->call(ConfigCmsTableSeeder::class);
        $this->call(CommonCmsTableSeeder::class);
        $this->call(ImageCmsTableSeeder::class);
        $this->call(MetaCmsTableSeeder::class);
        $this->call(HomeCmsTableSeeder::class);
        $this->call(ExperienceImageCmsTableSeeder::class);
        $this->call(ProductCmsTableSeeder::class);
        $this->call(GalleryCmsTableSeeder::class);
        $this->call(ExtraBookingTableSeeder::class);
        $this->call(VideoCmsTableSeeder::class);
        $this->call(MailCmsTableSeeder::class);
        $this->call(PolicyCmsTableSeeder::class);
        $this->call(AgencyCmsTableSeeder::class);
        $this->call(ConditionCmsTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(ProductConvenienceTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(ServiceItemTableSeeder::class);
        $this->call(ServiceServiceItemTableSeeder::class);
        $this->call(OfferTableSeeder::class);
    }
}
