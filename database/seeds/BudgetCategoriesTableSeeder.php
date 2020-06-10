<?php

use App\BudgetCategory;
use Illuminate\Database\Seeder;

class BudgetCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BudgetCategory::create(
            [
                'name' => 'Ceremonia',
                'user_id' => 1,

            ]);
        BudgetCategory::create(
            [
                'name' => 'Musica',
                'user_id' => 1,

            ]);
    }
}
