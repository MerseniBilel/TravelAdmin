<?php

use App\CityImage;
use Illuminate\Database\Seeder;

class City_imagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CityImage::class, 40)->create();
    }
}
