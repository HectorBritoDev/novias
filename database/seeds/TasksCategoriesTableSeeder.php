<?php

use App\TaskCategory;
use Illuminate\Database\Seeder;

class TasksCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskCategory::create(
            [
                'name' => 'Planificación',
            ]);
        TaskCategory::create(
            [
                'name' => 'Tramites',
            ]);
        TaskCategory::create(
            [
                'name' => 'Banquete',
            ]);
    }
}
