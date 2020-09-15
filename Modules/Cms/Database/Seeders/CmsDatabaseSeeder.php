<?php

namespace Modules\Cms\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class CmsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

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
    }
}
