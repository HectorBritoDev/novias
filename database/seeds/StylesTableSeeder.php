<?php

use App\WeddingStyle;
use Illuminate\Database\Seeder;

class StylesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WeddingStyle::create(['name' => 'Playa']);
        WeddingStyle::create(['name' => 'Nocturno']);
        WeddingStyle::create(['name' => 'Vintage']);
        WeddingStyle::create(['name' => 'Aire libre']);
        WeddingStyle::create(['name' => 'Campestre']);
        WeddingStyle::create(['name' => 'Elegante']);
    }
}
