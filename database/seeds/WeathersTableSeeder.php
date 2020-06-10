<?php

use App\WeddingWeather;
use Illuminate\Database\Seeder;

class WeathersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WeddingWeather::create(['name' => 'Verano']);
        WeddingWeather::create(['name' => 'Invierno']);
        WeddingWeather::create(['name' => 'Primavera']);
        WeddingWeather::create(['name' => 'Otoño']);

    }
}
