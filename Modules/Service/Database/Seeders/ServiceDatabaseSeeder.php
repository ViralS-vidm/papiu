<?php

namespace Modules\Service\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ServiceDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

//        $this->call(ServiceTableSeeder::class);
//        $this->call(ServiceItemTableSeeder::class);
//        $this->call(ServiceServiceItemTableSeeder::class);
//        $this->call(OfferTableSeeder::class);
    }
}
