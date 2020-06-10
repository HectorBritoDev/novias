<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(SectorCategoriesTableSeeder::class);
        $this->call(SectorsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TasksCategoriesTableSeeder::class);
        $this->call(TasksTableSeeder::class);

        $this->call(GroupsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(GuestsTableSeeder::class);
        $this->call(BudgetCategoriesTableSeeder::class);
        $this->call(SpendsTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        $this->call(WeathersTableSeeder::class);
        $this->call(StylesTableSeeder::class);
        $this->call(FaqsTableSeeder::class);
        $this->call(ProviderRequestsTableSeeder::class);
        $this->call(LikesTableSeeder::class);
        $this->call(BlogTagsTableSeeder::class);

        //$this->call(CompanionsTableSeeder::class);

    }
}
