<?php

use App\SectorCategory;
use Illuminate\Database\Seeder;

class SectorCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SectorCategory::create(['category_name' => 'Recepciones']);
        SectorCategory::create(['category_name' => 'Proveedores']);
        SectorCategory::create(['category_name' => 'Novias']);
        SectorCategory::create(['category_name' => 'Novios']);
    }
}
