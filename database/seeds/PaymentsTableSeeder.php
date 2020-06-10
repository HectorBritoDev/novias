<?php

use App\Payment;
use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create(
            [
                'name' => 'Mi primer gasto',
                'expiration_date' => today(),
                'amount' => 1000,
                'spend_id' => 1,
            ]);
    }
}
