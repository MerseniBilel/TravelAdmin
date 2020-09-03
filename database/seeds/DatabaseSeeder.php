<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(HotelsTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(Hotel_imagesTableSeeder::class);
        $this->call(City_imagesTableSeeder::class);
    }
}
