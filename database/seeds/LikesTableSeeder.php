<?php

use App\Like;
use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Like::create(['user_id' => 1, 'provider_id' => 3, 'sector_id' => 2]);
    }
}
