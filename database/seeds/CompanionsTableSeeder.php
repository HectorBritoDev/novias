<?php

use App\Companion;
use Illuminate\Database\Seeder;

class CompanionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Companion::create(
            [
                'guest_id' => 1,
                'companion_id' => 2,
            ]);
    }
}
