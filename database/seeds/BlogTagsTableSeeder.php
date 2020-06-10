<?php

use App\BlogTag;
use Illuminate\Database\Seeder;

class BlogTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogTag::create(['name' => 'Vestidos']);
        BlogTag::create(['name' => 'Trajes']);
        BlogTag::create(['name' => 'Ponqués']);
    }
}
