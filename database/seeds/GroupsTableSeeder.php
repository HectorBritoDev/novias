<?php

use App\Group;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create(
            [
                'user_id' => 1,
                'name' => 'Amigos',
            ]);
        Group::create(
            [
                'user_id' => 1,
                'name' => 'Familia',
            ]);
    }
}
