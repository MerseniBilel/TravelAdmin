<?php

use App\HotelImage;
use Illuminate\Database\Seeder;

class Hotel_imagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(HotelImage::class, 40)->create();
    }
}
