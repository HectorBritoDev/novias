<?php

use App\WeddingColor;
use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WeddingColor::create(['name' => 'Amarillo']);
        WeddingColor::create(['name' => 'Azul']);
        WeddingColor::create(['name' => 'Rojo']);
        WeddingColor::create(['name' => 'Verde']);
        WeddingColor::create(['name' => 'Naranja']);
        WeddingColor::create(['name' => 'Morado']);
    }
}
