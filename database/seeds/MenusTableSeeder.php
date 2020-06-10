<?php

use App\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Menu::create(
            [
                'user_id' => 1,
                'name' => 'Adulto',
                'description' => 'Arroz con pollo',
            ]);
        Menu::create(
            [
                'user_id' => 1,
                'name' => 'Niño',
                'description' => 'Cajita feliz',
            ]);
    }
}
