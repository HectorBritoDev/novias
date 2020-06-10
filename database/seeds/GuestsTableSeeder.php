<?php

use App\Guest;
use Illuminate\Database\Seeder;

class GuestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guest::create(
            [
                'user_id' => 1,
                'group_id' => 1,
                'menu_id' => 1,
                'name' => 'Simón',
            ]);
        Guest::create(
            [
                'user_id' => 1,
                'group_id' => 1,
                'name' => 'Faviola',
            ]);
        Guest::create(
            [
                'user_id' => 1,
                'group_id' => 2,
                'name' => 'Olga',
            ]);
    }
}
