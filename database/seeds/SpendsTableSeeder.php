<?php

use App\Spend;
use Illuminate\Database\Seeder;

class SpendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Spend::create(
            [
                'name' => 'Mi primer gasto',
                'estimated_cost' => 2000,
                'final_cost' => 2500,
                'budget_category_id' => 1,
            ]);
        Spend::create(
            [
                'name' => 'Mi segundo gasto',
                'estimated_cost' => 1000,
                'final_cost' => 500,
                'budget_category_id' => 1,
            ]);
    }
}
